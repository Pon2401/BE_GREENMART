<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LogGiaoDich;
use App\Models\GioHang;
use App\Models\SanPham;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Exception;

class DonHangController extends Controller
{
    // ... (Các hàm khác giữ nguyên: getDataDH, themVaoGio, xoaSanPham) ...
    public function getDataDH()
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['message' => 'Bạn chưa đăng nhập'], 401);
        }

        // Lấy đơn hàng tạm (giỏ hàng)
        $cart = DonHang::firstOrCreate(
            [
                'id_khach_hang' => $user->id,
                'ma_don_hang'   => null
            ],
            [
                'tong_tien'      => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai'     => 'gio_hang'
            ]
        );

        // Lấy item
        $items = ChiTietDonHang::where('id_don_hang', $cart->id)
            ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_don_hangs.id_san_pham')
            ->select(
                'chi_tiet_don_hangs.id',
                'chi_tiet_don_hangs.so_luong',
                'chi_tiet_don_hangs.don_gia',
                'san_phams.ten_san_pham',
                'san_phams.don_vi',
                'san_phams.gia',
                'san_phams.hinh_anh'
            )
            ->get();
        $count = $items->sum('so_luong');
        return response()->json([
            'cart'  => $cart,
            'count' => $count,
            'items' => $items,
        ]);
    }

    public function themVaoGio(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['message' => 'Bạn chưa đăng nhập'], 401);
        }

        $request->validate([
            'id_san_pham' => 'required|exists:san_phams,id',
            'so_luong'    => 'required|integer|min:1',
        ]);

        // Lấy giỏ hàng tạm
        $cart = DonHang::firstOrCreate(
            [
                'id_khach_hang' => $user->id,
                'ma_don_hang'   => null
            ],
            [
                'tong_tien'      => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai'     => 'gio_hang'
            ]
        );

        // Kiểm tra sản phẩm đã tồn tại chưa
        $item = ChiTietDonHang::where('id_don_hang', $cart->id)
            ->where('id_san_pham', $request->id_san_pham)
            ->first();

        $gia = DB::table('san_phams')->where('id', $request->id_san_pham)->value('gia');

        if ($item) {
            $item->so_luong += $request->so_luong;
            $item->save();
        } else {
            ChiTietDonHang::create([
                'id_don_hang' => $cart->id,
                'id_san_pham' => $request->id_san_pham,
                'so_luong'    => $request->so_luong,
                'don_gia'     => $gia
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Đã thêm sản phẩm vào giỏ hàng thành công'
        ]);
    }

    public function xoaSanPham($id)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['message' => 'Bạn chưa đăng nhập'], 401);
        }

        // Lấy giỏ hàng tạm
        $order = DonHang::where('id_khach_hang', $user->id)
            ->whereNull('ma_don_hang')
            ->first();

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy giỏ hàng'], 404);
        }

        $item = ChiTietDonHang::where('id_don_hang', $order->id)
            ->where('id', $id)
            ->first();

        if (!$item) {
            return response()->json(['message' => 'Sản phẩm không tồn tại trong giỏ hàng'], 404);
        }

        // Xóa item (KHÔNG cộng lại kho vì chưa trừ)
        $item->delete();

        return response()->json([
            'status' => true,
            'message' => 'Đã xóa sản phẩm khỏi giỏ hàng'
        ]);
    }

    public function thanhToan(Request $request)
    {
        $user = auth('sanctum')->user();
        if (!$user) return response()->json(['status' => false, 'message' => 'Bạn chưa đăng nhập'], 401);

        try {
            DB::beginTransaction();
            $cart = DonHang::where('id_khach_hang', $user->id)->whereNull('ma_don_hang')->first();
            if (!$cart) return response()->json(['status' => false, 'message' => 'Giỏ hàng trống']);

            $items = ChiTietDonHang::where('id_don_hang', $cart->id)
                ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_don_hangs.id_san_pham')
                ->select('chi_tiet_don_hangs.*', 'san_phams.gia', 'san_phams.ten_san_pham', 'san_phams.so_luong as kho_con')
                ->get();

            if ($items->count() == 0) return response()->json(['status' => false, 'message' => 'Giỏ hàng trống']);

            $tongTienHang = 0;

            foreach ($items as $item) {
                if ($item->so_luong > $item->kho_con) {
                    DB::rollBack();
                    return response()->json(['status' => false, 'message' => 'Sản phẩm "' . $item->ten_san_pham . '" không đủ hàng!']);
                }
                $tongTienHang += $item->gia * $item->so_luong;
                ChiTietDonHang::where('id', $item->id)->update([
                    'don_gia' => $item->gia
                ]);

                SanPham::where('id', $item->id_san_pham)->decrement('so_luong', $item->so_luong);
            }

            $thue = $tongTienHang * 0.05;
            $tongThanhToan = $tongTienHang + $thue;
            $maDonHang = 'DH' . now()->format('ymdHis') . rand(100, 999);

            $loaiThanhToan = $request->loai_thanh_toan; // 1: Tiền mặt, 0: CK

            $updateData = [
                'ma_don_hang'    => $maDonHang,
                'tong_tien'      => $tongThanhToan,
                'ngay_dat'       => now(),
            ];

            if ($loaiThanhToan == 1) {
                $updateData['trang_thai']      = 'hoan_thanh';
                $updateData['is_thanh_toan']   = 1;
                $updateData['ngay_thanh_toan'] = now();
                $updateData['tien_thuc_nhan']  = $tongThanhToan;
                $updateData['phuong_thuc']     = 'Tien Mat';
            } else {
                $updateData['trang_thai']      = 'cho_thanh_toan';
                $updateData['is_thanh_toan']   = 0;
                $updateData['tien_thuc_nhan']  = 0;
                $updateData['phuong_thuc']     = 'Chuyen Khoan';
            }

            $cart->update($updateData);
            DB::commit();

            $linkQR = 'https://img.vietqr.io/image/MBBank-0795557437-compact.png?amount=' . ceil($tongThanhToan) . '&addInfo=' . urlencode($maDonHang);

            return response()->json([
                'status' => true,
                'message' => 'Thanh toán thành công!',
                'don_hang' => $cart,
                'link_qr' => $linkQR
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }

    // --- THÊM HÀM HỦY ĐƠN ---
    public function huyDon()
    {
        $user = Auth::guard('sanctum')->user();
        try {
            // Tìm giỏ hàng tạm
            $cart = DonHang::where('id_khach_hang', $user->id)->whereNull('ma_don_hang')->first();

            if ($cart) {
                // Xóa chi tiết
                ChiTietDonHang::where('id_don_hang', $cart->id)->delete();
                // Xóa luôn đơn tạm (hoặc reset về 0 tùy logic, ở đây xóa luôn cho sạch để tạo mới)
                $cart->delete();
            }

            return response()->json(['status' => true, 'message' => 'Đã hủy đơn hàng hiện tại']);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'message' => 'Lỗi hủy đơn']);
        }
    }

    public function convert($description)
    {
        if (preg_match('/DH\d+/', $description, $matches)) {
            return $matches[0];
        }
        return null;
    }

    // SỬA LẠI HÀM autoGD (Chỉ cập nhật trạng thái, KHÔNG trừ kho nữa)
    public function autoGD()
    {
        // ... (Phần gọi API ngân hàng giữ nguyên) ...
        // GIẢ LẬP DATA ĐỂ CODE CHẠY ĐƯỢC (Bạn thay bằng code thật gọi API MB)
        $list_giao_dich = [];

        foreach ($list_giao_dich as $item) {
            if (floatval($item['creditAmount']) <= 0) continue;

            $maDonHang = $this->convert($item['description']);
            $soTienNhan = floatval($item['creditAmount']);

            // Lưu log
            LogGiaoDich::firstOrCreate(
                ['refNo' => $item['refNo']],
                [
                    'creditAmount'    => $item['creditAmount'],
                    'description'     => $item['description'],
                    'transactionDate' => $item['transactionDate'],
                    'code'            => $maDonHang,
                ]
            );

            if (!$maDonHang) continue;

            $donHang = DonHang::where('ma_don_hang', $maDonHang)
                ->where('is_thanh_toan', 0)
                ->first();

            if ($donHang) {
                // Cập nhật thanh toán
                $donHang->tien_thuc_nhan = $soTienNhan;
                $donHang->is_thanh_toan = 1;
                $donHang->trang_thai = 'hoan_thanh';
                $donHang->ngay_thanh_toan = now();
                $donHang->phuong_thuc = 'Chuyen Khoan';
                $donHang->save();

                // Trừ kho theo chi tiết đơn hàng
                $items = ChiTietDonHang::where('id_don_hang', $donHang->id)->get();

                foreach ($items as $sp) {
                    SanPham::where('id', $sp->id_san_pham)
                        ->decrement('so_luong', $sp->so_luong);
                }
            }
        }
    }
    // Lấy danh sách đơn hàng
    public function getData()
    {
        $donHangs = DB::table('don_hangs as dh')
            ->join('khach_hangs as kh', 'dh.id_khach_hang', '=', 'kh.id')
            ->whereNotNull('dh.ma_don_hang')
            ->select(
                'dh.id',
                'kh.ho_va_ten as ten_khach_hang',
                'kh.email',
                'kh.so_dien_thoai',
                'dh.ma_don_hang',
                'dh.ngay_dat',
                'dh.tong_tien',
                'dh.trang_thai'
            )
            ->orderBy('dh.id', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $donHangs
        ]);
    }
    public function chiTietDonHang($id)
    {
        $donHang = DB::table('don_hangs as dh')
            ->join('khach_hangs as kh', 'dh.id_khach_hang', '=', 'kh.id')
            ->where('dh.id', $id)
            ->select(
                'dh.id',
                'dh.ma_don_hang',
                'dh.ngay_dat',
                'dh.tong_tien',
                'dh.trang_thai',
                'kh.ho_va_ten as ten_khach_hang',
                'kh.email',
                'kh.so_dien_thoai'
            )
            ->first();

        if (!$donHang) {
            return response()->json(['status' => false], 404);
        }

        $chiTiet = DB::table('chi_tiet_don_hangs as ct')
            ->join('san_phams as sp', 'ct.id_san_pham', '=', 'sp.id')
            ->where('ct.id_don_hang', $id)
            ->select(
                'sp.ten_san_pham',
                'sp.hinh_anh',
                'ct.so_luong',
                'ct.don_gia',
                DB::raw('(ct.so_luong * ct.don_gia) as thanh_tien')
            )
            ->get();

        return response()->json([
            'status' => true,
            'don_hang' => $donHang,
            'chi_tiet' => $chiTiet
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $donHang = DonHang::find($id);

        if($donHang) {
            // Hoàn kho nếu đơn đã đặt
            if ($donHang->ma_don_hang != null) {
                $items = ChiTietDonHang::where('id_don_hang', $id)->get();
                foreach ($items as $item) {
                    SanPham::where('id', $item->id_san_pham)->increment('so_luong', $item->so_luong);
                }
            }

            ChiTietDonHang::where('id_don_hang', $id)->delete();
            $donHang->delete();
        }

        return response()->json([
            'status' => true,
            'message' => 'Xóa đơn hàng và hoàn kho thành công'
        ]);
    }
    public function doiTrangThai(Request $request)
    {
        try {
            $donHang = DonHang::find($request->id);
            if (!$donHang) return response()->json(['status' => false, 'message' => 'Đơn hàng không tồn tại!']);

            if ($donHang->trang_thai == 'hoan_thanh') {
                $donHang->trang_thai = 'cho_thanh_toan';
                $donHang->is_thanh_toan = 0;
            } else {
                $donHang->trang_thai = 'hoan_thanh';
                $donHang->is_thanh_toan = 1; // Xác nhận đã thanh toán

                // Nếu tiền thực nhận chưa có thì điền bằng tổng tiền
                if($donHang->tien_thuc_nhan == 0) {
                    $donHang->tien_thuc_nhan = $donHang->tong_tien;
                }
                $donHang->ngay_thanh_toan = now();
            }
            $donHang->save();

            return response()->json([
                'status'  => true,
                'message' => 'Cập nhật trạng thái thành công!',
                'trang_thai_moi' => $donHang->trang_thai // Trả về để Vue cập nhật
            ]);

        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }

    public function timKiem(Request $request)
    {
        $tu_khoa = $request->noi_dung;

        // 1. Tạo Query cơ bản
        $query = DB::table('don_hangs as dh')
            ->join('khach_hangs as kh', 'dh.id_khach_hang', '=', 'kh.id')
            ->select(
                'dh.id',
                'dh.ma_don_hang',
                'dh.ngay_dat',
                'dh.tong_tien',
                'dh.trang_thai',
                'kh.ho_va_ten as ten_khach_hang',
                'kh.email',
                'kh.so_dien_thoai'
            );

        // 2. Logic tìm kiếm (Chỉ chạy khi có từ khóa)
        if (!empty($tu_khoa)) {
            $query->where(function ($q) use ($tu_khoa) {
                // Tên khách: Tìm chính xác từ (REGEXP)
                $q->whereRaw("kh.ho_va_ten REGEXP ?", ["[[:<:]]{$tu_khoa}[[:>:]]"])

                // Các mã số, email: Tìm gần đúng (LIKE) cho dễ tìm
                ->orWhere('dh.ma_don_hang', 'like', "%{$tu_khoa}%")
                ->orWhere('kh.email', 'like', "%{$tu_khoa}%")
                ->orWhere('kh.so_dien_thoai', 'like', "%{$tu_khoa}%");
            });
        }

        // 3. Lấy dữ liệu
        $donHangs = $query
            ->orderByDesc('dh.id')
            ->get();

        return response()->json([
            'status' => true,
            'data' => $donHangs,
            'message' => 'Tìm thấy ' . count($donHangs) . ' đơn hàng.'
        ]);
    }

    public function lichSuMua()
    {
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Chưa đăng nhập'
            ], 401);
        }

        $donHangs = DonHang::where('id_khach_hang', $user->id)
            ->whereNotNull('ma_don_hang')
            ->orderByDesc('ngay_dat')
            ->get([
                'id',
                'ma_don_hang',
                'ngay_dat',
                'tong_tien',
                'trang_thai'
            ]);

        return response()->json([
            'status' => true,
            'data' => $donHangs
        ]);
    }
}

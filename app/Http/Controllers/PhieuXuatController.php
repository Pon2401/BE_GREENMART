<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PhieuXuat;
use App\Models\ChiTietPhieuXuat;
use App\Models\SanPham;
use Carbon\Carbon;

class PhieuXuatController extends Controller
{
    // 1. Lấy dữ liệu hiển thị (Kết hợp bảng cha và con để FE dễ hiển thị)
    public function getData()
    {
        $data = DB::table('chi_tiet_phieu_xuats')
            ->join('phieu_xuats', 'chi_tiet_phieu_xuats.id_phieu_xuat', '=', 'phieu_xuats.id')
            ->join('san_phams', 'chi_tiet_phieu_xuats.id_san_pham', '=', 'san_phams.id')
            ->select(
                'phieu_xuats.id',
                DB::raw("CONCAT('PX-', phieu_xuats.id) as ma_phieu_xuat"), // Tạo mã PX-xxx
                'san_phams.ten_san_pham',
                'chi_tiet_phieu_xuats.so_luong as so_luong_xuat',
                'phieu_xuats.ngay_xuat',
                'phieu_xuats.ghi_chu',
                DB::raw('(chi_tiet_phieu_xuats.so_luong * chi_tiet_phieu_xuats.don_gia) as tong_tien_xuat')
            )
            ->orderBy('phieu_xuats.id', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $data
        ]);
    }

    // 2. Thêm phiếu xuất (QUAN TRỌNG: Có kiểm tra tồn kho)
    public function addPhieuXuat(Request $request)
    {
        try {
            DB::beginTransaction();

            // A. Kiểm tra sản phẩm và tồn kho
            $sanPham = SanPham::find($request->id_san_pham);
            
            if (!$sanPham) {
                return response()->json(['status' => false, 'message' => 'Sản phẩm không tồn tại!']);
            }

            // Nếu số lượng trong kho ít hơn số lượng muốn xuất -> Báo lỗi
            if ($sanPham->so_luong < $request->so_luong) {
                return response()->json([
                    'status' => false, 
                    'message' => 'Kho không đủ hàng! Hiện chỉ còn ' . $sanPham->so_luong . ' ' . $sanPham->don_vi
                ]);
            }

            // B. Tính thành tiền
            $tongTien = $request->so_luong * $request->don_gia;

            // C. Tạo Phiếu Xuất (Header)
            $phieuXuat = PhieuXuat::create([
                'tong_tien'       => $tongTien,
                'ngay_xuat'       => Carbon::now(), // Lấy giờ hiện tại
                'trang_thai'      => 'Hoàn thành',
                'ghi_chu'         => $request->ghi_chu ?? '',
            ]);

            // D. Tạo Chi Tiết (Detail)
            ChiTietPhieuXuat::create([
                'id_phieu_xuat' => $phieuXuat->id,
                'id_san_pham'   => $request->id_san_pham,
                'so_luong'      => $request->so_luong,
                'don_gia'       => $request->don_gia,
            ]);

            // E. Trừ kho (Logic quan trọng của xuất kho)
            $sanPham->decrement('so_luong', $request->so_luong);

            DB::commit();

            return response()->json([
                'status' => true, 
                'message' => 'Xuất kho thành công!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false, 
                'message' => 'Lỗi hệ thống: ' . $e->getMessage()
            ]);
        }
    }

    // 3. Xóa phiếu xuất (Hoàn lại số lượng vào kho)
    public function deletePhieuXuat(Request $request)
    {
        try {
            DB::beginTransaction();
            
            // Tìm chi tiết phiếu xuất để biết đã xuất cái gì, bao nhiêu
            $chiTiet = ChiTietPhieuXuat::where('id_phieu_xuat', $request->id)->first();
            
            if($chiTiet) {
                // Cộng lại số lượng vào kho (Hoàn tác)
                SanPham::where('id', $chiTiet->id_san_pham)
                       ->increment('so_luong', $chiTiet->so_luong);
                
                // Xóa chi tiết
                $chiTiet->delete();
            }

            // Xóa phiếu cha
            PhieuXuat::where('id', $request->id)->delete();

            DB::commit();

            return response()->json([
                'status' => true, 
                'message' => 'Xóa phiếu xuất thành công (Đã hoàn lại kho)!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false, 
                'message' => 'Có lỗi xảy ra!'
            ]);
        }
    }

    // 4. Tìm kiếm
    public function timKiem(Request $request)
    {
        $key = "%" . $request->noi_dung . "%";

        $data = DB::table('chi_tiet_phieu_xuats')
            ->join('phieu_xuats', 'chi_tiet_phieu_xuats.id_phieu_xuat', '=', 'phieu_xuats.id')
            ->join('san_phams', 'chi_tiet_phieu_xuats.id_san_pham', '=', 'san_phams.id')
            ->select(
                'phieu_xuats.id',
                DB::raw("CONCAT('PX-', phieu_xuats.id) as ma_phieu_xuat"),
                'san_phams.ten_san_pham',
                'chi_tiet_phieu_xuats.so_luong as so_luong_xuat',
                'phieu_xuats.ngay_xuat',
                'phieu_xuats.ghi_chu',
                DB::raw('(chi_tiet_phieu_xuats.so_luong * chi_tiet_phieu_xuats.don_gia) as tong_tien_xuat')
            )
            ->where('san_phams.ten_san_pham', 'like', $key)
            ->orWhere(DB::raw("CONCAT('PX-', phieu_xuats.id)"), 'like', $key)
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $data
        ]);
    }
    
    public function getSanPham()
    {
        $data = SanPham::select('id', 'ten_san_pham')->get();
        return response()->json([
            'status' => true,
            'data'   => $data
        ]);
    }
}
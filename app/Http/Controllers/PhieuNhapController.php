<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PhieuNhap;
use App\Models\ChiTietNhapKho;
use App\Models\SanPham;
use Carbon\Carbon;

class PhieuNhapController extends Controller
{
    // 1. Lấy dữ liệu hiển thị ra bảng (Khớp với key bên VueJS)
    public function getData()
    {
        $data = DB::table('chi_tiet_nhap_khos')
            ->join('phieu_nhaps', 'chi_tiet_nhap_khos.id_nhap_kho', '=', 'phieu_nhaps.id')
            ->join('san_phams', 'chi_tiet_nhap_khos.id_san_pham', '=', 'san_phams.id')
            ->select(
                'phieu_nhaps.id', // ID để xóa
                DB::raw("CONCAT('PN-', phieu_nhaps.id) as ma_phieu_nhap"), // Tạo mã PN-123
                'san_phams.ten_san_pham',
                'chi_tiet_nhap_khos.so_luong as so_luong_nhap', // Vue: item.so_luong_nhap
                'phieu_nhaps.ngay_nhap',
                // Tính tổng tiền = số lượng * đơn giá
                DB::raw('(chi_tiet_nhap_khos.so_luong * chi_tiet_nhap_khos.don_gia) as tong_tien_nhap')
            )
            ->orderBy('phieu_nhaps.id', 'desc')
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $data
        ]);
    }

    // 2. Lấy danh sách sản phẩm để đổ vào Select Box (Dropdown)
    public function getSanPham()
    {
        $data = SanPham::select('id', 'ten_san_pham')->get();
        return response()->json([
            'status' => true,
            'data'   => $data
        ]);
    }

    // 3. Thêm phiếu nhập (Xử lý từ Modal VueJS)
    public function addPhieuNhap(Request $request)
    {
        try {
            DB::beginTransaction();

            // Vue gửi lên: id_san_pham, so_luong, gia_nhap, ghi_chu
            $tongTien = $request->so_luong * $request->gia_nhap;

            // B1: Tạo Phiếu Nhập (Header)
            // Vì UI nhập từng dòng lẻ, nên mỗi lần nhập coi như 1 phiếu mới
            $phieuNhap = PhieuNhap::create([
                'id_nha_cung_cap' => 1, // Mặc định NCC số 1 (vì UI không có chỗ chọn NCC)
                'tien_thuc_nhap'  => $tongTien,
                'tong_tien'       => $tongTien,
                'ngay_nhap'       => Carbon::now(),
                'trang_thai'      => 'Hoàn thành',
            ]);

            // B2: Tạo Chi Tiết
            ChiTietNhapKho::create([
                'id_nhap_kho' => $phieuNhap->id,
                'id_san_pham' => $request->id_san_pham,
                'so_luong'    => $request->so_luong,
                'don_gia'     => $request->gia_nhap,
            ]);

            // B3: Cộng kho
            $sp = SanPham::find($request->id_san_pham);
            if($sp) $sp->increment('so_luong', $request->so_luong);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Nhập kho thành công!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Lỗi: ' . $e->getMessage()
            ]);
        }
    }

    // 4. Xóa phiếu nhập
    public function deletePhieuNhap(Request $request)
    {
        try {
            // Xóa chi tiết trước (nếu chưa set cascade)
            ChiTietNhapKho::where('id_nhap_kho', $request->id)->delete();
            // Xóa phiếu cha
            PhieuNhap::where('id', $request->id)->delete();

            return response()->json([
                'status' => true,
                'message' => 'Xóa phiếu nhập thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Có lỗi xảy ra!'
            ]);
        }
    }

    // 5. Tìm kiếm
    public function timKiem(Request $request)
    {
        $key = "%" . $request->noi_dung . "%";

        $data = DB::table('chi_tiet_nhap_khos')
            ->join('phieu_nhaps', 'chi_tiet_nhap_khos.id_nhap_kho', '=', 'phieu_nhaps.id')
            ->join('san_phams', 'chi_tiet_nhap_khos.id_san_pham', '=', 'san_phams.id')
            ->select(
                'phieu_nhaps.id',
                DB::raw("CONCAT('PN-', phieu_nhaps.id) as ma_phieu_nhap"),
                'san_phams.ten_san_pham',
                'chi_tiet_nhap_khos.so_luong as so_luong_nhap',
                'phieu_nhaps.ngay_nhap',
                DB::raw('(chi_tiet_nhap_khos.so_luong * chi_tiet_nhap_khos.don_gia) as tong_tien_nhap')
            )
            ->where('san_phams.ten_san_pham', 'like', $key)
            ->orWhere(DB::raw("CONCAT('PN-', phieu_nhaps.id)"), 'like', $key)
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $data
        ]);
    }
}
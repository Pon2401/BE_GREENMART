<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ChiTietDonHangController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\PhieuNhapController;
use App\Http\Controllers\PhieuXuatController;
use Termwind\Components\Raw;

// ======================== CLIENT ========================
Route::post('/client/dang-nhap', [KhachHangController::class, 'dangNhap']);
Route::post('/client/dang-xuat', [KhachHangController::class, 'dangXuat']);
Route::post('/client/dang-ky', [KhachHangController::class, 'dangKy']);
Route::post('/client/kich-hoat', [KhachHangController::class, 'kichHoat']);
Route::get('/client/check-client', [KhachHangController::class, 'checkClient']);
Route::get('/client/thong-tin', [KhachHangController::class, 'thongTinNguoiDung']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/client/profile/data', [KhachHangController::class, 'getProfile']);
    Route::post('/client/profile/update', [KhachHangController::class, 'updateProfile']);
});
// ======================== ĐÁNH GIÁ SẢN PHẨM ========================
Route::post('/khach-hang/danh-gia/data', [DanhGiaController::class, 'getData']);
Route::post('/khach-hang/danh-gia/create', [DanhGiaController::class, 'create'])->middleware('auth:sanctum');

// ======================== SẢN PHẨM ========================
Route::get('/san-pham/get-data', [SanPhamController::class, 'getData']);
Route::get('/chi-tiet-san-pham/{id}', [SanPhamController::class, 'chiTietSanPham']);
Route::post('/admin/quan-ly-san-pham/update', [SanPhamController::class, 'update']);
Route::post('/admin/quan-ly-san-pham/delete', [SanPhamController::class, 'destroy']);
Route::post('/admin/quan-ly-san-pham/add-data', [SanPhamController::class, 'addData']);
Route::post('/quan-ly-san-pham/search', [SanPhamController::class, 'search']);

// ======================== ĐƠN HÀNG ========================
Route::get('/don-hang/get-data', [DonHangController::class, 'getDataDH']);
Route::post('/gio-hang/tao-don-hang', [DonHangController::class, 'thanhToan']);
Route::delete('/gio-hang/xoa-san-pham/{id}', [DonHangController::class, 'xoaSanPham']);
Route::post('/gio-hang/add', [DonHangController::class, 'themVaoGio']);
Route::get('/don-hang', [ChiTietDonHangController::class, 'getData']);
Route::get('/auto', [DonHangController::class, 'autoGD']);
Route::post('/gio-hang/huy-don', [DonHangController::class, 'huyDon']);

// ============== LịCH SỬ MUA =======================
Route::middleware('auth:sanctum')->get(
    '/client/lich-su-mua',
    [DonHangController::class, 'lichSuMua']
);


// ========================== QUẢN LÝ ĐƠN HÀNG ========================
Route::get('/admin/quan-ly-don-hang/get-data', [DonHangController::class, 'getData']);
Route::get('/admin/quan-ly-don-hang/{id}', [DonHangController::class, 'chiTietDonHang']);
Route::post('/admin/quan-ly-don-hang/doi-trang-thai', [DonHangController::class, 'doiTrangThai']);
Route::delete('/admin/quan-ly-don-hang/{id}', [DonHangController::class, 'destroy']);
Route::post('/admin/quan-ly-don-hang/search',[DonHangController::class, 'timKiem']);


// ========================== QUẢN LÝ PHIẾU NHẬP ========================
Route::get('/admin/kho/nhap/get-data', [PhieuNhapController::class, 'getData']);
Route::get('phieu-nhap/{id}', [PhieuNhapController::class, 'chiTietPhieuNhap']);
Route::post('/admin/kho/nhap/add-phieu-nhap', [PhieuNhapController::class, 'addData']);
Route::post('phieu-nhap/update', [PhieuNhapController::class, 'update']);
Route::post('/admin/kho/nhap/delete-phieu-nhap', [PhieuNhapController::class, 'destroy']);
Route::post('/admin/kho/nhap/tim-kiem', [PhieuNhapController::class, 'timKiem']);



// ======================== DANH MỤC ========================
Route::get('/danh-muc/get-data', [DanhMucController::class, 'getData']);
Route::post('/admin/danh-muc/add-data', [DanhMucController::class, 'addData']);
Route::post('/admin/danh-muc/update', [DanhMucController::class, 'upDate']);
Route::post('/admin/danh-muc/tim-kiem', [DanhMucController::class, 'timKiem']);


// ======================== ADMIN LOGIN ========================
Route::post('/admin/dang-nhap', [NhanVienController::class, 'dangNhap']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/check-token', [NhanVienController::class, 'checkAdmin']);
    Route::get('/admin/check-quyen/{slug}', [NhanVienController::class, 'checkQuyen']);
});


// ======================== QUẢN LÝ KHÁCH HÀNG (ADMIN ONLY) ========================
Route::middleware(['auth:sanctum', 'kiem_tra_quyen:quan_ly_khach_hang'])
    ->group(function () {
        Route::get('/admin/khach-hang/get-data', [KhachHangController::class, 'getData']);
        Route::post('/admin/khach-hang/add-data', [KhachHangController::class, 'addData']);
        Route::post('/admin/khach-hang/update', [KhachHangController::class, 'upDate']);
        Route::post('/admin/khach-hang/tim-kiem', [KhachHangController::class, 'timKiem']);
    });

// ======================== QUẢN LÝ NHÂN VIÊN (ADMIN ONLY) ========================
Route::middleware(['auth:sanctum', 'kiem_tra_quyen:quan_ly_nhan_vien'])
    ->group(function () {
        Route::get('/admin/nhan-vien', [NhanVienController::class, 'getData']);
        Route::post('/admin/nhan-vien/add-data', [NhanVienController::class, 'themNhanVien']);
        Route::post('/admin/nhan-vien/update', [NhanVienController::class, 'update']);
        Route::delete('/admin/nhan-vien/delete', [NhanVienController::class, 'destroy']);
        Route::post('/admin/nhan-vien/search', [NhanVienController::class, 'search']);
        Route::post('/admin/nhan-vien/doi-trang-thai', [NhanVienController::class, 'doiTrangThai']);
    });
//=============================== Thống kê ===============================
Route::post('/admin/thong-ke-khach-hang', [ThongKeController::class, 'thongKeKHDangKy']);
Route::post('/admin/thong-ke-don-hang', [ThongKeController::class, 'thongKeDonHang']);
Route::post('/admin/thong-ke-san-pham', [ThongKeController::class, 'thongKeSanPham']);

Route::prefix('admin/kho/xuat')->group(function () {
    Route::get('get-data', [PhieuXuatController::class, 'getData']);
    Route::get('get-san-pham', [PhieuXuatController::class, 'getSanPham']);
    Route::post('add-phieu-xuat', [PhieuXuatController::class, 'addPhieuXuat']);
    Route::post('delete-phieu-xuat', [PhieuXuatController::class, 'deletePhieuXuat']);
    Route::post('tim-kiem', [PhieuXuatController::class, 'timKiem']);
});

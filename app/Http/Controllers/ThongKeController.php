<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThongKeController extends Controller
{
    public function thongKeKHDangKy(Request $request)
    {
        // ✅ FIX: nếu không truyền ngày → mặc định 1 tháng gần nhất
        $begin = $request->begin
            ? Carbon::parse($request->begin)
            : Carbon::now()->subMonth()->startOfDay();

        $end = $request->end
            ? Carbon::parse($request->end)
            : Carbon::now()->endOfDay();

        $data = KhachHang::whereDate('created_at', '>=', $begin)
            ->whereDate('created_at', '<=', $end)
            ->select(
                DB::raw('DATE(created_at) as ngay_dang_ky'),
                DB::raw('COUNT(id) as so_khach_hang_moi')
            )
            ->groupBy('ngay_dang_ky')
            ->orderBy('ngay_dang_ky')
            ->get();

        $colors = [];
        foreach ($data as $item) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF));
        }

        return response()->json([
            'status' => true,
            'data'   => $data,   // ✅ bảng dùng cái này
            'labels' => $data->pluck('ngay_dang_ky'),
            'datasets' => [[
                'label' => 'Khách Hàng Đăng Ký',
                'data' => $data->pluck('so_khach_hang_moi'),
                'backgroundColor' => $colors,
            ]]
        ]);
    }
    // Thống kê đơn hàng theo tháng
    public function thongKeDonHang(Request $request)
    {
        $begin = $request->begin
            ? Carbon::parse($request->begin)->startOfDay()
            : Carbon::now()->subMonth()->startOfDay();

        $end = $request->end
            ? Carbon::parse($request->end)->endOfDay()
            : Carbon::now()->endOfDay();

        $data = DB::table('don_hangs')
            ->select(
                DB::raw("DATE_FORMAT(ngay_dat, '%Y-%m') as thang"),
                DB::raw("COUNT(id) as tong_don_thanh_toan"),
                DB::raw("SUM(tong_tien) as tong_doanh_thu")
            )
            ->where('is_thanh_toan', 1)
            ->whereBetween('ngay_dat', [$begin, $end])
            ->groupBy('thang')
            ->orderBy('thang')
            ->get();

        $colors = [];
        foreach ($data as $item) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF));
        }

        return response()->json([
            'status' => true,
            'data' => $data,
            'labels' => $data->pluck('thang'),
            'datasets' => [[
                'label' => 'Đơn hàng đã thanh toán',
                'data' => $data->pluck('tong_don_thanh_toan'),
                'backgroundColor' => $colors,
            ]]
        ]);
    }

    public function thongKeSanPham(Request $request)
    {
        $begin = $request->begin
            ? Carbon::parse($request->begin)->startOfDay()
            : Carbon::now()->subMonth()->startOfDay();

        $end = $request->end
            ? Carbon::parse($request->end)->endOfDay()
            : Carbon::now()->endOfDay();

        $data = DB::table('chi_tiet_don_hangs as ct')
            ->join('don_hangs as dh', 'ct.id_don_hang', '=', 'dh.id')
            ->join('san_phams as sp', 'ct.id_san_pham', '=', 'sp.id')
            ->where('dh.is_thanh_toan', 1)
            ->whereBetween('dh.ngay_dat', [$begin, $end])
            ->select(
                DB::raw("DATE(dh.ngay_dat) as ngay"), // ✅ NGÀY
                'sp.ten_san_pham',
                DB::raw("SUM(ct.so_luong) as tong_so_luong"),
                DB::raw("SUM(ct.so_luong * ct.don_gia) as tong_doanh_thu")
            )
            ->groupBy('ngay', 'sp.ten_san_pham')     // ✅ group theo ngày
            ->orderBy('ngay')                        // ✅ sắp xếp theo ngày
            ->orderByDesc('tong_so_luong')
            ->get();

        $labels = $data->pluck('ten_san_pham')->unique()->values();

        $colors = [];
        foreach ($labels as $label) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF));
        }

        $datasets = [];
        foreach ($data->groupBy('thang') as $thang => $group) {
            $datasets[] = [
                'label' => "Tháng $thang",
                'data' => $labels->map(
                    fn($sp) => $group->firstWhere('ten_san_pham', $sp)->tong_so_luong ?? 0
                ),
                'backgroundColor' => $colors
            ];
        }

        return response()->json([
            'status' => true,
            'data' => $data,
            'labels' => $labels,
            'datasets' => $datasets
        ]);
    }
}

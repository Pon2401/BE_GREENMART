<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhieuNhapSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('phieu_nhaps')->truncate();
        DB::table('chi_tiet_nhap_khos')->truncate();

        // 1. TẠO NHÀ CUNG CẤP CỐ ĐỊNH
        $nhaCungCaps = [
            ['id' => 1, 'ten_nha_cung_cap' => 'Công ty Thực Phẩm Sạch CP', 'dia_chi' => 'Hà Nội', 'so_dien_thoai' => '0901234567', 'email' => 'cp@gmail.com'],
            ['id' => 2, 'ten_nha_cung_cap' => 'Hải Sản Biển Đông', 'dia_chi' => 'Đà Nẵng', 'so_dien_thoai' => '0909888777', 'email' => 'biendong@gmail.com'],
            ['id' => 3, 'ten_nha_cung_cap' => 'Nông Sản Đà Lạt Hasfarm', 'dia_chi' => 'Lâm Đồng', 'so_dien_thoai' => '0905555666', 'email' => 'dalat@gmail.com'],
        ];
        foreach ($nhaCungCaps as $ncc) {
            DB::table('nha_cung_caps')->insertOrIgnore($ncc);
        }

        // 2. DANH SÁCH PHIẾU NHẬP
        $danhSachPhieuNhap = [
            [
                'id_nha_cung_cap' => 1,
                'ngay_nhap'       => '2025-12-01 08:30:00',
                'trang_thai'      => 'Hoàn thành',
                'san_pham_nhap'   => [
                    ['id_san_pham' => 1, 'so_luong' => 50, 'don_gia' => 80000],
                    ['id_san_pham' => 2, 'so_luong' => 30, 'don_gia' => 280000],
                ]
            ],
            [
                'id_nha_cung_cap' => 2,
                'ngay_nhap'       => '2025-12-05 10:15:00',
                'trang_thai'      => 'Hoàn thành',
                'san_pham_nhap'   => [
                    ['id_san_pham' => 7, 'so_luong' => 20, 'don_gia' => 180000],
                    ['id_san_pham' => 8, 'so_luong' => 40, 'don_gia' => 150000],
                    ['id_san_pham' => 9, 'so_luong' => 25, 'don_gia' => 170000],
                ]
            ],
            [
                'id_nha_cung_cap' => 3,
                'ngay_nhap'       => '2025-12-08 06:00:00',
                'trang_thai'      => 'Hoàn thành',
                'san_pham_nhap'   => [
                    ['id_san_pham' => 13, 'so_luong' => 100, 'don_gia' => 10000],
                    ['id_san_pham' => 21, 'so_luong' => 60,  'don_gia' => 18000],
                    ['id_san_pham' => 22, 'so_luong' => 80,  'don_gia' => 22000],
                ]
            ],
             [
                'id_nha_cung_cap' => 1,
                'ngay_nhap'       => '2025-12-09 14:00:00',
                'trang_thai'      => 'Hoàn thành',
                'san_pham_nhap'   => [
                    ['id_san_pham' => 41, 'so_luong' => 100, 'don_gia' => 18000],
                    ['id_san_pham' => 42, 'so_luong' => 100, 'don_gia' => 16000],
                ]
            ],
        ];

        // 3. VÒNG LẶP XỬ LÝ
        foreach ($danhSachPhieuNhap as $phieu) {
            $tongTienPhieu = 0;
            foreach ($phieu['san_pham_nhap'] as $sp) {
                $tongTienPhieu += $sp['so_luong'] * $sp['don_gia'];
            }

            // Tạo phiếu nhập
            $idPhieuNhap = DB::table('phieu_nhaps')->insertGetId([
                'id_nha_cung_cap' => $phieu['id_nha_cung_cap'],
                'tien_thuc_nhap'  => $tongTienPhieu,
                'ngay_nhap'       => $phieu['ngay_nhap'],
                'tong_tien'       => $tongTienPhieu,
                'trang_thai'      => $phieu['trang_thai'],
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);

            // Tạo chi tiết
            foreach ($phieu['san_pham_nhap'] as $sp) {
                DB::table('chi_tiet_nhap_khos')->insert([
                    // SỬA TÊN CỘT Ở ĐÂY (Bỏ chữ 's' đi hoặc kiểm tra migration của bạn)
                    'id_nhap_kho'    => $idPhieuNhap, 
                    'id_san_pham'    => $sp['id_san_pham'],
                    
                    'so_luong'       => $sp['so_luong'],
                    'don_gia'        => $sp['don_gia'],
                    'ngay_san_xuat'  => '2025-11-01',
                    'ngay_su_dung'   => '2026-05-01',
                ]);
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
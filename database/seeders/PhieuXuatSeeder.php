<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhieuXuatSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('phieu_xuats')->truncate();
        DB::table('chi_tiet_phieu_xuats')->truncate();

        // Danh sách phiếu xuất mẫu
        $danhSachXuat = [
            [
                'ngay_xuat' => '2025-12-10 09:00:00', 
                'ghi_chu' => 'Xuất bán lẻ',
                'items' => [
                    ['id_san_pham' => 1, 'so_luong' => 5, 'don_gia' => 120000], // Ví dụ SP ID 1
                ]
            ],
            [
                'ngay_xuat' => '2025-12-11 14:30:00', 
                'ghi_chu' => 'Xuất hủy hàng hỏng',
                'items' => [
                    ['id_san_pham' => 2, 'so_luong' => 2, 'don_gia' => 300000], // Ví dụ SP ID 2
                ]
            ],
        ];

        foreach ($danhSachXuat as $px) {
            $tongTien = 0;
            foreach ($px['items'] as $item) {
                $tongTien += $item['so_luong'] * $item['don_gia'];
            }

            // Tạo phiếu xuất
            $idPhieuXuat = DB::table('phieu_xuats')->insertGetId([
                'ngay_xuat'  => $px['ngay_xuat'],
                'tong_tien'  => $tongTien,
                'trang_thai' => 'Hoàn thành',
                'ghi_chu'    => $px['ghi_chu'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Tạo chi tiết
            foreach ($px['items'] as $item) {
                DB::table('chi_tiet_phieu_xuats')->insert([
                    'id_phieu_xuat' => $idPhieuXuat,
                    'id_san_pham'   => $item['id_san_pham'],
                    'so_luong'      => $item['so_luong'],
                    'don_gia'       => $item['don_gia'],
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }
        }
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
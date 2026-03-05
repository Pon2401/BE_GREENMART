<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietDonHangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chi_tiet_don_hangs')->truncate();

        $donHangs = DB::table('don_hangs')->get();
        $sanPhams = DB::table('san_phams')->get();

        foreach ($donHangs as $donHang) {

            $soSanPhamTrongDon = rand(1, 5);
            $chonSanPhams = $sanPhams->random($soSanPhamTrongDon);

            $tongTien = 0;

            foreach ($chonSanPhams as $sp) {

                $soLuong = rand(1, 3);
                $thanhTien = $sp->gia * $soLuong;

                DB::table('chi_tiet_don_hangs')->insert([
                    'id_don_hang' => $donHang->id,
                    'id_san_pham' => $sp->id,
                    'so_luong'    => $soLuong,
                    'don_gia'     => $sp->gia,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);

                $tongTien += $thanhTien;
            }

            // 🔥 CẬP NHẬT NGƯỢC LẠI ĐƠN HÀNG
            DB::table('don_hangs')
                ->where('id', $donHang->id)
                ->update([
                    'tong_tien'      => $tongTien,
                    'tien_thuc_nhan' => $donHang->is_thanh_toan ? $tongTien : 0,
                    'updated_at'     => now()
                ]);
        }
    }
}

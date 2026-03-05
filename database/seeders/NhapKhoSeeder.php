<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NhapKhoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nhap_khos')->truncate();

        $nhaCungCaps = DB::table('nha_cung_caps')->pluck('id')->toArray();

        $listNhapKho = [];
        $now = Carbon::now();

        // Tạo 12 phiếu nhập kho (mỗi NCC vài phiếu)
        for ($i = 1; $i <= 12; $i++) {

            $idNCC = $nhaCungCaps[array_rand($nhaCungCaps)];

            $ngay = Carbon::parse('2025-01-01')->addDays(rand(0, 60));

            $listNhapKho[] = [
                'id_nha_cung_caps' => $idNCC,
                'tien_thuc_nhan'   => 0,
                'tong_tien'        => 0,
                'ngay_nhap'        => $ngay,
                'trang_thai'       => 'đã nhập',
                'created_at'       => $now,
                'updated_at'       => $now,
            ];
        }

        DB::table('nhap_khos')->insert($listNhapKho);
    }
}

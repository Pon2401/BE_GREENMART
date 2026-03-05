<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NhaCungCapSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nha_cung_caps')->truncate();
        $nhaCungCaps = [
            [
                'ten_nha_cung_cap' => 'Công ty TNHH Thực phẩm An Toàn',
                'email' => 'antoanfoods@gmail.com',
                'so_dien_thoai' => '0905123456',
                'dia_chi' => '45 Nguyễn Văn Linh, Hải Châu, Đà Nẵng',
            ],
            [
                'ten_nha_cung_cap' => 'Công ty TNHH Nông sản Sạch Miền Trung',
                'email' => 'nongsanmt@gmail.com',
                'so_dien_thoai' => '0905456789',
                'dia_chi' => '12 Trần Cao Vân, Thanh Khê, Đà Nẵng',
            ],
            [
                'ten_nha_cung_cap' => 'Công ty CP Chế biến Thực phẩm Việt',
                'email' => 'thucphamviet@gmail.com',
                'so_dien_thoai' => '0912123456',
                'dia_chi' => '88 Lê Duẩn, Hải Châu, Đà Nẵng',
            ],
            [
                'ten_nha_cung_cap' => 'Công ty TNHH Nước Giải Khát GreenFarm',
                'email' => 'greenfarm@gmail.com',
                'so_dien_thoai' => '0935123456',
                'dia_chi' => '100 Nguyễn Hữu Thọ, Hải Châu, Đà Nẵng',
            ],
        ];
        DB::table('nha_cung_caps')->insert($nhaCungCaps);
    }
}

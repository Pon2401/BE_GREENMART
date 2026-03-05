<?php

namespace Database\Seeders;

use App\Http\Controllers\ChiTietDonHangController;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

    public function run(): void
    {
          DB::statement('SET FOREIGN_KEY_CHECKS=0;');
          $this->call([
            DanhMucSeeder::class,
            SanPhamSeeder::class,
            KhachHangSeeder::class,
            NhaCungCapSeeder::class,
            NhapKhoSeeder::class,
            ChiTietNhapKhoSeeder::class,
            ChucVuSeeder::class,
            NhanVienSeeder::class,
            DonHangSeeder::class,
            PhieuNhapSeeder::class,
            PhieuXuatSeeder::class,
            ChiTietDonHangSeeder::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

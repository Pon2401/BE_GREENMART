<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('don_hangs')->truncate();

        $donHangs = [
            // ==== ĐƠN HÀNG THÁNG 9 ====
            [
                'id_khach_hang' => 1,
                'ngay_dat' => '2025-09-01 10:30:00',
                'tong_tien' => 350000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 2,
                'ngay_dat' => '2025-09-05 14:20:00',
                'tong_tien' => 1200000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1200000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-09-05 14:20:00'
            ],
            [
                'id_khach_hang' => 3,
                'ngay_dat' => '2025-09-03 09:15:00',
                'tong_tien' => 780000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 4,
                'ngay_dat' => '2025-09-06 16:40:00',
                'tong_tien' => 950000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 950000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Tien Mat',
                'ngay_thanh_toan' => '2025-09-06 16:40:00'
            ],
            [
                'id_khach_hang' => 5,
                'ngay_dat' => '2025-09-08 11:25:00',
                'tong_tien' => 430000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 6,
                'ngay_dat' => '2025-09-09 18:05:00',
                'tong_tien' => 1500000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1500000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-09-09 18:05:00'
            ],
            [
                'id_khach_hang' => 7,
                'ngay_dat' => '2025-09-12 08:50:00',
                'tong_tien' => 670000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 8,
                'ngay_dat' => '2025-09-13 15:30:00',
                'tong_tien' => 2100000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 2100000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-09-13 15:30:00'
            ],
            [
                'id_khach_hang' => 9,
                'ngay_dat' => '2025-09-14 13:00:00',
                'tong_tien' => 890000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 10,
                'ngay_dat' => '2025-09-15 19:20:00',
                'tong_tien' => 1200000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1200000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Tien Mat',
                'ngay_thanh_toan' => '2025-09-15 19:20:00'
            ],
            [
                'id_khach_hang' => 11,
                'ngay_dat' => '2025-09-18 09:45:00',
                'tong_tien' => 560000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 12,
                'ngay_dat' => '2025-09-20 17:10:00',
                'tong_tien' => 1340000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1340000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-09-20 17:10:00'
            ],
            [
                'id_khach_hang' => 13,
                'ngay_dat' => '2025-09-22 20:00:00',
                'tong_tien' => 990000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 14,
                'ngay_dat' => '2025-09-25 12:35:00',
                'tong_tien' => 1850000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1850000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-09-25 12:35:00'
            ],
            [
                'id_khach_hang' => 15,
                'ngay_dat' => '2025-09-28 15:55:00',
                'tong_tien' => 730000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 16,
                'ngay_dat' => '2025-09-30 18:10:00',
                'tong_tien' => 1100000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1100000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-09-30 18:10:00'
            ],

            // ==== ĐƠN HÀNG THÁNG 10 ====
            [
                'id_khach_hang' => 17,
                'ngay_dat' => '2025-10-01 11:15:00',
                'tong_tien' => 2200000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 2200000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-10-01 11:15:00'
            ],
            [
                'id_khach_hang' => 18,
                'ngay_dat' => '2025-10-03 16:25:00',
                'tong_tien' => 650000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 19,
                'ngay_dat' => '2025-10-05 09:40:00',
                'tong_tien' => 1080000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1080000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Tien Mat',
                'ngay_thanh_toan' => '2025-10-05 09:40:00'
            ],
            [
                'id_khach_hang' => 20,
                'ngay_dat' => '2025-10-07 14:50:00',
                'tong_tien' => 480000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 21,
                'ngay_dat' => '2025-10-10 19:35:00',
                'tong_tien' => 1750000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1750000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-10-10 19:35:00'
            ],
            [
                'id_khach_hang' => 22,
                'ngay_dat' => '2025-10-12 08:20:00',
                'tong_tien' => 900000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 23,
                'ngay_dat' => '2025-10-15 13:10:00',
                'tong_tien' => 1430000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1430000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-10-15 13:10:00'
            ],
            [
                'id_khach_hang' => 24,
                'ngay_dat' => '2025-10-18 17:45:00',
                'tong_tien' => 510000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 25,
                'ngay_dat' => '2025-10-20 12:20:00',
                'tong_tien' => 890000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 26,
                'ngay_dat' => '2025-10-22 10:30:00',
                'tong_tien' => 1980000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1980000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-10-22 10:30:00'
            ],
            [
                'id_khach_hang' => 27,
                'ngay_dat' => '2025-10-23 15:15:00',
                'tong_tien' => 820000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 28,
                'ngay_dat' => '2025-10-25 18:50:00',
                'tong_tien' => 1600000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1600000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-10-25 18:50:00'
            ],
            [
                'id_khach_hang' => 29,
                'ngay_dat' => '2025-10-27 12:05:00',
                'tong_tien' => 700000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 30,
                'ngay_dat' => '2025-10-29 20:20:00',
                'tong_tien' => 2300000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 2300000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-10-29 20:20:00'
            ],
            [
                'id_khach_hang' => 31,
                'ngay_dat' => '2025-10-30 09:40:00',
                'tong_tien' => 1200000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1200000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Tien Mat',
                'ngay_thanh_toan' => '2025-10-30 09:40:00'
            ],
            [
                'id_khach_hang' => 32,
                'ngay_dat' => '2025-10-31 22:10:00',
                'tong_tien' => 600000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            // ==== ĐƠN HÀNG THÁNG 11 ====
            [
                'id_khach_hang' => 33,
                'ngay_dat' => '2025-11-02 10:15:00',
                'tong_tien' => 1450000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1450000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-11-02 10:15:00'
            ],
            [
                'id_khach_hang' => 34,
                'ngay_dat' => '2025-11-05 14:30:00',
                'tong_tien' => 780000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 35,
                'ngay_dat' => '2025-11-10 19:00:00',
                'tong_tien' => 2150000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 2150000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Tien Mat',
                'ngay_thanh_toan' => '2025-11-10 19:00:00'
            ],
            [
                'id_khach_hang' => 36,
                'ngay_dat' => '2025-11-15 09:45:00',
                'tong_tien' => 630000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 37,
                'ngay_dat' => '2025-11-20 16:20:00',
                'tong_tien' => 1820000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1820000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-11-20 16:20:00'
            ],
            // ==== ĐƠN HÀNG THÁNG 12 ====
            [
                'id_khach_hang' => 38,
                'ngay_dat' => '2025-12-01 11:00:00',
                'tong_tien' => 2500000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 2500000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-12-01 11:00:00'
            ],
            [
                'id_khach_hang' => 39,
                'ngay_dat' => '2025-12-05 15:45:00',
                'tong_tien' => 920000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 40,
                'ngay_dat' => '2025-12-10 18:30:00',
                'tong_tien' => 1750000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1750000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Tien Mat',
                'ngay_thanh_toan' => '2025-12-10 18:30:00'
            ],
            [
                'id_khach_hang' => 41,
                'ngay_dat' => '2025-12-15 09:10:00',
                'tong_tien' => 680000,
                'is_thanh_toan' => 0,
                'tien_thuc_nhan' => 0,
                'trang_thai' => 'cho_thanh_toan',
                'phuong_thuc' => null,
                'ngay_thanh_toan' => null
            ],
            [
                'id_khach_hang' => 42,
                'ngay_dat' => '2025-12-18 20:00:00',
                'tong_tien' => 1980000,
                'is_thanh_toan' => 1,
                'tien_thuc_nhan' => 1980000,
                'trang_thai' => 'hoan_thanh',
                'phuong_thuc' => 'Chuyen Khoan',
                'ngay_thanh_toan' => '2025-12-18 20:00:00'
            ],


        ];

        $existingCodes = [];

        foreach ($donHangs as &$donHang) {
            // Sinh mã đơn hàng
            do {
                $code = 'DH' . date('ymd', strtotime($donHang['ngay_dat'])) . rand(100, 999);
            } while (in_array($code, $existingCodes));
            $existingCodes[] = $code;
            $donHang['ma_don_hang'] = $code;

            // Timestamp
            $donHang['created_at']   = now();
            $donHang['updated_at']   = now();
        }

        DB::table('don_hangs')->insert($donHangs);
    }
}

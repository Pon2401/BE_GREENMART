<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChiTietNhapKhoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chi_tiet_nhap_khos')->truncate();

        $sanPhams = DB::table('san_phams')->pluck('id')->toArray();
        $nhapKhos = DB::table('nhap_khos')->get();

        $chiTietList = [];
        $now = Carbon::now();

        foreach ($nhapKhos as $nk) {

            $soSanPham = rand(3, 7); // mỗi phiếu nhập 3–7 sản phẩm
            $tongTien = 0;

            for ($i = 1; $i <= $soSanPham; $i++) {

                $idSP = $sanPhams[array_rand($sanPhams)];

                $soLuong = rand(10, 50);
                $donGia = rand(15000, 150000); // giá nhập ngẫu nhiên

                $tongTien += $soLuong * $donGia;

                // ngày sản xuất – hạn sử dụng
                $nsx = Carbon::parse($nk->ngay_nhap)->subDays(rand(3, 10));
                $hsd = Carbon::parse($nk->ngay_nhap)->addDays(rand(30, 180));

                $chiTietList[] = [
                    'id_nhap_kho'   => $nk->id,
                    'id_san_pham'   => $idSP,
                    'so_luong'      => $soLuong,
                    'don_gia'       => $donGia,
                    'ngay_san_xuat' => $nsx,
                    'ngay_su_dung'  => $hsd,
                    'created_at'    => $now,
                    'updated_at'    => $now,
                ];
            }

            // cập nhật tổng tiền cho bảng nhập kho
            DB::table('nhap_khos')
                ->where('id', $nk->id)
                ->update([
                    'tong_tien'      => $tongTien,
                    'tien_thuc_nhan' => $tongTien,
                ]);
        }

        DB::table('chi_tiet_nhap_khos')->insert($chiTietList);
    }
}

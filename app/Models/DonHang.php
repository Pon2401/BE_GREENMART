<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'don_hangs';

    protected $fillable = [
        'id_khach_hang',
        'ngay_dat',
        'tien_thuc_nhan',
        'tong_tien',
        'trang_thai',
        'phuong_thuc',
        'ngay_thanh_toan',
        'is_thanh_toan',
        'ma_don_hang',
    ];
}

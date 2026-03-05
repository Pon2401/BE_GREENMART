<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_phams';

    protected $fillable = [
        'ten_san_pham',
        'mo_ta',
        'gia',
        'so_luong',
        'hinh_anh',
        'don_vi',
        'id_danh_muc',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    protected $table = 'chi_tiet_don_hangs';

    protected $fillable = [
        'id_don_hang',
        'id_san_pham',
        'so_luong',
        'don_gia',
    ];
}

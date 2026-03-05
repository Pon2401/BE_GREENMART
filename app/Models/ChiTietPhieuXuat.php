<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuXuat extends Model
{
    protected $table = 'chi_tiet_phieu_xuats';

    protected $fillable = [
        'id_phieu_xuat',
        'id_san_pham',
        'so_luong',
        'don_gia',
    ];
}
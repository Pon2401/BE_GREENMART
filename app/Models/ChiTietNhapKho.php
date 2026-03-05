<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietNhapKho extends Model
{
    protected $table = 'chi_tiet_nhap_khos';

    protected $fillable = [
        'id_nhap_kho',
        'id_san_pham',
        'ngay_san_xuat',
        'ngay_su_dung',
        'so_luong',
        'don_gia',
    ];
}


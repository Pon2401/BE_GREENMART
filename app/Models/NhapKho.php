<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
    protected $table = 'nhap_khos';

    protected $fillable = [
        'id_nha_cung_cap',
        'tien_thuc_nhan',
        'ngay_nhap',
        'tong_tien',
        'trang_thai',
    ];
}

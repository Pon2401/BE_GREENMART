<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    protected $table = 'nha_cung_cap';

    protected $fillable = [
        'ten_nha_cung_cap',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'ma_san_pham',
        'so_luong',
        'gia',
    ];
}

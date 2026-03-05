<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuXuat extends Model
{
    protected $table = 'phieu_xuats';
    
    protected $fillable = [
        'ngay_xuat',
        'tong_tien',
        'trang_thai',
        'ghi_chu'
    ];
}
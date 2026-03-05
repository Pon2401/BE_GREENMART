<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NhanVien extends Authenticatable
{
    use HasApiTokens;
    protected $table = 'nhan_viens';
    protected $fillable = [
        'email',
        'ho_va_ten',
        'password',
        'so_dien_thoai',
        'cccd',
        'dia_chi',
        'ngay_sinh',
        'tinh_trang',
        'avatar',
        'id_chuc_vu',
    ];
    public function chucVu()
    {
        return $this->belongsTo(ChucVu::class, 'id_chuc_vu');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    // Khai báo tên bảng trong database
    protected $table = 'phieu_nhaps';

    // Khai báo các cột được phép thêm dữ liệu (Mass Assignment)
    protected $fillable = [
        'id_nha_cung_cap', // Khóa ngoại liên kết với nhà cung cấp 
        'tien_thuc_nhap',  // Tiền thực nhập 
        'ngay_nhap',       // Ngày nhập kho 
        'tong_tien',       // Tổng tiền phiếu nhập 
        'trang_thai',      // Trạng thái phiếu (Hoàn thành/Chờ xử lý) 
    ];
}
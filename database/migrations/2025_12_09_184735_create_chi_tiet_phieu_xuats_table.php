<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chi_tiet_phieu_xuats', function (Blueprint $table) {
            $table->id();
            $table->integer('id_phieu_xuat'); // Liên kết với bảng phieu_xuats
            $table->integer('id_san_pham');    // Liên kết với bảng san_phams
            $table->integer('so_luong');       // Số lượng xuất
            $table->decimal('don_gia', 15, 2); // Giá xuất (có thể là giá bán)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_phieu_xuats');
    }
};

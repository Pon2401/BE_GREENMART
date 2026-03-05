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
        Schema::create('phieu_xuats', function (Blueprint $table) {
            $table->id();
            $table->dateTime('ngay_xuat'); // Ngày xuất hàng
            $table->decimal('tong_tien', 15, 2)->default(0); // Tổng tiền phiếu xuất
            $table->string('trang_thai')->default('Hoàn thành');
            $table->text('ghi_chu')->nullable(); // Ghi chú lý do xuất (vd: Bán hàng, Hủy, ...)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_xuats');
    }
};

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
        Schema::create('nhap_khos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_nha_cung_caps');
            $table->decimal('tien_thuc_nhan', 15, 2)->default(0);
            $table->dateTime('ngay_nhap')->nullable();
            $table->decimal('tong_tien', 15, 2)->default(0);
            $table->string('trang_thai')->default('đã nhập');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhap_khos');
    }
};

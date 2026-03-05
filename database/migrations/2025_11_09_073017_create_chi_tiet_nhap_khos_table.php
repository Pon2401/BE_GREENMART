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
        Schema::create('chi_tiet_nhap_khos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_nhap_kho');
            $table->integer('id_san_pham');
            $table->date('ngay_san_xuat')->nullable();
            $table->date('ngay_su_dung')->nullable();
            $table->integer('so_luong')->default(0);
            $table->decimal('don_gia', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_nhap_khos');
    }
};

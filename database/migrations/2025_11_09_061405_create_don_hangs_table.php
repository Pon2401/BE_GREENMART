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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khach_hang');
            $table->dateTime('ngay_dat')->nullable();
            $table->string('ma_don_hang')->nullable()->unique();
            $table->decimal('tien_thuc_nhan', 15, 2)->default(0);
            $table->decimal('tong_tien', 15, 2)->default(0);
            $table->string('trang_thai')->default('chờ xử lý');
            $table->string('phuong_thuc')->nullable();
            $table->dateTime('ngay_thanh_toan')->nullable();
            $table->boolean('is_thanh_toan')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};

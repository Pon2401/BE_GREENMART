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
        Schema::create('phieu_nhaps', function (Blueprint $table) {
            $table->id();
            
            // 1. Khóa ngoại liên kết với nhà cung cấp
            // Lưu ý: Nếu bảng nhà cung cấp của bạn tên là 'nha_cung_caps', 
            // bạn có thể dùng $table->foreignId('id_nha_cung_cap')... để ràng buộc chặt chẽ hơn.
            $table->integer('id_nha_cung_cap'); 

            // 2. Tiền thực nhập (Decimal 15,2 theo tài liệu)
            $table->decimal('tien_thuc_nhap', 15, 2)->default(0);

            // 3. Ngày nhập (Datetime)
            $table->dateTime('ngay_nhap');

            // 4. Tổng tiền (Decimal 15,2 - Có thể null hoặc mặc định 0)
            $table->decimal('tong_tien', 15, 2)->nullable()->default(0);

            // 5. Trạng thái (String - Mặc định là 'Hoàn thành' theo tài liệu)
            $table->string('trang_thai')->nullable()->default('Hoàn thành');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_nhaps');
    }
};
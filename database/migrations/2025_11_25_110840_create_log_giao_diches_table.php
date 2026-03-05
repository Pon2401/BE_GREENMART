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
        Schema::create('log_giao_diches', function (Blueprint $table) {
            $table->id();
            $table->string('refNo')->unique();
            $table->integer('creditAmount');
            $table->string('description');
            $table->string('transactionDate');
            $table->string('code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_giao_diches');
    }
};

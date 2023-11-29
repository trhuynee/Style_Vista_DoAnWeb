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
        Schema::create('binhluan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nguoidung_id');
            $table->unsignedBigInteger('sanpham_id');
            $table->string('noidung');
            $table->timestamps();
            $table->foreign('sanpham_id')->references('id')->on('sanpham');
            $table->foreign('nguoidung_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binhluan');
    }
};

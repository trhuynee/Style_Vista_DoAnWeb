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
        Schema::create('ChiTietSanPham', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sanpham_id');
            $table->unsignedBigInteger('mau_id');
            $table->tinyInteger('size');
            $table->integer('soluong');
            $table->tinyInteger('trangthai')->default('0');
            $table->timestamps();
            $table->foreign('sanpham_id')->references('id')->on('sanpham');
            $table->foreign('mau_id')->references('id')->on('mau');
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ChiTietSanPham');
    }
};

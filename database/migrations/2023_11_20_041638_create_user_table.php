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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('sdt')->nullable();
            $table->string('password');
            $table->string('hovaten');
            $table->string('email')->unique();;
            $table->string('diachi')->nullable();
            $table->tinyInteger('phanquyen')->default('2');
            $table->string('avatar')->nullable();
            $table->tinyInteger('trangthai')->default('0');
            $table->timestamps();
        });
        \DB::table('user')->insert([
            'sdt' => '0981650076',
            'password'=> Hash::make('admin1'),
            'hovaten' => 'Trương Gia Huy',
            'email' => 'admin@gmail.com',
            'diachi' => 'TP.HCM',
            'phanquyen' => '0',
            'avatar' => null,
            'trangthai' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};

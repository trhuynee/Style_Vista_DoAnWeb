<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    use HasFactory;
    protected $table = 'ChiTietSanPham';

    protected $fillable = [
        'sanpham_id',
        'mau_id',
        'size',
        'dongia',
        'soluong',
        'giamgia',
        'trangthai',
    ];
    public function sanpham()
    {
        return $this->hasOne(SanPham::class, 'id', 'sanpham_id');
    }
    public function mau()
    {
        return $this->hasOne(Mau::class, 'id', 'mau_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTHDB extends Model
{
    use HasFactory;
    protected $table = 'CTHDB';
    protected $fillable = [
        'ma_hd',
        'sp_id',
        'chitietsp_id',
        'soluong',
        'giaohang',
        'thanhtien',
        'diachi',
    ];
    public function sanpham()
    {
        return $this->hasOne(SanPham::class, 'id', 'sp_id');
    }

    public function chiTietSanPham()
    {
        return $this->belongsTo(ChiTietSanPham::class, 'chitietietsp_id', 'id');
    }
}

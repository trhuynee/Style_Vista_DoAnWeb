<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = [
        'tensanpham',
        'loaisp_id',
        'nh_id',
        'mota',
        'trangthai',

    ];
    public function nhanhieu()
    {
        return $this->belongsTo(nhanhieu::class, 'nh_id', 'id');
    }
    public function loaisanpham()
    {
        return $this->belongsTo(LoaiSanPham::class, 'loaisp_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'sp_id');
    }
}

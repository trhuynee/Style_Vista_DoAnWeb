<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image';
    protected $fillable = [
        'sp_id',
        'tenimage',
    ];
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'sp_id', 'id');
    }
}

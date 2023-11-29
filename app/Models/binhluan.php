<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binhluan extends Model
{
    use HasFactory;
    protected $table = 'binhluan';

    protected $fillable = [
        'nguoidung_id',
        'sanpham_id',
        'noidung',
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'nguoidung_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giohang extends Model
{
    use HasFactory;
    protected $table = 'giohang';
    protected $fillable = [
        'sp_id',
        'chitietsp_id',
        'soluong',
    ];
}

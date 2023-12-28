<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonban extends Model
{
    use HasFactory;
    protected $table = 'hoadonban';
    protected $fillable = [
        'ma_kh',
        'ngay_lap_hoa_don',
        'ngay_nhan_hang',
        'ttthanhtoan',
        'ttvanchuyen',
        'trangthai',
    ];
    public function cthdb()
    {
        return $this->hasOne(CTHDB::class, 'ma_hd', 'id');
    }

}

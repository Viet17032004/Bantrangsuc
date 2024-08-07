<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $fillable = [
     'user_id',
     'san_pham_id',
     'noi_dung',
     'thoi_gian',
     'trang_thai',

    ];
    protected $cats = [
        'trang_thai' => 'boolean',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
}

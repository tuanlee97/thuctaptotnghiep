<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
   public $timestamps = false;
   public $incrementing = false;
   protected $table = 'khachhang';
   protected $primaryKey = 'makh';
}

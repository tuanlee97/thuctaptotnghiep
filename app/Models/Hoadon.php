<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
   public $timestamps = false;
    public $incrementing = false;
    protected $table = 'hoadon';
    protected $primaryKey = 'mahd';
    protected $fillable = [
        'mahd','ky', 'ngaylap', 'tongtien','trangthai','makh','manv'];
}

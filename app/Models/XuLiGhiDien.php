<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chitiet_HD extends Model
{
  public $timestamps = false;
    public $incrementing = false;
    protected $table = 'cthoadon';
    protected $primaryKey = 'idchitiet';
    protected $fillable = [
        'idchitiet','tungay', 'denngay', 'csdau','cscuoi','tongthanhtien','dntt','mahd'];
}

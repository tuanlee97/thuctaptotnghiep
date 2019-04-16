<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DienKe extends Model
{
	   public $incrementing = false;
	     public $timestamps = false;
    protected $table = 'dienke';
    protected $primaryKey = 'madk';
 	    protected $fillable = [
        'madk','tendk', 'ngaysx', 'ngaylap','trangthai','makh'
    ];
}

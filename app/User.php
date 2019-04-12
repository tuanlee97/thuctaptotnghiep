<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'users';
    protected $primaryKey = 'manv';
    protected $fillable = [
        'manv','tennv', 'email', 'password','diachi','cmnd','sdt','chucvu'
    ];

}

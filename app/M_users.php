<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_users extends Model
{
    //
    protected $table 	= "users";
    protected $fillabel	= ['id', 'first_name', 'last_name', 'address', 'phone', 'email'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myusers extends Model
{
    // protected $table =
    protected $connection = 'mysql2';
    protected $table="users";
      protected $fillable = ['name','gender','address','fee','email','phoneNumber','type','quickbloxID','photoURL','country'];
       
}



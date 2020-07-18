<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    // protected $table =
    protected $connection = 'mysql2';
    protected $table="countries";
      protected $fillable = ['id','name','iso3','iso2','phonecode','capital','currency','created_at','updated_at'];
       
}



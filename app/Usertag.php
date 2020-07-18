<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertag extends Model
{
    // protected $table =
    protected $connection = 'mysql2';
    protected $table="userTags";
    protected $fillable = ['userid','tagName'];
}

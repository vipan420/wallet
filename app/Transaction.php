<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
/*

email	
item_number
amount
currency_code	
txn_id	
payment_status	
payment_response		
from		
to

*/
    // protected $table =
    protected $connection = 'mysql2';
    protected $table="tbl_payment";
    protected $fillable = ['email','item_number','amount','currency_code','txn_id','payment_status','payment_response','from','to'];
       
}



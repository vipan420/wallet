<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Myusers; 
use DB;
use Validator;
use App\Userrating;
use App\Countries;
use App\Transaction;
use App\Http\Controllers\Controller;

class Trans extends Controller
{

public $successStatus = 200;
   public $errorStatus = 400;
   
   
  public function add(Request $request)
  {
      $input=array();
        $validator=Validator::make($request->all(),[
						'amount'=>'required',
						'payment_status'=>'required',
						'from'=>'required',
						'to'=>'required',
						'txn_id'=>'required'
							],[
						   'amount.required'=>'Amount required.',
						   'payment_status.required'=>'Payment status required.',
						   'from.required'=>'From user id required.',
						   'to.required'=>'To user id required.',
						   'txn_id.required'=>'txn id id required.',
					           ]);	
					           if($validator->fails()){
					return response()->json(['error' => $validator->errors()],$this->errorStatus);
				}
	$uid = DB::select( DB::raw("SELECT id FROM users WHERE  quickbloxID=".$request->post('to')));
        $to=$uid[0]->id;
       
				
      $input=array();
      $input['amount']=$request->post('amount');
      $input['to']=$to; 
      $input['email']=$request->post('email'); 
      $input['item_number']=$request->post('item_number'); 
      $input['currency_code']=$request->post('currency_code'); 
      $input['txn_id']=$request->post('txn_id'); 
      $input['payment_status']=$request->post('payment_status'); 
      $input['payment_response']=$request->post('payment_response'); 
      $input['from']=$request->post('from'); 
      $result = Transaction::create($input);
                        if($result)
				  {
				   return response()->json(['success' => 'Added successfully.','data'=>$result],$this->successStatus);
				  }else
					{
					return response()->json(['error' =>  'Cannot be added.','data'=>[]],$this->errorStatus);
					} 
 
      
      
  }
  
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Myusers; 
use DB;
use Validator;
use App\Userrating;
use App\Countries;

use App\Http\Controllers\Controller;

class Doc extends Controller
{
public $successStatus = 200;
   public $errorStatus = 400;
    public function index()
    {
    
    }
     public function details(Request $request) 
    { 
       // $user =  Myusers::where('type', '=', "DOCTOR")->get(); 
       //$request->post("fee")
       $gender="";
       if($request->post("gender"))
       {
         $gender=" and gender='".$request->post("gender")."'";
       }
        if(!empty($request->post("feeStart")) and !empty($request->post("feeEnd")))
       {
         $gender=" and fee BETWEEN ".$request->post("feeStart")." and ".$request->post("feeEnd");
       }
        $query="SELECT users.name,users.country,users.fee,users.gender,users.id,users.phoneNumber,users.photoURL,users.address,users.quickbloxID FROM users WHERE users.type = 'DOCTOR' ".$gender;
        if(!empty($request->post("userid")))
        {
        $query.=" and users.id != ".$request->post("userid");
        }
        if(!empty($request->post("country")))
        {
        $query.=" and users.country != ".$request->post("country");
        }
       $results = DB::select( DB::raw($query) );
       foreach($results as $key=>$value)  
       {
       
        $tag = DB::select( DB::raw("SELECT tagName FROM userTags WHERE  userTags.userid=".$results[$key]->id) );
        $results[$key]->tag=$tag;
        $results[$key]->rivewCount=Userrating::where("to",$results[$key]->id)->count();
        $country=Countries::where("id",$results[$key]->country)->get();
        $rating=Userrating::where("to",$results[$key]->id)->avg('rating');
        $results[$key]->rating=!empty($rating)?$rating:'0.5';
        $results[$key]->country=!empty($country[0]->name)?$country[0]->name:'';
        
       }
       //print_r($results);
       return response()->json(['doctorData' => $results], $this-> successStatus); 
    } 
    public function rating(Request $request)
    {
    
    $validator=Validator::make($request->all(),[
						'rating'=>'required',
						'rivew'=>'required',
						'from'=>'required',
						'to'=>'required'
							],[
						   'rating.required'=>'Rating id required.',
						   'rivew.required'=>'Rivew required.',
						     'from.required'=>'From user id required.',
						   'to.required'=>'To user id required.',
						   
					           ]);	
	$uid = DB::select( DB::raw("SELECT id FROM users WHERE  quickbloxID=".$request->post('to')));
        $to=$uid[0]->id;
       
				if($validator->fails()){
					return response()->json(['error' => $validator->errors()],$this->errorStatus);
				}
                                $save=new Userrating;
				$save->rating=$request->post('rating');	  
				$save->rivew=$request->post('rivew');	  	  
				$save->from=$request->post('from');	  
				$save->to=$to;	
				$result=$save->save();
				if($result)
				  {
				   return response()->json(['success' => 'Added successfully.','data'=>$save],$this->successStatus);
				  }else
					{
					return response()->json(['error' =>  'Cannot be added.','data'=>[]],$this->errorStatus);
					} 
                                
    
    }
    public function ratingList(Request $request)
    {
    
        $validator=Validator::make($request->all(),['userid'=>'required'],['userid.required'=>'user id required.']);	
					           if($validator->fails()){
					return response()->json(['error' => $validator->errors()],$this->errorStatus);
				}
			         $result=Userrating::where("to",$request->post('userid'))->get();
			          foreach($result as $key=>$value)
                                       {
                                       
                                        $from=Myusers::where("id",$result[$key]->from)->get();
                                        $result[$key]->from=@$from[0];
                                        $to=Myusers::where("id",$result[$key]->to)->get();
                                        $result[$key]->to=@$to[0];
                                        
                                       }
				 return response()->json(['ratingData' => $result], $this-> successStatus); 
    }
    public function countiresList(Request $request)
    {
      $result=Countries::where("status","ACTIVE")->get();
      return response()->json(['coountryList' => $result], $this-> successStatus);
    
    }
    
    
}

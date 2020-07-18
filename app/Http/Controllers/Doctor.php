<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Myusers;
use App\Usertag;
use App\Countries;
class Doctor extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth');
    }

        public function index(Request $request)
    {
      $users = Myusers::where('type','DOCTOR')->orderBy('id', 'DESC')->paginate(15);
      return view('doctor',['users'=>$users]);//print_R($flights);
    }
     public function add(Request $request)
    {
    $user=array();
    $countries=Countries::where("status","ACTIVE")->get();
      return view('addDoctor',['user'=>$user,'countries'=>$countries]);//print_R($flights);
    }
    
      public function approve($id)
    {
      
      
      
      
         $input=array();
     $input['approvedOn']=date("Y-m-d H:i:s");
     $input['approved']='1';
     
     $affectedRows = Myusers::where('id', '=', $id)->update($input);
     
           return redirect()->route('doctorList')->withSuccess(['Doctor Approved Successfully !']);
      
      
      $data = Myusers::findOrFail($id);
      
      $tag= Usertag::where("userid",$id)->get();
          $countries=Countries::where("status","ACTIVE")->get();
      return view('addDoctor',['user'=>$data,'tag'=>$tag,'countries'=>$countries]);//print_R($flights);
    }
     public function edit($id)
    {
      $data = Myusers::findOrFail($id);
      
      $tag= Usertag::where("userid",$id)->get();
          $countries=Countries::where("status","ACTIVE")->get();
      return view('addDoctor',['user'=>$data,'tag'=>$tag,'countries'=>$countries]);//print_R($flights);
    }
    public function delete($id)
    {
    
    
    
           
            $data = Myusers::findOrFail($id);
            $data->delete();
                  return redirect()->route('doctorList')->withSuccess(['Doctor deleted Successfully !']);
    }
    
    public function insert(Request $request)
    {
    
    print_r($request->all());
    //print_r(phpinfo());
    /*
     [fullName] => sdfsda [gender] => Male [address] => sdfasdf [fee] => 31 [phoneNumber] => 33333333 [tag] => 333333
    */
     if(!empty($request->post('id')))
     {
     $input=array();
     $input['name']=$request->post('fullName');
      $input['gender']=$request->post('gender');
     $input['address']=$request->post('address');
      $input['fee']=$request->post('fee');
            $input['country']=$request->post('country');
       $input['email']=$request->post('email');
      $input['phoneNumber']=$request->post('phoneNumber');
      $input['type']='DOCTOR';
      $thumbnail = $request->file('image');
				$destinationPath = 'uploads';
		      		 if ($files = $request->file('image')) {
					   $destinationPath = '/var/www/html/salniazi-app/uploads/'; 
					   $profilefile = $request->post('phoneNumber'). "." . $files->getClientOriginalExtension();
					   $result=$files->move($destinationPath, $profilefile);
					   print_r($result);
         	  			   $input['photoURL']= $profilefile;
        			   }
     $affectedRows = Myusers::where('id', '=', $request->post('id'))->update($input);
     
     $affectedRows = Usertag::where('id', '=', $request->post('tagid'))->update(['tagName'=>$request->post('tag')]);
           return redirect()->route('doctorList')->withSuccess(['Doctor updated Successfully !']);
     
     }else{
     $input=array();
      $input['name']=$request->post('fullName');
      $input['gender']=$request->post('gender');
      $input['address']=$request->post('address');
                  $input['country']=$request->post('country');
            $input['email']=$request->post('email');
      $input['fee']=$request->post('fee');
      $input['phoneNumber']=$request->post('phoneNumber');
      $input['type']='DOCTOR';
      $thumbnail = $request->file('image');
       
				$destinationPath = 'uploads';
		      		 if ($files = $request->file('image')) {
					   $destinationPath = '/var/www/html/salniazi-app/uploads/'; 
					   $profilefile = $request->post('phoneNumber'). "." . $files->getClientOriginalExtension();
					   $result=$files->move($destinationPath, $profilefile);
					   print_r($result);
         	  			 $input['photoURL']= $profilefile;
        			   }
        			   //print_r($input);die;
        			    //quick block
     
     $APPLICATION_ID = "74783";
$AUTH_KEY = "5yDWTkOqXW2xDyP";
$AUTH_SECRET = "NAYLdLxFjUjYnbY";
 
// GO TO account you found creditial
$USER_LOGIN = "Tamaaas";
$USER_PASSWORD = "!Sn52843#";
$quickbox_api_url = "https://apitamaaas.quickblox.com";
////// END CREDENTIAL
/// RETRIVE TOKEN
$nonce = rand();
$timestamp = time(); // time() method must return current timestamp in UTC but seems like hi is return timestamp in current time zone
$signature_string = "application_id=" . $APPLICATION_ID . "&auth_key=" . $AUTH_KEY . "&nonce=" . $nonce . "&timestamp=" . $timestamp . "&user[login]=" . $USER_LOGIN . "&user[password]=" . $USER_PASSWORD;
 $signature = hash_hmac('sha1', $signature_string, $AUTH_SECRET);
 
$post_body = http_build_query(array(
    'application_id' => $APPLICATION_ID,
    'auth_key' => $AUTH_KEY,
    'timestamp' => $timestamp,
    'nonce' => $nonce,
    'signature' => $signature,
    'user[login]' => $USER_LOGIN,
    'user[password]' => $USER_PASSWORD
        ));
        $url = $quickbox_api_url . "/session.json";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); // Full path is - https://api.quickblox.com/session.json
        curl_setopt($curl, CURLOPT_POST, true); // Use POST
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_body); // Setup post body
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // Execute request and read response
        $response = curl_exec($curl);
        // Close connection
        curl_close($curl);
        $response = json_decode($response, TRUE);
        
        $token = $response['session']['token'];
        $post_body = http_build_query(array(
            'user[login]' => $request->post('phoneNumber').'_'.$nonce."_".$timestamp,
            'user[password]' => 'Quick@123',
            'user[email]' => $request->post('email'),
            'user[external_user_id]' => rand(),
            'user[facebook_id]' => '',
            'user[twitter_id]' => '',
            'user[full_name]' => $request->post('fullName'),
            'user[phone]' => ''
                ));
         
        $url = $quickbox_api_url . "/users.json";
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL, $url); // Full path is - https://api.quickblox.com/session.json
        curl_setopt($curl, CURLOPT_POST, true); // Use POST
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_body); // Setup post body
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('QB-Token: ' . $token));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // Execute request and read response
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, TRUE);
        //print_R($response);
        //echo "<br>";
        $quickblock_id = @$response['user']['id'];
        $input['quickbloxID']= @$quickblock_id;
        //print_R($input);echo "<br>";
      $data = Myusers::create($input);
     //print_r($data);
      $input=array();
      // echo "<br>";
      $input['userid']=$data->id;
      $input['tagName']=$request->post('tag');
     
     // return redirect()->back()->with('message', 'Doctor added Successfully !');
     
     
    
         
      $data = Usertag::create($input);
     //quick block
     
     
 
     
     
      return redirect()->route('doctorList')->withSuccess(['Doctor added Successfully !']);
      }
     
    }
    
}

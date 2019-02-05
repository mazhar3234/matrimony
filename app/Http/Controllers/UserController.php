<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class UserController extends Controller
{
	public function register()
	{
		return view ('frontend.pages.register');
	}
	public function login()
	{
		return view ('frontend.pages.login');
	}
	public function registerUser(Request $request)
	{
		 try {
         $data=array();
         $data['name']=$request->name;
         $data['dob']=$request->dob;
         $data['email']=$request->email;
         $data['phone_number']=$request->phone_number;
         $data['password']=md5($request->password);
         $data['sex']=$request->sex;
         $data['member_type']=$request->member_type;
         $data['created_at']=date('Y-m-d h:i:s');
           //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate = date("Y-m-d", strtotime($request->dob) );
$today = date("Y-m-d");
$diff = date_diff(date_create($birthDate), date_create($today));
$age=$diff->format('%y');
if ($age < 18) {
	return Redirect::to('register')->with('error','Age Have to Be Above 18 to Open Account On This Site!!');
}else {
         $result = DB::table('users')->insert($data);           
         if($result){
            return Redirect::to('register')->with('success','Please Wait For Admin Approval!!');
         }else {
            return Redirect::to('register')->with('error','There is a error Sending Data!!');
         }
     }

      }
      catch (\Exception $e) {
         $err_message = \Lang::get($e->getMessage());
         return Redirect::to('register')->with('error', $err_message);
      }
	}
	public function check_login(Request $request){
		$email = $request->email;
        $password = $request->password;
        $result = DB::table('users')
        ->where('email', $email)
        ->where('password', md5($password))
        ->first();
        if ($result) {
        if ($result->verified=='0') {
        	Session::put('exception','Your Account Is Not Verified Yet!!');
            return Redirect::to('login');
        }
         else {
         	DB::table('users')
        	->where('id', $result->id)   
            ->update(['last_login'=>date('Y-m-d h:i:s')]);
            Session::put('name',$result->name);
            Session::put('user_id',$result->id);
            Session::put('member_type',$result->member_type); 
            Session::put('role',$result->role); 
            return Redirect::to('profile');
        }
	}else {
	        Session::put('exception','Your Credentials Are Incorrect!!');
            return Redirect::to('login');	
	}
}
     /*--------------------- Logout ------------------*/

    public function logout() {
        Session::put('name', '');
        Session::put('user_id', '');
        Session::put('member_type','');
        Session::put('role','');
        Session::put('exception','Logout Successful...');  
        return redirect('login');

    }

}

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
         $result = DB::table('users')->insert($data);           
         if($result){
            return Redirect::to('register')->with('success','Please Wait For Admin Approval!!');
         }else {
            return Redirect::to('register')->with('error','There is a error Sending Data!!');
         }

      }
      catch (\Exception $e) {
         $err_message = \Lang::get($e->getMessage());
         return Redirect::to('register')->with('error', $err_message);
      }
	}

}

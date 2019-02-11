<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
class AdminController extends Controller
{
    public function login(){
    	return view('backend.login');
    }
	/*-------- Admin Login  --------*/

	public function login_check(Request $request){
		$email=$request->email;
		$password=md5($request->password);
		$result=DB::table('users')->where([['email',$email],['password',$password],['role',1]])->first();
		if($result){
         Session::put('admin_name',$result->name);
         Session::put('admin_email',$result->email);
         Session::put('admin_id',$result->id);
         return Redirect::to('/dashboard');
		}else {
		 Session::put('error','Login Information Is Wrong!!');
		 return Redirect::to('matrimony-admin');
		}
	}
	public function dashboard(){
		$master_content=view('backend.master_content');
		return view('backend.master')->with('content',$master_content);
	}
	     /*--------------------- Logout ------------------*/

    public function admin_logout() {
        Session::put('admin_name', '');
        Session::put('admin_email', '');
        Session::put('admin_id','');
        Session::put('error','Logout Successful...');  
        return redirect('matrimony-admin');

    }
}

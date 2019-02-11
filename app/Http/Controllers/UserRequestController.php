<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
use Illuminate\Support\Facades\Input;
class UserRequestController extends Controller
{
   public function user_request(){
   	    $users=DB::table('users')->where('verified',0)->where('role',2)->get();
        $manage_user=view('backend.pages.user_request.manage_user_request')->with('users',$users);
        return view('backend.master')
                            ->with('content',$manage_user);
   }
   public function user_request_approve($id){
   	$data=array();
   	$data['user_id']=$id;
   	 $result=DB::table('users')->where('id',$id)->update(['verified'=>1]);

   	if ($result) {
   	$user_exist=DB::table('tbl_personal_information')->where('user_id',$id)->first();
   	$user_exist1=DB::table('tbl_partner_preference')->where('user_id',$id)->first();
   	$user_exist2=DB::table('tbl_family_details')->where('user_id',$id)->first();
   	if (!$user_exist) {
   	 $result=DB::table('tbl_personal_information')->insert($data);
   	}
   	if (!$user_exist1) {
   	 $result=DB::table('tbl_partner_preference')->insert($data);
   	}
   	if (!$user_exist2) {
   	 $result=DB::table('tbl_family_details')->insert($data);
   	}
   	  return Redirect::to('user-request')->with('success','User Approved!!');
   	 }
   	 else {
            return Redirect::to('user-request')->with('error','There is a error Approving Data!!');
        }

   }

}

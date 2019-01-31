<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class FrontendController extends Controller
{
  public function index(){
  	$master_content=view('frontend.master_content');
  	return view ('frontend.master')->with('content',$master_content);
  }
  public function search_partner(){
  	  	$master_content=view('frontend.pages.search_partner');
  	return view ('frontend.master')->with('content',$master_content);
  }
  	public function contact()
	{
		return view ('frontend.pages.contact');
	}
	public function save_contact(Request $request){
		         try {
         $data=array();
         $data['name']=$request->name;
         $data['email']=$request->email;
         $data['message']=$request->message;
         $data['created_at']=date('Y-m-d h:i:s');
         $result = DB::table('tbl_contact')->insert($data);           
         if($result){
            return Redirect::to('contact-us')->with('success','Your Message Send Successfully!!');
         }else {
            return Redirect::to('contact-us')->with('error','There is a error Sending Data!!');
         }

      }
      catch (\Exception $e) {
         $err_message = \Lang::get($e->getMessage());
         return Redirect::to('contact-us')->with('error', $err_message);
      }
	}
}

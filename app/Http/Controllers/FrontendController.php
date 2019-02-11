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
       $users=DB::table('tbl_personal_information')
->join('users', 'tbl_personal_information.user_id', '=', 'users.id')
->select('tbl_personal_information.*', 'users.*')
->orderBy('users.id', 'desc')
->paginate(10);
  	  	$master_content=view('frontend.pages.search_partner')->with('users',$users);
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
    public function save_feedback(Request $request){
             try {
         $data=array();                                                           
         $data['email']=$request->email;
         $data['message']=$request->message;
         $data['created_at']=date('Y-m-d h:i:s');
         $result = DB::table('tbl_feedback')->insert($data);           
         if($result){
            return Redirect::to('/');
         }else {
            return Redirect::to('/');
         }

      }
      catch (\Exception $e) {
         $err_message = \Lang::get($e->getMessage());
         return Redirect::to('/')->with('error', $err_message);
      }
  }
  public function profile(){

    $recent_user=DB::table('tbl_personal_information')
->join('users', 'tbl_personal_information.user_id', '=', 'users.id')
->select('tbl_personal_information.*', 'users.*')
->orderBy('users.id', 'desc')
->take(10)
->get();
    return view ('frontend.pages.profile')->with('recent_user',$recent_user);
  }
  public function searchProfile(Request $request) {
   $id=$request->profile_id -1000;
$user_info=DB::table('users')->where('id',$id)->first();
if ($user_info) {
   $recent_user=DB::table('tbl_personal_information')
->join('users', 'tbl_personal_information.user_id', '=', 'users.id')
->select('tbl_personal_information.*', 'users.*')
->orderBy('users.id', 'desc')
->take(10)
->get();
$personal_info=DB::table('tbl_personal_information')
->join('users', 'tbl_personal_information.user_id', '=', 'users.id')
->where('tbl_personal_information.user_id',$id)
->select('tbl_personal_information.*', 'users.*')
->first();
$family_info=DB::table('tbl_family_details')->where('user_id',$id)->first();

$partner_info=DB::table('tbl_partner_preference')->where('user_id',$id)->first();

$user_photo=DB::table('tbl_photo_gallery')->where('user_id',$id)->get();
    return view ('frontend.pages.individual_profile')
      ->with('recent_user',$recent_user)
      ->with('user_info',$user_info)
      ->with('personal_info',$personal_info)
      ->with('family_info',$family_info)
      ->with('partner_info',$partner_info)
      ->with('user_photo',$user_photo);
}else {
     $recent_user=$personal_info=DB::table('tbl_personal_information')
->join('users', 'tbl_personal_information.user_id', '=', 'users.id')
->select('tbl_personal_information.*', 'users.*')
->orderBy('users.id', 'desc')
->take(10)
->get();
    return view ('frontend.pages.no_result')  ->with('recent_user',$recent_user);
}
 
  }
  public function search_partner_list(Request $request)
  {
    // echo "<pre>";
    // print_r($request->all());
    // exit;
 $users=DB::table('tbl_personal_information')
->join('users', 'tbl_personal_information.user_id', '=', 'users.id')
->select('tbl_personal_information.*', 'users.*')
->where('users.sex',$request->sex)
->Where('tbl_personal_information.location',$request->location)
->Where('tbl_personal_information.occupation',$request->occupation)
->Where('tbl_personal_information.married_status',$request->married_status)
->whereBetween ('tbl_personal_information.age',[$request->min_age, $request->max_age])
->orderBy('users.id', 'desc')
->paginate(10);
        $master_content=view('frontend.pages.search_partner')->with('users',$users);
    return view ('frontend.master')->with('content',$master_content);
  }
    public function search_partner_new(Request $request)
  {
    // echo "<pre>";
    // print_r($request->all());
    // exit;
 $users=DB::table('tbl_personal_information')
->join('users', 'tbl_personal_information.user_id', '=', 'users.id')
->select('tbl_personal_information.*', 'users.*')
->where('users.sex',$request->sex)
->Where('tbl_personal_information.location',$request->location)
->Where('tbl_personal_information.occupation',$request->occupation)
->Where('tbl_personal_information.married_status',$request->married_status)
->Where('tbl_personal_information.education',$request->education)
->whereBetween ('tbl_personal_information.age',[$request->min_age, $request->max_age])
->orderBy('users.id', 'desc')
->paginate(10);
        $master_content=view('frontend.pages.search_partner')->with('users',$users);
    return view ('frontend.master')->with('content',$master_content);
  }
}

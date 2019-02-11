<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
use Illuminate\Support\Facades\Input;

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

	public function edit_profile($id){
		    $recent_user=$personal_info=DB::table('tbl_personal_information')
->join('users', 'tbl_personal_information.user_id', '=', 'users.id')
->select('tbl_personal_information.*', 'users.*')
->orderBy('users.id', 'desc')
->take(10)
->get();
		return view ('frontend.pages.edit_profile')->with('recent_user',$recent_user);
	}
	public function update_profile(Request $request){
		try {
			$data=array();
			$data['name']=$request->name;
			$data['dob']=$request->dob;
			$data['email']=$request->email;
			$data['phone_number']=$request->phone;
			$data['member_type']=$request->member_type;
			$data['updated_at']=date('Y-m-d h:i:s');
			$result = DB::table('users')->where('id',$request->user_id)->update($data);
			$data2=array();
			$data2['user_id']=$request->user_id;           
			$data2['personal_details']=$request->personal_details;           
			$data2['married_status']=$request->married_status;           
			$data2['mother_tongue']=$request->mother_tongue;           
			$data2['body_type']=$request->body_type;           
			$data2['complexion']=$request->complexion;           
			$data2['weight']=$request->weight;           
			$data2['height']=$request->height;           
			$data2['blood_group']=$request->blood_group;           
			$data2['religion']=$request->religion;           
			$data2['drink']=$request->drink;           
			$data2['smoke']=$request->smoke;           
			$data2['location']=$request->location;           
			$data2['rassi']=$request->rassi;           
			$data2['education']=$request->education;           
			$data2['education_details']=$request->education_details;           
			$data2['occupation']=$request->occupation;           
			$data2['occupation_details']=$request->occupation_details;           
			$data2['annual_income']=$request->annual_income;  
			$data2['updated_at']=date('Y-m-d h:i:s');         
			$result2 = DB::table('tbl_personal_information')->where('user_id',$request->user_id)->update($data2);
			if(($result && $result2) || ($result||$result2) ){
				return Redirect::to('edit-profile/'.$request->user_id)->with('success','Profile Information Updated Successfully!!');
			}else {
				return Redirect::to('edit-profile/'.$request->user_id)->with('error','There is a error Updating Data!!');
			}


		}
		catch (\Exception $e) {
			$err_message = \Lang::get($e->getMessage());
			return Redirect::to('edit-profile/'.$request->user_id)->with('error', $err_message);
		}	
	}
	public function update_family_details(Request $request){
		try {
			$data2=array();
			$data2['user_id']=$request->user_id;           
			$data2['father_occupation']=$request->father_occupation;           
			$data2['mother_occupation']=$request->mother_occupation;           
			$data2['brothers']=$request->brothers;           
			$data2['sisters']=$request->sisters;            
			$data2['updated_at']=date('Y-m-d h:i:s');         
			$result2 = DB::table('tbl_family_details')->where('user_id',$request->user_id)->update($data2);
			if($result2){
				return Redirect::to('edit-profile/'.$request->user_id)->with('success','Profile Information Updated Successfully!!');
			}else {
				return Redirect::to('edit-profile/'.$request->user_id)->with('error','There is a error Updating Data!!');
			}


		}
		catch (\Exception $e) {
			$err_message = \Lang::get($e->getMessage());
			return Redirect::to('edit-profile/'.$request->user_id)->with('error', $err_message);
		}		
	}

	public function update_partner_preference(Request $request){
		try {
			$data2=array();
			$data2['user_id']=$request->user_id;           
			$data2['min_age']=$request->min_age;           
			$data2['max_age']=$request->max_age;           
			$data2['married_status']=$request->married_status;           
			$data2['body_type']=$request->body_type;            
			$data2['complexion']=$request->complexion;            
			$data2['height']=$request->height;            
			$data2['smoking']=$request->smoking;            
			$data2['religion']=$request->religion;            
			$data2['drink']=$request->drink;            
			$data2['mother_tongue']=$request->mother_tongue;            
			$data2['education']=$request->education;            
			$data2['occupation']=$request->occupation;            
			$data2['location']=$request->location;            
			$data2['updated_at']=date('Y-m-d h:i:s');         
			$result2 = DB::table('tbl_partner_preference')->where('user_id',$request->user_id)->update($data2);
			if($result2){
				return Redirect::to('edit-profile/'.$request->user_id)->with('success','Profile Information Updated Successfully!!');
			}else {
				return Redirect::to('edit-profile/'.$request->user_id)->with('error','There is a error Updating Data!!');
			}


		}
		catch (\Exception $e) {
			$err_message = \Lang::get($e->getMessage());
			return Redirect::to('edit-profile/'.$request->user_id)->with('error', $err_message);
		}		
	}

	public function update_photo(Request $request){


$image_count=count($request->file('user_image'));
$user_image=$request->file('user_image');
if ($request->permission) {
$result3=  DB::table('photo_permission')->where('user_id',$request->user_id)->first();
if ($result3) {
DB::table('photo_permission')->where('user_id',$request->user_id)->update(['permission'=>$request->permission]);
}else {
	$aa=array();
	$aa['user_id']=$request->user_id;
	$aa['permission']=$request->permission;
DB::table('photo_permission')->insert($aa);	
}
}
if($user_image){
 for ($i=0; $i <= $image_count-1 ; $i++) { 
          $file_size   =$user_image[$i]->getClientSize();
        $name        = str_random(20);
        $extension   = $user_image[$i]->getClientOriginalExtension();
        $image_name  = $name.'.'.$extension;
        $upload_path = 'public/user/';
        //-------- Check image format ----------//
        if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg' || $extension == 'JPEG'|| $extension == 'PNG'){
                    //------ Check file size --------//
          if($file_size < 50000000){
         $success = $user_image[$i]->move($upload_path,$image_name);
          $data2['photo']=$image_name;
          $data2['user_id'] = $request->user_id;
        $data2['created_at']=date('Y-m-d h:i:s'); 
        $result=  DB::table('tbl_photo_gallery')->insert($data2);
          }else{
            return Redirect::to('edit-profile/'.$request->user_id)->with('error', 'User Image Maximum file size is 50MB');
          }
        }else{
          return Redirect::to('edit-profile/'.$request->user_id)->with('error','User Image File type not supported...!');
        }


 }
	if($result){
				return Redirect::to('edit-profile/'.$request->user_id)->with('success','Profile Photo Updated Successfully!!');
			}else {
				return Redirect::to('edit-profile/'.$request->user_id)->with('error','There is a error Updating Data!!');
			}
		}else {
			return Redirect::to('edit-profile/'.$request->user_id)->with('success','Profile Photo Updated Successfully!!');
		}
	}

	public function profileById($id){
		    $recent_user=DB::table('tbl_personal_information')
->join('users', 'tbl_personal_information.user_id', '=', 'users.id')
->select('tbl_personal_information.*', 'users.*')
->orderBy('users.id', 'desc')
->take(10)
->get();
$user_info=DB::table('users')->where('id',$id)->first();
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
	}

	public function delete_user_image(){
       $id = Input::get('id');
          $user_id = Input::get('user_id');
         $value=DB::table('tbl_photo_gallery')->where('photo_id',$id)->first();
          unlink('public/user/'.$value->photo);
        $userimages=DB::table('tbl_photo_gallery')->where('photo_id',$id)->delete();
        $result=DB::table('tbl_photo_gallery')->where('user_id',$user_id)->get();
        return view('frontend.pages.new_result')->with('result',$result);
	}
	public function update_password(Request $request){
		$result2 = DB::table('users')->where('id',$request->user_id)->update(['password'=>md5($request->password)]);
		if ($result2) {
		return Redirect::to('logout')->with('exception','Login Again To Continue!!');	
		}else {
			return Redirect::to('edit-profile/'.$request->user_id)->with('error','We Can Not Update The Password Now!!');
		}
	}
	/*--------------------- Logout ------------------*/

	public function logout() {
		Session::put('name', '');
		Session::put('user_id', '');
		Session::put('member_type','');
		Session::put('role','');
        // Session::put('exception','Logout Successful...');  
		return redirect('/');

	}

}

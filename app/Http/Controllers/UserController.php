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

	public function edit_profile($id){
		return view ('frontend.pages.edit_profile');
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
		$cc= count($request->all());
		$loop_count= $cc-2;
		try {
			$data=array();
			$delete_result = DB::table('tbl_photo_gallery')->where('user_id',$request->user_id)->delete();

			for ($i=1; $i <= $loop_count; $i++) { 
				$data['user_id']=$request->user_id;
				$data['created_at']=date('Y-m-d h:i:s');
				           //------------- Start Image Upload Section -------------- //
				$image = $request->file('photo'.$i);
				if($image){
					$file_size   = $image->getClientSize();
					$name        = str_random(20);
					$extension   = $image->getClientOriginalExtension();
					$image_name  = $name.'.'.$extension;
					$upload_path = 'public/user/';
                //-------- Check image format ----------//
					if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg'){
                    //------ Check file size --------//
						if($file_size < 51200000){
							$success = $image->move($upload_path,$image_name);
							$data['photo'] = $image_name;
							$result = DB::table('tbl_photo_gallery')->insert($data);
						}else{
							exit;
							return Redirect::to('edit-profile/'.$request->user_id)->with('error', 'Photo'. $i .'Maximum file size is 50MB');
						}
					}else{
						return Redirect::to('edit-profile/'.$request->user_id)->with('error','Photo'. $i .'File type not supported...!');
					}
				}else{
					return Redirect::to('edit-profile/'.$request->user_id)->with('error','There is no photo to update !!!');
				}
            //------------- End Image Upload Section -------------- //
			}

			if($result){
				return Redirect::to('edit-profile/'.$request->user_id)->with('success','Photo Gallery Added Successfully..');
			}else {
				return Redirect::to('edit-profile/'.$request->user_id)->with('error','There is a error Updating Data!!');
			}

		}
		catch (\Exception $e) {
			$err_message = \Lang::get($e->getMessage());
			return Redirect::to('edit-profile/'.$request->user_id)->with('error', $err_message);
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

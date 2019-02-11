<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
use Illuminate\Support\Facades\Input;
class AdminUserController extends Controller
{
   /*-------------- Add User ---------------*/
    public function addUser()
    {
        $add_user=view('backend.pages.user.add_user');
        return view('backend.master')
                            ->with('content',$add_user);
    }
	/*--------------- Manage User-----------------*/
    public function manageUser()
    {
        $admin=DB::table('users')->get();
        $manage_user=view('backend.pages.user.manage_user')->with('admin',$admin);
        return view('backend.master')
                            ->with('content',$manage_user);
    }

    /*-------------- Save User -----------------------*/

    public function saveUser(Request $request){
        try {
        $data=array();
        $data['name']=$request->user_name;
        $data['email']=$request->user_email;
        $data['password']=md5($request->user_password);
        $data['role']=1;
        $data['status']=$request->status;
        $data['created_at']=date('Y-m-d h:i:s');
        $result=DB::table('users')->insert($data);

        if($result){
            return Redirect::to('manage-user')->with('success','User Added Successfully!!');
        }else {
            return Redirect::to('add-user')->with('error','There is a error Saving Data!!');
        }
        
        }
        catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return Redirect::to('add-user')->with('error', $err_message);
        }
    }

    /*-------------- Unpublish User -------------------*/

    public function unpublishUser($id){
        $unpublish=DB::table('users')->where('id',$id)->update(['status'=>'0']);
        return Redirect::to('manage-user')->with('success','Status Changed Successfully!!');
    }
    /*-------------- Publish User -------------------*/

    public function publishUser($id){
        $unpublish=DB::table('users')->where('id',$id)->update(['status'=>'1']);
        return Redirect::to('manage-user')->with('success','Status Changed Successfully!!');
    }

     /*------------ Delete User -----------------*/
     public function deleteUser($id){
        $result=DB::table('users')->where('id',$id)->update(['status'=>'0']);
                if($result){
                    return Redirect::to('manage-user')->with('success','User Deleted Successfully!!');
                }else {
                    return Redirect::to('manage-user')->with('error','There is a error Deleting Data!!');
                }
     }

    /*------------ Edit User -----------------*/

    public function editUser($id){
        $result=DB::table('users')->where('id',$id)->first();
        return view('backend.pages.user.edit_user')->with('result',$result);
    }

    /*-------------- Update User -----------------------*/

    public function updateUser(Request $request){
        try {
        $data=array();
        $data['name']=$request->user_name;
        $data['email']=$request->user_email;
        $data['role']=$request->role;
        $data['status']=$request->status;
        $data['created_at']=date('Y-m-d h:i:s');
        if ($request->user_password==null) {
        	$data['password']=$request->user_old_password;
        }else {
        	$data['password']=md5($request->user_password);
        }
        $result=DB::table('users')->where('id',$request->admin_id)->update($data);

        if($result){
            return Redirect::to('manage-user')->with('success','User Updated Successfully!!');
        }else {
            return Redirect::to('add-user')->with('error','There is a error Saving Data!!');
        }
        
        }
        catch (\Exception $e) {
            $err_message = \Lang::get($e->getMessage());
            return Redirect::to('add-user')->with('error', $err_message);
        }
    }

    /*------------- change user info ---------------*/
    public function changeUserInfo(){
        $frontend_id = Input::get('frontend_id');
        $admin_name = Input::get('admin_name');
        $email_address = Input::get('email_address');
        $login = Input::get('login');
        $password = Input::get('password');

        if (isset($admin_name)) {
        $result=DB::table('admins')->where('admin_id',$frontend_id)->update(['admin_name'=>$admin_name]);
        echo "Name Updated Successfully!!";
        }
        elseif (isset($email_address)) {
            $result=DB::table('admins')->where('admin_id',$frontend_id)->update(['email_address'=>$email_address]);
            echo "Email Updated Successfully!!";
        }
        // elseif (isset($login)) {
        //  $result=DB::table('admins')->where('admin_id',$frontend_id)->update(['email_address'=>$email_address]);
        // }
        elseif (isset($password)) {
             $result=DB::table('admins')->where('admin_id',$frontend_id)->update(['password'=>md5($password)]);
             echo "Password Updated Successfully!!";
        }

    }
}

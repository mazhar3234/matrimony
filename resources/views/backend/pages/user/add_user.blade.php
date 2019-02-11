@extends('backend.master')
@section('content')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Add User</h1>
 
        </div>
     <!--    <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add User</a></li>
        </ul> -->
      </div>

<div class="row">
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Add New User</h3>
  <h5 style="color: red;font-size: 16px;" class="text-center msg"><?php  if(Session::get('error')){
    echo Session::get('error');
    Session::put('error','');
  } ?></h5>
            <div class="tile-body">
                {!! Form::open(['url' => '/save-user','method'=>'post','role'=>'form','files' => true, 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="user_name" placeholder="User Name">
                </div>
                <div class="form-group">
                    <label>User Email</label>
                    <input type="email" class="form-control" name="user_email" placeholder="User Email">
                </div>
                <div class="form-group">
                    <label>User Password</label>
                    <input type="password" class="form-control" name="user_password" placeholder="User Password">
                </div>
                <div class="form-group">
                    <label>User Status</label>
                    <select class="form-control" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save User</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>





@endsection
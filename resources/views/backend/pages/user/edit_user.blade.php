@extends('backend.master')
@section('content')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Edit User</h1>
 
        </div>
     <!--    <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add User</a></li>
        </ul> -->
      </div>
<div class="row">
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">Edit User</h3>
            <!-- @@@@@@@@@@ Start Messages @@@@@@@@@@@@ -->
            @if(Session::has('error'))
                 <h5 style="color: red;font-size: 16px;" class="text-center msg"><?php  if(Session::get('error')){
    echo Session::get('error');
    Session::put('error','');
  } ?></h5>
            @endif
            <div class="tile-body">
                {!! Form::open(['url' => '/update-user','method'=>'post','role'=>'form','files' => true, 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" value="{{Session::get('admin_id')}}" name="admin_id">
                <input type="hidden" value="{{$result->id}}" name="admin_id">

                <div class="form-group">
                    <label>User Email</label>
                    <input type="email" class="form-control" name="user_email" value="{{$result->email}}">
                </div>
                     <div class="form-group">
                      <label>User Password</label>
                      <input type="password" class="form-control" name="user_password" >
                      <input type="hidden" class="form-control" name="user_old_password" value="{{$result->password}}">
                      <small>If you don't want to change the Password.Leave the field blank.</small>

                  </div>
                <div class="form-group">
                    <label>User Role</label>
                    <select class="form-control" name="role">
                        @if($result->role=='1')
                        <option value="1">Admin</option>
                        <option value="2">Frontend User</option>
                        @else
                        <option value="2">Frontend User</option>
                        <option value="1">Admin</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>User Status</label>
                    <select class="form-control" name="status">
                        @if($result->status=='1')
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                        @else
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                        @endif
                    </select>
                </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<!-- content end -->

@endsection
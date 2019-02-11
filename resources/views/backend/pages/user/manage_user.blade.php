@extends('backend.master')
@section('content')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>User List</h1>
 
        </div>
     <!--    <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add User</a></li>
        </ul> -->
      </div>



<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <!-- @@@@@@@@@@ Start Messages @@@@@@@@@@@@ -->
                @if(Session::has('success'))
                <h5 style="color: green;font-size: 16px;" class="text-center msg"><?php  if(Session::get('success')){
    echo Session::get('success');
    Session::put('success','');
  } ?></h5>
                @elseif(Session::has('error'))
                 <h5 style="color: red;font-size: 16px;" class="text-center msg"><?php  if(Session::get('error')){
    echo Session::get('error');
    Session::put('error','');
  } ?></h5>
                @endif
                <!-- @@@@@@@@@@ End Messages @@@@@@@@@@@@ -->
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admin as $aa)
                        <tr>
                            <td>{{$aa->name}}</td>
                            <td>
                                @if($aa->role=='1')
                                <p>Admin</p>
                                @elseif($aa->role=='2') 
                                <p>Frontend User</p>
                                @endif
                            </td>
                            <td>{{$aa->email}}</td>
                            <td>
                                @if($aa->status=='1')
                                <a <?php if ($aa->role == '2') { ?> href="{{URL::to('unpublish-user-status/'.$aa->id)}}" <?php } ?> href='' class="btn btn-sm btn-success">Active</a>
                                @else
                                <a <?php if ($aa->role == '2') { ?> href="{{URL::to('publish-user-status/'.$aa->id)}}" <?php } ?>  class="btn btn-sm btn-danger" style="color: #fff;">Inactive</a>
                                @endif
                            </td>
                            <td>
                                @if(($aa->role=='2') && $aa->id!=Session::get('admin_id') )
                                <a href="{{URL::to('edit-user/'.$aa->id)}}" class="btn btn-sm btn-success">Edit</a>
                                @if(!$aa->status=='0')
                                <a onclick="return confirm('Are you sure?')" href="{{URL::to('delete-user/'.$aa->id)}}" class="btn btn-sm btn-danger">Delete</a>
                                @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- content end -->

@endsection
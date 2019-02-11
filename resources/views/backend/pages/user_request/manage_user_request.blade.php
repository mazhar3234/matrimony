@extends('backend.master')
@section('content')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>User Request List</h1>
 
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
                            <th>SL No</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Member Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $l=1;?>
                        @foreach($users as $aa)
                        <tr>
                            <td>{{$l++}}</td>
                            <td>{{$aa->name}}</td>
                            <td>{{$aa->phone_number}}</td>
                            <td>{{$aa->email}}</td>
                            <td>
                                 @if($aa->member_type=='1')
                                 Free
                                 @elseif($aa->member_type=='2')
                                 Starter
                                 @elseif($aa->member_type=='3')
                                 Standard
                                 @elseif($aa->member_type=='4')
                                 Pro
                                 @endif
                            </td>
                            <td>

                                <a onclick="return confirm('Are you sure?')" href="{{URL::to('approve-user-request/'.$aa->id)}}" class="btn btn-sm btn-danger">Approve</a>

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
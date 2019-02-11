@extends('frontend.master')
@section('content')
<div class="banner">
  <div class="container">
    <div class="banner_info">
      <h3>Millions of verified Members</h3>
      <a href="{{URL::to('register')}}" class="hvr-shutter-out-horizontal">Register your Profile</a>
    </div>
  </div>
  <div class="profile_search">
    <?php 
$location=DB::table('tbl_divisions')->where('status',1)->get();
$married_status=DB::table('tbl_marital_status')->where('status',1)->get();
$occupation=DB::table('tbl_occupation')->where('status',1)->get();


    ?>
  	<div class="container wrap_1">
	   {!! Form::open(['url' => 'search-partner-list','method'=>'post']) !!} 
	  	<div class="search_top">
		 <div class="inline-block">
		  <label class="gender_1">I am looking for :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select name="sex" required="">
					<option value="">* Select Gender</option>
					<option value="1">Bride</option>
					<option value="2">Groom</option>
				</select>
		   </div>
	    </div>
        <div class="inline-block">
		  <label class="gender_1">Located In :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select name="location" required="">
					<option value="">* Select Location</option>
          @foreach($location as $ll)
					<option value="{{$ll->division_id}}">{{$ll->division_name}}</option>
          @endforeach
               </select>
          </div>
        </div>
        <div class="inline-block">
		  <label class="gender_1">Occupation :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select name="occupation" required="">
          <option value="">* Select Interest</option>
           @foreach($occupation as $oc)
					<option value="{{$oc->occupation_id}}">{{$oc->occupation}}</option>
@endforeach
               </select>
          </div>
       </div>
     </div>
	 <div class="inline-block">
	   <div class="age_box2" style="max-width: 220px;">
	   	<label class="gender_1">Age :</label>
	    <input class="transparent" placeholder="From:" id="min_age" name="min_age" style="width: 34%;" type="number" min="0" required="" >&nbsp;-&nbsp;<input class="transparent" placeholder="To:" name="max_age" style="width: 34%;" type="number" id="max_age" onblur="checkAge()" max="100" required="" >
	   </div>
	 </div>
       <div class="inline-block">
		  <label class="gender_1">Marital Status :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select name="married_status" required="">
					<option value="">* Select Status</option>
          @foreach($married_status as $ms)
					<option value="{{$ms->marital_status_id}}">{{$ms->marital_status}}</option>
          @endforeach

				</select>
		  </div>
	    </div>
		<div class="submit inline-block">
		   <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="Find Matches">
		</div>
     {!! Form::close() !!}
    </div>
  </div> 
</div> 

<!-- ====================== How it works ================ -->
<div class="grid_1">
      <div class="container">
      	<h1>How Matrimony Works</h1>
       	<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
        </div>
<div class="services-section text-center">
		
		
			<div class="">
				<div class="col-md-4 suceess_story-content-info">
					<i class="fa fa-user" aria-hidden="true"></i>
					<h4>Create Your Profile</h4>
					<p>Create your detail profile, add photos and describe your partner preference</p>
				</div>
					<div class="col-md-4 suceess_story-content-info">
					<i class="fa fa-search" aria-hidden="true"></i>
					<h4>Search Your Partner</h4>
					<p>Search your preferred partner by location, education, interest and so on</p>
				</div>
					<div class="col-md-4 suceess_story-content-info">
					<i class="fa fa-comments-o" aria-hidden="true"></i>
					<h4>Start Communication</h4>
					<p>Start communication with suitable profiles by sending message</p>
				</div>

				<div class="clearfix"> </div>
			</div>
	
	</div>

    </div>
</div>

<div class="grid_1">
      <div class="container">
      	<h1>Featured Profiles</h1>
       	<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
        </div>
        <ul id="flexiselDemo3">
	      <li><div class="col_1"><a href="view_profile.html">
			<img style="  -webkit-filter: blur(5px);filter: blur(5px);" src="{{asset('public/frontend_assets/images/1.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
             
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
		  <li><div class="col_1"><a href="view_profile.html">
			<img src="{{asset('public/frontend_assets/images/2.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
             
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
		  <li><div class="col_1"><a href="view_profile.html">
			<img src="{{asset('public/frontend_assets/images/3.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
            
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
		  <li><div class="col_1"><a href="view_profile.html">
			<img src="{{asset('public/frontend_assets/images/4.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
            
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
		  <li><div class="col_1"><a href="view_profile.html">
			<img src="{{asset('public/frontend_assets/images/3.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
            
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
		  <li><div class="col_1"><a href="view_profile.html">
			<img src="{{asset('public/frontend_assets/images/2.jpg')}}" alt="" class="hover-animation image-zoom-in img-responsive"/>
            
             <h3><span class="m_3">Profile ID : MI-387412</span><br>28, Christian, Australia<br>Corporate</h3></a></div>
          </li>
	    </ul>

    </div>
</div>

<!-- ====================== Membership Plan ================ -->
<div class="grid_1">
      <div class="container">
      	<h1>Matrimony Membership Plan</h1>
       	<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
        </div>
	<div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
          <div class="panel text-center price-panel panel-grey">
            <div class="panel-heading">
              <h3>FREE PLAN</h3>
            </div>
            <div class="panel-body">
              <p class="big-lead"><strong>&#x9f3; 0 / month</strong></p>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><i class="fa fa-check text-success"></i> Personal use only</li>
              <li class="list-group-item"><i class="fa fa-check  text-success"></i> Edit Personal Information</li>
              <li class="list-group-item"><i class="fa fa-times  text-danger"></i> Search Partner</li>
              <li class="list-group-item"><i class="fa fa-times  text-danger"></i> Send Message to Partner</li>
              <li class="list-group-item"><i class="fa fa-times  text-danger"></i> Get Phone Number</li>

            </ul>
            <div class="panel-footer">
              <a href="{{URL::to('register')}}" class="btn btn-lg btn-block btn-default">REGISTER NOW!</a>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="panel text-center price-panel panel-blue">
            <div class="panel-heading">
              <h3>STARTER PLAN</h3>
            </div>
            <div class="panel-body">
              <p class="big-lead"><strong>&#x9f3; 1000 / month</strong></p>
            </div>
            <ul class="list-group">
            <li class="list-group-item"><i class="fa fa-check text-success"></i> Personal use only</li>
              <li class="list-group-item"><i class="fa fa-check  text-success"></i> Edit Personal Information</li>
              <li class="list-group-item"><i class="fa fa-check  text-success"></i> Search Partner</li>
              <li class="list-group-item"><i class="fa fa-times  text-danger"></i> Send Message to Partner</li>
              <li class="list-group-item"><i class="fa fa-times  text-danger"></i> Get Phone Number</li>
            </ul>
            <div class="panel-footer">
              <a href="{{URL::to('register')}}" class="btn btn-lg btn-block btn-primary">REGISTER NOW!</a>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="panel text-center price-panel panel-green">
            <div class="panel-heading">
              <h3>STANDARD PLAN</h3>
            </div>
            <div class="panel-body">
              <p class="big-lead"><strong>&#x9f3; 2000 / month</strong></p>
            </div>
            <ul class="list-group">
             <li class="list-group-item"><i class="fa fa-check text-success"></i> Personal use only</li>
              <li class="list-group-item"><i class="fa fa-check  text-success"></i> Edit Personal Information</li>
              <li class="list-group-item"><i class="fa fa-check  text-success"></i> Search Partner</li>
              <li class="list-group-item"><i class="fa fa-check  text-success"></i> Send Message to Partner</li>
              <li class="list-group-item"><i class="fa fa-times  text-danger"></i> Get Phone Number</li>
            </ul>
            <div class="panel-footer">
              <a href="{{URL::to('register')}}" class="btn btn-lg btn-block btn-success">REGISTER NOW!</a>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
          <div class="panel text-center price-panel panel-red">
            <div class="panel-heading">
              <h3>PRO PLAN</h3>
            </div>
            <div class="panel-body">
              <p class="big-lead"><strong>&#x9f3; 3500 / month</strong></p>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><i class="fa fa-check text-success"></i> Personal use only</li>
              <li class="list-group-item"><i class="fa fa-check  text-success"></i> Edit Personal Information</li>
              <li class="list-group-item"><i class="fa fa-check  text-success"></i> Search Partner</li>
              <li class="list-group-item"><i class="fa fa-check  text-success"></i> Send Message to Partner</li>
              <li class="list-group-item"><i class="fa fa-check  text-success"></i> Get Phone Number</li>
            </ul>
            <div class="panel-footer">
              <a href="{{URL::to('register')}}" class="btn btn-lg btn-block btn-danger">REGISTER NOW!</a>
            </div>
          </div>
        </div>
      </div>

    </div>
</div>

@endsection
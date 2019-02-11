@extends('frontend.master')
@section('content')
<style type="text/css">
.table_working_hours tr {
	text-transform: initial;
}
.newsletter input[type="number"] {
    padding: 10px 2%;
    width: 77%;
    margin-right: 10px;
    font-size: 12px;
    max-width: 96%;
    outline: none;
    border: 1px solid #ddd;
    display: inline-block;
}
</style>

<div class="grid_3">
	<div class="container">
		<h3 class="text-center">Search Profile result</h3>
		<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
		</div>
		<div class="profile">
<div class="col-md-8 profile_left">
	<h2>There is No Match Found Related To This Profile ID.</h2>
</div>
			<div class="col-md-4 profile_right">
				<div class="newsletter">
					{!! Form::open(['url' => 'search-profile','method'=>'post']) !!}
						<input type="number" name="profile_id" size="30" required="" placeholder="Enter Profile ID :">
						<input type="submit" value="Go">
					{!! Form::close() !!}
				</div>
				<div class="view_profile">
					<h3>Recent Created Profile</h3>
					@foreach($recent_user as $ru)
					<ul class="profile_item">
						<a href="#">
							<li class="profile_item-img">
								<img src="images/p5.jpg" class="img-responsive" alt=""/>
							</li>
							<li class="profile_item-desc">
								<h4>MAT{{$ru->id}}</h4>
								<p>
									<?php

													$birthDate = date("Y-m-d", strtotime($ru->dob) );
													$today = date("Y-m-d");
													$diff = date_diff(date_create($birthDate), date_create($today));
													echo $age=$diff->format('%y Year');
													?>
								</p>
								<a href="{{URL::to('profile/'.$ru->id)}}">View Full Profile</a>
								<!-- <h5>View Full Profile</h5> -->
							</li>
							<div class="clearfix"> </div>
						</a>
					</ul>
					@endforeach

				</div>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
@endsection
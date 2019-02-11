@extends('frontend.master')
@section('content')
<style type="text/css">
.nav-tabs1 {
	margin-bottom: 10px;
}
.form-control {
	border-radius: 0px !important;
	box-shadow: 0px !important;
	height: 28px !important;
	padding: 0px 5px !important;
	font-size: 14px;
	margin-bottom: 10px;
}
.input-group-addon {
	padding: 6px 12px;
	font-size: 14px;
	font-weight: 400;
	line-height: 1;
	color: #555;
	text-align: center;
	background-color: #eee;
	border: 0px !important; 
	border-radius: 0px !important; 
}
.input-group {
	border:1px solid #ccc;
	margin-bottom: 10px;
}
.datepicker {
	width: 15%;
}
a#profile-tab2,a#profile-tab3 {
	color: #fff;
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
<?php 
$user_info=DB::table('users')->where('id',Session::get('user_id'))->first();
$personal_info=DB::table('tbl_personal_information')
->join('users', 'tbl_personal_information.user_id', '=', 'users.id')
->where('tbl_personal_information.user_id',Session::get('user_id'))
->select('tbl_personal_information.*', 'users.*')
->first();
$family_info=DB::table('tbl_family_details')->where('user_id',Session::get('user_id'))->first();

$partner_info=DB::table('tbl_partner_preference')->where('user_id',Session::get('user_id'))->first();

$user_photo=DB::table('tbl_photo_gallery')->where('user_id',Session::get('user_id'))->get();

$married_status=DB::table('tbl_marital_status')->where('status',1)->get();
$married_status_c=DB::table('tbl_marital_status')->where('status',1)->where('marital_status_id','!=',$personal_info->married_status)->get();

$body_type=DB::table('tbl_body_type')->where('status',1)->get();
$body_type_c=DB::table('tbl_body_type')->where('status',1)->where('body_type_id','!=',$personal_info->body_type)->get();

$divisions=DB::table('tbl_divisions')->where('status',1)->get();
$divisions_c=DB::table('tbl_divisions')->where('status',1)->where('division_id','!=',$personal_info->location)->get();

$language=DB::table('tbl_language')->where('status',1)->get();
$language_c=DB::table('tbl_language')->where('status',1)->where('language_id','!=',$personal_info->mother_tongue)->get();

$blood_group=DB::table('tbl_blood_group')->where('status',1)->get();
$blood_group_c=DB::table('tbl_blood_group')->where('status',1)->where('blood_group_id','!=',$personal_info->blood_group)->get();

$religion=DB::table('tbl_religion')->where('status',1)->get();
$religion_c=DB::table('tbl_religion')->where('status',1)->where('religion_id','!=',$personal_info->religion)->get();

$rassi=DB::table('tbl_rassi')->where('status',1)->get();
$rassi_c=DB::table('tbl_rassi')->where('status',1)->where('rassi_id','!=',$personal_info->rassi)->get();

$education=DB::table('tbl_education_qualification')->where('status',1)->get();
$education_c=DB::table('tbl_education_qualification')->where('status',1)->where('education_qualification_id','!=',$personal_info->education)->get();

$occupation=DB::table('tbl_occupation')->where('status',1)->get();
$occupation_c=DB::table('tbl_occupation')->where('status',1)->where('occupation_id','!=',$personal_info->occupation)->get();
?>

<div class="grid_3">
	<div class="container">
		<h3 class="text-center">{{$user_info->name}} Profile</h3>
		<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
		</div>
		<div class="profile">
			<div class="col-md-8 profile_left">
				<h2>Profile Id : {{1000+Session::get('user_id')}}</h2>
				<!-- @@@@@@@@@@ Start Messages @@@@@@@@@@@@ -->
				@if(Session::has('success'))
				<div class="alert alert-success alert-icon-left" role="alert">

					<div class="float-xs-left">
						<i class="fa fa-check"></i>   <strong>Success !</strong> {{Session::get('success')}}.
					</div>
				</div>
				@elseif(Session::has('error'))
				<div class="alert alert-danger alert-icon-left" role="alert">

					<div class="float-xs-left">
						<i class="fa fa-times-circle"></i>   <strong>Opps !</strong> {{Session::get('error')}}.
					</div>
				</div>
				@endif
				<!-- @@@@@@@@@@ End Messages @@@@@@@@@@@@ -->
				<div class="col_4">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">About Myself</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Family Details</a></li>
							<li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Partner Preference</a></li>
							<li role="presentation"><a href="#profile2" role="tab" id="profile-tab2" data-toggle="tab" aria-controls="profile2">Photo Gallery</a></li>
							<li role="presentation"><a href="#profile3" role="tab" id="profile-tab3" data-toggle="tab" aria-controls="profile3">Reset Password</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								{!! Form::open(['url' => 'update-profile','method'=>'post']) !!}

								<textarea style="width: 100%;" rows="3"  name="personal_details">
									<?php echo $personal_info->personal_details;?>
								</textarea>
								<div class="basic_1">
									<h3>Basics & Lifestyle</h3>

									<input type="hidden" value="{{Session::get('user_id')}}" name="user_id">


									<div class="col-md-6 basic_1-left">

										<table class="table_working_hours">
											<tbody>

												<tr class="opened">
													<td class="day_label">Name :</td>
													<td class="day_value"><input type="text" value="{{$personal_info->name}}" name="name" class="form-control"></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Marital Status :</td>
													<td class="day_value">
														@if($personal_info->married_status)
														<?php 
														$married_status_own=DB::table('tbl_marital_status')->where('marital_status_id',$personal_info->married_status)->first();

														?>
														<select class="form-control" name="married_status">
															
															<option value="{{$married_status_own->marital_status_id}}">{{$married_status_own->marital_status}}</option>
															
															@foreach($married_status_c as $maa)
															<option value="{{$maa->marital_status_id}}">{{$maa->marital_status}}</option>
															@endforeach
														</select>
														@else
														<select class="form-control" name="married_status">
															<option>Please Select</option>

															@foreach($married_status as $ma)
															<option value="{{$ma->marital_status_id}}">{{$ma->marital_status}}</option>
															@endforeach
														</select>
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Body Type :</td>
													<td class="day_value">
														@if($personal_info->body_type)
														<?php 
														$body_type_own=DB::table('tbl_body_type')->where('body_type_id',$personal_info->body_type)->first();

														?>
														<select class="form-control" name="body_type">
															
															<option value="{{$body_type_own->body_type_id}}">{{$body_type_own->body_type}}</option>
															
															@foreach($body_type_c as $baa)
															<option value="{{$baa->body_type_id}}">{{$baa->body_type}}</option>
															@endforeach
														</select>
														@else
														<select class="form-control" name="body_type">
															<option>Please Select</option>

															@foreach($body_type as $ba)
															<option value="{{$ba->body_type_id}}">{{$ba->body_type}}</option>
															@endforeach
														</select>
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Phone :</td>
													<td class="day_value">
														<input type="text" value="{{$personal_info->phone_number}}" name="phone" class="form-control">
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Height (In Cm):</td>
													<td class="day_value">
														<div class="input-group">
															<input type="text" name="height" value="{{$personal_info->height}}" class="form-control">
															<span class="input-group-addon" id="basic-addon2">Cm</span>
														</div>
														
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Date of Birth :</td>
													<td class="day_value closed date"><span>
														<input type="text" name="dob" value="{{$personal_info->dob}}" autocomplete="off" id="datePicker" class="form-control">
													</span></td>
												</tr>

												<tr class="opened">
													<td class="day_label">Drink :</td>
													<td class="day_value closed"><span>
														<select class="form-control" name="drink">
															@if($personal_info->drink=='1')
															<option value="1">Yes</option>
															<option value="0">No</option>
															@elseif ($personal_info->drink=='0')
															<option value="0">No</option>
															<option value="1">Yes</option>
															@else 
															<option>Please Select</option>
															<option value="1">Yes</option>
															<option value="0">No</option>
															@endif
														</select>
													</span>
												</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Location :</td>
												<td class="day_value">
													@if($personal_info->location)
													<?php 
													$location_own=DB::table('tbl_divisions')->where('division_id',$personal_info->location)->first();

													?>
													<select class="form-control" name="location">

														<option value="{{$location_own->division_id}}">{{$location_own->division_name}}</option>

														@foreach($divisions_c as $laa)
														<option value="{{$laa->division_id}}">{{$laa->division_name}}</option>
														@endforeach
													</select>
													@else
													<select class="form-control" name="location">
														<option>Please Select</option>

														@foreach($divisions as $la)
														<option value="{{$la->division_id}}">{{$la->division_name}}</option>
														@endforeach
													</select>
													@endif
												</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Email :</td>
												<td class="day_value">
													<input type="email" value="{{$personal_info->email}}" name="email" class="form-control">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-6 basic_1-left">
									<table class="table_working_hours">
										<tbody>
											<tr class="opened">
												<td class="day_label">Age :</td>
												<td class="day_value">
													<?php

													$birthDate = date("Y-m-d", strtotime($personal_info->dob) );
													$today = date("Y-m-d");
													$diff = date_diff(date_create($birthDate), date_create($today));
													echo $age=$diff->format('%y Year %m Month %d Day');
													?>
												</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Mother Tongue :</td> 
												<td class="day_value">
													@if($personal_info->mother_tongue)
													<?php 
													$language_own=DB::table('tbl_language')->where('language_id',$personal_info->mother_tongue)->first();

													?>
													<select class="form-control" name="mother_tongue">

														<option value="{{$language_own->language_id}}">{{$language_own->language}}</option>

														@foreach($language_c as $laaa)
														<option value="{{$laaa->language_id}}">{{$laaa->language}}</option>
														@endforeach
													</select>
													@else
													<select class="form-control" name="mother_tongue">
														<option>Please Select</option>

														@foreach($language as $lla)
														<option value="{{$lla->language_id}}">{{$lla->language}}</option>
														@endforeach
													</select>
													@endif
												</td>

											</tr>
											<tr class="opened">
												<td class="day_label">Complexion :</td>
												<td class="day_value">
													<select class="form-control" name="complexion">
														@if($personal_info->complexion=='1')
														<option value="1">Yes</option>
														<option value="0">No</option>
														@elseif ($personal_info->complexion=='0')
														<option value="0">No</option>
														<option value="1">Yes</option>
														@else 
														<option>Please Select</option>
														<option value="1">Yes</option>
														<option value="0">No</option>
														@endif
													</select>
												</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Weight :</td>
												<td class="day_value">
													<div class="input-group">
														<input type="text" name="weight" value="{{$personal_info->weight}}" class="form-control">
														<span class="input-group-addon" id="basic-addon2">Kg</span>
													</div>
												</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Blood Group :</td>
												<td class="day_value">
													@if($personal_info->blood_group)
													<?php 
													$blood_group_own=DB::table('tbl_blood_group')->where('blood_group_id',$personal_info->blood_group)->first();

													?>
													<select class="form-control" name="blood_group">

														<option value="{{$blood_group_own->blood_group_id}}">{{$blood_group_own->blood_group}}</option>

														@foreach($blood_group_c as $bgg)
														<option value="{{$bgg->blood_group_id}}">{{$bgg->blood_group}}</option>
														@endforeach
													</select>
													@else
													<select class="form-control" name="blood_group">
														<option>Please Select</option>

														@foreach($blood_group as $bg)
														<option value="{{$bg->blood_group_id}}">{{$bg->blood_group}}</option>
														@endforeach
													</select>
													@endif
												</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Religion :</td>
												<td class="day_value">
													@if($personal_info->religion)
													<?php 
													$religion_own=DB::table('tbl_religion')->where('religion_id',$personal_info->religion)->first();

													?>
													<select class="form-control" name="religion">

														<option value="{{$religion_own->religion_id}}">{{$religion_own->religion_name}}</option>

														@foreach($religion_c as $rgg)
														<option value="{{$rgg->religion_id}}">{{$rgg->religion_name}}</option>
														@endforeach
													</select>
													@else
													<select class="form-control" name="religion">
														<option>Please Select</option>

														@foreach($religion as $rg)
														<option value="{{$rg->religion_id}}">{{$rg->religion_name}}</option>
														@endforeach
													</select>
													@endif
												</td>
											</tr>
											<tr class="closed">
												<td class="day_label">Smoking :</td>
												<td class="day_value closed"><span>
													<select class="form-control">
														@if($personal_info->smoke=='1')
														<option value="1">Yes</option>
														<option value="0">No</option>
														@elseif ($personal_info->smoke=='0')
														<option value="0">No</option>
														<option value="1">Yes</option>
														@else 
														<option>Please Select</option>
														<option value="1">Yes</option>
														<option value="0">No</option>
														@endif
													</select>
												</span>
											</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Raasi :</td>
											<td class="day_value">
												@if($personal_info->rassi)
												<?php 
												$rassi_own=DB::table('tbl_rassi')->where('rassi_id',$personal_info->rassi)->first();

												?>
												<select class="form-control" name="rassi">

													<option value="{{$rassi_own->rassi_id}}">{{$rassi_own->rassi}}</option>

													@foreach($rassi_c as $rss)
													<option value="{{$rss->rassi_id}}">{{$rss->rassi}}</option>
													@endforeach
												</select>
												@else
												<select class="form-control" name="rassi">
													<option>Please Select</option>

													@foreach($rassi as $rs)
													<option value="{{$rs->rassi_id}}">{{$rs->rassi}}</option>
													@endforeach
												</select>
												@endif
											</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Membership :</td>
											<td class="day_value">
												<select class="form-control" name="member_type">
													@if($personal_info->member_type=='1')
													<option value="1">Free</option>
													<option value="2">Starter</option>
													<option value="3">Standard</option>
													<option value="4">Pro</option>
													@elseif ($personal_info->member_type=='2')
													<option value="2">Starter</option>
													<option value="1">Free</option>
													<option value="3">Standard</option>
													<option value="4">Pro</option>
													@elseif ($personal_info->member_type=='3')
													<option value="3">Standard</option>
													<option value="1">Free</option>
													<option value="2">Starter</option>
													<option value="4">Pro</option>
													@elseif ($personal_info->member_type=='4')
													<option value="4">Pro</option>
													<option value="1">Free</option>
													<option value="2">Starter</option>
													<option value="3">Standard</option>
													@else 
													<option value="1">Free</option>
													<option value="2">Starter</option>
													<option value="3">Standard</option>
													<option value="4">Pro</option>
													@endif
												</select>
											</td>
										</tr>
									</tbody>
								</table>

							</div>
							<div class="clearfix"> </div>
						</div>

						<div class=" basic_1 basic_2">
							<h3>Education & Career</h3>
							<div class="col-md-6 basic_1-left">
								<table class="table_working_hours">
									<tbody>
										<tr class="opened">
											<td class="day_label">Education   :</td>
											<td class="day_value">
												@if($personal_info->education)
												<?php 
												$education_own=DB::table('tbl_education_qualification')->where('education_qualification_id',$personal_info->education)->first();

												?>
												<select class="form-control" name="education">

													<option value="{{$education_own->education_qualification_id}}">{{$education_own->education_qualification}}</option>

													@foreach($education_c as $edd)
													<option value="{{$edd->education_qualification_id}}">{{$edd->education_qualification}}</option>
													@endforeach
												</select>
												@else
												<select class="form-control" name="education">
													<option>Please Select</option>

													@foreach($education as $ed)
													<option value="{{$ed->education_qualification_id}}">{{$ed->education_qualification}}</option>
													@endforeach
												</select>
												@endif
											</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Education Detail :</td>
											<td class="day_value">
												<input type="text" value="{{$personal_info->education_details}}" class="form-control" name="education_details">
											</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Occupation   :</td>
											<td class="day_value">
												@if($personal_info->occupation)
												<?php 
												$occupation_own=DB::table('tbl_occupation')->where('occupation_id',$personal_info->occupation)->first();

												?>
												<select class="form-control" name="occupation">

													<option value="{{$occupation_own->occupation_id}}">{{$occupation_own->occupation}}</option>

													@foreach($occupation_c as $occ)
													<option value="{{$occ->occupation_id}}">{{$occ->occupation}}</option>
													@endforeach
												</select>
												@else
												<select class="form-control" name="occupation">
													<option>Please Select</option>

													@foreach($occupation as $oc)
													<option value="{{$oc->occupation_id}}">{{$oc->occupation}}</option>
													@endforeach
												</select>
												@endif
											</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Occupation Detail :</td>
											<td class="day_value closed"><span><input type="text" value="{{$personal_info->occupation_details}}" class="form-control" name="occupation_details"></span></td>
										</tr>
										<tr class="opened">
											<td class="day_label">Annual Income :</td>
											<td class="day_value closed">
												<div class="input-group">
													<input type="text" value="{{$personal_info->annual_income}}" class="form-control" name="annual_income">
													<span class="input-group-addon" id="basic-addon2">BDT</span>
												</div>
											</td>
										</tr>

									</tbody>
								</table>
							</div>
							<div class="col-md-6">
								<input type="submit" value="Update Profile Info" class="btn btn-md btn-success pull-right" name="">
							</div>
							<div class="clearfix"> </div>
						</div>
						{!! Form::close() !!}
					</div>
					<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
						{!! Form::open(['url' => 'update-family-details','method'=>'post']) !!}
						<input type="hidden" value="{{Session::get('user_id')}}" name="user_id">
						<div class="basic_3">
							<h4>Family Details</h4>
							<div class="basic_1 basic_2">
								<h3>Basics</h3>
								<div class="col-md-6 basic_1-left">
									<table class="table_working_hours">
										<tbody>
											<tr class="opened">
												<td class="day_label">Father's Occupation :</td>
												<td class="day_value">
													<input type="text" value="{{$family_info->father_occupation}}" class="form-control" name="father_occupation">
												</td>
											</tr>
											<tr class="opened">
												<td class="day_label">Mother's Occupation :</td>
												<td class="day_value">
													<input type="text" value="{{$family_info->mother_occupation}}" class="form-control" name="mother_occupation">
												</td>
											</tr>
											<tr class="opened">
												<td class="day_label">No. of Brothers :</td>
												<td class="day_value closed"><input type="number" class="form-control" value="{{$family_info->brothers}}" name="brothers"></td>
											</tr>
											<tr class="opened">
												<td class="day_label">No. of Sisters :</td>
												<td class="day_value closed"><input type="number" class="form-control" value="{{$family_info->sisters}}" name="sisters"></td>
											</tr>
										</tbody>
									</table>
									<input type="submit" value="Update Family Details" class="btn btn-md btn-success pull-right" name="">
								</div>
							</div>
						</div>
						{!! Form::close() !!}
					</div>
					<div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
						{!! Form::open(['url' => 'update-partner-preference','method'=>'post']) !!}
						<input type="hidden" value="{{Session::get('user_id')}}" name="user_id">
						<div class="basic_1 basic_2">
							<div class="col-md-8 basic_1-left">
								<table class="table_working_hours">
									<tbody>
										<tr class="opened">
											<td class="day_label">Age Between :</td>
											<td class="day_value">
												<div class="row">

													<div class="col-md-6">
														<input type="text" placeholder="Min Age" value="{{$partner_info->min_age}}" class="form-control" name="min_age">
													</div>
													<div class="col-md-6">
														<input type="text" placeholder="Max Age" value="{{$partner_info->max_age}}" class="form-control" name="max_age">
													</div>

												</div>
											</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Marital Status :</td>													<td class="day_value">
												@if($partner_info->married_status)
												<?php 
												$married_status_own=DB::table('tbl_marital_status')->where('marital_status_id',$personal_info->married_status)->first();

												?>
												<select class="form-control" name="married_status">

													<option value="{{$married_status_own->marital_status_id}}">{{$married_status_own->marital_status}}</option>

													@foreach($married_status_c as $maa)
													<option value="{{$maa->marital_status_id}}">{{$maa->marital_status}}</option>
													@endforeach
												</select>
												@else
												<select class="form-control" name="married_status">
													<option>Please Select</option>

													@foreach($married_status as $ma)
													<option value="{{$ma->marital_status_id}}">{{$ma->marital_status}}</option>
													@endforeach
												</select>
												@endif
											</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Body Type :</td>
											<td class="day_value">
												@if($partner_info->body_type)
												<?php 
												$body_type_own=DB::table('tbl_body_type')->where('body_type_id',$personal_info->body_type)->first();

												?>
												<select class="form-control" name="body_type">

													<option value="{{$body_type_own->body_type_id}}">{{$body_type_own->body_type}}</option>

													@foreach($body_type_c as $baa)
													<option value="{{$baa->body_type_id}}">{{$baa->body_type}}</option>
													@endforeach
												</select>
												@else
												<select class="form-control" name="body_type">
													<option>Please Select</option>

													@foreach($body_type as $ba)
													<option value="{{$ba->body_type_id}}">{{$ba->body_type}}</option>
													@endforeach
												</select>
												@endif
											</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Complexion :</td>
											<td class="day_value">
												<select class="form-control" name="complexion">
													@if($partner_info->complexion=='1')
													<option value="1">Yes</option>
													<option value="0">No</option>
													@elseif ($partner_info->complexion=='0')
													<option value="0">No</option>
													<option value="1">Yes</option>
													@else 
													<option>Please Select</option>
													<option value="1">Yes</option>
													<option value="0">No</option>
													@endif
												</select>
											</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Height(In Cm) :</td>
											<td class="day_value closed">
												<div class="input-group">
													<input type="text" name="height" value="{{$partner_info->height}}" class="form-control">
													<span class="input-group-addon" id="basic-addon2">Cm</span>
												</div>
											</td>
										</tr>

										<tr class="opened">
											<td class="day_label">Smoking :</td>
											<td class="day_value closed"><span>
												<select class="form-control" name="smoking">
													@if($partner_info->smoking=='1')
													<option value="1">Yes</option>
													<option value="0">No</option>
													@elseif ($partner_info->smoking=='0')
													<option value="0">No</option>
													<option value="1">Yes</option>
													@else 
													<option>Please Select</option>
													<option value="1">Yes</option>
													<option value="0">No</option>
													@endif
												</select>
											</span>
										</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Religion :</td>
										<td class="day_value">
											@if($partner_info->religion)
											<?php 
											$religion_own=DB::table('tbl_religion')->where('religion_id',$personal_info->religion)->first();

											?>
											<select class="form-control" name="religion">

												<option value="{{$religion_own->religion_id}}">{{$religion_own->religion_name}}</option>

												@foreach($religion_c as $rgg)
												<option value="{{$rgg->religion_id}}">{{$rgg->religion_name}}</option>
												@endforeach
											</select>
											@else
											<select class="form-control" name="religion">
												<option>Please Select</option>

												@foreach($religion as $rg)
												<option value="{{$rg->religion_id}}">{{$rg->religion_name}}</option>
												@endforeach
											</select>
											@endif
										</td>
									</tr>
									<tr class="opened">
										<td class="day_label">Drink :</td>
										<td class="day_value closed"><span>
											<select class="form-control" name="drink">
												@if($partner_info->drink=='1')
												<option value="1">Yes</option>
												<option value="0">No</option>
												@elseif ($partner_info->drink=='0')
												<option value="0">No</option>
												<option value="1">Yes</option>
												@else 
												<option>Please Select</option>
												<option value="1">Yes</option>
												<option value="0">No</option>
												@endif
											</select>
										</span>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">Mother Tongue :</td>
									<td class="day_value">
										@if($partner_info->mother_tongue)
										<?php 
										$language_own=DB::table('tbl_language')->where('language_id',$personal_info->mother_tongue)->first();

										?>
										<select class="form-control" name="mother_tongue">

											<option value="{{$language_own->language_id}}">{{$language_own->language}}</option>

											@foreach($language_c as $laaa)
											<option value="{{$laaa->language_id}}">{{$laaa->language}}</option>
											@endforeach
										</select>
										@else
										<select class="form-control" name="mother_tongue">
											<option>Please Select</option>

											@foreach($language as $lla)
											<option value="{{$lla->language_id}}">{{$lla->language}}</option>
											@endforeach
										</select>
										@endif
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">Education :</td>
									<td class="day_value">
										@if($partner_info->education)
										<?php 
										$education_own=DB::table('tbl_education_qualification')->where('education_qualification_id',$personal_info->education)->first();

										?>
										<select class="form-control" name="education">

											<option value="{{$education_own->education_qualification_id}}">{{$education_own->education_qualification}}</option>

											@foreach($education_c as $edd)
											<option value="{{$edd->education_qualification_id}}">{{$edd->education_qualification}}</option>
											@endforeach
										</select>
										@else
										<select class="form-control" name="education">
											<option>Please Select</option>

											@foreach($education as $ed)
											<option value="{{$ed->education_qualification_id}}">{{$ed->education_qualification}}</option>
											@endforeach
										</select>
										@endif
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">Occupation :</td>
									<td class="day_value">
										@if($partner_info->occupation)
										<?php 
										$occupation_own=DB::table('tbl_occupation')->where('occupation_id',$personal_info->occupation)->first();

										?>
										<select class="form-control" name="occupation">

											<option value="{{$occupation_own->occupation_id}}">{{$occupation_own->occupation}}</option>

											@foreach($occupation_c as $occ)
											<option value="{{$occ->occupation_id}}">{{$occ->occupation}}</option>
											@endforeach
										</select>
										@else
										<select class="form-control" name="occupation">
											<option>Please Select</option>

											@foreach($occupation as $oc)
											<option value="{{$oc->occupation_id}}">{{$oc->occupation}}</option>
											@endforeach
										</select>
										@endif
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">Location :</td>
									<td class="day_value">
										@if($partner_info->location)
										<?php 
										$location_own=DB::table('tbl_divisions')->where('division_id',$personal_info->location)->first();

										?>
										<select class="form-control" name="location">

											<option value="{{$location_own->division_id}}">{{$location_own->division_name}}</option>

											@foreach($divisions_c as $laa)
											<option value="{{$laa->division_id}}">{{$laa->division_name}}</option>
											@endforeach
										</select>
										@else
										<select class="form-control" name="location">
											<option>Please Select</option>

											@foreach($divisions as $la)
											<option value="{{$la->division_id}}">{{$la->division_name}}</option>
											@endforeach
										</select>
										@endif
									</td>
								</tr>

							</tbody>
						</table>
						<input type="submit" value="Update Partner Preference" class="btn btn-md btn-success pull-right" name="">
					</div>
					{!! Form::close() !!}
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="profile2" aria-labelledby="profile-tab2">



				<?php
				$user_images=DB::table('tbl_photo_gallery')->where('user_id',$personal_info->id)->get();
				$user_permission=DB::table('photo_permission')->where('user_id',$personal_info->id)->first();

				?>
							{!! Form::open(['url' => 'update-photo','method'=>'post','enctype' => 'multipart/form-data']) !!} 
			<input type="hidden" name="user_id" value="{{Session::get('user_id')}}">
			<div style="margin-top: 10px;" class="row input_fields_wrap">
				<div class="col-md-6">
					<div class="col-md-9">
						<input type="file" class="form-control" name="user_image[]">
					</div>
					<div class="col-md-3">
						<a href="javascript:viod(0)" class="btn btn-sm btn-success add_field_button">ADD MORE</a>
					</div>
				</div>

			</div>


			<div id="new_result" class="row">
				@foreach($user_images as $pii)
				<div class="col-md-4">

					<img style="width: 100%;height: 150px;margin-bottom: 5px;" src="{{asset('public/user/'.$pii->photo)}}">
					<ul style="display: inline-flex; padding-left: 15px;" class="list-unstyled list-inline">
						<li>
							<input type="hidden" id="user_id" value="{{Session::get('user_id')}}">
							<a href="javascript:viod(0);" onclick="delete_user_image(<?php echo $pii->photo_id; ?>)" class="btn btn-sm btn-danger">Delete</a>

						</li>

					</ul>

				</div>

				@endforeach
			</div>
			<div style="margin-top: 20px;" class="row">
				<div class="col-md-3">
					<p>Make This Photos </p>

				</div>
				<div class="col-md-3">
					<select class="form-control" name="permission">
						@if($user_permission->permission=='1')
							<option value="1">Public</option>
							<option value="2">Private</option>
							@elseif($user_permission->permission=='2')
							<option value="2">Private</option>
							<option value="1">Public</option>
							@else 
							<option value="1">Public</option>
							<option value="2">Private</option>
							@endif
						</select>
				</div>
				<div class="col-md-6">

					<input type="submit" value="Update Photo" class="btn btn-md btn-success" name="">
				</div>
			</div>

			{!! Form::close() !!}

		</div>
							<div role="tabpanel" class="tab-pane fade" id="profile3" aria-labelledby="profile-tab3">
						{!! Form::open(['url' => 'update-password','method'=>'post']) !!}
						<input type="hidden" value="{{Session::get('user_id')}}" name="user_id">
						<div class="basic_1 basic_2">
							<div class="col-md-8 basic_1-left">
								<table class="table_working_hours">
									<tbody>
										<tr class="opened">
											<td class="day_label">New Password :</td>
											<td class="day_value">
											<input type="password" class="form-control" id="password" name="password" required="">
											</td>
										</tr>
										<tr class="opened">
											<td class="day_label">Retype New Password :</td>		
											<td class="day_value">
												<input type="password" class="form-control" id="c_password" name="c_password" onkeyup="checkPassword();" required="">
												<small id="password_message"></small>
											</td>
										</tr>





							</tbody>
						</table>
						<input type="submit" id="register" value="Update Password" class="btn btn-md btn-success pull-right" name="">
					</div>
					{!! Form::close() !!}
				</div>
			</div>
	</div>
</div>
</div>
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
					@if(count($user_photo)>0)
					<img  class="img-responsive" src="{{asset('public/user/'.$user_photo[0]->photo)}}" />
					@else 
					<img class="img-responsive" src="{{asset('public/frontend_assets/images/photo.png')}}"  />
					@endif
				</li>
				<li class="profile_item-desc">
					<h4>{{1000+$ru->id}}</h4>

					 	@if($ru->sex=='1')
					<p>Male</p>
					@else 
					<p>Female</p>
					@endif
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
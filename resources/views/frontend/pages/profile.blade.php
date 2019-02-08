@extends('frontend.master')
@section('content')
<style type="text/css">
.table_working_hours tr {
	text-transform: initial;
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

?>
<div class="grid_3">
	<div class="container">
		<h3 class="text-center">{{$personal_info->name}} Profile</h3>
		<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
		</div>
		<div class="profile">
			<div class="col-md-8 profile_left">
				<h2>Profile Id : MAT{{$personal_info->id}}</h2>
				<div class="col_3">
					<div class="col-sm-4 row_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="images/p1.jpg">
									<img src="images/p1.jpg" />
								</li>
								<li data-thumb="images/p2.jpg">
									<img src="images/p2.jpg" />
								</li>
								<li data-thumb="images/p3.jpg">
									<img src="images/p3.jpg" />
								</li>
								<li data-thumb="images/p4.jpg">
									<img src="images/p4.jpg" />
								</li>
							</ul>
						</div>
					</div>


					<div class="col-sm-8 row_1">
						<table class="table_working_hours">
							<tbody>
								<tr class="opened_1">
									<td class="day_label">Age :</td>
									<td class="day_value">
										<?php 
										if ($user_info->dob) {

											$birthDate = date("Y-m-d", strtotime($user_info->dob) );
											$today = date("Y-m-d");
											$diff = date_diff(date_create($birthDate), date_create($today));
											echo $age=$diff->format('%y Year %m Month %d Day');
										}else {
											echo "Not Specified";
										}
										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">Last Login :</td>
									<td class="day_value">
										<?php 
										if ($user_info->last_login) {
											$today = date("Y-m-d h:i:s");
											$diff = date_diff(date_create($user_info->last_login), date_create($today));
											echo $age=$diff->format('%h Hours Ago');
										}else {
											echo "Not Specified";
										}


										?>
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">Religion :</td>
									<td class="day_value"> 

										@if($personal_info->religion)
										<?php 
										$religion_own=DB::table('tbl_religion')->where('religion_id',$personal_info->religion)->first();
										echo $religion_own->religion_name;

										?>
										@else 
										Not Specified
										@endif
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">Marital Status :</td>
									<td class="day_value">
										@if($personal_info->married_status)
										<?php 

										$married_status_own=DB::table('tbl_marital_status')->where('marital_status_id',$personal_info->married_status)->first();
										echo $married_status_own->marital_status;

										?>
										@else 
										Not Specified
										@endif
									</td>
								</tr>
								<tr class="opened">
									<td class="day_label">Location :</td>
									<td class="day_value">
										@if($personal_info->location)
										<?php 
										$location_own=DB::table('tbl_divisions')->where('division_id',$personal_info->location)->first();
										echo $location_own->division_name;

										?>
										@else 
										Not Specified
										@endif
									</td>
								</tr>
								<tr class="closed">
									<td class="day_label">Height (In Cm):</td>
									<td class="day_value closed"><span>
										@if($personal_info->height)
										{{$personal_info->height}}
										@else
										Not Specified
										@endif
									</span></td>
								</tr>
								<tr class="closed">
									<td class="day_label">Education :</td>
									<td class="day_value closed"><span>
										@if($personal_info->education)
										<?php 
										$education_own=DB::table('tbl_education_qualification')->where('education_qualification_id',$personal_info->education)->first();
										echo $education_own->education_qualification;

										?>
										@else 
										Not Specified
										@endif
									</span></td>
								</tr>
							</tbody>
						</table>
						@if(!Session::get('user_id'))
						<ul class="login_details">
							<li>Already a member? <a href="{{URL::to('login')}}">Login Now</a></li>
							<li>If not a member? <a href="{{URL::to('register')}}">Register Now</a></li>
						</ul>
						@endif
					</div>
					<div class="clearfix"> </div>
				</div>


				<div class="col_4">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">About Myself</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Family Details</a></li>
							<li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Partner Preference</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
								<div class="tab_box">

									<p><?php echo $personal_info->personal_details;?></p>

								</div>
								<div class="basic_1">
									<h3>Basics & Lifestyle</h3>
									<div class="col-md-6 basic_1-left">
										<table class="table_working_hours">
											<tbody>
												<tr class="opened_1">
													<td class="day_label">Name :</td>
													<td class="day_value">{{$personal_info->name}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Marital Status :</td>
													<td class="day_value">
														@if($personal_info->married_status)
														<?php 

														$married_status_own=DB::table('tbl_marital_status')->where('marital_status_id',$personal_info->married_status)->first();
														echo $married_status_own->marital_status;

														?>
														@else 
														Not Specified
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Body Type :</td>
													<td class="day_value">
														@if($personal_info->body_type)
														<?php 
														$body_type_own=DB::table('tbl_body_type')->where('body_type_id',$personal_info->body_type)->first();
														echo $body_type_own->body_type;

														?>
														@else 
														Not Specified
														@endif

													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Phone :</td>
													<td class="day_value">{{$personal_info->phone_number}}</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Height (In Cm):</td>
													<td class="day_value">
														@if($personal_info->height)
														{{$personal_info->height}}
														@else
														Not Specified
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Date of Birth :</td>
													<td class="day_value closed"><span>
														@if($personal_info->dob)
														{{$personal_info->dob}}
														@else
														Not Specified
														@endif
													</span></td>
												</tr>

												<tr class="opened">
													<td class="day_label">Drink :</td>
													<td class="day_value closed"><span>
														@if($personal_info->drink==1)
														Yes
														@else
														No
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Location :</td>
													<td class="day_value">
														@if($personal_info->location)
														<?php 
														$location_own=DB::table('tbl_divisions')->where('division_id',$personal_info->location)->first();
														echo $location_own->division_name;

														?>
														@else 
														Not Specified
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Email :</td>
													<td class="day_value">
														{{$personal_info->email}}
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-md-6 basic_1-left">
										<table class="table_working_hours">
											<tbody>
												<tr class="opened_1">
													<td class="day_label">Age :</td>
													<td class="day_value"><?php

													$birthDate = date("Y-m-d", strtotime($personal_info->dob) );
													$today = date("Y-m-d");
													$diff = date_diff(date_create($birthDate), date_create($today));
													echo $age=$diff->format('%y Year %m Month %d Day');
													?></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Mother Tongue :</td>
													<td class="day_value">
														@if($personal_info->mother_tongue)
														<?php 
														$language_own=DB::table('tbl_language')->where('language_id',$personal_info->mother_tongue)->first();
														echo $language_own->language;
														?>
														@else 
														Not Specified
														@endif
														
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Complexion :</td>
													<td class="day_value">
														@if($personal_info->complexion==1)
														Yes
														@else 
														No 
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Weight (In Kg):</td>
													<td class="day_value">
														@if($personal_info->weight) 
														{{$personal_info->weight}}
														@else 
														Not Specified
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Blood Group :</td>
													<td class="day_value">
														@if($personal_info->blood_group)
														<?php 
														$blood_group_own=DB::table('tbl_blood_group')->where('blood_group_id',$personal_info->blood_group)->first();
														echo $blood_group_own->blood_group;

														?>
														@else 
														Not Specified
														@endif
													</td>
												</tr>
												<tr class="opened_1">
													<td class="day_label">Religion :</td>
													<td class="day_value">
														@if($personal_info->religion)
														<?php 
														$religion_own=DB::table('tbl_religion')->where('religion_id',$personal_info->religion)->first();
														echo $religion_own->religion_name;

														?>
														@else 
														Not Specified
														@endif
													</td>
												</tr>
												<tr class="closed">
													<td class="day_label">Smoke :</td>
													<td class="day_value closed"><span>
														@if($personal_info->smoke=='1')
														Yes 
														@else 
														No
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Raasi :</td>
													<td class="day_value">
														@if($personal_info->rassi)
														<?php 
														$rassi_own=DB::table('tbl_rassi')->where('rassi_id',$personal_info->rassi)->first();
														echo $personal_info->rassi;

														?>
														@else 
														Not Specified
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Membership :</td>
													<td class="day_value">
														
														@if($personal_info->member_type=='1')
														Free

														@elseif ($personal_info->member_type=='2')
														Starter
														
														@elseif ($personal_info->member_type=='3')
														Standard

														@elseif ($personal_info->member_type=='4')
														Pro

														@endif
														
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="basic_1 basic_2">
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
														echo $education_own->education_qualification;

														?>
														@else 
														Not Specified
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Education Detail :</td>
													<td class="day_value">
														@if($personal_info->education_details)
														{{$personal_info->education_details}}
														@else 
														Not Specified
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Occupation   :</td>
													<td class="day_value">
														@if($personal_info->occupation)
														<?php 
														$occupation_own=DB::table('tbl_occupation')->where('occupation_id',$personal_info->occupation)->first();
														echo $occupation_own->occupation;

														?>
														@else 
														Not Specified
														@endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Occupation Detail :</td>
													<td class="day_value closed"><span>
														@if($personal_info->occupation_details)
														{{$personal_info->occupation_details}}
														@else 
														Not Specified
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Annual Income :</td>
													<td class="day_value closed"><span>

														@if($personal_info->annual_income) 
														BDT. {{$personal_info->annual_income}}
														@else 
														Not Specified
														@endif
													</span></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
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
															@if($family_info->father_occupation)
															{{$family_info->father_occupation}}
															@else 
															Not Specified
															@endif
														</td>
													</tr>
													<tr class="opened">
														<td class="day_label">Mother's Occupation :</td>
														<td class="day_value">
															@if($family_info->mother_occupation)
															{{$family_info->mother_occupation}}
															@else 
															Not Specified
														@endif</td>
													</tr>
													<tr class="opened">
														<td class="day_label">No. of Brothers :</td>
														<td class="day_value closed"><span>
															@if($family_info->brothers)
															{{$family_info->brothers}}
															@else 
															Not Specified
															@endif
														</span></td>
													</tr>
													<tr class="opened">
														<td class="day_label">No. of Sisters :</td>
														<td class="day_value closed"><span>
															@if($family_info->sisters)
															{{$family_info->sisters}}
															@else 
															Not Specified
															@endif
														</span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
								<div class="basic_1 basic_2">
									<div class="basic_1-left">
										<table class="table_working_hours">
											<tbody>
												<tr class="opened">
													<td class="day_label">Age   :</td>
													<td class="day_value">@if($partner_info->min_age){{$partner_info->min_age}}@else Not Specified @endif to @if($partner_info->max_age){{$partner_info->max_age}}@else Not Specified @endif</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Marital Status :</td>
													<td class="day_value">
														@if($partner_info->married_status)
														<?php 
														$married_status_own=DB::table('tbl_marital_status')->where('marital_status_id',$personal_info->married_status)->first();
														echo $married_status_own->marital_status;

														?>
														@else Doesn't Matter @endif
													</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Body Type :</td>
													<td class="day_value closed"><span>
														@if($partner_info->body_type)
														<?php 
														$body_type_own=DB::table('tbl_body_type')->where('body_type_id',$partner_info->body_type)->first();
														echo $body_type_own->body_type;

														?>
														@else 
														Doesn't Matter
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Complexion :</td>
													<td class="day_value closed"><span>

														@if($partner_info->complexion==1)
														Yes
														@else 
														No 
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Height (In Cm) :</td>
													<td class="day_value closed"><span>
														@if($partner_info->height)
														{{$partner_info->height}}
														@else
														Doesn't Matter
														@endif
													</span></td>
												</tr>

												<tr class="opened">
													<td class="day_label">Smoking :</td>
													<td class="day_value closed"><span>
														@if($partner_info->smoking=='1')
														Yes 
														@else 
														No
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Religion :</td>
													<td class="day_value closed"><span>
														
														@if($partner_info->religion)
														<?php 
														$religion_own=DB::table('tbl_religion')->where('religion_id',$personal_info->religion)->first();
														echo $religion_own->religion_name;

														?>
														@else 
														Doesn't Matter
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Drink :</td>
													<td class="day_value closed"><span>
														@if($partner_info->drink==1)
														Yes
														@else
														No
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Mother Tongue :</td>
													<td class="day_value closed"><span>
														@if($partner_info->mother_tongue)
														<?php 
														$language_own=DB::table('tbl_language')->where('language_id',$personal_info->mother_tongue)->first();
														echo $language_own->language;
														?>
														@else 
														Doesn't Matter
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Education :</td>
													<td class="day_value closed"><span>
														@if($partner_info->education)
														<?php 
														$education_own=DB::table('tbl_education_qualification')->where('education_qualification_id',$personal_info->education)->first();
														echo $education_own->education_qualification;

														?>
														@else 
														Doesn't Matter
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Occupation :</td>
													<td class="day_value closed"><span>
														@if($partner_info->occupation)
														<?php 
														$occupation_own=DB::table('tbl_occupation')->where('occupation_id',$personal_info->occupation)->first();
														echo $occupation_own->occupation;

														?>
														@else 
														Doesn't Matter
														@endif
													</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Location :</td>
													<td class="day_value closed"><span>
														@if($partner_info->location)
														<?php 
														$location_own=DB::table('tbl_divisions')->where('division_id',$personal_info->location)->first();
														echo $location_own->division_name;

														?>
														@else 
														Doesn't Matter
														@endif
													</span></td>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 profile_right">
				<div class="newsletter">
					<form>
						<input type="text" name="ne" size="30" required="" placeholder="Enter Profile ID :">
						<input type="submit" value="Go">
					</form>
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
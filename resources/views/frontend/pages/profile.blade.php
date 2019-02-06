@extends('frontend.master')
@section('content')
<?php 
$user_info=DB::table('users')->where('id',Session::get('user_id'))->first();

?>

<div class="grid_3">
	<div class="container">
		<h3 class="text-center">{{Session::get('name')}} Profile</h3>
		<div class="heart-divider">
			<span class="grey-line"></span>
			<i class="fa fa-heart pink-heart"></i>
			<i class="fa fa-heart grey-heart"></i>
			<span class="grey-line"></span>
		</div>
		<div class="profile">
			<div class="col-md-8 profile_left">
				<h2>Profile Id : MAT{{Session::get('user_id')}}</h2>
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
									<td class="day_value"> </td>
								</tr>
								<tr class="opened">
									<td class="day_label">Marital Status :</td>
									<td class="day_value"></td>
								</tr>
								<tr class="opened">
									<td class="day_label">Location :</td>
									<td class="day_value"></td>
								</tr>
								<tr class="closed">
									<td class="day_label">Height :</td>
									<td class="day_value closed"><span></span></td>
								</tr>
								<tr class="closed">
									<td class="day_label">Education :</td>
									<td class="day_value closed"><span></span></td>
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
								
									<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor</p>
								
								</div>
								<div class="basic_1">
									<h3>Basics & Lifestyle</h3>
									<div class="col-md-6 basic_1-left">
										<table class="table_working_hours">
											<tbody>
												<tr class="opened_1">
													<td class="day_label">Name :</td>
													<td class="day_value">Lorem</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Marital Status :</td>
													<td class="day_value">Single</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Body Type :</td>
													<td class="day_value">Average</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Marital Status :</td>
													<td class="day_value">Single</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Height :</td>
													<td class="day_value">28, 5ft 5in / 163cm</td>
												</tr>
													<tr class="opened">
													<td class="day_label">Date of Birth :</td>
													<td class="day_value closed"><span>01-05-1988</span></td>
												</tr>
						
												<tr class="opened">
													<td class="day_label">Drink :</td>
													<td class="day_value closed"><span>No</span></td>
												</tr>
														<tr class="opened">
													<td class="day_label">Location :</td>
													<td class="day_value">Kanya</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-md-6 basic_1-left">
										<table class="table_working_hours">
											<tbody>
												<tr class="opened_1">
													<td class="day_label">Age :</td>
													<td class="day_value">28 Yrs</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Mother Tongue :</td>
													<td class="day_value">Hindi</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Complexion :</td>
													<td class="day_value">Fair</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Weight :</td>
													<td class="day_value">45</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Blood Group :</td>
													<td class="day_value">B+</td>
												</tr>
													<tr class="opened_1">
													<td class="day_label">Religion :</td>
													<td class="day_value">Hindu</td>
												</tr>
												<tr class="closed">
													<td class="day_label">Smoke :</td>
													<td class="day_value closed"><span>No</span></td>
												</tr>
														<tr class="opened">
													<td class="day_label">Raasi :</td>
													<td class="day_value">Kanya</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="basic_1 basic_2">
									<h3>Education & Career</h3>
									<div class="basic_1-left">
										<table class="table_working_hours">
											<tbody>
												<tr class="opened">
													<td class="day_label">Education   :</td>
													<td class="day_value">Engineering</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Education Detail :</td>
													<td class="day_value">Software Engineer</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Occupation   :</td>
													<td class="day_value">Engineering</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Occupation Detail :</td>
													<td class="day_value closed"><span>There are many variations of passages of Lorem Ipsum available</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Annual Income :</td>
													<td class="day_value closed"><span>Rs.5,00,000 - 6,00,000</span></td>
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
														<td class="day_value">Not Specified</td>
													</tr>
													<tr class="opened">
														<td class="day_label">Mother's Occupation :</td>
														<td class="day_value">Not Specified</td>
													</tr>
													<tr class="opened">
														<td class="day_label">No. of Brothers :</td>
														<td class="day_value closed"><span>Not Specified</span></td>
													</tr>
													<tr class="opened">
														<td class="day_label">No. of Sisters :</td>
														<td class="day_value closed"><span>Not Specified</span></td>
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
													<td class="day_value">28 to 35</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Marital Status :</td>
													<td class="day_value">Single</td>
												</tr>
												<tr class="opened">
													<td class="day_label">Body Type :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Complexion :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Height 5ft 9 in / 175cm :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Diet :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Kujadosham / Manglik :</td>
													<td class="day_value closed"><span>No</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Religion :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Caste :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Mother Tongue :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Education :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Occupation :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Country of Residence :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">State :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
												</tr>
												<tr class="opened">
													<td class="day_label">Residency Status :</td>
													<td class="day_value closed"><span>Doesn't matter</span></td>
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
					<h3>View Similar Profiles</h3>
					<ul class="profile_item">
						<a href="#">
							<li class="profile_item-img">
								<img src="images/p5.jpg" class="img-responsive" alt=""/>
							</li>
							<li class="profile_item-desc">
								<h4>2458741</h4>
								<p>29 Yrs, 5Ft 5in Christian</p>
								<h5>View Full Profile</h5>
							</li>
							<div class="clearfix"> </div>
						</a>
					</ul>
					<ul class="profile_item">
						<a href="#">
							<li class="profile_item-img">
								<img src="images/p6.jpg" class="img-responsive" alt=""/>
							</li>
							<li class="profile_item-desc">
								<h4>2458741</h4>
								<p>29 Yrs, 5Ft 5in Christian</p>
								<h5>View Full Profile</h5>
							</li>
							<div class="clearfix"> </div>
						</a>
					</ul>
					<ul class="profile_item">
						<a href="#">
							<li class="profile_item-img">
								<img src="images/p7.jpg" class="img-responsive" alt=""/>
							</li>
							<li class="profile_item-desc">
								<h4>2458741</h4>
								<p>29 Yrs, 5Ft 5in Christian</p>
								<h5>View Full Profile</h5>
							</li>
							<div class="clearfix"> </div>
						</a>
					</ul>
					<ul class="profile_item">
						<a href="#">
							<li class="profile_item-img">
								<img src="images/p8.jpg" class="img-responsive" alt=""/>
							</li>
							<li class="profile_item-desc">
								<h4>2458741</h4>
								<p>29 Yrs, 5Ft 5in Christian</p>
								<h5>View Full Profile</h5>
							</li>
							<div class="clearfix"> </div>
						</a>
					</ul>
				</div>
				<div class="view_profile view_profile1">
					<h3>Members who viewed this profile also viewed</h3>
					<ul class="profile_item">
						<a href="#">
							<li class="profile_item-img">
								<img src="images/p9.jpg" class="img-responsive" alt=""/>
							</li>
							<li class="profile_item-desc">
								<h4>2458741</h4>
								<p>29 Yrs, 5Ft 5in Christian</p>
								<h5>View Full Profile</h5>
							</li>
							<div class="clearfix"> </div>
						</a>
					</ul>
					<ul class="profile_item">
						<a href="#">
							<li class="profile_item-img">
								<img src="images/p10.jpg" class="img-responsive" alt=""/>
							</li>
							<li class="profile_item-desc">
								<h4>2458741</h4>
								<p>29 Yrs, 5Ft 5in Christian</p>
								<h5>View Full Profile</h5>
							</li>
							<div class="clearfix"> </div>
						</a>
					</ul>
					<ul class="profile_item">
						<a href="#">
							<li class="profile_item-img">
								<img src="images/p11.jpg" class="img-responsive" alt=""/>
							</li>
							<li class="profile_item-desc">
								<h4>2458741</h4>
								<p>29 Yrs, 5Ft 5in Christian</p>
								<h5>View Full Profile</h5>
							</li>
							<div class="clearfix"> </div>
						</a>
					</ul>
					<ul class="profile_item">
						<a href="#">
							<li class="profile_item-img">
								<img src="images/p12.jpg" class="img-responsive" alt=""/>
							</li>
							<li class="profile_item-desc">
								<h4>2458741</h4>
								<p>29 Yrs, 5Ft 5in Christian</p>
								<h5>View Full Profile</h5>
							</li>
							<div class="clearfix"> </div>
						</a>
					</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
@endsection
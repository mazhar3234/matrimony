<!DOCTYPE HTML>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Matrimony</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Matrimony" />
<link href="{{asset('public/frontend_assets/css/bootstrap-3.1.1.min.css')}}" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<link href="{{asset('public/frontend_assets/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Oswald:300,400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>

<link href="{{asset('public/frontend_assets/css/font-awesome.css')}}" rel="stylesheet"> 
<body>
	<!-- Preloader -->
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<!-- ============================  Navigation Start =========================== -->
 <div class="navbar navbar-inverse-blue navbar">
    <!--<div class="navbar navbar-inverse-blue navbar-fixed-top">-->
      <div class="navbar-inner">
        <div class="container">
           <div class="navigation">
             <nav id="colorNav">
			   <ul>
				<li class="green">
					<a href="#" class="icon-home"></a>
					<ul>
						<li><a href="login.html">Login</a></li>
					    <li><a href="register.html">Register</a></li>
					    <li><a href="index-2.html">Logout</a></li>
					</ul>
				</li>
			   </ul>
             </nav>
           </div>
           <a class="brand" href="index-2.html"><img src="images/logo.png" alt="logo"></a>
           <div class="pull-right">
          	<nav class="navbar nav_bottom" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header nav_2">
		      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#"></a>
		   </div> 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="index-2.html">Home</a></li>
		            <li><a href="about.html">About</a></li>
		    		<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="matches.html">New Matches</a></li>
		                <li><a href="viewed-profile.html">Who Viewed my Profile</a></li>
		                <li><a href="viewed-not_contacted.html">Viewed & not Contacted</a></li>
		                <li><a href="members.html">Premium Members</a></li>
		                <li><a href="shortlisted.html">Shortlisted Profile</a></li>
		              </ul>
		            </li>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="search.html">Regular Search</a></li>
		                <li><a href="profile.html">Recently Viewed Profiles</a></li>
		                <li><a href="search-id.html">Search By Profile ID</a></li>
		                <li><a href="faq.html">Faq</a></li>
		                <li><a href="shortcodes.html">Shortcodes</a></li>
		              </ul>
		            </li>
		            <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Messages<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="inbox.html">Inbox</a></li>
		                <li><a href="inbox.html">New</a></li>
		                <li><a href="inbox.html">Accepted</a></li>
		                <li><a href="sent.html">Sent</a></li>
		                <li><a href="upgrade.html">Upgrade</a></li>
		              </ul>
		            </li>
		            <li class="last"><a href="contact.html">Contacts</a></li>
		        </ul>
		     </div><!-- /.navbar-collapse -->
		    </nav>
		   </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->
<div class="banner">
  <div class="container">
    <div class="banner_info">
      <h3>Millions of verified Members</h3>
      <a href="view_profile.html" class="hvr-shutter-out-horizontal">Create your Profile</a>
    </div>
  </div>
  <div class="profile_search">
  	<div class="container wrap_1">
	  <form action="#">
	  	<div class="search_top">
		 <div class="inline-block">
		  <label class="gender_1">I am looking for :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select>
					<option value="">* Select Gender</option>
					<option value="Male">Bride</option>
					<option value="Female">Groom</option>
				</select>
		   </div>
	    </div>
        <div class="inline-block">
		  <label class="gender_1">Located In :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select>
					<option value="">* Select State</option>
					<option value="Washington">Washington</option>
					<option value="Texas">Texas</option>
					<option value="Georgia">Georgia</option>
					<option value="Virginia">Virginia</option>
					<option value="Colorado">Colorado</option>
               </select>
          </div>
        </div>
        <div class="inline-block">
		  <label class="gender_1">Interested In :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select><option value="">* Select Interest</option>
					<option value="Sports &amp; Adventure">Sports &amp; Adventure</option>
					<option value="Movies &amp; Entertainment">Movies &amp; Entertainment</option>
					<option value="Arts &amp; Science">Arts &amp; Science</option>
					<option value="Technology">Technology</option>
					<option value="Fashion">Fashion</option>
               </select>
          </div>
       </div>
     </div>
	 <div class="inline-block">
	   <div class="age_box2" style="max-width: 220px;">
	   	<label class="gender_1">Age :</label>
	    <input class="transparent" placeholder="From:" style="width: 34%;" type="text" value="">&nbsp;-&nbsp;<input class="transparent" placeholder="To:" style="width: 34%;" type="text" value="">
	   </div>
	 </div>
       <div class="inline-block">
		  <label class="gender_1">Status :</label>
			<div class="age_box1" style="max-width: 100%; display: inline-block;">
				<select>
					<option value="">* Select Status</option>
					<option value="Single">Single</option>
					<option value="Married">Married</option>
					<option value="In a Relationship">In a Relationship</option>
					<option value="It's Complicated">It's Complicated</option>
				</select>
		  </div>
	    </div>
		<div class="submit inline-block">
		   <input id="submit-btn" class="hvr-wobble-vertical" type="submit" value="Find Matches">
		</div>
     </form>
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
              <a href="#" class="btn btn-lg btn-block btn-default">REGISTER NOW!</a>
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
              <a href="#" class="btn btn-lg btn-block btn-primary">REGISTER NOW!</a>
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
              <a href="#" class="btn btn-lg btn-block btn-success">REGISTER NOW!</a>
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
              <a href="#" class="btn btn-lg btn-block btn-danger">REGISTER NOW!</a>
            </div>
          </div>
        </div>
      </div>

    </div>
</div>
    <div class="bg">
		<div class="container"> 
			<h3>Become a Registered Member</h3>
			<div class="heart-divider">
				<span class="grey-line"></span>
				<i class="fa fa-heart pink-heart"></i>
				<i class="fa fa-heart grey-heart"></i>
				<span class="grey-line"></span>
            </div>
            <div class="col-sm-12">
            	<div class="bg_left">
            		<h5>
            			Matrimony is one of the leading and most trusted matrimony website in Bangladesh. <br>
We are providing the most secure, trusted and reliable platform for all the members to find their preferred life partner.
            		</h5>
            		<h3><a href="#" class="btn btn-md btn-danger">REGISTER NOW</a></h3>
 
            	</div>
            </div>

            <div class="clearfix"> </div>
		</div>
	</div>

    <div class="footer">
    	<div class="container">
    		<div class="col-md-4 col_2">
    			<h4>About Us</h4>
    			<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."</p>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Help & Support</h4>
    			<ul class="footer_links">
    				<li><a href="#">24x7 Live help</a></li>
    				<li><a href="contact.html">Contact us</a></li>
    				<li><a href="#">Feedback</a></li>
    				<li><a href="faq.html">FAQs</a></li>
    			</ul>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Quick Links</h4>
    			<ul class="footer_links">
    				<li><a href="privacy.html">Privacy Policy</a></li>
    				<li><a href="terms.html">Terms and Conditions</a></li>
    				<li><a href="services.html">Services</a></li>
    			</ul>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Social</h4>
    			<ul class="footer_social">
				  <li><a href="#"><i class="fa fa-facebook fa1"> </i></a></li>
				  <li><a href="#"><i class="fa fa-twitter fa1"> </i></a></li>
				  <li><a href="#"><i class="fa fa-google-plus fa1"> </i></a></li>
				  <li><a href="#"><i class="fa fa-youtube fa1"> </i></a></li>
			    </ul>
    		</div>
    		<div class="clearfix"> </div>
    		<div class="copy">
		      <p>Copyright © 2019 Matrimony . All Rights Reserved. </p>
	        </div>
    	</div>
    </div>

    <div class="feedback feedback-toggle rotate">Feedback</div>
<div class="feedback feedback-form-wrapper">
    <form id="feedback-form" class="form-horizontal" method="post">
        <legend>Send Your Valuable Feedback to Us</legend>

		<div class="form-group">
        	<label class="sr-only">Email ID</label>
        	<input name="emailquery" id="emailquery" class="form-control" autocomplete="off" placeholder="Your Email *" required="required" type="email">
        </div>
        <div class="form-group">
            <label class="sr-only">Your Feedback</label>
            <textarea id="issue" name="issue" class="form-control" rows="3" autocomplete="off" placeholder="Write Your Issue *" required="required"></textarea>
        </div>

		
        <div class="form-group">
			<button type="submit" name="sendissuedetails" id="sendissuedetails" class="btn btn-default">Send Feedback</button>
        </div>
    </form>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('public/frontend_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend_assets/js/bootstrap.min.js')}}"></script>
	   <script type="text/javascript" src="{{asset('public/frontend_assets/js/jquery.flexisel.js')}}"></script>
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 4,
				animationSpeed: 1000,
				autoPlay:false,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	   </script>
	   <script type="text/javascript">
	   	$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(350);
});

	   	    // This is the Feedback toggle functionality it slides the feedback form in and out
    // of view when the user clicks the div with the class .feedback-toggle
    $('.feedback-toggle').click( function(){
        var 	left = parseFloat($('.feedback')[0].style.left.match(/[0-9]+/g)) || 50,
                tgl	 = '+=280';
        (left > 50)  ? tgl = '-=280' : tgl = '+=280';
        $('.feedback').animate({ left: tgl}, 500);
    });
	   </script>


</body>
</html>	
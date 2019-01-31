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
<style type="text/css">
	.brand {
		font-size: 30px;
		color: #fff;
	}
	.brand:hover {
		color: #fff;
	}
</style>
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
   <!--         <div class="navigation">
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
           </div> -->
           <a class="brand" href="{{URL::to('/')}}">Matrimony</a>
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
		            <li><a href="{{URL::to('/')}}">Home</a></li>
		            <li><a href="{{URL::to('search-partner')}}">Search Partner</a></li>
		            <li><a href="{{URL::to('register')}}">Register Your Profile</a></li>
		            <li><a href="{{URL::to('login')}}">Login</a></li>
		            <li class="last"><a href="{{URL::to('contact-us')}}">Contact Us</a></li>
		        </ul>
		     </div><!-- /.navbar-collapse -->
		    </nav>
		   </div> <!-- end pull-right -->
          <div class="clearfix"> </div>
        </div> <!-- end container -->
      </div> <!-- end navbar-inner -->
    </div> <!-- end navbar-inverse-blue -->
<!-- ============================  Navigation End ============================ -->
@yield('content')
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
            		<h3><a href="{{URL::to('register')}}" class="btn btn-md btn-danger">REGISTER NOW</a></h3>
 
            	</div>
            </div>

            <div class="clearfix"> </div>
		</div>
	</div>

    <div class="footer">
    	<div class="container">
    		<div class="col-md-4 col_2">
    			<h4>About Us</h4>
    			<p>Matrimony is one of the largest & secured online Matrimonial Site in Bangladesh.We believe in providing a secure, easy to use and convenient matrimonial matchmaking experience to all of our members.</p>
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
<script type="text/javascript">
    $('.alert').delay(3000).slideUp(1000);
    $('.msg').delay(3000).slideUp(1000);

</script>

</body>
</html>	
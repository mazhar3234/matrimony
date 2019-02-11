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
<link href="{{asset('public/frontend_assets/css/lightslider.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/frontend_assets/css/style.css')}}" rel='stylesheet' type='text/css' />

	    <!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
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
		            <li class="last"><a href="{{URL::to('contact-us')}}">Contact Us</a></li>
		            @if(!Session::get('user_id'))
		            <li><a href="{{URL::to('register')}}">Register Your Profile</a></li>
		            <li><a href="{{URL::to('login')}}">Login</a></li>
		            @else 
		            <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Session::get('name')}}<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		                <li><a href="{{URL::to('profile')}}">My Profile</a></li>
		                <li><a href="{{URL::to('edit-profile/'.Session::get('user_id'))}}">Edit Profile</a></li>
		                <li><a href="{{URL::to('inbox')}}">Inbox</a></li>
		                <li><a href="{{URL::to('sendbox')}}">Send Box</a></li>
		                <li><a href="{{URL::to('logout')}}">Logout</a></li>
		              </ul>
		            </li>
		            @endif
		            
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
    				<li><a href="{{URL::to('contact-us')}}">Contact us</a></li>
    				<li><a href="#">Feedback</a></li>
    				<li><a href="#">FAQs</a></li>
    			</ul>
    		</div>
    		<div class="col-md-2 col_2">
    			<h4>Quick Links</h4>
    			<ul class="footer_links">
    				<li><a href="#">Privacy Policy</a></li>
    				<li><a href="#">Terms and Conditions</a></li>
    				<li><a href="#">Services</a></li>
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
	 {!! Form::open(['url' => 'save-feedback','method'=>'post','class'=>'form-horizontal']) !!}
        <legend>Send Your Valuable Feedback to Us</legend>

		<div class="form-group">
        	<label class="sr-only">Email ID</label>
        	<input  id="emailquery" name="email" class="form-control" autocomplete="off" placeholder="Your Email *" required="required" type="email">
        </div>
        <div class="form-group">
            <label class="sr-only">Your Feedback</label>
            <textarea id="issue" class="form-control" name="message" rows="3" autocomplete="off" placeholder="Write Your Issue *" required="required"></textarea>
        </div>

		
        <div class="form-group">
			<button type="submit" name="sendissuedetails" id="sendissuedetails" class="btn btn-default">Send Feedback</button>
        </div>
      {!! Form::close() !!}
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('public/frontend_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend_assets/js/lightslider.js')}}"></script>
    <script>
         $(document).ready(function() {

            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:5,
                slideMargin: 0,
                speed:800,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
        });
    </script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
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
    $('.alert').delay(3000).fadeOut(1000);
    $('.msg').delay(3000).fadeOut(1000);

</script>

<script>
    $('#datePicker')
        .datepicker({
            format: 'mm/dd/yyyy'
        });
        function checkPassword(){
        	var pass=$("#password").val();
        	var cpass=$("#c_password").val();
        	if (pass != cpass) {
        		$("#password_message").html("Password Does Not Match.");
        		$("#register").prop('disabled',true);
        	}else if (pass == cpass) {
        	$("#password_message").html("");
        	$("#register").prop('disabled',false);	
        	}
        }
</script>
<script type="text/javascript">
	document.getElementById("files1").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {

        // get loaded data and render thumbnail.
        document.getElementById("image1").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
	document.getElementById("files2").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image2").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
	document.getElementById("files3").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image3").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
	document.getElementById("files4").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image4").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
	document.getElementById("files5").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image5").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>
            <script type="text/javascript">
              $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div style="margin:7px 0px;;display:inline-block;" class="col-md-6"> <input style="display:inline-block;" type="file" class="form-control col-md-9" name="user_image[]"/><a style="font-size:12px;text-decoration:none;" href="#" class="remove_field btn btn-sm btn-danger col-md-3">REMOVE</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

                function delete_user_image(id){
    // alert(id);
    // alert($("#user_id").val());
    var user_id=$("#user_id").val();
          $.ajax({
    url: "{{URL::to('delete-user-image')}}",
    type: "get",
    data: {id:id,user_id:user_id},
    success: function(data){

$("#new_result").html(data);
    }
}); 
  }
  function checkAge(){
     var min_age=$("#min_age").val();
     var max_age=$("#max_age").val();
     if (max_age<min_age) {
        alert('Max Age Must Be Lower Than Min Age');
     }
  }
            </script>

</body>
</html>	
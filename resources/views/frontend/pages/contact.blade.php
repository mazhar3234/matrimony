@extends('frontend.master')
@section('content')
<style type="text/css">
/*---------- Login ------------- */
.grid_1 {
  padding: 0px 0px;
}
.pb-4 {
  padding-left: 15px;
}

ul li {
  color: #fff;
  /*text-align: center;*/
  line-height: 27px;
}
.login-form-1{
  padding: 75px 50px;
  /* background:#282726;*/
  /*box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);*/
}
.login-form-1 h2,.login-form-1 p{
  text-align: center;
  color:#000;
}
.login-form-2{
  padding: 30px 0px;
  /*background: #da284e;*/
  /*box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);*/
}
.login-form-2 h1{
  text-align: center;
  color: #000;
}
.btnSubmit{
  font-weight: 600;
  width: 50%;
  color: #282726;
  background-color: #fff;
  border: none;
  border-radius: 1.5rem;
  padding:2%;
}
.btnForgetPwd{
  color: #fff;
  font-weight: 600;
  text-decoration: none;
}
.btnForgetPwd:hover{
  text-decoration:none;
  color:#fff;
}
</style>
<!-- ====================== How it works ================ -->
<div class="grid_1">
  <div class="container-fluid">

   <div class="row">
    <div class="col-md-5 login-form-1">
      <div class="card-body register-card">
        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%;display: block;margin: 0 auto;">
        <h2 class="py-3">Contact Us</h2>
        <p>Matrimony is one of the largest & secured online Matrimonial Site in Bangladesh.We believe in providing a secure, easy to use and convenient matrimonial matchmaking experience to all of our members.

        </p>
        <ul>
          <li>Email : matrimony@yahoo.com</li>
          <li>Phone : +8801314 987654</li>
          <li>Address : Rupnagar,Mirpur,Dhaka-1216.</li>
        </ul>
      </div>
      
    </div>
    <div class="col-md-7 login-form-2">
      
      <h1>Contact to Matrimony</h1>
      <div class="heart-divider">
        <span class="grey-line"></span>
        <i class="fa fa-heart pink-heart"></i>
        <i class="fa fa-heart grey-heart"></i>
        <span class="grey-line"></span>
      </div>
      <h4 class="pb-4 text-center">Feel free to contact us.</h4>
      
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
      
      {!! Form::open(['url' => 'save-contact','method'=>'post']) !!}
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Full Name <sup>*</sup> </label>
          <input  name="name" placeholder="Full Name" class="form-control" type="text" required="">
        </div>
        <div class="form-group col-md-6">
          <label>Email <sup>*</sup> </label>
          <input  name="email" placeholder="Your Email" class="form-control" required="required" type="email">
        </div>
        
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>Message <sup>*</sup></label>
          <textarea class="form-control" rows="5" name="message" placeholder="Enter Your Message" required=""></textarea>
        </div>
      </div>
      <div class="form-row">
       <div class="form-group pb-4 col-md-2">
        <button type="submit" class="btn btn-success">Send Message</button>
        
      </div>
      
    </div>
    {!! Form::close() !!}
    
  </div>
</div>

</div>
</div>


@endsection
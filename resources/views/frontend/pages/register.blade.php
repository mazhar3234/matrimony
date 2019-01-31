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
/*label {
  color: #f9e2e2;
}*/
.login-form-1{
    padding: 194px 50px;
/*    background:#282726;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);*/
}
.login-form-1 h2,.login-form-1 p{
    text-align: center;
    color:#000;
}
.login-form-2{
    padding: 30px 0px;
/*    background: #da284e;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);*/
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
                        <h2 class="py-3">Register</h2>
                        <p>Matrimony is one of the largest & secured online Matrimonial Site in Bangladesh.We believe in providing a secure, easy to use and convenient matrimonial matchmaking experience to all of our members.

</p>
                    </div>
                    
                </div>
                <div class="col-md-7 login-form-2">
                  
                            <h1>Register to Matrimony</h1>
        <div class="heart-divider">
      <span class="grey-line"></span>
      <i class="fa fa-heart pink-heart"></i>
      <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
        </div>
                        <h4 class="pb-4">Please fill with your details. (*) is required</h4>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Full Name <sup>*</sup> </label>
                          <input id="Full Name" name="Full Name" placeholder="Full Name" class="form-control" type="text">
                        </div>
                          <div class="form-group col-md-6">
                            <label>Date of Birth <sup>*</sup> </label>
                            <input id="Mobile No." name="Mobile No." placeholder="Mobile No." class="form-control" required="required" type="text">
                        </div>
                      
                      </div>
                    <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Email <sup>*</sup></label>
                          <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                          <small>Please Provide valid Email,It will be used as your contact</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Mobile Number <sup>*</sup> </label>
                            <input id="Mobile No." name="Mobile No." placeholder="Mobile No." class="form-control" required="required" type="text">
                            <small>Please Provide valid Number,It will be used as your contact</small>
                        </div>
                
                       
                    </div>
                                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Password <sup>*</sup></label>
                          <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                          
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirm Password <sup>*</sup> </label>
                            <input id="Mobile No." name="Mobile No." placeholder="Mobile No." class="form-control" required="required" type="text">
                           
                        </div>
                
                       
                    </div>
                                        <div class="form-row">
                      
                        <div class="form-group col-md-6">
                            <label>Sex <sup>*</sup> </label>
                       <div class="radios">
                        <label for="radio-01" class="label_radio">
                            <input type="radio" checked=""> Male
                        </label>
                        <label for="radio-02" class="label_radio">
                            <input type="radio"> Female
                        </label>
                    </div>
                    
                       
                    </div>
                            <div class="form-group col-md-6">
                                 <label>Membership Plan</label> 
                                  <select id="inputState" class="form-control">
                                    <option selected>Choose ...</option>
                                    <option> New Buyer</option>
                                    <option> Auction</option>
                                    <option> Complaint</option>
                                    <option> Feedback</option>
                                  </select>
                                  <small>You will be charged as the membership policy</small>
                        </div>
                </div>
                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-check pb-4">
                                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                  <label class="form-check-label" for="invalidCheck2">
                                    <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                  </label>
                                </div>
                              </div>
                    
                          </div>
                    </div>
                    
                    <div class="form-row">
                         <div class="form-group pb-4 col-md-2">
                        <button type="button" class="btn btn-success">Register Profile</button>
                        
                    </div>
                     <div class="form-group col-md-6">
                        <p>Already a member? <a href="{{URL::to('login')}}">Sign In</a></p>
                     </div>
                    </div>
                </form>
                
                </div>
            </div>

    </div>
</div>


@endsection
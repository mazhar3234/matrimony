@extends('frontend.master')
@section('content')
<style type="text/css">
  /*---------- Login ------------- */
.grid_1 {
  padding: 0px 0px;
}
.login-form-1{
    padding: 138px 50px;
/*    background:#282726;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);*/
}
.login-form-1 h2,.login-form-1 p{
    text-align: center;
    color:#000;
}
.login-form-2{
    padding: 9%;
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
                <div class="col-md-6 login-form-1">
                                        <div class="card-body register-card">
                        <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%;display: block;margin: 0 auto;">
                        <h2 class="py-3">Sign In</h2>
                        <p>Matrimony is one of the largest & secured online Matrimonial Site in Bangladesh.We believe in providing a secure, easy to use and convenient matrimonial matchmaking experience to all of our members.

</p>
                    </div>
                    
                </div>
                <div class="col-md-6 login-form-2">
                  
                            <h1>Sign In to Matrimony</h1>
        <div class="heart-divider">
      <span class="grey-line"></span>
      <i class="fa fa-heart pink-heart"></i>
      <i class="fa fa-heart grey-heart"></i>
      <span class="grey-line"></span>
        </div>
     <h4 class="msg" align="center" style="color: red">
                        <?php
                        $exception = Session::get('exception');
                        if (isset($exception)) {
                            echo $exception;
                            Session::put('exception', '');
                        }
                        ?>
                    </h4>
         {!! Form::open(['url' => 'check-login','method'=>'post']) !!}
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email *" required="" name="email" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" required=""  name="password" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-md btn-success" value="Sign In to Profile" />
                        </div>
                        <div class="form-group">

                            <a href="#" class="btnForgetPwd" value="Login">Forget Password?</a>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>

    </div>
</div>


@endsection
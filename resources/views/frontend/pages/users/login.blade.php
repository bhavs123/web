@extends('frontend.layouts.default')
@section('content')
<div class="dt-sc-margin100"></div> 
<div class="full-width-section">
    <div class="container">
        <div class="page_info"> 
            <h3 class="aligncenter"> <span> <i class="fa fa-user"></i></span>
                Account - Member Login </h3>
        </div>
        <div class="dt-sc-margin20"></div>
    </div>
</div>  
<div style="background-position: 50% 136px;" class="full-width-section parallax full-section-bg">
    <div class="container">
        <div class="dt-sc-clear"></div>                            
        <div class="form-wrapper login">
            <p style="color:red; alignment-adjust: central" ><b>{{ Session::get("invalidUser") }}</b></p>
            <form novalidate="novalidate" method="post" id="loginform" name="userLogin" action="{{ route('checkLogin')}}">
                <p>
                    <input placeholder="Email" id="email" name="email" ng-model="email" autocomplete="off" type="text" required>
                    <span style="color:red" ng-show="userLogin.email.$dirty && userLogin.email.$error.required">Email is required.</span>
                </p>

                <p>
                    <input placeholder="Password" id="password" name="password" ng-model="password"  type="password" required>
                    <span style="color:red" ng-show="userLogin.password.$dirty && userLogin.password.$error.required">Email is required.</span>
                </p>

                <label><input value="forever" id="rememberme" name="rememberme" type="checkbox"> Remember Me</label>
                <input class="submit" value="Log-In" type="submit" ng-disabled='userLogin.$invalid'>    
            </form>   
        </div>
    </div>
</div>

<div class="full-width-section">  
    <div class="container"> 
        <div class="dt-sc-margin70"></div>
        <div class="page_info aligncenter">
            <h4 class="title">Need help logging-in?</h4>
            <p>If you don't have an account yet, <a href="register.php" title="">Register here</a> and get started.. </p>
            <p>Lost or Forgot your password? You can change it with <a href="#" title="">Reset Password</a> here.. </p>
        </div>
    </div>
</div>
<div class="dt-sc-margin100"></div> 

@endsection
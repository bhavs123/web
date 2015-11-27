@extends('frontend.layouts.default')
@section('content')
<div class="dt-sc-margin100"></div> 
<div class="full-width-section">
    <div class="container">
        <div class="page_info"> 
            <h3 class="aligncenter"> <span> <i class="fa fa-user"></i></span>
                Member Registration </h3>
        </div>
        <div class="dt-sc-margin20"></div>
    </div>
</div>  
<div style="background-position: 50% 68px;" class="full-width-section parallax full-section-bg">
    <div class="container">
        <div class="dt-sc-clear"></div>                            
        <div class="form-wrapper register" ng-app="app">
            <form  method="post" id="reg_form" name="newRegister" action="{{ route('saveCustomer')}}" novalidate><!--  -->
                <input type="text" name="register_home" value="register_home">
                
                <p class="dt-sc-one-half column first" >
                    <input placeholder="First Name *" id="first_name" name="first_name" type="text" ng-model="first_name" required>
                    <span style="color:red" ng-show="newRegister.first_name.$dirty && newRegister.first_name.$error.required">First Name is required.</span>
                </p>

                <p class="dt-sc-one-half column">
                    <input placeholder="Last Name *" id="last_name" name="last_name" type="text"  ng-model="last_name" required>
                    <span style="color:red" ng-show="newRegister.last_name.$dirty && newRegister.last_name.$error.required">First Name is required.</span>
                </p>

                <p class="dt-sc-one-half column first">
                    <input placeholder="Email Address *" id="email_link" name="email" type="email" ng-model="user.email" unique-email="{key: 'users', property: 'email'}" required>
                    <span style="color:red" ng-show="newRegister.email.$dirty && newRegister.email.$error.required">Email is required.</span>
                    <span style="color:red" ng-show="newRegister.email.$dirty && newRegister.email.$error.unique">Email is already taken.</span>
                    <span style="color:red" id="uniqueEmail"></span> 
                </p>

                <p class="dt-sc-one-half column">
                    <input placeholder="Mobile Number *" id="contact_no" name="contact_no" type="text" ng-pattern="/^[\d\-\+\s/\,]+$/" ng-model="contact_no" required> 
                    <span style="color:red"  ng-show="newRegister.contact_no.$dirty && newRegister.contact_no.$error.required">Mobile Number is required.</span>
                    <span style="color:red" ng-show="newRegister.contact_no.$dirty && newRegister.contact_no.$error.pattern">Invalid Mobile Number.</span>
                </p>

                <p class="dt-sc-one-half column first">
                    <input placeholder="Password *" id="password" name="password"  type="password" ng-model="password" required>
                    <span style="color:red" ng-show="newRegister.password.$dirty && newRegister.password.$error.required">User Password is required.</span>
                </p>


                <p class="dt-sc-one-half column"> <input placeholder="Confirm Password *" id="password" name="cpassword"  type="password"  required></p>


                <p class="dt-sc-one-half column first">
                    <select name="country" id="country"  tabindex="13" readonly="true" >
                        <option value="">Please select country </option>
                        @foreach($country as $cval)
                        <option value="{{ $cval['id']}}">{{ $cval['name']}}</option>
                        @endforeach

                    </select>
                </p> 


                <p class="dt-sc-one-half column">
                    <select name="state" id="state" tabindex="13" readonly="true" >
                        <option value="">Please select state </option>
                        @foreach($state as $sval)
                        <option value="{{ $sval['id']}}">{{ $sval['name']}}</option>
                        @endforeach

                    </select>
                </p> 
                <p class="dt-sc-one-half column first ">
                    <input class=" "  name="location" id="location" Placeholder="Address Line 3"   autocomplete="off" type="text">
                </p> 
                <p class="dt-sc-one-half column ">
                    <input class=" "  name="alternate_no" Placeholder="Alternate Number" ng-pattern="/^[\d\-\+\s/\,]+$/" ng-model="alternate_no"  type="text">
                    <span style="color:red"  ng-show="newRegister.alternate_no.$dirty && newRegister.alternate_no.$error.required"> Number is required.</span>
                    <span style="color:red" ng-show="newRegister.alternate_no.$dirty && newRegister.alternate_no.$error.pattern">Invalid  Number.</span>
                </p> 



                <p class="dt-sc-one-half column  first">
                    <input class=" "  name=" " Placeholder="Landmark *"    autocomplete="off" type="text">
                </p> 
                <p class="dt-sc-one-half column  ">
                    <input class=" "  name=" " Placeholder="Pin Code * "  autocomplete="off" type="text">
                </p> 

                <p class="dt-sc-one-half column  first">
                    <select class=" " tabindex="13" readonly="true" id="city" name="city">
                        <option value="Mumbai">Mumbai</option>
                    </select>
                </p>
                <p class="dt-sc-one-half column"  required="required">
                    <select class="" tabindex="15" readonly="true" id="pref_method_of_contact" name="pref_method_of_contact">
                        <option value="0">Please select</option>
                        <option value="either" selected="selected">Either (Mobile/Email)</option>
                        <option value="mobile">Mobile</option>
                        <option value="email">Email</option>
                    </select>
                </p>
                <div class="dt-sc-margin20"></div>

                <div class=" "> 
                    <input tabindex="19" name="terms" required="true" class="h22" style="margin-right: 4px;" type="checkbox"> I agree to the <a href="terms.php">Terms of Service </a>
                    <div id="terms_validate" style="color:red;"></div>                         

                </div>                



                <input class="button" value="Create an Account" type="submit" ng-disabled='newRegister.$invalid'>     
            </form>   
        </div>
    </div>
</div>
@endsection
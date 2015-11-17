@extends('frontend.layouts.default')
@section('content')

<!-- **Main - Starts** --> 
<div id="main">
    <div class="parallax full-width-bg">
        <div class="container">
            <div class="main-title">
                <h1>Shopping Cart</h1>
                <div class="breadcrumb">
                    <a href="{{ URL::route('home') }}">Home</a>
                    <span class="fa fa-angle-right"></span>
                    <span class="current">Shipping</span>
                </div>
            </div>
        </div>
    </div>

    <div class="dt-sc-margin100"></div>  
    <div class="container">

        <div class="process_bar flight">
            <div class="one_pb1"> <span class="circle">1</span> <!--i class="fa fa-shopping-cart"></i--> Cart </div>
            <div class="one_pb2"> <span class="circle active">2</span> <!--i class="fa fa-truck"></i--> Shipping </div>
            <div class="one_pb3"> <span class="circle">3</span> <!--i class="fa fa-money"></i--> Payment </div>
            <hr>
        </div>

    </div>
    <div class="dt-sc-margin15"></div>   
    <?php
    if (empty(Session::get('loggedinUserId'))) {
        ?>
     <div class="container">
            <!-- **primary - Starts** --> 
            <section id="primary" class="content-full-width">
                <!-- **woocommerce - Starts** --> 
                <div class="woocommerce">
        <div style="float:center;"> 
            <a href="javascript:void(0);" class="dt-sc-button smallwidth" id="have-account" style="margin-right:10px;"> Login</a>
            <a href="javascript:void(0);" class="dt-sc-button smallwidth" id="no-account"> Register </a>
        </div>
                    <div style="float:center;">
                        
                        <div class="form-wrapper login hide" id="member-account" >
                            <p style="color:red; alignment-adjust: central" ><b>{{ Session::get("invalidUser") }}</b></p>
                            <form novalidate="novalidate" method="post" id="loginform" name="userLogin" action="{{ route('checkLogin') }}">
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
                        <div class="form-wrapper register hide" ng-app="app" id="new-account">
                            <form  method="post" id="reg_form" name="newRegister" action="{{ route('saveCustomer') }}" novalidate><!--  -->
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
                                        <option value="{{ $cval['id'] }}">{{ $cval['name'] }}</option>
                                        @endforeach
                                                               
                                    </select>
                                </p> 


                                <p class="dt-sc-one-half column">
                              <select name="state" id="state" tabindex="13" readonly="true" >
                                        <option value="">Please select state </option>
                                        @foreach($state as $sval)
                                        <option value="{{ $sval['id'] }}">{{ $sval['name'] }}</option>
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
            </section>
     </div>
    <?php } else {
        
        
        
        ?> 
    
    
        <!-- **container - Ends** --> 

        <div class="dt-sc-margin15"></div>    
        <!-- Container starts-->
        <div class="container">
            <!-- **primary - Starts** --> 
            <section id="primary" class="content-full-width">
                <?php 
                // echo "<pre>";
                // print_r($addresses); 
                // echo "</pre>";
                 if($addresses){
                ?>
                <div class="woocommerce">
                <div class="dt-sc-margin50"></div>
                <h3 id="order_review_heading">Delivery Address</h3>
                <div class="dt-sc-pricing-table">
                        <!-- **dt-sc-pr-tb-col - Starts** -->
                        @foreach($addresses as $address)
                         <div class="column dt-sc-one-fourth ">
                             <form action="{{ URL::route('paymentPage')}}" method="post">
                                 <input type="hidden" name="addressId" value="{{ $address->id }}">
                        <div class="dt-sc-pr-tb-col">
                            <!-- **dt-sc-tb-header - Starts** -->
                            <div class="dt-sc-tb-header">
                                <div class="dt-sc-tb-title" style="height: 30px;">
                                    <div class="editdeletebtn" style="float:right;margin-right: 10px;margin-top: 5px;">
                                        <span>
                                            <a href="javascript:void(0);" id="editAddress_{{ $address->id }}" class="formedit editAddress" style="text-decoration:none;"><i class="fa fa-edit" style="margin-right:10px; font-size: 15px;"></i></a>
                                            <a href="javascript:void(0);" id="deleteAddress_{{ $address->id }}"  class="deleteAddress" style="text-decoration:none;"><i class="fa fa-trash-o" style="font-size: 16px;"></i></a>
                                        </span></div> 
                                </div>
                                <!-- **dt-sc-tb-title - Starts** -->
                                <div class="dt-sc-price">

                                    <h2 style="border-bottom:0px;"> {{ $address->firstname }}  {{ $address->lastname }} </h2>
                                </div> <!-- **dt-sc-tb-title - Ends** -->
                                <!-- **dt-sc-price - Starts** -->
                                <!-- **dt-sc-price - Ends** -->
                            </div><!-- **dt-sc-tb-header - Ends** -->
                            <ul class="dt-sc-tb-content">


                                 <li>{{ $address->address }}</li>
                                <li> {{ $address->city }} </li>
                                <li>9769142142</li>
                            </ul>
                            <!-- **dt-sc-buy-now - Starts** -->
                            <div class="dt-sc-tb-features">

                            </div>
                            <div class="dt-sc-buy-now">
                                <input type="submit" class="dt-sc-button small continueAddress"  id="{{ $address->id }}" value="Continue"><span class="fa fa-arrow-right"></span> 
                            </div> <!-- **dt-sc-buy-now - Ends** -->

                        </div> <!-- **dt-sc-pr-tb-col - Ends** -->
                             </form>
                          </div>  
                        @endforeach
                  
                </div>
               
                <div style="width:100%; text-align:center; margin-top:15px;">
                    <a href="#"  class="dt-sc-button medium formadd addNewAddress" id="addNewAddress">Add New Address <span class="fa  fa-plus-circle"></span></a>
                </div>
                <div id="checkoutNewAddr" style="display:none;">
                <form name="checkout" method="post" class="checkout"  action="{{ URL::route('payment') }}" >
                        <!-- **col2-set - Starts** -->    
                        <div class="col1-set" id="customer_details" >

                            <div class="col-1">
                                <!-- **woocommerce-shipping-fields - Starts** -->
                                <div class="woocommerce-shipping-fields">

                                    <!-- **shipping-address - Starts** -->
                                    <div class="shipping_address">



                                        <p class="form-row form-row-first validate-required" id=""><label class="">First Name *</label><input type="text" class="input-text " name="shipping_first_name" id="shipping_first_name" placeholder=""  value=""  /></p>

                                        <p class="form-row form-row-last validate-required" id=""><label class="">Last Name *</label><input type="text" class="input-text " name="shipping_last_name" id="shipping_last_name" placeholder=""  value=""  /></p><div class="clear"></div>

                                        <p class="form-row form-row-first validate-required" id=""><label class="">Mobile No. *</label><input type="text" class="input-text " name="shipping_mobile" id="shipping_mobile" placeholder=""  value=""  /></p>

                                        <p class="form-row form-row-last validate-required" id=""><label class="">Landmark</label><input type="text" class="input-text " name="shipping_landmark" id="shipping_landmark" placeholder=""  value=""  /></p><div class="clear"></div>

                                        <p class="form-row form-row-wide address-field validate-required" id=""><label class="">Address 1</label><input type="text" class="input-text " name="shipping_address_1" id="shipping_address_1" placeholder="Street Name"  value=""  /></p>

                                        <p class="form-row form-row-wide address-field" id=""><label for="shipping_address_2" class="">Address 2</label><input type="text" class="input-text" name="shipping_address_2" id="" placeholder="Apartment Name, No.. etc"  value=""  /></p>

                                        <div class="form-row form-row-first address-field update_totals_on_change validate-required" id="shipping_country_field">
                                            <label for="shipping_country" class="">Country *</label>
                                            <div class="selection-box">    
                                                <select name="shipping_country" id="shipping_country" class="country_to_state country_select" >

                                                    <option value="">Please select country </option>
                                                    @foreach($country as $cval)
                                                    <option value="{{ $cval['id'] }}">{{ $cval['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <noscript><input type="submit" name="woocommerce_checkout_update_totals" value="Update country" /></noscript></div>


                                        <div class="form-row form-row-last address-field validate-required">		
                                            <label>State </label>
                                            <div class="selection-box">
                                                <select name="shipping_state" class="country_to_state country_select state" id="shipping_state">

                                                    <option value="">Please select state </option>
                                                    @foreach($state as $sval)
                                                    <option value="{{ $sval['id'] }}">{{ $sval['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <p class="form-row form-row-first address-field validate-required" id=""><label>Town / City *</label><input type="text" class="input-text" id="shipping_postcode" value=""  placeholder="Town / City" name="shipping_city" /></p>

                                            <p class="form-row form-row-last address-field validate-required validate-postcode" id="shipping_postcode_field">
                                                <label for="shipping_postcode" class="">Postcode *</label>
                                                <input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="Postcode / Zip"  value=""  /></p>
                                            <div class="clear"></div>

                                        </div> <!-- **shipping_address - Ends** --> 



                                    </div> <!-- **woocommerce-shipping-fields - Ends** --> 

                                </div> <!-- **col-2 - Ends** -->

                            </div> <!-- **col2-set - Ends** -->
                            <div style="float:right;">
                                <input type="submit" class="button" name="check" value="Submit" /></a>
                                <a href="{{ URL::route('cart') }}" class="dt-sc-button smallwidth"> Back </a></div>

                     <!-- **checkout - Ends** -->
                </div> 
                        </form>
                </div>
                   
                
                </div>
                  <?php } else { ?>
                <!-- **woocommerce - Starts** --> 
                <div class="woocommerce">
                    
                    <!-- **checkout - Starts** -->
                    <form name="checkout" method="post" class="checkout" action="{{ URL::route('payment') }}">
                        <!-- **col2-set - Starts** -->    
                        <div class="col1-set" id="customer_details" >

                            <div class="col-1">
                                <!-- **woocommerce-shipping-fields - Starts** -->
                                <div class="woocommerce-shipping-fields">

                                    <!-- **shipping-address - Starts** -->
                                    <div class="shipping_address">



                                        <p class="form-row form-row-first validate-required" id=""><label class="">First Name *</label><input type="text" class="input-text " name="shipping_first_name" id="shipping_first_name" placeholder=""  value=""  /></p>

                                        <p class="form-row form-row-last validate-required" id=""><label class="">Last Name *</label><input type="text" class="input-text " name="shipping_last_name" id="shipping_last_name" placeholder=""  value=""  /></p><div class="clear"></div>

                                        <p class="form-row form-row-first validate-required" id=""><label class="">Mobile No. *</label><input type="text" class="input-text " name="shipping_mobile" id="shipping_mobile" placeholder=""  value=""  /></p>

                                        <p class="form-row form-row-last validate-required" id=""><label class="">Landmark</label><input type="text" class="input-text " name="shipping_landmark" id="shipping_landmark" placeholder=""  value=""  /></p><div class="clear"></div>

                                        <p class="form-row form-row-wide address-field validate-required" id=""><label class="">Address 1</label><input type="text" class="input-text " name="shipping_address_1" id="shipping_address_1" placeholder="Street Name"  value=""  /></p>

                                        <p class="form-row form-row-wide address-field" id=""><label for="shipping_address_2" class="">Address 2</label><input type="text" class="input-text" name="shipping_address_2" id="" placeholder="Apartment Name, No.. etc"  value=""  /></p>

                                        <div class="form-row form-row-first address-field update_totals_on_change validate-required" id="shipping_country_field">
                                            <label for="shipping_country" class="">Country *</label>
                                            <div class="selection-box">    
                                                <select name="shipping_country" id="shipping_country" class="country_to_state country_select" >

                                                    <option value="">Please select country </option>
                                                    @foreach($country as $cval)
                                                    <option value="{{ $cval['id'] }}">{{ $cval['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <noscript><input type="submit" name="woocommerce_checkout_update_totals" value="Update country" /></noscript></div>


                                        <div class="form-row form-row-last address-field validate-required">		
                                            <label>State </label>
                                            <div class="selection-box">
                                                <select name="shipping_state" class="country_to_state country_select state" id="shipping_state">

                                                    <option value="">Please select state </option>
                                                    @foreach($state as $sval)
                                                    <option value="{{ $sval['id'] }}">{{ $sval['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <p class="form-row form-row-first address-field validate-required" id=""><label>Town / City *</label><input type="text" class="input-text" id="shipping_postcode" value=""  placeholder="Town / City" name="shipping_city" /></p>

                                            <p class="form-row form-row-last address-field validate-required validate-postcode" id="shipping_postcode_field">
                                                <label for="shipping_postcode" class="">Postcode *</label>
                                                <input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="Postcode / Zip"  value=""  /></p>
                                            <div class="clear"></div>

                                        </div> <!-- **shipping_address - Ends** --> 



                                    </div> <!-- **woocommerce-shipping-fields - Ends** --> 

                                </div> <!-- **col-2 - Ends** -->

                            </div> <!-- **col2-set - Ends** -->
                            <div style="float:right;">
                                <input type="submit" class="button" name="check" value="Submit" /></a>
                                <a href="{{ URL::route('cart') }}" class="dt-sc-button smallwidth"> Back </a></div>

                     <!-- **checkout - Ends** -->
                </div> 
                        </form><!-- **woocommerce - Ends** --> 
               
                </div>
                  <?php }?>
                <div class="dt-sc-margin50"></div>

            </section> <!-- **Primary - Ends** -->          

        </div>
      <?php }?>
    <!-- **container - Ends** --> 

</div> <!-- **Main - Ends** --> 

@stop
@section('myscripts')
<script>
    $(document).ready(function () {
        $("#shipping_country").change(function () {
            $("#shipping_state").empty();

            var country_id = $("#shipping_country").val();
          //  alert(country_id);
            $.ajax({
                type: "POST",
                url: "{{ URL::route('ajax-country-states') }}",
                data: {country_id: country_id},
                cache: false,
                success: function (data) {
                    //alert(data);
                    // var stateoption = jQuery.parseJSON(data);
                  // alert(stateoption)
                $.each(data, function(key, value) {
//alert(value);
                    $("#shipping_state").append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                });

                }


            });
        });
        $("#addNewAddress").click(function () {
            $('#checkoutNewAddr').show();
        });
        
        $(".deleteAddress").click(function () {

            var adr_id = this.id;
            adr_id = adr_id.split("_");
            alert(adr_id[1]);
            var formdata = {
                addr_id: adr_id[1]
            };

            $.ajax({
                type: "POST",
                url:"/ajax-delete-address",
                async: false,
                data: formdata,
                success: function (theResponse) {
                     location.reload();
                }
            });
        });
        
//        $(".continueAddress").click(function () {
//
//            var adr_id = this.id;
//           
//            var formdata = {
//                addr_id: adr_id
//            };
//
//            $.ajax({
//                type: "POST",
//                url:"/ajax-continue-address",
//                async: false,
//                data: formdata,
//                success: function (theResponse) {
//                window.location = "/payment";
//                }
//            });
//        });
        
    });
    $("#have-account").click(function () {
           
            $("#new-account").addClass("hide");
            $("#member-account").removeClass("hide");
            

        });
        $("#no-account").click(function () {
          //  $("#guest-account").addClass("hide");
            $("#new-account").removeClass("hide");
            $("#member-account").addClass("hide");
            
        });
</script>
@stop
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
                        <div class="form-wrapper register hide"  id="new-account">
                            <form  method="post" id="reg_form" name="newRegister" action="{{ route('saveCustomer')}}" novalidate><!--  -->
                                <p class="dt-sc-one-half column first" >
                                    <input placeholder="First Name *" id="first_name" name="first_name" type="text" required>

                                </p>

                                <p class="dt-sc-one-half column">
                                    <input placeholder="Last Name *" id="last_name" name="last_name" type="text" required>

                                </p>

                                <p class="dt-sc-one-half column first">
                                    <input placeholder="Email Address *" id="email_link" name="email" type="email"  unique-email="{key: 'users', property: 'email'}" required>

                                </p>

                                <p class="dt-sc-one-half column">
                                    <input placeholder="Mobile Number *" id="contact_no" name="contact_no" type="text"  required> 
                                </p>

                                <p class="dt-sc-one-half column first">
                                    <input placeholder="Password *" id="password" name="password"  type="password"  required>

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
                                    <input class=" "  name="alternate_no" Placeholder="Alternate Number"   type="text">

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
                if ($addresses) {
                    ?>
                    <div class="woocommerce">
                        <div class="dt-sc-margin50"></div>
                        <h3 id="order_review_heading">Delivery Address</h3>
                        <div class="dt-sc-pricing-table">
                            <!-- **dt-sc-pr-tb-col - Starts** -->
                            @foreach($addresses as $address)
                            <div class="column dt-sc-one-fourth ">
                                <form action="{{ URL::route('paymentPage')}}" method="post">
                                    <input type="hidden" name="addressId" value="{{ $address->id}}">
                                    <div class="dt-sc-pr-tb-col">
                                        <!-- **dt-sc-tb-header - Starts** -->
                                        <div class="dt-sc-tb-header">
                                            <div class="dt-sc-tb-title" style="height: 30px;">
                                                <div class="editdeletebtn" style="float:right;margin-right: 10px;margin-top: 5px;">
                                                    <span>
                                                        <a href="javascript:void(0);" id="editAddress_{{ $address->id}}" class="formedit editAddress" style="text-decoration:none;"><i class="fa fa-edit" style="margin-right:10px; font-size: 15px;"></i></a>
                                                        <a href="javascript:void(0);" id="deleteAddress_{{ $address->id}}"  class="deleteAddress" style="text-decoration:none;"><i class="fa fa-trash-o" style="font-size: 16px;"></i></a>
                                                    </span></div> 
                                            </div>
                                            <!-- **dt-sc-tb-title - Starts** -->
                                            <div class="dt-sc-price">

                                                <h2 style="border-bottom:0px;"> {{ $address->firstname}}  {{ $address->lastname}} </h2>
                                            </div> <!-- **dt-sc-tb-title - Ends** -->
                                            <!-- **dt-sc-price - Starts** -->
                                            <!-- **dt-sc-price - Ends** -->
                                        </div><!-- **dt-sc-tb-header - Ends** -->
                                        <ul class="dt-sc-tb-content">


                                            <li>{{ $address->address}}</li>
                                            <li> {{ $address->city}} </li>
                                            <li>9769142142</li>
                                        </ul>
                                        <!-- **dt-sc-buy-now - Starts** -->
                                        <div class="dt-sc-tb-features">

                                        </div>
                                        <div class="dt-sc-buy-now">
                                            <input type="submit" class="dt-sc-button small continueAddress"  id="{{ $address->id}}" value="Continue"><span class="fa fa-arrow-right"></span> 
                                        </div> <!-- **dt-sc-buy-now - Ends** -->

                                    </div> <!-- **dt-sc-pr-tb-col - Ends** -->
                                </form>
                            </div>  
                            @endforeach

                        </div>

                        <div style="width:100%; text-align:center; margin-top:15px;">
                            <a href="javascript:void();"  class="dt-sc-button medium formadd addNewAddress" id="addNewAddress">Add New Address <span class="fa  fa-plus-circle"></span></a>
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

                                                <p class="form-row form-row-first validate-required" id=""><label class="">Email Id. *</label><input type="text" class="input-text " name="shipping_email" id="shipping_email" placeholder=""  value=""  /></p>

                                                <p class="form-row form-row-last validate-required" id=""><label class="">Mobile No. *</label><input type="text" class="input-text " name="shipping_mobile" id="shipping_mobile" placeholder=""  value=""  /></p><div class="clear"></div>

                                                <div class="form-row form-row-first address-field update_totals_on_change validate-required" id="shipping_country_field">
                                                    <label  class="">Country *</label>
                                                    <div class="selection-box">    
                                                        <select name="shipping_country" id="shipping_country" class="country_to_state country_select" >

                                                            <option value="">Please select country </option>
                                                            @foreach($country as $cval)
                                                            <option value="{{ $cval['id']}}">{{ $cval['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-row form-row-last address-field validate-required">		
                                                    <label>State </label>
                                                    <div class="selection-box">
                                                        <select name="shipping_state" class="country_to_state country_select state" id="shipping_state" onfocus="message();" > 

                                                            <option value="">Please select state </option>
                                                            @foreach($state as $sval)
                                                            <option value="{{ $sval['id']}}">{{ $sval['name']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <p class="form-row form-row-first address-field validate-required" id=""><label class="">Address 1</label><input type="text" class="input-text " name="shipping_address_1" id="shipping_address_1" placeholder="Street Name"  value=""  /></p>

                                                <p class="form-row form-row-last address-field" id=""><label for="shipping_address_2" class="">Address 2</label><input type="text" class="input-text" name="shipping_address_2" id="shipping_address_2" placeholder="Apartment Name, No.. etc"  value=""  /></p><div class="clear"></div>

                                                <p class="form-row form-row-first validate-required" id=""><label class="">Landmark</label><input type="text" class="input-text " name="shipping_landmark" id="shipping_landmark" placeholder=""  value=""  /></p>

                                                <p class="form-row form-row-last address-field validate-required validate-postcode" id="shipping_postcode_field">
                                                    <label for="shipping_postcode" class="">Postcode *</label>
                                                    <input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="Postcode / Zip"   /></p>
                                                <div class="clear"></div>





                                            </div> <!-- **shipping_address - Ends** --> 



                                        </div> <!-- **woocommerce-shipping-fields - Ends** --> 

                                    </div> <!-- **col-2 - Ends** -->

                                    <!-- **col2-set - Ends** -->
                                    <div style="float:right;width:15%;">
                                        <a href="javascript:void();"><input type="submit" class="button" name="check" value="Submit" id="submit" /></a>
                                        <a href="{{ URL::route('cart') }}" class="dt-sc-button smallwidth"><input type="button" class="button" name="button" value="Back" /></a></div>
                                </div>
                                <!-- **checkout - Ends** -->

                            </form>
                        </div>
                    </div> 


            </div>
        <?php } else { ?>
            <!-- **woocommerce - Starts** --> 
            <div class="woocommerce">

                <!-- **checkout - Starts** -->
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

                                    <p class="form-row form-row-first validate-required" id=""><label class="">Email Id. *</label><input type="text" class="input-text " name="shipping_email" id="shipping_email" placeholder=""  value=""  /></p>

                                    <p class="form-row form-row-last validate-required" id=""><label class="">Mobile No. *</label><input type="text" class="input-text " name="shipping_mobile" id="shipping_mobile" placeholder=""  value=""  /></p><div class="clear"></div>

                                    <div class="form-row form-row-first address-field update_totals_on_change validate-required" id="shipping_country_field">
                                        <label  class="">Country *</label>
                                        <div class="selection-box">    
                                            <select name="shipping_country" id="shipping_country" class="country_to_state country_select" >

                                                <option value="">Please select country </option>
                                                @foreach($country as $cval)
                                                <option value="{{ $cval['id']}}">{{ $cval['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-row form-row-last address-field validate-required">		
                                        <label>State </label>
                                        <div class="selection-box">
                                            <select name="shipping_state" class="country_to_state country_select state" id="shipping_state" onfocus="message();" > 

                                                <option value="">Please select state </option>
                                                @foreach($state as $sval)
                                                <option value="{{ $sval['id']}}">{{ $sval['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <p class="form-row form-row-first address-field validate-required" id=""><label class="">Address 1</label><input type="text" class="input-text " name="shipping_address_1" id="shipping_address_1" placeholder="Street Name"  value=""  /></p>

                                    <p class="form-row form-row-last address-field" id=""><label for="shipping_address_2" class="">Address 2</label><input type="text" class="input-text" name="shipping_address_2" id="" placeholder="Apartment Name, No.. etc"  value=""  /></p><div class="clear"></div>

                                    <p class="form-row form-row-first validate-required" id=""><label class="">Landmark</label><input type="text" class="input-text " name="shipping_landmark" id="shipping_landmark" placeholder=""  value=""  /></p>

                                    <p class="form-row form-row-last address-field validate-required validate-postcode" id="shipping_postcode_field">
                                        <label for="shipping_postcode" class="">Postcode *</label>
                                        <input type="text" class="input-text " name="shipping_postcode" id="shipping_postcode" placeholder="Postcode / Zip"  value=""  /></p>
                                    <div class="clear"></div>





                                </div> <!-- **shipping_address - Ends** --> 



                            </div> <!-- **woocommerce-shipping-fields - Ends** --> 

                        </div> <!-- **col-2 - Ends** -->

                        <!-- **col2-set - Ends** -->
                        <div style="float:right;width:15%;">
                            <a href="javascript:void();"><input type="submit" class="button" name="check" value="Submit" id="submit" /></a>
                            <a href="{{ URL::route('cart') }}" class="dt-sc-button smallwidth"><input type="button" class="button" name="button" value="Back" /></a></div>
                    </div>
                    <!-- **checkout - Ends** -->
                    <!-- **woocommerce - Ends** --> 
                </form>
            </div>
        <?php } ?>
        <div class="dt-sc-margin50"></div>

    </section> <!-- **Primary - Ends** -->          

    </div>
<?php } ?>
<!-- **container - Ends** --> 

</div> <!-- **Main - Ends** --> 
<div id="editForm" class="edit-form" style="">
    <div class="closebtn formclose">X</div>
    <div class="clear" style="margin-bottom:50px;"></div>


    <form name="checkout" method="post" class="edit-formrow" action="#">
        <!-- **col2-set - Starts** -->    




        <p class="dt-sc-one-half column first" id="">
            <input type="text" class="input-text form-row-last" name="afirstname" id="afirstname" placeholder="First Name"  value=""  /></p>

        <p class="dt-sc-one-half column" id="">
            <input type="text" class="input-text " name="alastname" id="alastname" placeholder="Last Name"  value=""  /></p>
        <div class="clear"></div>

        <p class="dt-sc-one-half column first" id=""><input type="text" class="input-text " name="amobile" id="amobile" placeholder="Mobile"  value=""  /></p>

        <p class="dt-sc-one-half column" id=""><input type="text" class="input-text " name="aemail" id="aemail" placeholder="Email-ID"  value=""  /></p>

        <div class="clear"></div>
        <?php
       
        $country = DB::table("countries")->get();
       
        $state = DB::table("zones")->get();
        ?>
       
        <p class="form-row form-row-wide address-field validate-required" id="">
            <textarea placeholder="Address" name="txtmessage" required=""></textarea></p>



        <div style="float:right;">
            <a href="#" class="dt-sc-button smallwidth" style="margin-right:10px;">Save</a>
            <a href="#" class="dt-sc-button smallwidth formclose"> Cancel </a></div>
        <div class="clear"></div>
    </form>
</div>

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
                cache: false, success: function (data) {
                    //alert(data);
                    // var stateoption = jQuery.parseJSON(data);
                    // alert(stateoption)
                    $.each(data, function (key, value) {
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
            // alert(adr_id[1]);
            var formdata = {addr_id: adr_id[1]};

            $.ajax({
                type: "POST",
                url: "/ajax-delete-address",
                async: false,
                data: formdata, success: function (theResponse) {
                    location.reload();
                }
            });
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


        $('.formedit').click(function () {

            $('#editForm').show();
            var adr_id = this.id;
            adr_id = adr_id.split("_");
            alert(adr_id[1]);
            var formdata = {addr_id: adr_id[1]};

            $.ajax({
                type: "POST",
                url: "/ajax-get-address",
                async: false,
                data: formdata, success: function (theResponse) {
                    // location.reload();
                }
            });
        });

        $('.formclose').click(function () {
            var d = $(this).closest('.edit-form');

            $(d).hide();
        });


        $("#submit").click(function () {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            var numbers = /^[\d\-\+\s]+$/;
            var firstName = $("#shipping_first_name").val();
            var lastName = $("#shipping_last_name").val();
            var mobile = $("#shipping_mobile").val();
            var email = $("#shipping_email").val();
            var country = $("#shipping_country").val();
            var state = $("#shipping_state").val();
            var address1 = $("#shipping_address_1").val();
            var address2 = $("#shipping_address_2").val();
            var landmark = $("#shipping_landmark").val();
            var postcode = $("#shipping_postcode").val();



            var flag = 0;
            if (firstName == '' || firstName == null)
            {


                $('#shipping_first_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#shipping_first_name').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (lastName == '' || lastName == null)
            {

                $('#shipping_last_name').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#shipping_last_name').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (!numbers.test(mobile) || mobile == "")
            {

                $('#shipping_mobile').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#shipping_mobile').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (!emailPattern.test(email) || email == "")
            {

                $('#shipping_email').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#shipping_email').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (country == '' || country == null)
            {

                $('#shipping_country').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#shipping_country').css({"border-color": "", "border-weight": "", "border-style": ""});
            }

            if (state == '' || state == null)
            {

                $('#shipping_state').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#shipping_state').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (address1 == '' || address1 == null)
            {

                $('#shipping_address_1').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#shipping_address_1').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (address2 == '' || address2 == null)
            {

                $('#shipping_address_2').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#shipping_address_2').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (landmark == '' || landmark == null)
            {

                $('#shipping_landmark').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#shipping_landmark').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            if (postcode == '' || postcode == null)
            {

                $('#shipping_postcode').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#shipping_postcode').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            //  alert(flag);
            if (flag == 0)
            {
                return true;
            } else
            {
                return false;
            }
        });
    });
    function message()
    {
        var country_val = document.getElementById('shipping_country').value;
        if (country_val == '' || country_val == '0')
        {
            $('#shipping_country').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
            alert('Please Select Country First');

        }
    }


</script>
</script>
@stop
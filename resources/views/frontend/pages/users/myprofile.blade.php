@extends('frontend.layouts.default')
@section('content')
<div class="dt-sc-margin100"></div> 
<div class="full-width-section">
    <div class="container">
        <div class="page_info"> 
            <h3 class="aligncenter"> <span> <i class="fa fa-user"></i></span>
                My Profile </h3>
        </div>
        <div class="dt-sc-margin20"></div>
    </div>
</div>  
<!-- **Main - Starts** --> 



<div class="container">

    <!-- **secondary - Starts** --> 
    <section id="secondary-left" class="secondary-sidebar secondary-has-left-sidebar">
        <aside class="widget widget_categories">
            <h4 class="widgettitle"><strong>{{ ucfirst(Session::get("userName")) }}</strong></h4>
            <p style="border-bottom: 1px dashed #d9d9d9; padding-bottom:20px;">
                <span><a href="#">{{ $userDetails[0]['email']}}</a></span><br>
                <span>{{ $userDetails[0]['location']}}</span>
            </p>
            <ul>

                <li><a href="{{ route('myProfile') }}">My Profile</a></li>
                <li><a href="{{ route('orderDetails') }}">My Order</a></li>
                <li><a href="#">Reward Point</a></li>
                <li><a href="{{ route('updatePassword') }}">Change Password</a></li>
            </ul>
        </aside>


    </section> <!-- **secondary - Ends** -->

    <!-- Primary Starts -->
    <section id="primary" class="with-left-sidebar page-with-sidebar"> 

        <!-- **Blog-post - Starts** --> 
        <article class="blog-post type3">

            <!-- **entry-detail - Starts** -->
            <div class="entry-detail" style="width: 100%;">
                <div class="entry-title">
                    <h4><a href="{{ route('myProfile') }}">My Profile</a></h4>
                </div>
                <!-- **entry-meta-data - Starts** -->



                <div class="woocommerce">
                    <form name="checkout" method="post" class="edit-formrow" action="{{route('saveProfile')}}" >
                        <!-- **col2-set - Starts** -->    




                        <p class="dt-sc-one-half column first" id=""><input type="text" class="input-text " name="firstName" id="firstName" placeholder="" value="{{ $userDetails[0]['first_name']}}"></p>

                        <p class="dt-sc-one-half column" id="">
                            <input type="text" class="input-text " name="lastName" id="lastName" placeholder="" value="{{ $userDetails[0]['last_name']}}"></p><div class="clear"></div>

                        <p class="dt-sc-one-half column first" id=""><input type="text" class="input-text " name="mobile" id="mobile" placeholder="" value="{{ $userDetails[0]['contact_no']}}"></p>

                        <p class="dt-sc-one-half column" id=""><input type="text" class="input-text" name="cemail" id="cemail" placeholder="" value="{{ $userDetails[0]['email']}}"></p>



                        <p class="dt-sc-one-half column first" id="">
                            <select name="country" id="country"  tabindex="13" readonly="true" class="input-text" >
                                <option value="">Please select country </option>
                                @foreach($country as $cval)
                                <option value="{{ $cval['id']}}" <?php if ($userDetails[0]['country'] == $cval['id']) echo "selected"; ?>>{{ $cval['name']}}</option>
                                @endforeach

                            </select>
                        </p>

                        <p class="dt-sc-one-half column" id="">
                            <select name="state" id="state" tabindex="13" readonly="true" class="input-text" > 
                                <option value="">Please select state </option>
                                @foreach($state as $sval)
                                <option value="{{ $sval['id']}}" <?php if ($userDetails[0]['state'] == $sval['id']) echo "selected"; ?>>{{ $sval['name']}}</option>
                                @endforeach

                            </select>
                        </p>

                        <div class="dt-sc-margin10"></div>
                        <p class="form-row form-row-wide address-field validate-required" id="">
                            <textarea placeholder="" name="address"  id="address" required="" value="">{{ $userDetails[0]['location']}}</textarea></p>

                        <?php
                        if (session()->has('updateProfile')) {
                            ?>
                            <p class="form-row form-row-wide address-field validate-required"> <?php echo session('updateProfile') ?> </p>
                            <?php
                        }
                        ?>


                        <div style="float:right;">
                            <input type="submit" class="dt-sc-button smallwidth" name="submit" id="submit" value="Save" style="margin-right:10px;">
                            <div class="clear"></div>
                    </form>


                </div>

            </div> <!-- **entry-detail - Ends** -->
        </article><!-- **Blog-post - Ends** -->

        <div class="dt-sc-margin80"></div>
    </section> <!-- **Primary - Ends** --> 

</div> <!-- **container - Ends** --> 




@endsection
@section('myscripts')
<script>
    $(document).ready(function () {
        $("#country").change(function () {
            $("#state").empty();

            var country_id = $("#country").val();

            $.ajax({
                type: "POST",
                url: "{{ URL::route('ajax-country-states') }}",
                data: {country_id: country_id},
                cache: false,
                success: function (data) {

                    $.each(data, function (key, value) {

                        $("#state").append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                    });

                }
            });
        });
        $("#submit").click(function () {
            alert("gdgddfg");
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var mobile = $("#mobile").val();
            var email = $("#cemail").val();
            var country = $("#country").val();
            var state = $("#state").val();
            var address = $("#address").val();

            var flag = 0;
            if (firstName == '' || firstName == null)
            {

                $('#firstName').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#firstName').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
            if (lastName == '' || lastName == null)
            {

                $('#lastName').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#lastName').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
            if (mobile == '' || mobile == null)
            {

                $('#mobile').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#mobile').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
            if (email == '' || email == null)
            {

                $('#cemail').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#cemail').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
            if (country == '' || country == null)
            {

                $('#country').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#country').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
            
            if (state == '' || state == null)
            {

                $('#state').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#state').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
            if (address == '' || address == null)
            {

                $('#address').css({"border-color": "#FF0000", "border-weight": "1px", "border-style": "solid"});
                flag++;
            }
            else
            {
                $('#address').css({"border-color": "", "border-weight": "", "border-style": ""});
            }
            
            if(flag==0)
            {
                return true;
            }else
            {
                return false;
            }
        });
    });
</script>
@stop
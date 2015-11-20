@extends('frontend.layouts.default')
@section('content')
<div class="dt-sc-margin100"></div> 
<div class="full-width-section">
    <div class="container">
        <div class="page_info"> 
            <h3 class="aligncenter"> <span> <i class="fa fa-user"></i></span>
                Reset Password </h3>
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
                <span><a href="#">{{$userDetails[0]['email']}}</a></span><br>

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
            <!--<div class="entry-detail" style="width: 100%;">
                <div class="entry-title">
                    <h4><a href="my-profile.html">My Profile</a></h4>
                </div>
            </div>-->
            <!-- **entry-meta-data - Starts** -->



            <div class="woocommerce">
                <form name="checkout" method="post" class="edit-formrow" action="{{route('saveUpdatePassword')}}">
                    <!-- **col2-set - Starts** -->    



                    <p class="dt-sc-one-half column" id="">
                        <input type="text" class="input-text" name="cemail" id="cemail" placeholder="" value="{{ $userDetails[0]['email']}}">
                    </p>
                    <p class="dt-sc-one-half column" id="">
                        <input type="text" class="input-text " name="old_password" id="old_password" placeholder="Old Password" value="">
                    </p>

                    <p class="dt-sc-one-half column" id="">
                        <input type="text" class="input-text " name="new_password" id="new_password" placeholder="New Password" value="">
                    </p>


                    <p class="dt-sc-one-half column" id="">
                        <input type="text" class="input-text " name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="">
                    </p>

                    <div class="dt-sc-margin10"></div>
                    <p class="dt-sc-one-half column" id="">
                        <?php
                        if (Session::get('ChangeSuccess')) {
                            echo Session::get('ChangeSuccess');
                        } else if (Session::get('ChangeError')) {
                            echo Session::get('ChangeError');
                        } else {
                            echo Session::get('notMatch');
                        }
                        ?>
                    </p> 
                    <div style="float:right;">
                        <input type="submit" class="dt-sc-button smallwidth" name="submit" id="submit" value="Change Password" style="margin-right:10px;">
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
    });
</script>
@stop
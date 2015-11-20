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
                <span><a href="#">vikram.g@infiniteit.biz</a></span><br>
                <span>mumbai</span>
            </p>
            <ul>

                <li><a href="{{ route('myProfile') }}">My Profile</a></li>
                <li><a href="{{ route('orderDetails') }}">My Order</a></li>
                <li><a href="#">Reward Point</a></li>
                <li><a href="#">Referrals</a></li>
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
                    <h4><a href="my-profile.html">My Profile</a></h4>
                </div>
                <!-- **entry-meta-data - Starts** -->



                <div class="woocommerce">
                    <form name="checkout" method="post" class="edit-formrow" action="{{route('saveProfile')}}">
                        <!-- **col2-set - Starts** -->    




                        <p class="dt-sc-one-half column first" id=""><input type="text" class="input-text " name="firstName" id="firstName" placeholder="" value="{{ $userDetails[0]['first_name']}}"></p>

                        <p class="dt-sc-one-half column" id="">
                            <input type="text" class="input-text " name="lastName" id="lastName" placeholder="" value="{{ $userDetails[0]['last_name']}}"></p><div class="clear"></div>

                        <p class="dt-sc-one-half column first" id=""><input type="text" class="input-text " name="mobile" id="mobile" placeholder="" value="{{ $userDetails[0]['contact_no']}}"></p>

                        <p class="dt-sc-one-half column" id=""><input type="text" class="input-text " name="cemail" id="cemail" placeholder="" value="{{ $userDetails[0]['email']}}"></p>



                        <p class="dt-sc-one-half column first" id=""><input type="text" class="input-text " value="{{ $userDetails[0]['first_name']}}" placeholder="" name="city" id="city"></p>

                        <p class="dt-sc-one-half column" id=""><input type="text" class="input-text " name="pin" id="pin" placeholder="" value="{{ $userDetails[0]['first_name']}}"></p>


                        <p class="form-row form-row-wide address-field validate-required" id="">
                            <textarea placeholder="" name="address"  id="address" required="" value="">{{ $userDetails[0]['location']}}</textarea></p>



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
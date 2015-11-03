@extends('frontend.layouts.default')
@section('content')

<div class="banner">
    <div id="layerslider_10" class="ls-wp-container" style="width:100%;height:455px; max-width:1920px;margin:0 auto;margin-bottom: 0px;">
        <div class="ls-slide" data-ls="slidedelay:5000; transition2d:all;"><img src="{{ asset(Config('constants.frontendimg') . "/sliders/slider/1.jpg") }}" class="ls-bg" alt="shop-slider1" /></div>
        <div class="ls-slide" data-ls="slidedelay:5000; transition2d:all;"><img src="{{ asset(Config('constants.frontendimg') . "/sliders/slider/2.jpg") }}" class="ls-bg" alt="shop-slider2" /></div>
        <div class="ls-slide" data-ls="slidedelay:5000; transition2d:all;"><img src="{{ asset(Config('constants.frontendimg') . "/sliders/slider/3.jpg") }}" class="ls-bg" alt="shop-slider3" /></div>
    </div>
</div> <!-- **banner - Ends** -->

<!-- **intro-text - starts** -->
<div class="intro-text type2 grey">
    <div class="container">
        <div class="column dt-sc-two-third first">
            <h4>Great Combinations of <span>elements</span> only from PRIORITY</h4>
        </div>
        <div class="column dt-sc-one-third">
            <a class="dt-sc-button large" href="#">Purchase this theme <span class="fa fa-angle-right"></span></a> 
        </div>
    </div>
</div><!-- **intro-text - Ends** -->

<!-- **Full-width-section - Starts** -->   
<div class="full-width-section">
    <div class="dt-sc-hr-invisible"></div>
    <div class="container">
        <h2 class="aligncenter"> Latest Products </h2>
        <p class="middle-align">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical <br/> Latin literature from 45 BC, making it over 2000 years old.  </p>

        <div class="dt-sc-margin45"></div>
        <!-- **product - Starts** -->
        <ul class="products">

            <li>
                <!-- **product-wrapper - Starts** -->   
                <div class="product-wrapper product-four-column">
                    <!-- **product-container - Starts** -->   
                    <div class="product-container">
                        <a href="product-detail.php"><div class="product-thumb"> <img src="{{ asset(Config('constants.frontendimg') . "/Toe_Rings.jpg") }}" alt="image"/> </div> </a>
                        <!-- **product-title - Starts** -->
                        <div class="product-title"> 
                            <a href="shop-cart.html"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                            <a href="#"> <span class="fa fa-unlink"></span> Options </a>
                        </div> <!-- **product-title - Ends** -->
                    </div> <!-- **product-container - Ends** --> 
                    <!-- **product-details - Starts** --> 
                    <div class="product-details"> 
                        <h5> <a href="product-detail.php"> Ellents Style Grade </a> </h5>
                        <span class="amount"> $20.00 </span> 
                    </div> <!-- **product-details - Ends** --> 
                </div> <!-- **product-wrapper - Ends** -->  
            </li> 

            <li>
                <!-- **product-wrapper - Starts** -->   
                <div class="product-wrapper product-four-column">
                    <!-- **product-container - Starts** -->   
                    <div class="product-container">
                        <a href="product-detail.php"><div class="product-thumb"> <img src="{{ asset(Config('constants.frontendimg') . "/Flat_25_Off_1.jpg") }}" alt="image"/> </div> </a>
                        <!-- **product-title - Starts** -->
                        <div class="product-title"> 
                            <a href="shop-cart.html"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                            <a href="#"> <span class="fa fa-unlink"></span> Options </a>
                        </div> <!-- **product-title - Ends** -->
                    </div> <!-- **product-container - Ends** --> 
                    <!-- **product-details - Starts** --> 
                    <div class="product-details"> 
                        <h5> <a href="product-detail.php"> Ellents Style Grade </a> </h5>
                        <span class="amount"> $20.00 </span> 
                    </div> <!-- **product-details - Ends** --> 
                </div> <!-- **product-wrapper - Ends** -->  
            </li> 



            <li class="last">
                <!-- **product-wrapper - Starts** -->   
                <div class="product-wrapper product-two-column">
                    <!-- **product-container - Starts** -->   
                    <div class="product-container" style="width: 100%;">
                        <a href="product-detail.php"><div class="product-thumb"> <img src="{{ asset(Config('constants.frontendimg') . "/Crystal-Jewellery-banner.gif" ) }}" alt="image" /> </div> </a>
                        <!-- **product-title - Starts** -->
                        <div class="product-title"> 
                            <a href="shop-cart.html"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                            <a href="#"> <span class="fa fa-unlink"></span> Options </a>
                        </div> <!-- **product-title - Ends** -->
                    </div> <!-- **product-container - Ends** --> 
                    <!-- **product-details - Starts** --> 
                    <div class="product-details"> 
                        <h5> <a href="product-detail.php"> Ellents Style Grade </a> </h5>
                        <span class="amount"> $20.00 </span> 
                    </div> <!-- **product-details - Ends** --> 
                </div> <!-- **product-wrapper - Ends** -->  
            </li> 
        </ul> <!-- **product - Ends** -->


        <ul class="products">

            <li>
                <!-- **product-wrapper - Starts** -->   
                <div class="product-wrapper product-four-column">
                    <!-- **product-container - Starts** -->   
                    <div class="product-container">
                        <a href="product-detail.php">
                            <div class="product-thumb"> 
                                <img src="{{ asset(Config('constants.frontendimg') . "/jew/b3.jpg") }}" alt="image"/> </div> </a>
                        <!-- **product-title - Starts** -->
                        <div class="product-title"> 
                            <a href="shop-cart.html"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                            <a href="#"> <span class="fa fa-unlink"></span> Options </a>
                        </div> <!-- **product-title - Ends** -->
                    </div> <!-- **product-container - Ends** --> 
                    <!-- **product-details - Starts** --> 

                    <div class="product-details"> 
                        <h5> <a href="product-detail.php"> Ellents Style Grade </a> </h5>
                        <span class="amount"> $20.00 </span> 
                    </div> <!-- **product-details - Ends** --> 
                </div> <!-- **product-wrapper - Ends** -->  
            </li> 

            <li>
                <!-- **product-wrapper - Starts** -->   
                <div class="product-wrapper product-four-column">
                    <!-- **product-container - Starts** -->   
                    <div class="product-container">
                        <a href="product-detail.php"><div class="product-thumb"> <img src="{{ asset(Config('constants.frontendimg') . "/jew/n2.jpg") }}" alt="image"/> </div> </a>
                        <!-- **product-title - Starts** -->
                        <div class="product-title"> 
                            <a href="shop-cart.html"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                            <a href="#"> <span class="fa fa-unlink"></span> Options </a>
                        </div> <!-- **product-title - Ends** -->
                    </div> <!-- **product-container - Ends** --> 
                    <!-- **product-details - Starts** --> 
                    <div class="product-details"> 
                        <h5> <a href="product-detail.php"> Ellents Style Grade </a> </h5>
                        <span class="amount"> $20.00 </span> 
                    </div> <!-- **product-details - Ends** --> 
                </div> <!-- **product-wrapper - Ends** -->  
            </li> 

            <li>
                <!-- **product-wrapper - Starts** -->   
                <div class="product-wrapper product-four-column">
                    <!-- **product-container - Starts** -->   
                    <div class="product-container">
                        <a href="product-detail.php"><div class="product-thumb"> <img src="{{ asset(Config('constants.frontendimg') . "/jew/p1.jpg") }}" alt="image"/> </div> </a>
                        <!-- **product-title - Starts** -->
                        <div class="product-title"> 
                            <a href="shop-cart.html"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                            <a href="#"> <span class="fa fa-unlink"></span> Options </a>
                        </div> <!-- **product-title - Ends** -->
                    </div> <!-- **product-container - Ends** --> 
                    <!-- **product-details - Starts** --> 
                    <div class="product-details"> 
                        <h5> <a href="product-detail.php"> Ellents Style Grade </a> </h5>
                        <span class="amount"> $20.00 </span> 
                    </div> <!-- **product-details - Ends** --> 
                </div> <!-- **product-wrapper - Ends** -->  
            </li> 

            <li class="last">
                <!-- **product-wrapper - Starts** -->   
                <div class="product-wrapper product-four-column">
                    <!-- **product-container - Starts** -->   
                    <div class="product-container">
                        <a href="product-detail.php"><div class="product-thumb"> <img src="{{ asset(Config('constants.frontendimg') . "/jew/n2.jpg") }}" alt="image"/> </div> </a>
                        <!-- **product-title - Starts** -->
                        <div class="product-title"> 
                            <a href="shop-cart.html"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                            <a href="#"> <span class="fa fa-unlink"></span> Options </a>
                        </div> <!-- **product-title - Ends** -->
                    </div> <!-- **product-container - Ends** --> 
                    <!-- **product-details - Starts** --> 
                    <div class="product-details"> 
                        <h5> <a href="product-detail.php"> Ellents Style Grade </a> </h5>
                        <span class="amount"> $20.00 </span> 
                    </div> <!-- **product-details - Ends** --> 
                </div> <!-- **product-wrapper - Ends** -->  
            </li> 

        </ul> <!-- **product - Ends** -->


        <div class="dt-sc-margin15"></div>
    </div>
</div> <!-- **Full-width-section - Ends** -->





<!-- **Full-width-section - Starts** -->   
<div class="full-width-section">
    <div class="container">
        <!-- **intro-text type3 - Starts** --> 	
        <div class="intro-text type3">
            <div class="intro-text-content">
                <h2> Latest Collection from ROLEX </h2>
                <h6> Exclusively on <span>Priority</span> </h6>
                <p> Etiam sit amet orci eget eros fauc ibus la tincidunt. Duis leo.<br/> 
                    Sed fringilla mauris sit amet nibh. </p>
                <a href="#" class="dt-sc-button medium"> Browse Collections <span class="fa fa-arrow-circle-right"></span></a>
            </div>
        </div> <!-- **intro-text type3 - Ends** -->

    </div>
</div><!-- **Full-width-section - Ends** --> 




<div class="dt-sc-margin45"></div>	

@endsection
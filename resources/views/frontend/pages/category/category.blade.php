@extends('frontend.layouts.default')


@section('content')

<div id="main" ng-controller="categoryController">
    <div class="parallax full-width-bg">
        <div class="container">
            <div class="main-title">
                <h3><span class="light">[[ catTitle ]]</span> Products</h3>
                <div class="breadcrumb">
                    <a href="#">Home</a>
                    <span class="fa fa-angle-right"></span>
                    <span class="">Shop Page</span>
                    <span class="fa fa-angle-right"></span>
                    <span class="current">Rings</span>
                </div>
            </div>
        </div>
    </div>  
    <div class="dt-sc-margin50"></div>    
    <!-- Container starts-->
    <div class="container"  >
        <!-- **secondary - starts** --> 
        <section id="secondary-left" class="secondary-sidebar secondary-has-left-sidebar"  >

            <aside class="widget widget_top_rated_products">
                <h3>Top Selling</h3>
                <ul class="product_list_widget">
                    <?php foreach ($upsellProd as $upSell) { ?>
                        <li> 
                            <a href="javascript:void();"><img src="{{asset(Config('constants.productImgPath').$upSell['catalogimgs'][0]['filename'])}}" alt="{{asset(Config('constants.productImgPath').$upSell['catalogimgs'][0]['alt_text'])}}"/></a> 
                            <h4> <a href="javascript:void();">{{ $upSell['product']}}</a> </h4>

                            <span class="amount">{{ $upSell['price']}}</span>
                        </li>
                    <?php } ?>
                </ul>
            </aside>     
            <aside class="widget widget_featured_products">
                <h3>Featured Product</h3>
                <!-- **products - Starts** -->
                <div class="products">
                    <!-- **product-wrapper - Starts** -->   
                    <?php foreach ($relatedProd as $relProd) {
                        ?>
                        <div class="product-wrapper">
                            <!-- **product-container - Starts** -->   
                            <div class="product-container">
                                <a href="javascript:void();"><div class="product-thumb"> <img src="{{asset(Config('constants.productImgPath').$relProd['catalogimgs'][0]['filename'])}}" alt="{{$relProd['catalogimgs'][0]['alt_text']}}"/> </div> </a>
                                <!-- **product-title - Starts** -->
                                <div class="product-title"> 
                                    <a href="javascript:void();"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                                    <a href="javascript:void();"> <span class="fa fa-unlink"></span> Read More </a>
                                </div> <!-- **product-title - Ends** -->
                            </div> <!-- **product-container - Ends** --> 
                            <!-- **product-details - Starts** --> 
                            <div class="product-details"> 
                                <h5> <a href="javascript:void();"> {{ $relProd['product']}} </a> </h5>
                                <span class="amount"> {{$relProd['price']}}</span> 
                            </div> <!-- **product-details - Ends** --> 
                        </div> <!-- **product-wrapper - Ends** -->
                    <?php } ?>

                </div> <!-- **products - Ends** -->
            </aside>

        </section> <!-- **secondary - Ends** -->  

        <!-- **primary - Starts** --> 


        <section id="primary" class="with-left-sidebar page-with-sidebar" >


            <!-- **product - Starts** -->
            <ul class="products" >
                <div ng-repeat="product in products">
                    <li>
                        <!-- **product-wrapper - Starts** -->   
                        <div class="product-wrapper product-three-column">
                            <!-- **product-container - Starts** -->   
                            <div class="product-container">
                                <a href="/[[ product.url_key ]]"><img width="540" height="374" alt="[[ product.image.alt_text ]]" src="[[ product.image.filename ]]"></a>
                                <!-- **product-title - Starts** -->
                                <div class="product-title"> 
                                    <a href="#" id="[[ product.id ]]"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                                    <a href="/[[ product.url_key ]]"> <span class="fa fa-unlink"></span> Read More </a>
                                </div> <!-- **product-title - Ends** -->
                            </div> <!-- **product-container - Ends** --> 
                            <!-- **product-details - Starts** --> 
                            <div class="product-details"> 
                                <h5> <a href="javascript:void();">[[ product.product ]] </a> </h5>
                                <span class="amount"> [[ product.price ]]</span> 
                            </div> <!-- **product-details - Ends** --> 
                        </div> <!-- **product-wrapper - Ends** -->  
                    </li>
                </div>





            </ul> <!-- **product - Ends** -->
            <div class="dt-sc-margin10"></div>
            <!-- **pagination - Starts** -->  
              
            <div class="pagination" >

                <button class="button load-more-btn ng-scope"  ng-click="load($event, next_page_url)"> <i></i> Load More</button>
              
            </div> <!-- **pagination - Ends** -->
        </section> <!-- **primary - Ends** --> 
        <div class="dt-sc-margin80"></div>
    </div> <!-- **container - Ends** --> 

</div> 


<div class="dt-sc-margin45"></div>	

@endsection
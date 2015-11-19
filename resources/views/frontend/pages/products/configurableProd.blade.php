@extends('frontend.layouts.default')
@section('mystyles')
<style>
    #ModifyCart.modal { width : 500px; }
    .fabrics {position: relative;}
    .fabs {position: absolute;     top: -10px;    left: -6px;} 
</style>
@stop
@section('content')
<div id="main">
    <div class="parallax full-width-bg">
        <div class="container">
            <div class="main-title">
                <h1>Shop Details</h1>
                <div class="breadcrumb">
                    <a href="index.html">Home</a>
                    <span class="fa fa-angle-right"></span>
                    <span class="current">Shop</span>
                </div>
            </div>
        </div>
    </div>
    <div class="dt-sc-margin50"></div>    
    <!-- Container starts-->
    <div class="container">
        <!-- **secondary - starts** --> 
        <section id="secondary-left" class="secondary-sidebar secondary-has-left-sidebar">

            <aside class="widget widget_top_rated_products">
                <h3>Top Selling</h3>
                <ul class="product_list_widget">
                    <li> 
                        <a href="#"><img src="images/jew/shop/Rings.jpg" alt="image"/></a> 
                        <h4> <a href="#">rings</a> </h4>

                        <span class="amount">$205.00</span>
                    </li>
                    <li> 
                        <a href="#"><img src="images/jew/shop/pendant.jpg" alt="image"/></a> 
                        <h4> <a href="#">pendants</a> </h4>

                        <span class="amount">$220.00</span>
                    </li>
                    <li> 
                        <a href="#"><img src="images/jew/shop/brace.jpg" alt="image"/></a> 
                        <h4> <a href="#">bangles & bracelets</a> </h4>

                        <span class="amount">$230.00</span>
                    </li>
                </ul>
            </aside>     
            <aside class="widget widget_featured_products">
                <h3>Featured Product</h3>
                <!-- **products - Starts** -->
                <div class="products">
                    <!-- **product-wrapper - Starts** -->   
                    <div class="product-wrapper">
                        <!-- **product-container - Starts** -->   
                        <div class="product-container">
                            <a href="#"><div class="product-thumb"> <img src="images/jew/shop/prod.jpg" alt="image"/> </div> </a>
                            <!-- **product-title - Starts** -->
                            <div class="product-title"> 
                                <a href="#"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                                <a href="#"> <span class="fa fa-unlink"></span> Read More </a>
                            </div> <!-- **product-title - Ends** -->
                        </div> <!-- **product-container - Ends** --> 
                        <!-- **product-details - Starts** --> 
                        <div class="product-details"> 
                            <h5> <a href="#"> Ellents Style Grade </a> </h5>
                            <span class="amount"> $20.00 </span> 
                        </div> <!-- **product-details - Ends** --> 
                    </div> <!-- **product-wrapper - Ends** -->
                </div> <!-- **products - Ends** -->
            </aside>

        </section> <!-- **secondary - Ends** -->  

        <!-- **primary - Starts** --> 
        <section id="primary" class="with-left-sidebar page-with-sidebar">

            <!-- **Woocommerce - Starts** -->
            <div class="woocommerce">
                <!-- **product - Starts** --> 
                <div class="product single-product"  ng-controller='productController'>
                    <!-- **images - Starts** -->
                    <div class="images">
                        <div class="yith_magnifier_zoom_wrap">
                            <a href="#" class="yith_magnifier_zoom woocommerce-main-image" > 
                                <img src="[[ prods.image[0].filename ]]" alt="[[ prods.image[0].alt_text ]]" width="940" height="940" id="mainPreviewImg">
                            </a>
                        </div>
                        <div class="thumbnails slider">
                            <ul class="yith_magnifier_gallery"  >
                                <li class="yith_magnifier_thumbnail" ng-repeat="prodimg in prods.image">
                                    <a href="#"> <img src="[[ prodimg.filename ]]" alt="[[ prodimg.alt_text ]]" > </a>
                                </li>

                            </ul>
                        </div> 
                    </div> <!-- **images - Ends** -->
                    <!-- **summary - Starts** -->
                    <div class="summary entry-summary">
                        <h1 class="product_title entry-title">[[ prods.product ]]</h1>
                        <div class="woocommerce-product-rating">

                            <p class="price" id="priceOptType" >[[ prods.price ]]</p>

                        </div>
                        <div class="description">
                            [[ prods.short_desc]]
                        </div>
                        <div class="project-details">
                            <h6>Product Details</h6>
                            <ul class="client-details">
                                <!--                                        <li>
                                                                            <p><span>SKU:</span> RX58 </p>
                                                                        </li>-->
                                <li>

                                    <p><span>Category:</span> [[ prods['category']['category'] ]] </p>

                                </li>
                                <li>
                                    <p><span>Tags:</span> <a href="#">[[ prods['attrs']['jewelleries'] ]]</a></p>
                                </li>
                                <li>
                                    <p><span>Website:</span> <a href="#">www.kanhabangles.com</a></p>
                                </li>
                            </ul>
                        </div>


                        <form name="fromcart" id="prodId-[[ prods.id ]]" method="post" class="cart" action="javascript:void(0);">
                            <div class="form-row form-row-wide address-field validate-required">		
                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">    
                                <input type="hidden" name="prod_type" value="[[ prods.prod_type ]]">    
                                <input type="hidden" name="id" value="[[ prods.id ]]" id="prodId">  
                                <input type="hidden" name="price" value="[[ prods.price ]]" id="prodPrice">     
                                <input type="hidden" name="chlidProductId" value="" id="chlidProductId">
                                <?php
//                                echo $prod->id;
//                                print_r($attrId);
//                                echo "</pre>";
                                $attributeID = $attrOpt[0]['id'];
                                $attrVal = DB::table("products")->where("parent_prod_id", "=", $prod->id)->where("has_options.attr_id", "=", $attributeID)
                                        ->leftJoin('has_options', "has_options.prod_id", "=", "products.id")
                                        ->leftJoin('attribute_values', "has_options.attr_val", "=", "attribute_values.id")
                                        ->select('products.product', 'products.parent_prod_id', 'has_options.attr_id', 'attribute_values.option_name', DB::raw("group_concat(has_options.prod_id) as productId"), 'has_options.attr_val')
                                        ->groupBy("has_options.attr_val")
                                        ->get();
                                ?>
                                <div class="selection-box">
                                    <select name="attributeval[]" class="country_to_state country_select" id="attributeval">
                                        <option value="">-- Please Select --</option>
                                        <?php foreach ($attrVal as $attributeValue) {
                                            ?>
                                            <option value="<?php echo $attributeValue->attr_val ?>"  data-prodId="<?php echo $attributeValue->productId; ?>"><?php echo $attributeValue->option_name ?></option>

                                        <?php } ?> 
                                    </select>
                                </div>
                                <div class="dt-sc-margin10"></div>
                                <div class="selectColor"></div>
                                <div class="dt-sc-margin10"></div>

                            </div>
                            <div class="quantity buttons_added">
                                <input type="button" class="minus" value="-">
                                <input type="number"  class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                <input type="button" class="plus" value="+">
                            </div>

                            <button id="prodId-[[ prods.id ]]" class="addTCartId single_add_to_cart_button button alt"  ng-click="addTocart();">Buy Now</button>
                        </form> 

                    </div> <!-- **summary - Ends** -->
                </div> <!-- **product - Ends** -->
            </div> <!-- **Woocommerce - Ends** -->
            <!-- **dt-sc-tabs-container - Starts** -->
            <div class="dt-sc-tabs-container type2 woocommerce-tabs">
                <!-- **dt-sc-tabs-frame - Starts** -->
                <ul class="dt-sc-tabs-frame">
                    <li> <a href="#">Overview</a> </li>
                    <li> <a href="#">Details</a> </li>
                    <li> <a href="#">Payments</a> </li>
                    <li> <a href="#">Shipping</a> </li>
                    <li> <a href="#">Help</a> </li>
                </ul>  <!-- **dt-sc-tabs-frame - Ends** -->

                <!-- **dt-sc-tabs-frame-content - Starts** -->
                <div class="dt-sc-tabs-frame-content">
                    <p>Assaying and Hallmarking Centre (A&HC) where the jewellery has been tested. It carries a code letter representing the year of hallmarking, the jewellerâ€™s mark and the number 916 to indicate the use of 22 carat gold. </p>
                </div> <!-- **dt-sc-tabs-frame-content - Ends** -->

                <!-- **dt-sc-tabs-frame-content - Starts** -->
                <div class="dt-sc-tabs-frame-content">

                    <p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                    <div class="dt-sc-hr-invisible-very-small"></div>
                    <p> <strong>Priority</strong> has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Aldus PageMaker including versions of Lorem Ipsum. </p>
                </div> <!-- **dt-sc-tabs-frame-content - Ends** -->

                <!-- **dt-sc-tabs-frame-content - Starts** -->
                <div class="dt-sc-tabs-frame-content">

                    <p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>

                    <div class="dt-sc-margin10"></div>
                </div> <!-- **dt-sc-tabs-frame-content - Ends** -->
                <!-- **dt-sc-tabs-frame-content - Starts** -->
                <div class="dt-sc-tabs-frame-content">

                    <p>Our online shopping facility is aimed at being hassle-free and to make shopping an absolute pleasure for you. Whether you want to search by products / occasions / special collections or even by weight, we have all the available options for you. Structured in simple steps, this segment allows you to search from our widest collection of classic jewellery, add to your shopping cart and pay through secure payment options. What's more, you can even gift to your loved ones anywhere in the world and we will ship it for you!

                        So, what are you waiting for? Simply go ahead - search, shop & surprise yourself, your family and friends with the splendour of KTM!</p>

                    <div class="dt-sc-margin10"></div>
                </div> <!-- **dt-sc-tabs-frame-content - Ends** -->
                <!-- **dt-sc-tabs-frame-content - Starts** -->
                <div class="dt-sc-tabs-frame-content">

                    <p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>

                    <div class="dt-sc-margin10"></div>
                </div> <!-- **dt-sc-tabs-frame-content - Ends** -->

            </div> <!-- **dt-sc-tabs-container - Ends** -->

            <div class="dt-sc-margin30"></div>
            <!-- **hr-title - Starts** -->
            <div class="hr-title dt-sc-hr-invisible-small">
                <h3>Products you might be interested</h3>
                <!-- **title-sep - Starts** -->
                <div class="title-sep"> </div> <!-- **title-sep - Ends** -->
            </div> <!-- **hr-title - Ends** -->
            <!-- **product - Starts** -->
            <ul class="products">

                <li>
                    <!-- **product-wrapper - Starts** -->   
                    <div class="product-wrapper product-three-column">
                        <!-- **product-container - Starts** -->   
                        <div class="product-container">
                            <a href="#"><div class="product-thumb"> <img src="images/jew/shop/pendant.jpg" alt="image"/> </div> </a>
                            <!-- **product-title - Starts** -->
                            <div class="product-title"> 
                                <a href="#"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                                <a href="#"> <span class="fa fa-unlink"></span> Read More </a>
                            </div> <!-- **product-title - Ends** -->
                        </div> <!-- **product-container - Ends** --> 
                        <!-- **product-details - Starts** --> 
                        <div class="product-details"> 
                            <h5> <a href="#"> Ellents Style Grade </a> </h5>
                            <span class="amount"> $20.00 </span> 
                        </div> <!-- **product-details - Ends** --> 
                    </div> <!-- **product-wrapper - Ends** -->  
                </li>

                <li>
                    <!-- **product-wrapper - Starts** -->   
                    <div class="product-wrapper product-three-column">
                        <!-- **product-container - Starts** -->   
                        <div class="product-container">
                            <a href="#"><div class="product-thumb"> <img src="images/jew/shop/Rings.jpg" alt="image"/> </div> </a>
                            <!-- **product-title - Starts** -->
                            <div class="product-title"> 
                                <a href="#"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                                <a href="#"> <span class="fa fa-unlink"></span> Read More </a>
                            </div> <!-- **product-title - Ends** -->
                        </div> <!-- **product-container - Ends** --> 
                        <!-- **product-details - Starts** --> 
                        <div class="product-details"> 
                            <h5> <a href="#"> Ellents Style Grade </a> </h5>
                            <span class="amount"> $20.00 </span> 
                        </div> <!-- **product-details - Ends** --> 
                    </div> <!-- **product-wrapper - Ends** --> 
                </li>

                <li class="last">
                    <!-- **product-wrapper - Starts** -->   
                    <div class="product-wrapper product-three-column">
                        <!-- **product-container - Starts** -->   
                        <div class="product-container">
                            <a href="#"><div class="product-thumb"> <img src="images/jew/shop/prod.jpg" alt="image"/> </div> </a>
                            <!-- **product-title - Starts** -->
                            <div class="product-title"> 
                                <a href="#"> <span class="fa fa-shopping-cart"></span> Add to Cart </a>
                                <a href="#"> <span class="fa fa-unlink"></span> Read More </a>
                            </div> <!-- **product-title - Ends** -->
                        </div> <!-- **product-container - Ends** --> 
                        <!-- **product-details - Starts** --> 
                        <div class="product-details"> 
                            <h5> <a href="#"> Ellents Style Grade </a> </h5>
                            <span class="amount"> $20.00 </span> 
                        </div> <!-- **product-details - Ends** --> 
                    </div> <!-- **product-wrapper - Ends** -->  
                </li>

            </ul> <!-- **product - Ends** -->
            <div class="dt-sc-margin10"></div>

        </section> <!-- **primary - Ends** --> 
    </div> <!-- **container - Ends** --> 

</div> <!-- **Main - Ends** --> 
@stop
@section('myscripts')
<script>
    $(document).ready(function () {
        $("#attributeval").change(function () {

            var optnId = $('#attributeval').val();
            var optProdId = $('#attributeval :selected').attr('data-prodId');

            $.ajax({
                type: "POST",
                url: "{{ URL::route('ajax-get-attr-val') }}",
                data: {optnId: optnId, optProdId: optProdId},
                cache: false,
                success: function (data) {

                    $('.selectColor').html(data);

                }
            });
        });

        $(document).on('change', '#attributeOptVal', function () {
            var attrOptnVal = $('#attributeOptVal').val();
          //  alert(attrOptnVal); 
            var productId = $('#prodId').val();
            // alert(productId); 
            $.ajax({
                type: "POST",
                url: "{{ URL::route('ajax-get-attr-price') }}",
                data: {attrOptnVal: attrOptnVal, productId: productId},
                cache: false,
                success: function (data) {
                    var attrOptPrice = data.split('-');
                    var prodTotal = parseFloat(attrOptPrice[0]) + parseFloat(attrOptPrice[1]);
                    $('#priceOptType').text(prodTotal);
                    $('#prodPrice').val(prodTotal);
                    $('#chlidProductId').val(attrOptnVal)
                }
            });
        });
    });

</script>



@stop
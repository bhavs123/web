@extends('frontend.layouts.default')
@section('content')

<!-- **Main - Starts** --> 
<div id="main">
    <div class="parallax full-width-bg">
        <div class="container">
            <div class="main-title">
                <h1>ORDER</h1>
                <div class="breadcrumb">
                    <a href="index.html">Home</a>
                    <span class="fa fa-angle-right"></span>
                    <span class="current">DETAILS</span>
                </div>
            </div>
        </div>
    </div>

    <div class="dt-sc-margin100"></div>  



    <div class="container">

        <!-- **secondary - Starts** --> 
        <section id="secondary-left" class="secondary-sidebar secondary-has-left-sidebar">
            <aside class="widget widget_categories">
                <h4 class="widgettitle">{{ ucfirst(Session::get("userName")) }}</h4>
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
                        <h4><a href="{{ route('orderDetails') }}">ORDER DETAILS</a></h4>
                    </div>

                    <?php
                    //  print_r($orderDetails); 
                    foreach ($orderDetails as $orderDetailsVal) {
                        // print_r($orderDetailsVal->cart) ;
                        $orderCart = json_decode($orderDetailsVal->cart, true);
                        // dd($orderCart); 
                        $orderDetailsVal->productId;
//    $prodID = explode(',',$orderDetailsVal->productId);
//    $prodName = explode(',',$orderDetailsVal->productName);
//    $prodQty = explode(',',$orderDetailsVal->productQty);
//    $prodUp = explode(',',$orderDetailsVal->productUprice);
//    $prodP = explode(',',$orderDetailsVal->productPrice);
                        ?>
                        <!-- **entry-meta-data - Starts** -->
                        <div class="entry-meta-data">
                            <p style="width: 28.33%; text-align: center;">Order ID: <span style="font-style:italic;">{{$orderDetailsVal->id}}</span></p>
                            <p style="width: 40.33%; text-align: center;">Date: <span style="font-style:italic;">{{$orderDetailsVal->created_at}}</span></p>
                            <p style="width: 28.33%; text-align: center;">Status: <span style="font-style:italic;">{{$orderDetailsVal->order_status}}</span></p>
                        </div> <!-- **entry-meta-data - Ends** -->



                        <div class="woocommerce">
                            <form action="#" method="post">

                                <table class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Product Details</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-price">Unit Price</th>

                                            <th class="product-subtotal">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($orderCart as $orderProd) {
                                            ?>                          
                                            <tr class="cart_table_item">

                                                <!-- The thumbnail -->
                                                <td class="product-thumbnail">
                                                    <div class="cart-item-details">
                                                        <a href="#">
                                                            <span class="customer-name">{{$orderProd['name']}}</span><br>

                                                        </a>                                                
                                                    </div>
                                                </td>



                                                <!-- Product price -->
                                                <td class="product-price">
                                                    <span class="amount">{{$orderProd['qty']}}</span>
                                                </td>

                                                <!-- Quantity inputs -->


                                                <!-- Product subtotal -->
                                                <td class="product-subtotal">
                                                    <span class="amount">{{$orderProd['price']}}</span>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span class="amount">{{$orderProd['price']*$orderProd['qty']}}</span>
                                                </td>

                                            </tr> 
                                            <?php
                                        }
                                        ?>
                                        <tr class="cart_table_item">

                                            <!-- The thumbnail -->
                                            <td class="">
                                                <div class="cart-item-details">
                                                    <a href="#">
                                                        <span class="customer-name">&nbsp;</span>
                                                    </a>                                                
                                                </div>
                                            </td>

                                            <td class="">
                                                <span class="cart-item-details">&nbsp;</span>                   
                                            </td>
                                            <td class="">
                                                <div class="product-quntity">Sub Total</div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="cart-item-details"><span class="amount">{{$orderDetailsVal->totalOrderAmt}}</span></span>                   
                                            </td>

                                        </tr>

                                        <tr class="cart_table_item">

                                            <!-- The thumbnail -->

                                            <td class="">
                                                <div class="cart-item-details">
                                                    <a href="#">
                                                        <span class="customer-name">&nbsp;</span>
                                                    </a>                                                
                                                </div>
                                            </td>
                                            <td class="">
                                                <span class="cart-item-details">&nbsp;</span>                   
                                            </td>
                                            <td class="">
                                                <div class="product-quntity">Shipping Charges</div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="cart-item-details"><span class="amount">-</span></span>                   
                                            </td>

                                        </tr>

                                        <tr class="cart_table_item">

                                            <td class="">
                                                <div class="cart-item-details">
                                                    <a href="#">
                                                        <span class="customer-name">&nbsp;</span>
                                                    </a>                                                
                                                </div>
                                            </td>


                                            <td class="">
                                                <span class="cart-item-details">&nbsp;</span>                   
                                            </td>
                                            <td class="">
                                                <div class="product-quntity">Discount Coupen</div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="cart-item-details"><span class="amount">-</span></span>                   
                                            </td>

                                        </tr>

                                        <tr class="cart_table_item">

                                            <!-- The thumbnail -->

                                            <td class="">
                                                <div class="cart-item-details">
                                                    <a href="#">
                                                        <span class="customer-name">&nbsp;</span>
                                                    </a>                                                
                                                </div>
                                            </td>
                                            <td class="">
                                                <span class="cart-item-details">&nbsp;</span>                   
                                            </td>
                                            <td class="">
                                                <div class="product-quntity">Reward Point</div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="cart-item-details"><span class="amount">-</span></span>                   
                                            </td>

                                        </tr>

                                        <tr class="cart_table_item">


                                            <td class="">
                                                <div class="cart-item-details">
                                                    <a href="#">
                                                        <span class="customer-name">&nbsp;</span>
                                                    </a>                                                
                                                </div>
                                            </td>
                                            <td class="">
                                                <span class="cart-item-details">&nbsp;</span>                   
                                            </td>
                                            <td class="">
                                                <div class="product-quntity" style="font-weight:bold;">Shippment Total</div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="cart-item-details"><span class="amount">{{$orderDetailsVal->totalOrderAmt}}</span></span>                   
                                            </td>

                                        </tr>


                                    </tbody>
                                </table>


                            </form>



                        </div>
                        <div style="float:right;">
                            <?php if ($orderDetailsVal->statusId == '1') { ?> <a href="javascript:void();" id="cancelorder-{{$orderDetailsVal->id}}"   class="dt-sc-button smallwidth cancelorder" style="margin-right:10px;"> Cancel</a>
                            <?php } ?>
                            <a href="#" class="dt-sc-button smallwidth" style="margin-right:10px;"> Return</a>
                            <a href="#" class="dt-sc-button smallwidth"> Exchange </a></div>
                        <div class="dt-sc-margin10"></div>
                    <?php } ?>

                </div> <!-- **entry-detail - Ends** -->
            </article><!-- **Blog-post - Ends** -->

            <div class="dt-sc-margin80"></div>
        </section> <!-- **Primary - Ends** --> 

    </div> <!-- **container - Ends** --> 



</div><!-- **Main - Ends** --> 


@endsection
@section('myscripts')

<script>
    function cancelorder(orderId)
    {
        // alert(orderId);

    }
    $(document).ready(function () {
        $('.cancelorder').click(function () {
            var getcalId = $('.cancelorder').attr('id');
            var calId = getcalId.split('-');
            var orderId = calId[1];
            var bhavana = confirm("Are you sure? This order will be canceled this order.");
            if (bhavana == true)
            {
                $.ajax({
                    type: "POST",
                    url: '/cancel-order',
                    data: {orderId: orderId},
                    cache: false,
                    success: function (data) {

                        location.reload();
                    }
                });
            }

        });
    });

</script>
@stop
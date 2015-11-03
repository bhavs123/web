@extends('frontend.layouts.default')
@section('content')
  <!-- **Main - Starts** --> 
		<div id="main">
        	<div class="parallax full-width-bg">
            	<div class="container">
                	<div class="main-title">
                    	<h1>Shopping Cart</h1>
                        <div class="breadcrumb">
                            <a href="index.html">Home</a>
                            <span class="fa fa-angle-right"></span>
                            <span class="current">Payment</span>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="dt-sc-margin100"></div>  
			<div class="container">
			
            <div class="process_bar flight">
                <div class="one_pb1"> <span class="circle">1</span> <!--i class="fa fa-shopping-cart"></i--> Cart </div>
                <div class="one_pb2"> <span class="circle">2</span> <!--i class="fa fa-truck"></i--> Shipping </div>
                <div class="one_pb3"> <span class="circle active">3</span> <!--i class="fa fa-money"></i--> Payment </div>
                <hr>
            </div>
			
        </div>
            <div class="dt-sc-margin15"></div>    
			<!-- Container starts-->
			<div class="container">
                <!-- **primary - Starts** --> 
                <section id="primary" class="content-full-width">
                    <!-- **woocommerce - Starts** --> 
                    <div class="woocommerce">
                        
                        <!-- **checkout - Starts** -->
                        <form name="checkout" method="post" class="checkout" action="{{ URL::route('checkout')}}">
                            <!-- **col2-set - Starts** -->    
                            
                            <div class="dt-sc-margin50"></div>
                            <h3 id="order_review_heading">Order Review &amp; Payment</h3>
                            <div id="order_review">
                                <table class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Item</th>
                                            <th class="product-name">&nbsp;</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($cart as $cartValue) 
                                        <tr class = "cart_table_item">
                                        <input type="hidden" name="prod[{{  $cartValue->prod_id }}][id]" value="{{ $cartValue->id }}" />
                                        <input type="hidden" name="prod[{{  $cartValue->prod_id }}][prod_id]" value="{{ $cartValue->prod_id }}" />
                                        
            
                                        <!-- The thumbnail -->
                                        <td class="product-thumbnail">
                                           <a href="/{{ @App\Models\Product::find($item->id)->url_key}}"><img src="{{ $cartValue->options->image }}" class="attachment-shop_thumbnail wp-post-image" alt="{{ $cartValue->name }}" /></a>
                                        </td>
            
                                        <!-- Product Name -->
                                        <td class="product-name">
                                            <a href="#">{{ $cartValue['name'] }}</a>
                                        </td>
            
                                        <!-- Product price -->
                                        <td class="product-price">
                                            <span class="amount">{{ $cartValue['price'] }}</span>
                                        </td>
            
                                        <!-- Quantity inputs -->
                                        <td class="product-quantity">
                                        	
                                            <span>{{ $cartValue['qty'] }}</span>	
                                        </td>
            
                                        <!-- Product subtotal -->
                                        <td class="product-subtotal">
                                            <span class="amount">{{ $cartValue['qty']*$cartValue['price'] }}</span>
                                        </td>
                                        
                                        <!-- Remove from cart link -->
                                        
                                    </tr>
                                        
                                     @endforeach   
                                    </tbody>
                                </table>
								
								
								<div class="col2-set" id="customer_details">
								<div class="col-1">
								<div class="cart_totals ">
                                    
                                        <h2>Cart Totals</h2>
                                        
                                        <table>
                                            <tbody>
                                            
                                                <tr class="cart-subtotal">
                                                    <th style="background:#FBFBFB;"><strong>Cart Subtotal</strong></th>
                                                    <td style="background:#FBFBFB;"><span class="amount">{{ $cartTotal}} </span></td>
                                                </tr>
                                                
                                                <tr class="shipping">
                                                    <th style="background:#FBFBFB;"><strong>Shipping</strong></th>
                                                    <td style="background:#FBFBFB;">Free Shipping<input type="hidden" name="shipping_method" id="shipping_method" value="free_shipping" /></td>
                                                </tr>
                                                
                                                <tr class="total">
                                                    <th style="background:#FBFBFB;"><strong>Order Price Total</strong></th>
                                                    <
                                                    <td style="background:#FBFBFB;"> <strong><span class="amount">{{ $cartTotal }}</span></strong><input type="hidden" name="order_total" id="order_total" value="{{ $cartTotal }}" /> </td>
                                                </tr>
                                            
                                            </tbody>
                                        </table>
        
                                    </div>
								</div>
								<?php // print_r($cartTotal); ?>
								<div class="col-2">
								<div class="cart_totals ">
								<h2>Payment Options</h2>
								<div id="payment">
                                    <ul class="payment_methods methods">
                                        <li class="payment_method_paypal">
                                            <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="COD"  data-order_button_text="Proceed to PayPal" />
                                            <label for="payment_method_paypal"><span></span>COD </label>
                                            <div class="payment_box payment_method_paypal" style="display:none;"><p>COD</p> </div>						
                                        </li>
                                        <li class="payment_method_bacs">
                                            <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs"  checked='checked' data-order_button_text="" />
                                            <label for="payment_method_bacs"><span></span>Direct Bank Transfer </label>
                                            <div class="payment_box payment_method_bacs" ><p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p> </div>
                                        </li>
                                        <li class="payment_method_cheque">
                                            <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque"  data-order_button_text="" />
                                            <label for="payment_method_cheque"><span></span>Cheque Payment </label>
                                            <div class="payment_box payment_method_cheque" style="display:none;"><p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p> </div>		
                                        </li>
                                        <li class="payment_method_paypal">
                                            <input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="paypal"  data-order_button_text="Proceed to PayPal" />
                                            <label for="payment_method_paypal"><span></span>PayPal <img src="images/paypal.png" alt="PayPal" /></label>
                                            <div class="payment_box payment_method_paypal" style="display:none;"><p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p> </div>						
                                        </li>
                                    </ul>
                                    
                                    <div class="form-row place-order">
        
                                        <noscript>Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.</noscript>
                                        
                                        
                                    </div>
                            <div style="float:right;">
                                <input type="submit" class="dt-sc-button smallwidth" style="margin-right:10px;" value="Place Order"> 
					<a href="payment.html" class="dt-sc-button smallwidth"> Back </a></div>
                                    <div class="clear"></div>
        
                                </div>  <!-- **payment - Ends** --> 
								</div>
								</div>
								</div>
                        
                                
                            </div> <!-- **order_review - Ends** -->
                        </form> <!-- **checkout - Ends** -->
                    </div> <!-- **woocommerce - Ends** --> 
                    <div class="dt-sc-margin50"></div>
                    
                </section> <!-- **Primary - Ends** -->          
           
            </div>
			<!-- **container - Ends** --> 
		
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
    });
</script>
@stop
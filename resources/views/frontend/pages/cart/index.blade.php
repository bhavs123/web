@extends('frontend.layouts.default')
@section("mystyles")
<style>  
    span.font-normal { 
        font-size: 11px;
    }   
    input[type="text"],input[type="number"] { 
        margin-bottom: 0px !important;
    }   
    .error { 
        border: 1px solid #e9322d !important;  box-shadow: 0 0 6px #f8b9b7 !important;
    }
</style> 


@stop
<?php
echo "<pre>";
//print_r($cart);
echo "</pre>"; 
?>
@section('content')

<div id="main">
    <div class="parallax full-width-bg">
        <div class="container">
            <div class="main-title">
                <h1>Shopping Cart</h1>
                <div class="breadcrumb">
                    <a href="index.html">Home</a>
                    <span class="fa fa-angle-right"></span>
                    <span class="current">Cart</span>
                </div>
            </div>
        </div>
    </div>

    <div class="dt-sc-margin100"></div>  
    <div class="container">

        <div class="process_bar flight">
            <div class="one_pb1"> <span class="circle active">1</span> <!--i class="fa fa-shopping-cart"></i--> Cart </div>
            <div class="one_pb2"> <span class="circle">2</span> <!--i class="fa fa-truck"></i--> Shipping </div>
            <div class="one_pb3"> <span class="circle">3</span> <!--i class="fa fa-money"></i--> Payment </div>
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
                <form action="#" method="post">

                    <table class="shop_table cart">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Item</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                
                                <th class="product-total">Total</th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $cartValue)


                            <tr class = "cart_table_item">

                                <!-- The thumbnail -->

                                <td class="product-thumbnail">

                                    <a href="/{{ @App\Models\Product::find($item->id)->url_key}}"><img src="{{ $cartValue->options->image }}" class="attachment-shop_thumbnail wp-post-image" alt="{{ $cartValue->name }}" /></a>
                                </td>

                                <!-- Product Name -->
                                <td class="product-price">
                                    <span class="amount">{{ $cartValue['name'] }}</span>
                                </td>

                                <!-- Product price -->
                                
                                <td class="product-subtotal">
                                    <span class="amount">{{ $cartValue['price'] }}</span>
                                </td>
                                <!-- Quantity inputs -->
                                <td class="product-quantity">

                                    <div class="quantity">
<!--                                        <input type="button" class="minus" value="-"/>-->
                                        <input type="number" name="quantity" step="1" value="{{ $cartValue['qty'] }}" prod-id="{{ $cartValue->rowid }}" product-id="{{ $cartValue->id }}"  name="quantity{{ $cartValue->rowid }}" min="1" title="Qty" class="input-text qty editquantity text" required="required" />
<!--                                        <input type="button" class="plus" value="+"/>-->
                                    </div>			
                                </td>

                                <!-- Product subtotal -->
                                
                                 <td class="product-subtotal">
                                    <span class="{{ $cartValue->rowid }}">{{ $cartValue['qty']*$cartValue['price'] }}</span>
                                </td>

                                <!-- Remove from cart link -->
                                <td class="product-remove">
                                    <a href="javascript:void(0);" class="CartRemoveItem remove" data-rowid='{{$cartValue->rowid}}' title="Remove this item">&times;</a></td>
                            </tr>
                           

                            <?php
//                                echo '<pre>';
//                                 print_r($cartValue);
//                                 echo '</pre>';
                            ?>
                            @endforeach
                             <tr>
                                 <td colspan="4"><span class="amount">Subtotal (Rs.)</span></td>
                                    <td> <span class="fwb grandTotal">{{ Cart::total() }}</span> </td>
                                </tr>
                        </tbody>
                    </table>


                </form>



            </div> <!-- **woocommerce - Ends** --> 
            <div class="coupon" style="float:left;">
                <input type="text" class="input-text " name="" id="" placeholder="Enter your Pincode" value="" style="width:200px; margin-top:0px;"><input type="submit" class="button" name="check" value="Check" />
            </div>
            <div style="float:right;">
                <a href="{{ URL::route('home') }}" class="dt-sc-button smallwidth" style="margin-right:10px;"> Continue Shopping</a>
                <a href="{{ URL::route('shipping') }}" class="dt-sc-button smallwidth"> Checkout </a></div>
            <div class="dt-sc-margin50"></div>
        </section>        

    </div>
    <!-- **container - Ends** --> 

</div>
<?php

function search($array, $key, $value) {
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }
        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }
    return $results;
}
?>
@stop
@section('myscripts')
<script>
    $(document).ready(function () {
        $(".CartRemoveItem").click(function () {
            var rowid = $(this).attr("data-rowid");

            $.ajax({
                type: "POST",
                url: "/delete-item-cart",
                data: {rowid: rowid},
                cache: false,
                success: function (data) {

                    // alert("sdfdfs");

                    location.reload();

                    //$(".hCartCount").text(data);

                }


            });
        });
         $(".qty").on('input', function() {
           //  alert("gsdgsdg");
                var qty = $(this).val();
                var rowid = $(this).attr("prod-id");
                var productId = $(this).attr("product-id");
        if (qty !== "" && qty > 0) {
                  
                    $.ajax({
                        url:  "{{ URL::route('editCart') }}",
                        type: "POST",
                        data: {rowid: rowid, qty: qty, productId: productId},
                        success: function(data) {
                             var totals = data.split("||||||||||");
                                $("."+rowid).html(totals[0]);
                                $(".grandTotal").html(totals[1]);
                                //$(".TotalCartAmt").text(totals[1]);
                                //$(".orderAmt").val(totals[1]);
                            } 
                    });
                }
               
            });
            
        
    });
</script>
@stop
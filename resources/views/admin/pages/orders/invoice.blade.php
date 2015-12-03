
<style type="text/css">
    body{color:#000;}
    .invcontainer{width:970px;  margin: 0 auto; background: #fff; color: #000; padding: 30px; font-family: 'Roboto', 'sans-serif'; font-size:16px; display: table;}
    .w100{width:100%; float: left; }
    .w50{width:50%; float: left;}
    .w20{width:20%; float: left;} 
    .w10{width:10%; float: left;} 
    .w15{width:15% !important; float: left;} 
    .w30{width:30%; float: left;}
    .w60{width:60%; float: left;}
    .w40{width:40%; float: left;}
    .w45{width:45%; float: left;}
    .w70{width:70%; float: left;}
    .w85{width:85%; float: left;}

    .compname{font-family: 'Roboto', 'sans-serif'; font-size: 20px;}
    .mt30{margin-top: 30px;}
    .mt40{margin-top: 40px;}
    .mt50{margin-top: 50px;}
    .mt60{margin-top: 60px;}

    .inv{font-family: 'Roboto', 'sans-serif'; font-size: 30px; text-transform: uppercase;}
    .mt100{margin-top: 100px;}
    table{width:100%; border-spacing: 0px; border-collapse: collapse; }
    table td{border: 1px solid #C5C5C5; padding: 8px 10px; font-size: 16px;}
    table td span{font-family:'Roboto', 'sans-serif';  font-size:16px; font-weight:bold;}
    .mt70{margin-top:70px;}
    .txtc{text-align: center;}
    .txtr{text-align: right;}
    .br0{border-right: 1px solid #fff;}
    .tupp{text-transform: uppercase;}
    .noborder table td{border:none !important;}
    .noborder{line-height: 23px;}

    .ProdTable td{border:0;
                  font-size: 15px; vertical-align: middle; border: 1px solid #e4e4e4;
    }
    @media print {
        .col_print{color: #000 !important;}


    }

</style>

<style type="text/css" media="print">
    .col_print{color: #000;}
</style>

<div class="invcontainer"  style="page-break-after:always; position: relative; min-height:100%;">
    <div class="w100">
        <div class="w100 ">


        </div>
        <div class="clearfix"></div>
        <div style="border-bottom: 1px solid #e4e4e4; margin:10px 0px;"> </div>
        <div class="w100" style="text-align:center; margin-top: 10px;">
            <div class="inv">Tax Invoice</div>
        </div>
    </div>

    <div class="w100 mt50">
        <table style="color:#000">
            <tr>
                <td class="w60"><span> Date Added: </span>{{ date('d/m/y' , strtotime($order->created_at)) }}</td>
                <td class="w40" rowspan="2"><span> Payment Method: </span>{{$order->paymentmethod['name']}}</td>
            </tr>
            <tr>
                <td class="w60"><span> Invoice No: </span> {{ $order->id }} </td>

            </tr>
        </table>
    </div>

    <div class="w100 mt30">
        <table class="noborder" style="color:#000">
            <tr>
                <td class="w100"><span>Billing Address </span></td>

            </tr>

            <tr>
                <td class="w100">


                    {{$order->first_name}} {{$order->last_name}}<br>
                    {{$order->city}} {{$order->location}}<br>
                    {{$order->country['name']}} {{$order->state['name']}}<br>
                    {{$order->mobile}} <br>
                    {{$order->postcode}} <br>



                </td>

            </tr>

        </table>
    </div>

    <div class="w100 mt30" style="margin-bottom:15px;">
        <table class="ProdTable">
            <tr>

                <td style="font-family:'Roboto', 'sans-serif';font-size:16px;line-height:18px;color:#000;text-align:left;line-height:22px;padding-left:3px;font-weight:bold;width:35px">
                    Sl No.</td>
                <td style="font-family:'Roboto', 'sans-serif';font-size:16px;line-height:18px;color:#000;text-align:left;line-height:22px;padding-left:3px;font-weight:bold;width:240px">
                    Item Details
                </td>
                <td style="font-family:'Roboto', 'sans-serif';font-size:16px;line-height:18px;color:#000;text-align:center;line-height:22px;padding-left:3px;font-weight:bold;width:30px">
                    Qty.
                </td>
                <td style="font-family:'Roboto', 'sans-serif';font-size:16px;line-height:18px;color:#000;text-align:right;line-height:22px;padding-left:3px;font-weight:bold;width:70px">
                    Unit Price
                </td>
                <td style="font-family:'Roboto', 'sans-serif';font-size:16px;line-height:18px;color:#000;text-align:right;line-height:22px;padding-left:3px;font-weight:bold;width:70px">
                    Sub Total
                </td>

                <td style="font-family:'Roboto', 'sans-serif';font-size:16px;line-height:18px;color:#000;text-align:right;line-height:22px;padding-left:3px;font-weight:bold;width:75px">
                    Savings
                </td>


            </tr>


            <?php
            $cartItems = json_decode($order->cart, true);
            $cartDetails = $order->cart;
            $totSav = 0;
            $subtotal = 0;
            ?>

            <?php $i = 1; ?>
            @foreach($cartItems as $prod)




            <tr style="background-color:#ffffff;font-size:11px;font-family:arial;color:#000;line-height:18px">




                <td style="text-align:center;padding:3px 0 3px 3px">
                    {{ $i }}
                </td>
                <td style="width:240px;padding:3px 0 3px 3px">
                    <label style="line-height:18px">

                        <span>
                            {{$prod['name'] }}

                        </span>

                    </label>
                </td>
                <td style="text-align:center;padding:3px 0 3px 3px;width:30px">
                    <label>{{$prod['qty'] }}</label>
                </td>
                <td style="text-align:right;width:70px;padding:8px 10px">
                    <label>
                        <i class="fa fa-rupee"></i> {{ $prod['price'] }}
                    </label>
                </td>
                <td style="text-align:right;padding:8px 10px;width:70px">
                    <label><i class="fa fa-rupee"></i>  
                        {{ $prod['subtotal'] }}</label>
                </td>



                <td style="text-align:right;padding:8px 10px;width:75px">



                </td>





            </tr>

            <?php $i++; ?>
            @endforeach



            <tr style="background-color:#fff;font-weight:bold;color:#000;font-family:arial">

                <td style="text-align:right;white-space:nowrap;line-height:26px;border-top:1px solid #cccccc" colspan="4">
                    Subtotal</td>
                <td style="text-align:right;padding-left:15px;border-top:1px solid #cccccc" align="right"> <i class="fa fa-rupee"></i> {{ $order->order_amt }}</td>
                <td style="text-align:right;padding-left:15px;border-top:1px solid #cccccc" align="right">{{ $totSav > 0 ? '<i class="fa fa-rupee"></i> '.$totSav : ''}}</td>
            </tr>

            @if(!empty($order->coupon_amt_used))



            <tr style="background-color:#fff;font-weight:bold;color:#000;font-family:arial">

                <td style="text-align:right;white-space:nowrap;line-height:26px;border-top:1px solid #cccccc" colspan="4">Coupon Used {{  $order->coupon_used != 0 ? "(".Coupon::find($order->coupon_used)->voucher_code.")" : ""  }}</td>
                <td style="text-align:right;padding-left:15px;border-top:1px solid #cccccc" ><i class="fa fa-rupee"></i>  {{ number_format($order->coupon_amt_used) }}</td>
                <td></td>
            </tr>

            @endif



            @if(!empty($order->referal_code_used))



            <tr style="background-color:#fff;font-weight:bold;color:#000;font-family:arial">

                <td style="text-align:right;white-space:nowrap;line-height:26px;border-top:1px solid #cccccc" colspan="4">Referral Code Used </td>
                <td style="text-align:right;padding-left:15px;border-top:1px solid #cccccc" ><i class="fa fa-rupee"></i>  {{ number_format($order->referal_code_amt) }}</td>
                <td></td>
            </tr>

            @endif

            @if(!empty($order->cashback_used))



            <tr style="background-color:#fff;font-weight:bold;color:#000;font-family:arial">

                <td style="text-align:right;white-space:nowrap;line-height:26px;border-top:1px solid #cccccc" colspan="4">Used Reward Points </td>
                <td style="text-align:right;padding-left:15px;border-top:1px solid #cccccc" ><i class="fa fa-rupee"></i>  {{ number_format($order->cashback_used) }}</td>
                <td></td>
            </tr>

            @endif




            <tr style="background-color:#fff;font-weight:bold;color:#000;font-family:arial">

                <td style="text-align:right;white-space:nowrap;line-height:26px;border-top:1px solid #cccccc" colspan="4">Shipping Charges</td>
                <td style="text-align:right;padding-left:15px;border-top:1px solid #cccccc" ><i class="fa fa-rupee"></i>  {{ $order->shipping_amt }}</td>
                <td></td>
            </tr>

            <tr style="background-color:#fff;font-weight:bold;color:#000;font-family:arial">


                <td colspan="6" style="border-top:1px solid #cccccc;border-top:1px solid #666;font-weight:bold;color:#000"></td>


            </tr><tr>

            </tr><tr style="background-color:#666;color:#fff;font-weight:bold;font-size:12px;font-family:arial" class="col_print">

                <td colspan="4" style="text-align:right;white-space:nowrap;line-height:26px;font-weight:bold">
                    Total:
                </td>
                <td  style="text-align:right;padding-left:15px;white-space:nowrap;font-weight:bold">
                    <i class="fa fa-rupee"></i> {{ number_format($order->pay_amt) }}
                </td>
                <td></td>
            </tr>



        </table>  
    </div>



    <div style="width:100%; padding: 30px 0;">
        <div class="mt100 " style=" width:98%; height:100px;   margin-left: 1%; margin-right: 1%; margin-top: 10px;">
            <div class=" w70 " style="font-size:12px;"> 
                <i class="fa fa-envelope"></i> support@pluckk.com.com 
                <i class="fa fa-globe"></i> http://www.pluckk.com <br />
                <i class="fa fa-map-marker"></i> Office : E-6, Kailash Espalande, Opp Shreyas Cinema, L.B.S Marg, Ghatkopar (W), Mumbai - 400 086 <br />
                <i class="fa fa-map-marker"></i> Registered Office : B-601, 6th Floor, Sahyog Co-op Hsg Soc. Ltd., S.V.Road, Kandivali (W), Mumbai - 400 067 <br />
                <i class="fa fa-phone"></i> 070454 55757 | 070454 55758
            </div>
            <div class="tupp txtr w30" style="font-size:12px;"> 




                <a href="javascript:window.print()" class="tr_delay_hover r_corners button_type_14 bg_color_blue color_light f_right" id="printpagebutton1" type="button" value="Print this page" onclick="printpage()" style="min-height: 23px;"> <i class="fa fa-print"> </i> Print</a>  <br/>
                <div class="clearfix"></div>
                <span style="font-size:10px">This is a computer generated invoice </span>
            </div>
        </div> 
    </div>
</div>

<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton1");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
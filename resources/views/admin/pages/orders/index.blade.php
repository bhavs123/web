@extends('admin.layouts.default')
@section('content')

<div class="panel-body">
    <div class="adv-table editable-table">

        <div class="row">
            <div class="col-sm-9 col-xs-12 rtborder" >
                <form method="get" action="{{ URL::route(Route::currentRouteName()) }}" id="searchForm">
                    <div class="btn-group pull-left col-md-12">
                        <div class="form-group col-md-3">
 

                            <input type="hidden" value="orderSearch" name="orderSearch">

                            <input type="text" value="" name="search" aria-controls="editable-sample" class="form-control medium" placeholder="Search by Name,Email,Telephone"/>

                        </div>


                        <div class="form-group col-md-3 col-xs-12">
                            <input type="text" name="from_date" value=""  class="form-control fromDate " placeholder="From Order Date" autocomplete="off" id="fromdatepicker">
                        </div>
                        <div class="form-group col-md-3 col-xs-12">
                            <input type="text" name="to_date" value=""    class="form-control toDate col-md-3" placeholder="To Order Date" autocomplete="off" id="todatepicker">
                        </div>

                       <!-- <div class="form-group col-md-3 col-xs-12">
                            <input type="text" name="delivery_fdate" value=""    class="form-control DFromDate col-md-3" placeholder="From Delivery Date" autocomplete="off" id="DeliveryFromdatepicker">
                        </div>

                        <div class="form-group col-md-3 col-xs-12">
                            <input type="text" name="delivery_tdate" value=""    class="form-control DtoDate col-md-3" placeholder="To Delivery Date" autocomplete="off" id="DeliveryTodatepicker">
                        </div>


                        <div class="form-group col-md-3 col-xs-12">



                        </div>

                        <div class="form-group col-md-3 col-xs-12">



                        </div>-->
                        <!--
                                                            <div class="form-group col-md-3">
                                                                <input type="text" name="s_delivery_boy" value="{{ !empty(Input::get('s_delivery_boy'))?Input::get('s_delivery_boy'):"" }}"    class="form-control col-md-3" placeholder="Delivery boy" autocomplete="off" >
                                                            </div>-->


                        <div class="form-group col-md-3 col-xs-12">
                            <input type="submit" name="submit" class="btn btn-sm btn-success" value="Search">
                        </div>


                    </div>
                </form>

            </div>





            <div class="col-sm-3 col-xs-12" >


                <div class="space15">
                    <div class="btn-group pull-right col-md-12 col-xs-12 " >
                        <form action="" method="post" target="_blank">
                            <input type="hidden" value="" name="OrderIds" />
                            <select name="orderAction" id="orderAction" class="form-control">
                                <option value="">Please Select an Action</option>


                                <option value="1">View Invoice</option>
                                <option value="2">View Tripsheet</option>
                                <option value="3">Export</option>


                                <optgroup label="Update Order Status">
                                    <option value="4">Received</option>
                                    <option value="5">Under Preparation</option>
                                    <option value="6">Dispatched</option>
                                    <option value="8">Delivered</option>
                                    <option value="9">Cancelled</option>
                                    <option value="10">Request for cancellation</option>

                                </optgroup>
                                <optgroup label="Update Payment Status">
                                    <option value="13">Pending</option>
                                    <option value="14">Cancelled</option>
                                    <option value="15">Partially Paid</option>
                                    <option value="16">Paid</option>
                                </optgroup>

                            </select>
                        </form> 
                    </div>

                </div>

            </div>



        </div> 
    </div>  
</div>
<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Orders</h1>
</div>
<div class="panel panel-default">
    <div class="row wrapper">
        <div class="col-sm-3 pull-right">           
            <!--           <form method="get" action=" " id="searchForm">
                            <input type="hidden" name="attrCatalog">
                            <div class="form-group col-md-4">
                                <input type="text" value=" " name="attr_name" aria-controls="editable-sample" class="form-control medium" placeholder="Attribute Name">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="submit" name="search" class="btn sbtn btn-block" value="Search">
            
                            </div>
            
                        </form>-->
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table orderTable table-striped b-t b-light">
        <thead>
            <tr>
                <th><input type="checkbox" name="checkbox" id="checkAll" ></th>
                <th>Order id</th>
                <th>Customer Name</th>
                <th>Customer Email</th>
                <th>Order Country</th>
                <th>Order Amount</th>
                <th>Order Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderInfo as $orders)

            <tr>
                <td><input type="checkbox" name="orderId" class="checkOrderId" value="{{$orders->id}}"></td>
                <td>{{$orders->id}}</td>
                <td>{{$orders->first_name." ".$orders->last_name}}</td>
                <td>{{$orders->users['email']}}</td>
                <td>{{$orders->country['name']}}</td>
                <td>{{$orders->order_amt}}</td>
                <td>{{$orders->created_at}}</td>
                <td>
                    <a href="{{route('admin.orders.edit',['id'=>$orders->id])}}" class="label label-success active" ui-toggle-class="">Edit</a> <a href="javascript:void(0);" class="label label-danger active" ui-toggle-class="">Delete</a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<footer class="panel-footer">
    <div class="row">
        <div class="col-sm-4 text-right text-center-xs pull-right">                
            <?php
            if (empty(Input::get('orderSearch'))) {
                 echo  $orderInfo->render();
            } ?>      
        </div>
    </div>
</footer>


@stop 
@section('myscripts')
<script>
    $(document).ready(function () {
        $('#checkAll').click(function (event) {
            alert("dfsdf");
            var checkbox = $(this),
                    isChecked = checkbox.is(':checked');
            alert(isChecked);
            if (isChecked) {
                $('.checkOrderId').attr('Checked', 'Checked');
            } else {
                $('.checkOrderId').removeAttr('Checked');
            }
        });
        $("select#orderAction").change(function () {
            //bhavana added code
//            var favorite = []
//              $.each($("input[name='orderId']:checked"), function(){            
//                favorite.push($(this).val());
//            });
//            alert(favorite);
            var ids = $(".orderTable input.checkOrderId:checkbox:checked").map(function () {
                return $(this).val();
            }).toArray();
            $("input[name='OrderIds']").val(ids);

            if ($(this).val() == 1) {
                $(this).parent().attr("action", "{{ URL::route('orderInvoice') }}");
            }
            if (ids.length > 0) {
                $(this).parent().submit();
            }
        });
    });
</script>
<script>
  $(function() {
    $( "#fromdatepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
     $( "#todatepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
  });
  </script>

@stop
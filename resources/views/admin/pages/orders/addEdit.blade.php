@extends('admin.layouts.default')
@section('content')


<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Edit Order</h1>
</div>

<div class="panel panel-default">
    <div>
        <h4 class="m-n font-thin h3">Order Details</h4>
    </div>
    <div class="panel-body">
        {!! Form::model($orders, ['method' => 'post', 'files'=> true, 'url' => $action , 'class' => 'form-horizontal' ]) !!}



        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Payment Method', 'Payment Method',['class'=>'control-label']) !!}
                {!! Form::hidden('id',null) !!}
                {!! Form::select('payment_method',$paymentMethod, isset($orders->payment_method)?$orders->payment_method:null,["class"=>'form-control' ,"placeholder"=>'Enter Payment Method', "required"]) !!}
            </div>
        </div>

        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Payment Status', 'Payment Status',['class'=>'control-label']) !!}
                {!! Form::select('payment_status',$paymentStatus, isset($orders->payment_status)?$orders->payment_status:null, ["class"=>'form-control' ,"placeholder"=>'Enter Payment Status', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Order Status', 'Order Status',['class'=>'control-label']) !!}
                {!! Form::select('order_status',$orderStatus,isset($orders->order_status)?$orders->order_status:null, ["class"=>'form-control' ,"placeholder"=>'Enter Order Status', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Current Payable Amount', 'Current Payable Amount',['class'=>'control-label']) !!}
                {!! Form::text('payable_amount',$orders->pay_amt, ["class"=>'form-control' ,"placeholder"=>'Enter Payable Amount', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('COD Charges', 'COD Charges',['class'=>'control-label']) !!}
                {!! Form::text('cod_charges',$orders->cod_charges, ["class"=>'form-control' ,"placeholder"=>'Enter COD Charges', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Shipping Amount', 'Shipping Amount',['class'=>'control-label']) !!}
                {!! Form::text('shipping_amount',$orders->shipping_amt, ["class"=>'form-control' ,"placeholder"=>'Enter Shipping Amount', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Coupon Amount Used', 'Coupon Amount Used',['class'=>'control-label']) !!}
                {!! Form::text('coupon_amount',$orders->coupon_amt_used, ["class"=>'form-control' ,"placeholder"=>'Coupon Amount Used', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Voucher Amount Used', 'Voucher Amount Used',['class'=>'control-label']) !!}
                {!! Form::text('shipping_amount',$orders->voucher_amt_used, ["class"=>'form-control' ,"placeholder"=>'Voucher Amount Used', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12"> 
                {!! Form::label('Comments', 'Comments',['class'=>'control-label']) !!}
                {!! Form::text('comments',$orders->order_comment, ["class"=>'form-control' ,"placeholder"=>'Enter Comments', "required"]) !!}
            </div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div>
            <h4 class="m-n font-thin h3">Customer Details</h4>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('First Name', 'First Name',['class'=>'control-label']) !!}
                {!! Form::text('shipping_amount',$orders->voucher_amt_used, ["class"=>'form-control' ,"placeholder"=>'Voucher Amount Used', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Last Name', 'Last Name',['class'=>'control-label']) !!}
                {!! Form::text('shipping_amount',$orders->voucher_amt_used, ["class"=>'form-control' ,"placeholder"=>'Voucher Amount Used', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Phone', 'Phone',['class'=>'control-label']) !!}
                {!! Form::text('shipping_amount',$orders->voucher_amt_used, ["class"=>'form-control' ,"placeholder"=>'Voucher Amount Used', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Country', 'Country',['class'=>'control-label']) !!}
                {!! Form::text('shipping_amount',$orders->voucher_amt_used, ["class"=>'form-control' ,"placeholder"=>'Voucher Amount Used', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('State', 'State',['class'=>'control-label']) !!}
                {!! Form::text('shipping_amount',$orders->voucher_amt_used, ["class"=>'form-control' ,"placeholder"=>'Voucher Amount Used', "required"]) !!}
            </div>
        </div>
        <div class="form-group col-md-4">
            <div class="col-md-12">
                {!! Form::label('Address', 'Address',['class'=>'control-label']) !!}
                {!! Form::text('shipping_amount',$orders->voucher_amt_used, ["class"=>'form-control' ,"placeholder"=>'Voucher Amount Used', "required"]) !!}
            </div>
        </div>

    </div>

    <div class="line line-dashed b-b line-lg pull-in"></div>

    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            {!! Form::submit('Submit',["class" => "btn btn-primary"]) !!}
            {!! Form::close() !!}     


        </div>
    </div>
</form>
</div>
</div>

@stop 

@section('myscripts')

<script>
    $(document).ready(function () {


    });
</script>
@stop
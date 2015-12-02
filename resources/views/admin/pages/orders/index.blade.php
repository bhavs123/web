@extends('admin.layouts.default')
@section('content')


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
    <table class="table table-striped b-t b-light">
        <thead>
            <tr>
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
 <?= $orderInfo->render() ?>      
        </div>
    </div>
</footer>


@stop 
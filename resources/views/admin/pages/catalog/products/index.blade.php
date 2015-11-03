@extends('admin.layouts.default')
@section('content')


<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Products</h1>
</div>
<div class="panel panel-default">
    <div class="row wrapper">
        <div class="col-sm-3 pull-right">           
            <a href="{!! route('admin.products.add') !!}" class="btn btn-default pull-right" target="_" type="button">Add New Product</a>      
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Product</th>
                <th>Categories</th>
                <th>Attribute Set</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Product Type</th>

            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr> <td>{{$product->id }}</td>
                <td>{{$product->product }}</td>
                <td>
                    <?php
                    $cat = $product->categories;
                    foreach ($cat as $category) {
                        ?>
            <li>  <a href="{!! route('admin.category.edit',['id'=>$category->id]) !!}" class="edit"> {!! $category->category  !!}</a> </li>

            <?php
        }
        ?>



        </td>
        <td>{{ $product->attributeset['attr_set'] }}</td>
        <td>{{$product->stock }}</td>
        <td>{{$product->price }}</td>
        <td>{{ $product->producttype['type']  }}</td>
        <td>
            <a href="{!! route('admin.products.editinfo',['id'=>$product->id]) !!}" target="_blank" class="label label-success active" ui-toggle-class="">Edit</a>
            <a href="{!! route('admin.products.editinfo',['id'=>$product->id]) !!}" target="_blank" class="label label-info active" ui-toggle-class="">Duplicate</a>

        </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<footer class="panel-footer">
    <div class="row">
        <div class="col-sm-4 text-right text-center-xs pull-right">                
            <?= $products->render() ?>           
        </div>
    </div>
</footer>


@stop 
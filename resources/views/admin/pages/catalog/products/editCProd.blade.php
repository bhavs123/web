@extends('admin.layouts.default')
@section('content')

<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Products</h1>
</div>
<div class="wrapper-md">
    <div class="tab-container">
        {!! view('admin.includes.productHeader',['id' => $prod->id, 'prod_type' => $prod->prod_type]) !!}
        <div class="tab-content">

            <div class="panel-body">
                {!! Form::model($prod, ['method' => 'post', 'files'=> true, 'url' => $action , 'id'=>'ProdV','class' => 'form-horizontal' ]) !!}
                {!! Form::hidden('id',null) !!}
                {!! Form::hidden('prod_id',$prod->id) !!}

                <div class="ExistProdVAr">
                    <div class="row form-group col-md-12">
                        @foreach($attrs as $id => $attr)
                        <div class="col-md-2">
                            {!! Form::label('select varient', 'Select ' . $attr['name'] ,['class'=>'control-label']) !!}
                            {!! Form::select($id.'[]', $attr['options'] ,null,["class"=>'form-control']) !!}
                        </div>
                        @endforeach

                        <div class="col-md-2">
                            {!! Form::label('price', 'Extra Price',['class'=>'control-label']) !!}
                            {!! Form::text("price[]",0,["class"=>"form-control"]) !!}
                        </div>

                        <div class="col-md-1">
                            {!! Form::label('stock', 'Stock',['class'=>'control-label']) !!}
                            {!! Form::number("stock[]",0,["class"=>"form-control"]) !!}
                        </div>

                        <div class="col-md-2">
                            {!! Form::label('is_avail', 'Availability',['class'=>'control-label']) !!}
                            {!! Form::select("is_avail[]",['1'=>'Yes','0'=>'No'],null,["class"=>"form-control"]) !!}
                        </div>

                        {!! Form::hidden("id[]",null) !!}
                        <div class="col-md-2">
                            <a href="javascript:void();" class="addNewProd"><span class="label label-success label-mini">Add</span></a>
                        </div>
                    </div>  
                </div>

                <div class="line line-dashed b-b line-lg pull-in"></div>
                <div class="form-group col-sm-12 ">

                    {!! Form::hidden('return_url',null,['class'=>'rtUrl']) !!}
                    {!! Form::button('Save & Exit',["class" => "btn btn-primary pull-right saveProdVExit"]) !!}
                    {!! Form::button('Save & Continue',["class" => "btn btn-primary pull-right saveProdVContine"]) !!}
                    {!! Form::submit('Save & Next',["class" => "btn btn-primary pull-right"]) !!}


                    {!! Form::close() !!}     


                </div>
                </form>
            </div>

            <div class="toAdd"  style="display:none;">
                <div class="row form-group col-md-12">
                    @foreach($attrs as $id => $attr)
                    <div class="col-md-2">
                        {!! Form::label('select varient', 'Select ' . $attr['name'] ,['class'=>'control-label']) !!}
                        {!! Form::select($id.'[]', $attr['options'] ,null,["class"=>'form-control']) !!}
                    </div>
                    @endforeach

                    <div class="col-md-2">
                        {!! Form::label('price', 'Extra Price',['class'=>'control-label']) !!}
                        {!! Form::text("price[]",null,["class"=>"form-control"]) !!}
                    </div>

                    <div class="col-md-1">
                        {!! Form::label('stock', 'Stock',['class'=>'control-label']) !!}
                        {!! Form::number("stock[]",null,["class"=>"form-control"]) !!}
                    </div>

                    <div class="col-md-2">
                        {!! Form::label('is_avail', 'Availability',['class'=>'control-label']) !!}
                        {!! Form::select("is_avail[]",['1'=>'Yes','0'=>'No'],null,["class"=>"form-control"]) !!}
                    </div>
                    {!! Form::hidden("id[]",null) !!}
                    <div class="col-md-2">
                        <a href="javascript:void();" class="DelProd"><span class="label label-danger ">Delete</span></a>
                    </div>
                </div>  
            </div>

            <div class="bg-light lter b-b wrapper-md">
                <h1 class="m-n font-thin h3">Product Varients</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Availability</th>
                            <th>Price</th>
                            <th>Stock</th>


                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prodVariants as $prd)

                        <tr>
                            <td>{{ $prd->product }}</td>
                            <td>{{ $prd->is_avail == 1 ? "Yes" : "No" }}</td>
                            <td>{{ $prd->price }}</td>
                            <td>{{ $prd->stock }}</td>

                            <td>
                                <a href="{!! route('admin.products.updateProdVariant',['id'=>$prd->id]) !!}" class="label label-success active" ui-toggle-class="" target="_blank">Edit</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-4 text-right text-center-xs pull-right">                

                    </div>
                </div>
            </footer>

        </div>








    </div>
    @stop 

    @section('myscripts')

    <script>

        $(document).ready(function() {

            $(".saveProdVExit").click(function() {
                $(".rtUrl").val("{!!route('admin.products.view')!!}");
                $("#ProdV").submit();

            });

            $(".saveProdVContine").click(function() {
                $(".rtUrl").val("{!!route('admin.products.ConfigProdAttrs',['id'=>Input::get('id')])!!}");
              //  $("#ProdV").submit();

            });

            $("body").on("click", ".addNewProd", function() {
                $(".ExistProdVAr").append($(".toAdd").html());
            });
            $("body").on("click", ".DelProd", function() {

                $(this).parent().parent().remove();

            });


        });
    </script>
    @stop
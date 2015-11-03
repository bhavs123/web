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
                {!! Form::model($prod, ['method' => 'post', 'files'=> true, 'url' => $action ,'id'=>'EditGeneralInfo' ,'class' => 'form-horizontal' ]) !!}
                {!! Form::hidden('id',null) !!}
                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('product', 'Product Name',['class'=>'control-label']) !!}
                        {!! Form::text('product',null, ["class"=>'form-control' ,"placeholder"=>'Enter Product Name', "required"]) !!}
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('is_avail', 'Product Available?',['class'=>'control-label']) !!}
                        {!! Form::select('is_avail',["0" => "No", "1" => "Yes"],null,["class"=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('stock', 'Stock',['class'=>'control-label']) !!}
                        {!! Form::number('stock',null, ["class"=>'form-control' ,"placeholder"=>'Enter Stock Quantity', "required", "step"=> "0.01"]) !!}
                    </div>
                </div>



                <div class="line line-dashed b-b line-lg pull-in"></div>
                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('url_key', 'URL Key',['class'=>'control-label']) !!}
                        {!! Form::text('url_key',null,["class"=>'form-control',"placeholder"=>"Enter URL Key"]) !!}
                    </div>
                </div>


                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('Sort Order', 'Sort Order',['class'=>'control-label']) !!}
                        {!! Form::text('sort_order',null, ["class"=>'form-control' ,"placeholder"=>'Sort Order']) !!}
                    </div>
                </div>





                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('price', 'Price',['class'=>'control-label']) !!}
                        {!! Form::number('price',null,["class"=>'form-control',"placeholder"=>"Enter Price","required"]) !!}
                    </div>
                </div>

                <div class="line line-dashed b-b line-lg pull-in"></div>


                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('short_desc', 'Short Description',['class'=>'control-label']) !!}
                        {!! Form::textarea('short_desc',null,["class"=>'form-control wysihtml5',"placeholder"=>"Enter Description", "rows" => "4"]) !!}
                    </div>
                </div>


                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('long_desc', 'Long Description',['class'=>'control-label']) !!}
                        {!! Form::textarea('long_desc',null,["class"=>'form-control wysihtml5',"placeholder"=>"Enter Description", "rows" => "4"]) !!}
                    </div>
                </div>


                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('Additional Details', 'Additional Details',['class'=>'control-label']) !!}
                        {!! Form::textarea('add_desc',null,["class"=>'form-control wysihtml5',"placeholder"=>"Additional Details", "rows" => "4"]) !!}
                    </div>
                </div>

                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('meta_title', 'Meta Title',['class'=>'control-label']) !!}
                        {!! Form::text('meta_title',null, ["class"=>'form-control' ,"placeholder"=>'Enter Meta Title']) !!}
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('meta_keys', 'Meta Keywords',['class'=>'control-label']) !!}
                        {!! Form::text('meta_keys',null,["class"=>'form-control',"placeholder"=>"Enter Meta Keywords"]) !!}
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="col-md-12">
                        {!! Form::label('meta_desc', 'Meta Description',['class'=>'control-label']) !!}
                        {!! Form::text('meta_desc',null,["class"=>'form-control',"placeholder"=>"Enter Meta Keywords"]) !!}
                    </div>
                </div>

                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group col-sm-12">
                    <div class="col-sm-2">
                        {!! Form::label('Tag Names', 'Tag Names',['class'=>'col-sm-2 control-label']) !!}
                    </div>
                    <div class="col-sm-10">
                        <ul id="myTags">
                            @foreach($prod->tagNames() as $tag)
                            <li>{{ $tag }}</li>
                            @endforeach
                        </ul>            </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="col-sm-10">

                    {!! Form::label('category_id', 'Select Product Category') !!}

                    <?php
                    $prodCats = $prod->categories->toArray();

                    $roots = App\Models\Category::roots()->get();
                    echo "<ul id='catTree' class='tree icheck '>";
                    foreach ($roots as $root)
                        renderNode($root, $prodCats);
                    echo "</ul>";

                    function renderNode($node, $prodCats) {
                        echo "<li class='tree-item fl_left ps_relative_li'>";
                        echo '<div class="checkbox">
                                <label class="i-checks checks-sm"><input type="checkbox"  name="category_id[]" value="' . $node->id . '"  ' . (App\Library\Helper::searchForKey("id", $node->id, $prodCats) ? 'checked' : '') . '  /> <i></i>' . $node->category . '</label>
                              </div>';

                        if ($node->children()->count() > 0) {
                            echo "<ul class='fl_left treemap'>";
                            foreach ($node->children as $child)
                                renderNode($child, $prodCats);
                            echo "</ul>";
                        }

                        echo "</li>";
                    }
                    ?>

                </div>
                {!! Form::hidden('return_url',null,['class'=>'rtUrl']) !!}

                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group col-sm-12 ">
                    {!! Form::button('Save & Exit',["class" => "btn btn-primary pull-right saveExit"]) !!}
                    {!! Form::button('Save & Continue',["class" => "btn btn-primary pull-right saveContine"]) !!}
                    {!! Form::submit('Save & Next',["class" => "btn btn-primary pull-right"]) !!}
                </div>
                {!! Form::close() !!}     
            </div>

        </div>





    </div>
</div>

@stop 

@section('myscripts')

<script>
    $(document).ready(function() {
        $(".saveContine").click(function() {
            $(".rtUrl").val("{!!route('admin.products.editinfo',['id'=>Input::get("id")])!!}");
              $("#EditGeneralInfo").submit();

        });
        $(".saveExit").click(function() {
            $(".rtUrl").val("{!!route('admin.products.view')!!}");
               $("#EditGeneralInfo").submit();

        });



        $("#myTags").tagit({
            caseSensitive: false,
            singleField: true,
            singleFieldDelimiter: ","
        });

    });
</script>
@stop
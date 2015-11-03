@extends('admin.layouts.default')
@section('content')


<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Add New Category</h1>
</div>

<div class="panel panel-default">

    <div class="panel-body">
        {!! Form::model($category, ['method' => 'post', 'files'=> true, 'url' => $action , 'class' => 'form-horizontal' ]) !!}

        <div class="form-group">
            {!! Form::label('category', 'Category Name',['class'=>'col-sm-2 control-label']) !!}
            {!! Form::hidden('id',null) !!}
            <div class="col-sm-10">
                {!! Form::text('category',null, ["class"=>'form-control' ,"placeholder"=>'Enter Category Name', "required"]) !!}
            </div>
        </div>

        <div class="line line-dashed b-b line-lg pull-in"></div>

        <div class="form-group">
            {!!Form::label('is_home','Show in Home ?',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('is_home',["0" => "No", "1" => "Yes"],null,["class"=>'form-control']) !!}
            </div>
        </div>

        <div class="line line-dashed b-b line-lg pull-in"></div>

        <div class="form-group">
            {!!Form::label('is_nav','Show in Menu ?',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('is_nav',["0" => "No", "1" => "Yes"],null,["class"=>'form-control']) !!}
            </div>
        </div>

        <div class="line line-dashed b-b line-lg pull-in"></div>



        <div class="line line-dashed b-b line-lg pull-in"></div>

        <div class="form-group">
            {!!Form::label('sort_order','Sort Order',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::number('sort_order',null,["class"=>'form-control']) !!}
            </div>
        </div>


        <div class="line line-dashed b-b line-lg pull-in"></div>

        <div class="form-group">
            {!!Form::label('url_key','Enter Url key',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('url_key',null,["class"=>'form-control',"placeholder"=>"Enter URL Key"]) !!}
            </div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>


        <div class="form-group">
            {!!Form::label('short_desc','Enter Short Description',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('short_desc',null,["class"=>'form-control wysihtml5',"placeholder"=>"Enter Short Description", "rows" => "9"]) !!}
            </div>
        </div>

        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
            {!!Form::label('long_desc','Enter Long Description',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('long_desc',null,["class"=>'form-control wysihtml5',"placeholder"=>"Enter Long Description", "rows" => "9"]) !!}
            </div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>

        <div class="form-group">
            {!!Form::label('meta_title','Meta Title',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('meta_title',null,["class"=>'form-control',"placeholder"=>"Enter Meta Title"]) !!}
            </div>
        </div>

        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
            {!!Form::label('meta_keys','Meta Keywords',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('meta_keys',null,["class"=>'form-control',"placeholder"=>"Enter Meta Keywords"]) !!}
            </div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
            {!!Form::label('meta_desc','Meta Description',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('meta_desc',null,["class"=>'form-control',"placeholder"=>"Enter Meta Keywords"]) !!}
            </div>
        </div>


        <div class="line line-dashed b-b line-lg pull-in"></div>


        <div class="form-group">
            {!!Form::label('images','Select Multiple Images',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::file('images[]',["class"=>'form-control',"multiple"]) !!}                </div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>




        <?php
        if (!empty($category->images)) {
            $imgs = json_decode($category->images, true);
            foreach ($imgs as $pos => $img) {
                ?>
                <div class="col-sm-2">

                    <img src="{{asset('public/admin/uploads/catalog/category/')."/".$img}}" class="img-responsive"   >
                    <a href="javascript:void();" class="deleteImg" data-value="{{ $img }}"><span class="label label-danger label-mini">Delete</span></a>
                </div>
                <?php
            }
        }
        ?>
        {!! Form::hidden('imgs',$category->images) !!}



        <div class="line line-dashed b-b line-lg pull-in"></div>

        <div class="col-md-12 form-group">
            {!! Form::label('parent_id', 'Select Parent Category') !!}
            <?php
            $roots = App\Models\Category::roots()->get();
            echo "<ul id='catTree' class='tree icheck'>";
            foreach ($roots as $root)
                renderNode($root, $category);
            echo "</ul>";

            function renderNode($node, $category) {
                echo "<li class='tree-item fl_left ps_relative_li'>";
                echo '<div class="checkbox">
                        <label class="i-checks checks-sm"><input type="checkbox"  name="parent_id" value="' . $node->id . '" ' . ($category->parent_id == $node->id ? "checked" : "" ) . '  /><i></i>' . $node->category . '</label>
                      </div>';

                if ($node->children()->count() > 0) {
                    echo "<ul class='treemap fl_left'>";
                    foreach ($node->children as $child)
                        renderNode($child, $category);
                    echo "</ul>";
                }

                echo "</li>";
            }
            ?>
        </div>



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


        $("a.deleteImg").click(function () {
            var imgs = $.parseJSON($("input[name='imgs']").val());
            //alert(imgs);
            var r = confirm("Are You Sure You want to Delete this Image?");
            if (r == true) {
                imgs.splice(imgs.indexOf($(this).attr("data-value")), 1);
                $("input[name='imgs']").val(JSON.stringify(imgs));
                $(this).parent().hide();
            } else {

            }
        });
    });
</script>
@stop
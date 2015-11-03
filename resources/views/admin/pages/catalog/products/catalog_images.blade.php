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
                {!! Form::model($images, ['method' => 'post', 'files' => true, 'url' => $action ,'id'=>'CataLogImg' ,'class' => 'form-horizontal','files'=>true ]) !!}
                {!! Form::hidden('id',null) !!}
                {!! Form::hidden('prod_id',$prod->id) !!}

                <p class="successDel" style="color:green;"></p>

                <div class="form-group">



                    <?php
                    $prodImages = $prod->catalogimgs()->where("image_type", "=", 1)->get();
                    //dd($prodImages);
                    ?>
                    <div class="col-sm-12 col-md-9 existingImg">
                        @if($prodImages->count()>0)
                        @foreach($prodImages as $prodimg)
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <img src="{{asset('public/admin/uploads/catalog/products/')."/".$prodimg->filename}}" class="img-responsive thumbnail"   >
                            </div>
                            <div class="col-sm-4">
                                <input  name="images[]" type="file" >
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('alt_text[]',$prodimg->alt_text,["class"=>'form-control' ,"placeholder"=>'Enter alt text', "required"=>"true"]) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('sort_order[]',$prodimg->sort_order, ["class"=>'form-control' ,"placeholder"=>'Enter Sort order', "required"=>"true"]) !!}
                            </div>
                            <div class="col-sm-1">
                                <a  data-value="{!! $prodimg->id !!}" href="javascript:void();" class="label label-danger active  DelImg" >Delete</a> 
                            </div>
                            {!! Form::hidden('id_img[]',$prodimg->id) !!}
                        </div>
                        @endforeach
                        @else

                        <div class="row form-group">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-4">
                                <input  name="images[]" type="file" >
                            </div>
                            <div class="col-sm-3">
                                {!! Form::text('alt_text[]',null, ["class"=>'form-control' ,"placeholder"=>'Enter alt text', "required"=>"true"]) !!}
                            </div>
                            <div class="col-sm-2">
                                {!! Form::text('sort_order[]',null, ["class"=>'form-control' ,"placeholder"=>'Enter Sort order', "required"=>"true"]) !!}
                            </div>


                        </div>
                        @endif
                    </div>
                    <div class="col-sm-1">
                        {!! Form::hidden('id_img[]',null) !!}
                        <a href="javascript:void();" class="label label-success active addMoreImg" >Add More</a> 
                    </div>

                </div>
                <div class="form-group">
                    {!! Form::hidden('return_url',null,['class'=>'rtUrl']) !!}
                    <div class="form-group col-sm-12 ">
                        {!! Form::button('Save & Exit',["class" => "btn btn-primary pull-right saveImgExit"]) !!}
                        {!! Form::button('Save & Continue',["class" => "btn btn-primary pull-right saveImgContine"]) !!}
                        {!! Form::submit('Save & Next',["class" => "btn btn-primary pull-right"]) !!}
                    </div>


                    <div class="col-sm-4 col-sm-offset-2">

                        {!! Form::close() !!}     
                    </div>
                </div>
                </form>
            </div>
            <div class="addNew" style="display: none;">
                <div class="row form-group">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-4">
                        <input  name="images[]" type="file" >
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('alt_text[]',null, ["class"=>'form-control' ,"placeholder"=>'Enter alt text', "required"=>"true"]) !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('sort_order[]',null, ["class"=>'form-control' ,"placeholder"=>'Enter sort order', "required"=>"true"]) !!}
                    </div>
                    <div class="col-sm-1">
                        {!! Form::hidden('id_img[]',null) !!}
                        <a href="javascript:void();" class="label label-danger active deleteImg">Delete</a> 
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@stop 

@section('myscripts')

<script>
    $(document).ready(function () {
        $(".saveImgExit").click(function () {

            $(".rtUrl").val("{!!route('admin.products.view')!!}");
            $("#CataLogImg").submit();

        });

        $(".saveImgContine").click(function () {
            $(".rtUrl").val("{!!route('admin.products.images',['id'=>Input::get('id')])!!}");
            $("#CataLogImg").submit();

        });

        $(".addMoreImg").click(function () {
            $(".existingImg").append($(".addNew").html());
        });

        $("body").on("click", ".deleteImg", function () {
            $(this).parent().parent().remove();
        });

        $("body").on("click", ".DelImg", function () {
            var imgId = $(this).attr("data-value");
            var chk = confirm("Are you sure want to delete this image?");
            if (chk == true) {
                // alert($(this).attr("data-value"));
                $.ajax({
                    type: "POST",
                    url: "{!! route('admin.products.delImg') !!}",
                    catch : false,
                    data: {imgId: imgId},
                    success: function (data) {
                        $(".successDel").text(data);
                        location.reload();

                    }
                });
            }


        });



    });
</script>
@stop
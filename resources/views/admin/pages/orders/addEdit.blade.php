@extends('admin.layouts.default')
@section('content')


<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Add New Attribute</h1>
</div>

<div class="panel panel-default">

    <div class="panel-body">
        {!! Form::model($attrs, ['method' => 'post', 'files'=> true, 'url' => $action , 'class' => 'form-horizontal' ]) !!}
        
        {!! Form::hidden('id',null) !!}
     
        <div class="form-group">
            {!! Form::label('Attribute Sets', 'Attribute Sets',['class'=>'col-sm-2 control-label']) !!}
            <?php $attr_Sets = $attrs->attributesets->toArray(); ?>
            <div class="col-sm-10">
                @foreach($attrSets as $attrS)
                <div class="checkbox">
                    <label class="i-checks i-checks-sm">
                        {!! Form::checkbox('attr_set[]',$attrS['id'] , App\Library\Helper::searchForKey("id",$attrS['id'],$attr_Sets)?$attrS['id']: "" ) !!}
                        <i></i>
                        {!! $attrS['attr_set'] !!}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
            {!! Form::label('Attribute type', 'Attribute Type',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                @foreach($attr_types as $attr_type)
                <div class="radio">
                    <label class="i-checks">
                        <input type="radio"  name="attr_type" value=" {!! $attr_type->id !!}"  {!! isset($attrs->attr_type)?"checked":"" !!} /> 
                               <i></i>
                        {!! $attr_type->attr_type !!}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
            {!! Form::label('is_filterable', 'Is Filterable',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('is_filterable',["0" => "No", "1" => "Yes"],null,["class"=>'form-control'],"required") !!}
            </div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>

        <div class="form-group">
            {!! Form::label('Attribute Name', 'Attribute Name',['class'=>'col-sm-2 control-label']) !!}

            <div class="col-sm-10">
                {!! Form::text('attr',null, ["class"=>'form-control' ,"placeholder"=>'Enter Attribute Name', "required"]) !!}
            </div>
        </div>
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
            {!! Form::label('Attribute Options', 'Attribute Options',['class'=>'col-sm-2 control-label']) !!}

            <div class="col-sm-9 col-md-9  attrOptn">

                @if($attrs->attributeoptions()->count() > 0 )
                @foreach($attrs->attributeoptions as $opt)

                <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::text('option_name[]',$opt->option_name, ["class"=>'form-control' ,"placeholder"=>'Enter Option Name', "required"]) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('option_value[]',$opt->option_value, ["class"=>'form-control' ,"placeholder"=>'Enter Option Value', "required"]) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::select('is_active[]',["0" => "No", "1" => "Yes"],$opt->is_active,["class"=>'form-control'],"required") !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('sort_order[]',$opt->sort_order, ["class"=>'form-control' ,"placeholder"=>'Enter Sort Order', "required"]) !!}
                    </div>

                    {!! Form::hidden('idd[]',$opt->id) !!}

                </div>
                @endforeach
                @else
                <div class="row form-group">
                    <div class="col-sm-3">
                        {!! Form::text('option_name[]',null, ["class"=>'form-control' ,"placeholder"=>'Enter Option Name', "required"]) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::text('option_value[]',null, ["class"=>'form-control' ,"placeholder"=>'Enter Option Value', "required"]) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::select('is_active[]',["0" => "No", "1" => "Yes"],null,["class"=>'form-control'],"required") !!}
                    </div>
                    <div class="col-sm-2">
                        {!! Form::text('sort_order[]',null, ["class"=>'form-control' ,"placeholder"=>'Enter Sort Order', "required"]) !!}
                    </div>

                </div>
                @endif
            </div>

            <div class="col-sm-1">
                {!! Form::hidden('idd[]',null) !!}
                <a href="javascript:void();" class="label label-success active addMore" >Add More</a> 
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
<div id="toClone" style="display: none;">
    <div class="row form-group">
        <div class="col-sm-3">
            {!! Form::text('option_name[]',null, ["class"=>'form-control' ,"placeholder"=>'Enter Option Name', "required"]) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::text('option_value[]',null, ["class"=>'form-control' ,"placeholder"=>'Enter Option Value', "required"]) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::select('is_active[]',["0" => "No", "1" => "Yes"],null,["class"=>'form-control'],"required") !!}
        </div>
        <div class="col-sm-2">
            {!! Form::text('sort_order[]',null, ["class"=>'form-control' ,"placeholder"=>'Enter Sort Order', "required"]) !!}
        </div>
        <div class="col-sm-1">
            {!! Form::hidden('idd[]',null) !!}
            <a href="javascript:void();" class="label label-danger active deleteOpt" >Delete</a> 
        </div>
    </div>
</div>

@stop 

@section('myscripts')

<script>
    $(document).ready(function() {

        $(".addMore").click(function() {
            $(".attrOptn").append($("#toClone").html())
        });


        $("body").on("click", ".deleteOpt", function() {
            $(this).parent().parent().remove();
        });
    });
</script>
@stop
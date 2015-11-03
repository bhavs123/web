@extends('admin.layouts.default')
@section('content')


<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Add New Attribute Set</h1>
</div>

<div class="panel panel-default">

    <div class="panel-body">
        {!! Form::model($attrSets, ['method' => 'post', 'files'=> true, 'url' => $action , 'class' => 'form-horizontal' ]) !!}

        <div class="form-group">
            {!! Form::label('Attribute Set Name', 'Attribute Set Name',['class'=>'col-sm-2 control-label']) !!}
            {!! Form::hidden('id',null) !!}
            <div class="col-sm-10">
                {!! Form::text('attr_set',null, ["class"=>'form-control' ,"placeholder"=>'Enter Attribute Set Name', "required"]) !!}
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
    $(document).ready(function() {


    });
</script>
@stop
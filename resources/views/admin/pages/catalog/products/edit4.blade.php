@extends('admin.layouts.default')
@section('content')


<div class="tab-container">
    {!! view('admin.includes.productHeader',['id' => $prod->id, 'prod_type' => $prod->prod_type]) !!}
    <div class="tab-content">
        <div class="panel-body">
            
            
            

        </div>
    </div>
</div>
@stop 

@section('myscripts')

<script>
    $(document).ready(function() {


    });
</script>
@stop
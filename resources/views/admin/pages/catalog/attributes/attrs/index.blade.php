@extends('admin.layouts.default')
@section('content')


<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Attribute</h1>
</div>
<div class="panel panel-default">
    <div class="row wrapper">
        <div class="col-sm-3 pull-right">           
            <a href="{!! route('admin.attrs.add') !!}" class="btn btn-default pull-right" target="_" type="button">Add New Attribute</a>      
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
            <tr>
                <th>id</th>

               <th>Attribute name</th>
                  <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attrs as $attr)
            <tr> <td>{{$attr->id }}</td>
               <td>{{$attr->attr }}</td>
              
                <td>{{ date("d-M-Y",strtotime($attr->created_at)) }}</td>
                <td>
                    <a href="{!! route('admin.attrs.edit',['id'=>$attr->id]) !!}" class="label label-success active" ui-toggle-class="">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<footer class="panel-footer">
    <div class="row">
        <div class="col-sm-4 text-right text-center-xs pull-right">                
            <?= $attrs->render() ?>           
        </div>
    </div>
</footer>
</div>

@stop 
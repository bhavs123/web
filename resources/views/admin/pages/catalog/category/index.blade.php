@extends('admin.layouts.default')
@section('content')


<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Category</h1>
</div>
<div class="panel panel-default">
    <div class="row wrapper">
        <div class="col-sm-3 pull-right">           
            <a href="{!! route('admin.category.add') !!}" class="btn btn-default pull-right" target="_" type="button">Add New Category</a>      
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
            <tr>
                <th>id</th>

                <th>Category</th>
                <th>Short Desc</th>
            
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr> <td>{{$category->id }}</td>
                <td>{{$category->category }}</td>
              
                <td>{{$category->short_desc }}</td>
                
                <td>{{ date("d-M-Y",strtotime($category->created_at)) }}</td>
                <td>
                    <a href="{!! route('admin.category.edit',['id'=>$category->id]) !!}" class="label label-success active" ui-toggle-class="">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<footer class="panel-footer">
    <div class="row">
        <div class="col-sm-4 text-right text-center-xs pull-right">                
            <?= $categories->render() ?>           
        </div>
    </div>
</footer>


@stop 
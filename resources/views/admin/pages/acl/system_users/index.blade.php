@extends('admin.layouts.default')
@section('content')
<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">User Roles</h1>
</div>
<div class="panel panel-default">
    <div class="row wrapper">
        <div class="col-sm-3 pull-right">           
            <a href="{!! route('admin.systemusers.add') !!}" class="btn btn-default pull-right" target="_" type="button">Add New User</a>      
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($system_users as $system_user)
            <tr> <td>{{$system_user->id }}</td>
                <td>{{$system_user->name }}</td>
                <td>{{ $system_user->email }}</td>
                <td>{{ date("d-M-Y",strtotime($system_user->created_at)) }}</td>
                <td>
                    <a href="{!! route('admin.systemusers.edit',['id'=>$system_user->id]) !!}" class="label label-success active" ui-toggle-class="">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<footer class="panel-footer">
    <div class="row">
        <div class="col-sm-4 text-right text-center-xs pull-right">                
            <?= $system_users->render() ?>           
        </div>
    </div>
</footer>
</div>

@stop 
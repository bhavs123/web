@extends('admin.layouts.default')
@section('content')
<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">User Roles</h1>
</div>
<div class="panel panel-default">
    <div class="row wrapper">
        <div class="col-sm-3 pull-right">           
            <a href="{!! route('admin.roles.add') !!}" class="btn btn-default pull-right" target="_" type="button">Add New Role</a>      
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
            <tr>
                <th>Role</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Created On</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
                <td>{{ $role->created_at }}</td>
                <td>
                    <a href="{{ route('admin.roles.edit',['id' => $role->id ])  }}" target="_" class="label label-success active" ui-toggle-class="">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<footer class="panel-footer">
    <div class="row">
        <div class="col-sm-4 text-right text-center-xs pull-right">                
            <?= $roles->render() ?>           
        </div>
    </div>
</footer>
</div>

@stop 
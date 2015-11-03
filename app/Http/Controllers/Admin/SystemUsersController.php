<?php

namespace App\Http\Controllers\Admin;

use Input;
use App\Models\Role;
use App\Models\User;
use Hash;
use Auth;
use Session;
use App\Http\Controllers\Controller;

class SystemUsersController extends Controller {

    public function index() {
        $system_users = User::paginate(Config('constants.paginateNo'));
        $roles = Role::get(['id', 'name'])->toArray();
        return view(Config('constants.adminSystemUsersView').'.index', compact('system_users', 'roles'));
    }

    public function add() {
        $user = new User();
        $action = "admin.systemusers.save";
        $roles = Role::get(['id', 'display_name'])->toArray();
        $roles_name = ["" => "Please Select"];
        foreach ($roles as $role) {
            $roles_name[$role['id']] = $role['display_name'];
        }
        return view(Config('constants.adminSystemUsersView').'.addEdit', compact('user', 'action', 'roles_name'));
    }

    public function save() {
        $user = User::findOrNew(Input::get('id'));
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->user_type = 1;
        if (!empty(Input::get('password'))) {
            $user->password = Hash::make(Input::get('password'));
        }
        $user->save();
        if (!empty(Input::get('roles'))) {

            $user->roles()->sync([Input::get('roles')]);
        }
        return redirect()->route('admin.systemusers.view');
    }

    public function edit() {
        $user = User::find(Input::get('id'));
        $action = "admin.systemusers.save";
        $roles = Role::get(['id', 'display_name'])->toArray();
        $roles_name = ["" => "Please Select"];
        foreach ($roles as $role) {
            $roles_name[$role['id']] = $role['display_name'];
        }
        return view(Config('constants.adminSystemUsersView').'.addEdit', compact('user', 'action', 'roles_name'));
    }

}

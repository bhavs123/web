<?php

namespace App\Http\Controllers\Admin;

use Route;
use Input;
use App\Models\AttributeSet;
use App\Http\Controllers\Controller;

class AttributeSetsController extends Controller {
    public function index() {
        $attrSets = AttributeSet::paginate(Config('constants.paginateNo'));
        return view(Config('constants.adminAttrSetView') . '.index', compact('attrSets'));
    }

    public function add() {
        $attrSets = new AttributeSet();
        $action = route("admin.attrSets.save");
        return view(Config('constants.adminAttrSetView') . '.addEdit', compact('attrSets', 'action'));
    }

    public function edit() {
        $attrSets = AttributeSet::find(Input::get('id'));
        $action = route("admin.attrSets.save");
        return view(Config('constants.adminAttrSetView') . '.addEdit', compact('attrSets', 'action'));
    }

    public function save() {
        $attrSets = AttributeSet::findOrNew(Input::get('id'));
        $attrSets->attr_set = Input::get('attr_set');
        $attrSets->save();
        return redirect()->route('admin.attrSets.view');
    }

}

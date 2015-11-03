<?php

namespace App\Http\Controllers\Admin;

use Route;
use Input;
use App\Models\Attribute;
use App\Models\AttributeSet;
use App\Models\AttributeType;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use App\Library\Helper;
class AttributesController extends Controller {

    public function index() {
        $attrs = Attribute::paginate(Config('constants.paginateNo'));
        return view(Config('constants.adminAttrView') . '.index', compact('attrs'));
    }

    public function add() {
        $attrs = new Attribute();
        $attrSets = AttributeSet::get(['id', 'attr_set'])->toArray();
        $attr_types = AttributeType::all();
        $action = route("admin.attrs.save");
        return view(Config('constants.adminAttrView') . '.addEdit', compact('attrs', 'attrSets', 'action', 'attr_types'));
    }

    public function edit() {
      //  dd(Helper::test());
        
        $attrs = Attribute::find(Input::get('id'));
        $attrSets = AttributeSet::get(['id', 'attr_set'])->toArray();
        $attr_types = AttributeType::all();
        $action = route("admin.attrs.save");
        return view(Config('constants.adminAttrView') . '.addEdit', compact('attrs', 'attrSets', 'action', 'attr_types'));
    }

    public function save() {
        $attr = Attribute::findOrNew(Input::get('id'));
        $attr->attr = Input::get('attr');
        $attr->attr_type = Input::get('attr_type');
        $attr->is_filterable = Input::get('is_filterable');
        $attr->save();
        $attr->attributesets()->sync(Input::get('attr_set'));

        foreach (Input::get('option_name') as $key => $val) {
            $attrval = AttributeValue::findOrNew(Input::get('idd')[$key]);
            $attrval->option_name = Input::get('option_name')[$key];
            $attrval->option_value = Input::get('option_value')[$key];
            $attrval->is_active = Input::get('is_active')[$key];
            $attrval->sort_order = Input::get('sort_order')[$key];
            $attrval->attr_id = $attr->id;
            $attrval->save();
        }

        return redirect()->route('admin.attrs.view');
    }

}

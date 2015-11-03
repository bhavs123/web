<?php

namespace App\Http\Controllers\Admin;

use Route;
use Input;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {

    public function index() {
        $categories = Category::paginate(Config('constants.paginateNo'));
        return view(Config('constants.adminCategoryView') . '.index', compact('categories'));
    }

    public function add() {
        $category = new Category();
        $action = route("admin.category.save");
        return view(Config('constants.adminCategoryView') . '.addEdit', compact('category', 'action'));
    }

    public function edit() {
        $category = Category::find(Input::get('id'));
        $action = route("admin.category.save");
        return view(Config('constants.adminCategoryView') . '.addEdit', compact('category', 'action'));
    }

    public function save() {
        $category = Category::findOrNew(Input::get('id'));
        $category->category = Input::get('category');
        $category->is_home = Input::get('is_home');
        $category->is_nav = Input::get('is_nav');
        $category->sort_order = Input::get('sort_order');
        $category->url_key = Input::get('url_key');
        $category->short_desc = Input::get('short_desc');
        $category->long_desc = Input::get('long_desc');
        $category->meta_title = Input::get('meta_title');
        $category->meta_keys = Input::get('meta_keys');
        $category->meta_desc = Input::get('meta_desc');
        // $catImgs = [];

        $catImgs = json_decode(empty(Input::get('imgs')) ? "[]" : Input::get('imgs'), true);

        $destinationPath = public_path() . '/admin/uploads/catalog/category/';

        if (Input::hasFile('images')) {
            $i = 1;
            foreach (Input::file("images") as $file) {
                $fileName = date("YmdHis") . "-$i" . "." . $file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath, $fileName);
                if ($upload_success) {
                    array_push($catImgs, $fileName);
                    $i++;
                }
            }
        }
        $category->images = json_encode($catImgs);
        $category->save();
        if (!empty(Input::get("parent_id")))
            $category->makeChildOf(Input::get("parent_id"));
        return redirect()->route('admin.category.view');
    }

}

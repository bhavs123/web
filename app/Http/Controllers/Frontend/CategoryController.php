<?php namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

use Route;
use Input;
use Session;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class CategoryController extends Controller {
    
 public function index() {
       // $categories = Category::paginate(Config('constants.paginateNo'));
       echo  Session::get('loggedinUserId');
        return view(Config('constants.frontendCategoryView') . '.category');
    }
    
     public function getMainMenu() {
        $categories = Category::find(1)->getDescendants(3)->where('is_nav', 1)->toHierarchy()->toArray();
        return response()->json($categories);
    }
    
    public function getCategoryProducts($slug) {
     
        $cats = Category::findBySlug($slug)->getDescendantsAndSelf(['id'])->toArray();

        $products = Product::where("is_individual", 1)
                ->whereHas('categories', function($query) use ($cats) {
                    return $query->whereIn('cat_id', $cats);
                })
                ->paginate(Config('constants.frontendPaginateNo'));

        foreach ($products as $prd) {
            $attrs = [];
            foreach ($prd->categories()->where("url_key", "!=", "popular")->get() as $cat) {
                $pcat = $cat->getAncestors()->toArray();
                $attrs[$pcat[0]['category']] = $cat->category;
            }
            $prd->tags = $prd->tagged;
            $prd->attrs = $attrs;
            $prd->image = $prd->catalogimgs()->first();
            @$prd->image->filename = asset(Config('constants.productImgPath') . @$prd->image->filename);
            if (Session::get("userId") && User::find(Session::get("userId"))->savedlist->contains($prd->id)) {
                $prd->saved = 1;
            } else {
                $prd->saved = 0;
            }
        }

        $products = $products->toArray();
        $products['maincat'] = Category::findBySlug($slug)->category;

        return response()->json($products);
    }
    public function getChildCategory($slug, $productCats) {
        $cats = Category::findBySlug($slug)->getDescendants(['id'])->toArray();
        $id = array_intersect($cats, $productCats);
        return Category::find($id)->category;
    }

    public function getFilters($slug) {


        $currentCat = Category::findBySlug($slug);
        if (!$currentCat)
            $currentCat = Category::findBySlug("shop");

        $filters = [ "id" => $currentCat->id, "category" => "Categories", "child" => $currentCat->getDescendants(1, ['id', 'category'])->toHierarchy()];

        $cats = Category::roots()->where("url_key", "!=", 'shop')->where("url_key", "!=", "popular")->get()->toHierarchy();

        foreach ($cats as $cat) {
            $cat->child = $cat->getDescendants(1, ['id', 'category'])->toHierarchy();
        }

        $cats = $cats->toArray();
        array_unshift($cats, $filters);

        return response()->json($cats);
    }

    public function getFilterdProducts() {

        $cats = json_decode(Input::get('filters'), true);
        $products = Product::where("is_individual", 1)->with("savedlist");
        foreach ($cats as $cat) {
            $products->whereHas('categories', function($query) use ($cat) {

                $cats = [];
                foreach ($cat as $cc) {
                    $c = Category::find($cc)->getDescendantsAndSelf();

                    foreach ($c as $ccc) {
                        array_push($cats, $ccc->id);
                    }
                }

                $query = $query->whereIn('cat_id', $cats);
                return $query;
            });
        }

        if (!empty(Input::get('sTerm')))
            $products = $products->where("product", "like", "%" . Input::get('sTerm') . "%");

        if (!empty(Input::get('w')))
            $products = $products->where("width_" . Input::get('unit'), "<=", Input::get('w'));


        if (!empty(Input::get('h')))
            $products = $products->where("height_" . Input::get('unit'), "<=", Input::get('h'));


        if (!empty(Input::get('b')))
            $products = $products->where("breadth_" . Input::get('unit'), "<=", Input::get('b'));

        $products = $products->paginate(Config('constants.frontendPaginateNo'));

        foreach ($products as $prd) {
            $attrs = [];
            foreach ($prd->categories()->where("url_key", "!=", "popular")->get() as $cat) {
                $pcat = $cat->getAncestors()->toArray();
                $attrs[$pcat[0]['category']] = $cat->category;
            }
            $prd->tags = $prd->tagged;
            $prd->attrs = $attrs;
            $prd->image = $prd->catalogimgs()->first();
            @$prd->image->filename = asset(Config('constants.productImgPath') . @$prd->image->filename);
            if (User::find(Session::get("userId"))->savedlist->contains($prd->id)) {
                $prd->saved = 1;
            } else {
                $prd->saved = 0;
            }
        }
        return response()->json($products);
    }
}

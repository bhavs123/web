<?php

namespace App\Http\Controllers\Frontend;

use Route;
use Session;
use Input;
use App\Models\Category;
use App\Models\CatalogImage;
use App\Models\AttributeSet;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\Controller;
use DB;

class ProductController extends Controller {

    public function index($slug) {

        $prod = Product::findBySlug($slug);

        $prodType = $prod->prod_type;
        //    echo $prodType;
        if ($prodType == 1) {

            return $this->simple($prod->id);
        }
        if ($prodType == 3) {

            return $this->configurable($prod->id);
        }
    }

    public function simple($id) {


        $prod = Product::find($id); //die;

        return view(Config('constants.frontendCatalogProductView') . '.simpleProd', compact('prod'));
    }

    public function configurable($id) {


        $prod = Product::find($id); //die;
        $producctAttrSetId = $prod->attr_set;
       // $attribute = AttributeSet::find($producctAttrSetId)->attributes()->get();
        $attrOpt = AttributeSet::find($producctAttrSetId)->attributes()->where("is_filterable", "=", 1)->get()->toArray();
       // echo "<pre>";
        //print_r($attrOpt);
        //echo "</pre>";
//        $attrOpt1 = DB::table("products")
//                ->where("parent_prod_id","=",$id)->where("has_options.attr_id","=",2)
//                ->leftJoin('has_options',"has_options.prod_id","=","products.id")
//                ->select('products.product','products.parent_prod_id','has_options.attr_id',DB::raw("group_concat(has_options.prod_id) as productId"),'has_options.attr_val')
//                ->groupBy("has_options.attr_val")
//                ->get();
        
//      
         //dd($attrOpt1);
        
    
        return view(Config('constants.frontendCatalogProductView') . '.configurableProd', compact('prod','attrOpt'));
    }

    public function getProdInfo($slug) {

        $prods = Product::findBySlug($slug);


        if (Session::get("userId") && User::find(Session::get("userId"))->savedlist->contains($prods->id)) {
            $prods->saved = 1;
        } else {
            $prods->saved = 0;
        }


        $prods->category = $prods->categories->toArray();

        $prods->tags = $prods->tagged;

        $prods->image = $prods->catalogimgs()->get();

        $prods->techImg = asset(Config('constants.productImgPath') . @$prods->catalogimgs()->first()->filename);


        $attrs = [];

        foreach ($prods->categories()->where("url_key", "!=", "popular")->get() as $cat) {

            $pcat = $cat->getAncestors()->toArray();

            $attrs[$pcat[0]['category']] = $cat->category;
        }


        $prods->attrs = $attrs;



        foreach ($prods->image as $prd_img) {

            $prd_img->filename = asset(Config('constants.productImgPath') . $prd_img->filename);
        }

        $prods->relatedProds = $prods->relatedproducts;

        foreach ($prods->relatedProds as $prd) {

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



        $prods->relatedProds = $prods->relatedProds->toArray();

        $prods->relatedProds = array_chunk($prods->relatedProds, 6);


        return response()->json($prods);
    }

    public function getNewProds() {



        $products = Product::where("is_individual", 1)->orderBy("id", "desc")
                ->paginate(8);



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

        $products['maincat'] = Category::findBySlug("popular")->category;



        return response()->json($products);
    }

}

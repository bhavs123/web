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
        $attribute = AttributeSet::find($producctAttrSetId)->attributes()->get();
        
        $attrOpt = DB::table("products")
                ->where("parent_prod_id","=",$id)
                ->leftJoin('has_options',"has_options.prod_id","=","products.id")
                ->select('products.product','products.parent_prod_id',DB::raw("CONCAT(has_options.prod_id) as productId"),DB::raw("CONCAT(has_options.attr_val) as attrVal"),DB::raw("CONCAT(has_options.attr_id) as attrId"))
                ->groupBy("has_options.prod_id")
                ->get();
        
       echo "select p.product,p.parent_prod_id, group_concat(hp.prod_id),group_concat(hp.attr_val),group_concat(hp.attr_id) from products as p inner join has_options as hp on (p.id = hp.prod_id) where p.parent_prod_id=18
GROUP BY `hp`.`prod_id` ASC";
        
        dd($attrOpt);
        
      //  dd($attribute);
//        foreach($attribute as $attrId){
//         $attributeID = $attrId->id; // die;
//         $attrVal = AttributeValue::find($attributeID)->get();
//        }
 //      dd($attribute);
        return view(Config('constants.frontendCatalogProductView') . '.configurableProd', compact('prod','attribute'));
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

<?php

namespace App\Http\Controllers\Admin;

use Route;
use Input;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\AttributeSet;
use App\Models\CatalogImage;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use DB;

class ProductsController extends Controller {

    public function index() {
        $products = Product::where('is_individual', '=', '1')
                ->orderBy("product", "asc")->paginate(Config('constants.paginateNo'));
        return view(Config('constants.adminProductView') . '.index', compact('products'));
    }

    public function add() {
        $prod_types = [];
        $prodTy = ProductType::get(['id', 'type'])->toArray();
        foreach ($prodTy as $prodT) {
            $prod_types[$prodT['id']] = $prodT['type'];
        }
        $attr_sets = [];
        $attrS = AttributeSet::get(['id', 'attr_set'])->toArray();
        foreach ($attrS as $attr) {
            $attr_sets[$attr['id']] = $attr['attr_set'];
        }
        $action = route("admin.products.save");
        return view(Config('constants.adminProductView') . '.add', compact('prod_types', 'attr_sets', 'action'));
    }

    public function save() {
        // dd(Input::all());
        $prod = Product::create(Input::all());
        if ($prod->prod_type != 3) {
            $attributes = AttributeSet::find($prod->attributeset['id'])->attributes;
            if (!empty($attributes))
                $prod->attributes()->sync($attributes);
            else
                $prod->attributes()->detach();
        } else {
            $attributes = AttributeSet::find($prod->attributeset['id'])->attributes()->where('is_filterable', "=", "0")->get();

            //   dd($prod->attributeset['id']);
            if (!empty($attributes))
                $prod->attributes()->sync($attributes);
        }
        return redirect()->route('admin.products.view');
    }

    public function edit() {
        $prod = Product::find(Input::get('id'));
        $action = route('admin.products.updateProd');
        return view(Config('constants.adminProductView') . '.editInfo', compact('prod', 'action', 'action'));
    }

    public function update() {

       //    dd(Input::get('return_url'));
        $retunUrl =Input::get('return_url');
        $prod = Product::find(Input::get('id'));

        $prod->fill(Input::except('category_id', 'tags'))->save();

        if (!empty(Input::get('category_id')))
            $prod->categories()->sync(Input::get('category_id'));
        else
            $prod->categories()->detach();

        $tags = explode(",", Input::get("tags"));
        if (!empty($tags)) {
            try {
                @$prod->retag($tags);
            } catch (Exception $ex) {
                
            }
        } else {
            try {
                @$prod->untag();
            } catch (Exception $ex) {
                
            }
        }
        $prod->update();
        $view = !empty(Input::get('return_url'))?redirect()->to($retunUrl): redirect()->route("admin.products.images", ['id' => $prod->id]);
        return $view;
    }

    //images Tab

    public function img() {
        $images = CatalogImage::paginate(Config('constants.paginateNo'));
        $prod = Product::find(Input::get('id'));
        $action = route('admin.products.saveImg');
        return view(Config('constants.adminProductView') . '.catalog_images', compact('images', 'prod', 'action'));
    }

    public function delImg() {
        $id = Input::get('imgId');
        $del = CatalogImage::find($id);
        $del->delete();
        echo "Successfully deleted";
    }

    public function saveImg() {
       // dd(Product::find(Input::get('prod_id'))->catalogimgs()->where("image_type", "=", 1)->get());
     //   dd(Input::get('id_img'));
        foreach (Input::file('images') as $key => $value) {
          
            if ($value != null) {
                $destinationPath = public_path() . '/admin/uploads/catalog/products/';
                $fileName = "prod-".$key. date("YmdHis") . "." . $value->getClientOriginalExtension();
                $upload_success = $value->move($destinationPath, $fileName);
            }else{
                  $fileName = null;
            }
            $saveImgs = CatalogImage::findOrNew(Input::get('id_img')[$key]);
            $saveImgs->catalog_id = Input::get('prod_id');
            $saveImgs->filename = is_null($fileName) ? $saveImgs->filename : $fileName;
            $saveImgs->image_type = 1;
            $saveImgs->alt_text = Input::get('alt_text')[$key];
            $saveImgs->sort_order = Input::get('sort_order')[$key];
            $saveImgs->save();
        }

        $prod = Product::find(Input::get('prod_id'));
        $attrs = AttributeSet::find($prod->attributeset['id'])->attributes->toArray();

        if (!empty(Input::get('return_url'))) {
            $nextView = redirect()->to(Input::get('return_url'));
        } else {
//
            if ($prod->prod_type == 2) {
                $nextView = redirect()->route("admin.products.updateComboProds", ['id' => $prod->id]);
            }
//        elseif (!empty($attrs)) {
//           $nextView = redirect()->route("admin.products.updateProdAttr", ['id'=>$prod->id]);
//        } 
            elseif ($prod->prod_type == 3) {
                $nextView = redirect()->route("admin.products.ConfigProdAttrs", ['id' => $prod->id]);
            } else {
                $nextView = redirect()->route("admin.products.updateUpsellRelatedProds", ['id' => $prod->id]);
            }
        }
        return $nextView;
    }

    public function configProdAttrs($prodId) {
        $prod = Product::find($prodId);
        $attributes = AttributeSet::find($prod->attributeset['id'])->attributes()->where("is_filterable", "=", "1")->get();

        $attrs = [];

        foreach ($attributes as $attr) {
            $attrs[$attr->id]['name'] = $attr->attr;
            $attrValues = $attr->attributeoptions()->get(['id', 'option_name']);
            foreach ($attrValues as $val) {
                $attrs[$attr->id]['options'][$val->id] = $val->option_name;
            }
        }


        $prodVariants = Product::where("parent_prod_id", "=", $prod->id)->get();
        $action = route('admin.products.updateCProd');

        return view(Config('constants.adminProductView') . '.editCProd', compact('prod', 'action', 'attrs', 'prodVariants'));
    }

    public function update4() {
        //dd(Input::all());
        $prod = Product::find(Input::get("prod_id"));
        $attributes = AttributeSet::find($prod->attributeset['id'])->attributes()->where("is_filterable", "=", "1")->get()->toArray();
        $prods = [];
        foreach ($attributes as $value) {
            foreach (Input::get($value["id"]) as $key => $val) {
                !isset($prods[$key]) ? $prods[$key] = [] : '';
                $prods[$key]["options"][$value["id"]] = $val;
            }
        }

        foreach (Input::get("price") as $key => $val) {
            !isset($prods[$key]) ? $prods[$key] = [] : '';
            $prods[$key]["price"] = $val;
        }

        foreach (Input::get("stock") as $key => $val) {
            !isset($prods[$key]) ? $prods[$key] = [] : '';
            $prods[$key]['stock'] = $val;
        }

        foreach (Input::get("is_avail") as $key => $val) {
            !isset($prods[$key]) ? $prods[$key] = [] : '';
            $prods[$key]['is_avail'] = $val;
        }
//dd($prods);
        foreach ($prods as $key => $prd) {

          // dd($prod->product);
            $newConfigProduct = Product::create(['product' => $prod->product . ' - Variant - ' . ($key + 1), 'is_avail' => 1, 'parent_prod_id' => $prod->id, 'is_individual' => 0, 'prod_type' => 1, 'attr_set' => @$prod->attr_set, 'price' => @$prods[$key]['price'], 'stock' => @$prods[$key]['stock'], 'is_avail' => @$prods[$key]['is_avail']]);
           // dd($newConfigProduct);
            $attributes = AttributeSet::find($newConfigProduct->attributeset['id'])->attributes;
           // dd( $attributes);
            $newConfigProduct->attributes()->sync($attributes);
        // dd($newConfigProduct);
            $name = $prod->product . ' - Variant ( ';
            foreach ($prd["options"] as $op => $opt) {

                $opt = trim($opt);
                $optionName = AttributeValue::find($opt)->option_name;
                $name .= "$optionName, ";
                DB::update(DB::raw("update has_options set attr_val = '$opt' where attr_id = $op and prod_id = " . $newConfigProduct->id));
            }

            $name = rtrim($name, ", ");
            $name .= " )";

            $newConfigProduct->product = $name;
            
            $newConfigProduct->update();
        }
//dd($newConfigProduct);
       // $view = !empty(Input::get('return_url')) ? redirect()->to(Input::get('return_url')) : redirect()->route("admin.products.updateUpsellRelatedProds", ['id' => $prod->id]);

        return redirect()->route("admin.products.updateUpsellRelatedProds", ['id' => $prod->id]);
    }

    public function updateProdVariant() {
        $prod = Product::find(Input::get("id"));
        $attributes = AttributeSet::find($prod->attributeset['id'])->attributes()->where("is_filterable", "=", "1")->get();
        $attrs = [];
        foreach ($attributes as $attr) {

            $attrs[$attr->id]['name'] = $attr->attr;
            $attrValues = $attr->attributeoptions()->get(['id', 'option_name']);
            foreach ($attrValues as $val) {
                $attrs[$attr->id]['options'][$val->id] = $val->option_name;
            }
        }
        // dd($attrs);
        $action = route('admin.products.update2Prod');
        return view(Config('constants.adminProductView') . '.editProdVariant', compact('prod', 'attRs', 'action', 'attrs'));
    }

    public function getAllProds($prod_id = "") {
        $prods = Product::where('is_individual', '=', '1')
                ->where("id", "!=", $prod_id)
                ->orderBy("product", "asc")
                ->paginate(Config('constants.paginateNo'));
        return $prods;
    }

    public function update2() {

        foreach ($_POST as $key => $value) {
            if (is_int($key)) {
                DB::update(DB::raw("update has_options set attr_val = '$value' where attr_id = $key and prod_id = " . Input::get('id')));
            }
        }
        $prd = Product::find(Input::get('id'));
        $prd->fill(Input::all())->save();

        if ($prd->prod_type != 3) {
            $pId = !empty(Input::get('parent_prod_id')) ? Input::get('parent_prod_id') : Input::get('id');
            $prod = Product::find($pId);
            $prods = $this->getAllProds($pId);
            $action = route('admin.products.updateRelUpProd');
            return !empty(Input::get('close')) ? view(Config('constants.adminProductView') . '.close', compact('prod', 'prods', 'action')) : redirect()->route("admin.products.updateUpsellRelatedProds", $pId);
        } else {
            return redirect()->route("admin.products.ConfigProdAttrs", ['id' => $prd->id]);
        }
    }

    public function updateRelatedUpsellProds($prodId) {
        $prod = Product::find($prodId);
        //    $search = !empty(Input::get("relSearch")) ? Input::get("relSearch") : !empty(Input::get("relSearch")) ? Input::get("relSearch") : '';
        //  $search_fields = ['product', 'short_desc', 'long_desc'];

        $prods = Product::where('is_individual', '=', '1')
                ->where("id", "!=", $prod->id)
                ->orderBy("product", "asc");
        //   $prods = $prods->where(function($query) use($search_fields, $search) {
        //       foreach ($search_fields as $field) {
        //           $query->orWhere($field, "like", "%$search%");
        //       }
        //     });

        $prods = $prods->paginate(Config('constants.paginateNo'));

        $action = route('admin.products.updateRelUpProd');
        return view(Config('constants.adminProductView') . '.editRelUpsellProd', compact('prod', 'prods', 'action'));
    }

    public function relAttach() {
        $prod = Product::find(Input::get("id"));
        $prod->relatedproducts()->attach(Input::get("prod_id"));
    }

    public function relDetach() {
        $prod = Product::find(Input::get("id"));
        $prod->relatedproducts()->detach(Input::get("prod_id"));
    }

    public function upsellAttach() {
        $prod = Product::find(Input::get("id"));
        $prod->upsellproducts()->attach(Input::get("prod_id"));
    }

    public function upsellDetach() {
        $prod = Product::find(Input::get("id"));
        $prod->upsellproducts()->detach(Input::get("prod_id"));
    }

    public function update3() {
        $view = !empty(Input::get('return_url')) ? redirect()->to(Input::get('return_url')) : redirect()->route("admin.products.view");
        return $view;
    }

    //combo products

    public function comboProds($prodId) {


        $prod = Product::find($prodId);

        //   $search = !empty(Input::get("search")) ? Input::get("search") : '';
        //  $search_fields = ['product', 'short_desc', 'long_desc'];

        $prods = Product::where('is_individual', '=', '1')
                ->where("id", "!=", $prod->id)
                ->where("is_crowd_funded", "=", 0)
                ->orderBy("product", "asc");
//        $prods = $prods->where(function($query) use($search_fields, $search) {
//            foreach ($search_fields as $field) {
//                $query->orWhere($field, "like", "%$search%");
//            }
//        });

        $prods = $prods->paginate(Config('constants.paginateNo'));

        $action = route('admin.products.updateCompoProd');
        return view(Config('constants.adminProductView') . '.edit4Prod', compact('prod', 'prods', 'action'));
    }
    
     public function update5() {
        $prod = Product::find(Input::get("id"));
        if (!empty(Input::get('combo_prods')))
            $prod->comboproducts()->sync(Input::get('combo_prods'));
        else
            $prod->comboproducts()->detach();

        $attrs = AttributeSet::find($prod->attributeset['id'])->attributes->toArray();

        if(!empty(Input::get('return_url'))){
            $nextView = redirect()->to(Input::get('return_url'));
            
        }else{
       // if (empty($attrs)) {
            $nextView = redirect()->route("admin.products.updateUpsellRelatedProds", $prod->id);
      //  } else {
       //     $nextView = redirect()->route("admin.products.updateProdAttr", $prod->id);
       // }
        }
        return $nextView;
    }

    

    public function comboAttach() {
        $prod = Product::find(Input::get("id"));
        $prod->comboproducts()->attach(Input::get("prod_id"));
    }

    public function comboDetach() {
        $prod = Product::find(Input::get("id"));
        $prod->comboproducts()->detach(Input::get("prod_id"));
    }

    //attr

    public function prodAttrs($prodId) {
        $prod = Product::find($prodId);
        $attrs = AttributeSet::find($prod->attributeset['id'])->attributes->toArray();
        $action = route('update2Prod');
        return view(Config('constants.adminProductView') . '.edit2Prod', compact('prod', 'action', 'attrs'));
    }

}

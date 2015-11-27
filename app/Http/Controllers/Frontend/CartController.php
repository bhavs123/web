<?php
namespace App\Http\Controllers\Frontend;

use Route;

use Input;

use App\Models\Category;

use App\Models\Product;

use App\Models\HasProducts;

use App\Models\Order;

use App\Http\Controllers\Controller;

use Cart;

use Session;

use App\Models\ProjectSpecification;



class CartController extends Controller {



    public function index() {
        
     // echo "GHJFGJHfgj";

        $cart = Cart::instance('shopping')->content();
       // dd($cart);
       // $existCartDetails = HasProducts::where("order_id", "=", Session::get('projectId'));

        return view(Config('constants.frontendCartView') . '.index', compact('cart'));
    }



    public function add() {
       
    
         $prod_type = Input::get("prod_type"); 

        $prod_id = Input::get("id");

        $chlidProductId =Input::get("chlidProductId");
        
        $quantity = Input::get("quantity"); //die;

        $price = Input::get("price");
       
       $attr = Input::get('attributeval'); //print_r($attr);die;

        switch ($prod_type) {

            case 1:

                $msg = $this->simpleProduct($prod_id,$quantity,$price);

                break;



            case 3:

                $msg = $this->configProduct($prod_id,$chlidProductId,$quantity,$price);

                break;

            default :

        }

        if (preg_match("/Specified/", $msg)) {

            echo $msg;

        } else {

            return $this->cart();

        }

    }



    public function simpleProduct($prod_id,$quantity,$price) {

        $product = Product::find($prod_id);

        $cats = [];

        $attrs = [];

        $dimensions = [];

        foreach ($product->categories as $cat) {

            array_push($cats, $cat->id);

        }

//var_dump($cats); 

       echo $price;

       echo  $pname = $product->product;

        $image = asset(Config('constants.productImgPath') . $product->catalogimgs()->first()->filename);
        
        
// var_dump($image); 
//        $unit = $product->unit_measure;
//
//        $min = $product->min_price;
//
//        $max = $product->max_price;
//
//        $uom = strtolower($unit);
//
//        $width = "width_" . $uom;
//
//        $breadth = "breadth_" . $uom;
//
//        $height = "height_" . $uom;
//
//        $dimensions['width'] = $product->$width;
//
//        $dimensions['breadth'] = $product->$breadth;
//
//        $dimensions['height'] = $product->$height;



        foreach ($product->categories()->get() as $cat) {
            
            $pcat = $cat->getAncestors()->toArray();

            $attrs[$pcat[0]['category']] = $cat->category;

        }

        
        Cart::instance('shopping')->add(["id" => $prod_id, "name" => $pname, "qty" => $quantity, "price" => $price, "options" => ["image" => $image, 'cats' => $cats, 'attrs' => $attrs]]);

    }

public function configProduct($prod_id,$chlidProductId,$quantity,$price) {

        $product = Product::find($prod_id);
    
        $cats = [];

        $attrs = [];

        $dimensions = [];

        foreach ($product->categories as $cat) {

            array_push($cats, $cat->id);

        }

//var_dump($cats); 

       echo $price;

       echo  $pname = $product->product;

        $image = asset(Config('constants.productImgPath') . $product->catalogimgs()->first()->filename);
        
        
// var_dump($image); 
//        $unit = $product->unit_measure;
//
//        $min = $product->min_price;
//
//        $max = $product->max_price;
//
//        $uom = strtolower($unit);
//
//        $width = "width_" . $uom;
//
//        $breadth = "breadth_" . $uom;
//
//        $height = "height_" . $uom;
//
//        $dimensions['width'] = $product->$width;
//
//        $dimensions['breadth'] = $product->$breadth;
//
//        $dimensions['height'] = $product->$height;



        foreach ($product->categories()->get() as $cat) {
            
            $pcat = $cat->getAncestors()->toArray();

            $attrs[$pcat[0]['category']] = $cat->category;

        }

        
        Cart::instance('shopping')->add(["id" => $chlidProductId, "name" => $pname, "qty" => $quantity, "price" => $price, "options" => ["image" => $image, 'cats' => $cats, 'attrs' => $attrs]]);

    }

    public function cart() {

        $cart = "";

        if (Cart::instance("shopping")->count() != 0) {

            foreach (Cart::instance("shopping")->content() as $item) {

                $cart .='<div class="item-in-cart clearfix">

                                <div class="image">

                                    <img src="' . $item->options->image . '" width="124" height="124" alt="' . $item->name . '" />

                                </div>

                                <div class="desc">

                                    <strong><a href="#">' . $item->name . '</a></strong>

                                    <span class="light-clr qty">

                                        Qty: ' . $item->qty . '

                                        &nbsp;

                                        <a href="#" class="icon-remove-sign" title="Remove Item"></a>

                                    </span>

                                     <div class="light-clr">

                                                          For : ' . ( $item->options->allocated == 0 ? "Unallocated" : (ProjectSpecification::find($item->options->allocated)->room) . ' (' . Category::find(ProjectSpecification::find($item->options->allocated)->cat_id)->category . ')') . '

                                </div>

                                </div>

                                

                            </div>';

            }

            $cart.=' <div class="proceed">

                                <a href="/cart" class="btn btn-danger pull-right bold higher">CHECKOUT <i class="icon-shopping-cart"></i></a>

                            </div>';

        } else {

            $cart .='<li>

                        <h6>Cart is Empty</h6>

                    </li>';

        }

        return ($cart . "||||||" . count(Cart::instance("shopping")->content()));

    }

    public function deleteItemCart() {

        Cart::instance('shopping')->remove(Input::get("rowid"));
        return redirect()->back();

    }

   public function existDeleteItemCart() {

        $order_id = Input::get("od_id");

        $getCart = Order::find($order_id)->cart;

      $cartUpdate = json_decode($getCart);

       //     print_r(Input::get('id'));

        $updateHasProds = HasProducts::find(Input::get('id'));

        $updateHasProds->delete();

         return redirect()->back();

    }
    public function edit() {

         $product = Product::find(Input::get("productId"));
         $quantity = Input::get("qty");
      
                if(strstr($quantity, '.') != false)
		{
                  
                       $cart = Cart::instance("shopping")->content();
                       
                        foreach($cart as $cartVal){
                            $quantity = $cartVal->qty;
                            
                        }
                            
		}
              
        if ($product->prod_type == 1 || $product->prod_type == 2) {
            $stock = $product->stock;
        } else if ($product->prod_type == 3) {
            $sub = $product->subproducts()->where("parent_prod_id", "=", Input::get("productId"))->first();
            $stock = $sub->stock;
        }


        Cart::instance('shopping')->update(Input::get("rowid"), ['qty' => $quantity]); 
        echo Cart::instance('shopping')->get(Input::get("rowid"))->subtotal;
        echo "||||||||||" . Cart::total();


    }



}


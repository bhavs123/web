<?php

namespace App\Http\Controllers\Frontend;

use Route;
use Input;
use App\Models\Category;
use App\Models\Product;
use App\Models\HasProducts;
use App\Models\Order;
use App\Models\Country;
use App\Models\State;
use App\Models\Address;
use App\Http\Controllers\Controller;
use Cart;
use Session;
use App\Models\ProjectSpecification;

class CheckoutCOntroller extends Controller {

    public function shippingDetails() {
        $userID = Session::get('loggedinUserId');
        $addresses = Address::where('user_id', '=', $userID)->get();
        $country = Country::all();
        $state = State::all();
        return view(Config('constants.frontendCheckoutView') . '.shipping', compact('country', 'state', 'addresses'));
    }

    public function paymentDetails() {

        // $address = Address::find($user->addresses()->first()->id);
        $cart = Cart::instance('shopping')->content();
        $cartTotal = Cart::instance('shopping')->total();

        $address = new Address();
        $address->user_id = Session::get('loggedinUserId');
        $address->firstname = Input::get('shipping_first_name');
        $address->lastname = Input::get('shipping_last_name');
        $address->address1 = Input::get('shipping_address_1');
        $address->address2 = Input::get('shipping_address_2');
        $address->address = Input::get('shipping_landmark');
        $address->postcode = Input::get('shipping_postcode');
        $address->city = Input::get('shipping_city');
        $address->country_id = Input::get('shipping_country');
        $address->zone_id = Input::get('shipping_state');
        $address->save();
        $addressId = Session::put('addressId', $address->id);
        $address = Address::where('id', '=', $addressId)->get();
        return view(Config('constants.frontendCheckoutView') . '.payment', compact('address', 'cart', 'cartTotal'));
    }

    public function ajaxCountryStates() {
        $country_id = Input::get("country_id");
        $state = State::where('country_id', '=', $country_id)->get();

        return $state;
    }

    public function deleteAddress() {
        $addressId = Input::get("addr_id");
        $address = Address::find($addressId)->delete();
        //    return 
    }

    public function continueAddress() {
        $cart = Cart::instance('shopping')->content();
        $cartTotal = Cart::instance('shopping')->total();
        $addressId = Input::get("addressId");
        Session::put('addressId', $addressId);
        $address = Address::where('id', '=', $addressId)->get();
        return view(Config('constants.frontendCheckoutView') . '.payment', compact('address', 'cart', 'cartTotal'));
    }

    public function checkout() {
        $cartContent = Cart::instance('shopping')->content();
        // dd($cart);
        $cartTotal = Cart::instance('shopping')->total();
        $addrId = Session::get('addressId');
        $address = Address::where('id', '=', $addrId)->first();

        //$aa = json_encode(Input::get('prod'));
       // $bb = json_encode($cart);


        $order_total = Input::get('order_total');
        $payment_method = Input::get('payment_method');
        $order = new Order();
        $order->user_id = Session::get('loggedinUserId');
        $order->order_amt = $cartTotal;
        $order->pay_amt = $cartTotal;
        $order->cod_charges = '0';
        $order->payment_method = $payment_method;
        $order->payment_status = '1';
        $order->cart = json_encode($cartContent);
        $order->first_name = $address->firstname;
        $order->last_name = $address->lastname;
        $order->location = $address->address;
        $order->city = $address->city;
        $order->postcode = $address->postcode;
        $order->country_id = $address->country_id;
        $order->state_id = $address->zone_id;
        $order->order_status = '1';
        $order->save();
//echo "Thank You";

        $cart_ids = [];
        foreach ($cartContent as $cart) {
            $cart_ids[$cart->rowid] = ["prod_id" => $cart->id, "qty" => $cart->qty, "uprice" => $cart->price, "price" => $cart->subtotal, "created_at" => date('Y-m-d H:i:s')];
          //  dd($cart_ids[$cart->rowid]);
            if ($cart->options->has('sub_prod')) {
                    $cart_ids[$cart->rowid]["sub_prod_id"] = $cart->options->sub_prod;
                    $cart_ids[$cart->rowid]["price_saved"] = $cart->options->ysave;
            } else if ($cart->options->has('combos')) {
                        $sub_prd_ids = [];
                        foreach ($cart->options->combos as $key => $val) {
                            if (isset($val['sub_prod'])) {
                                array_push($sub_prd_ids, (string) $val['sub_prod']);
                            }
                        }
                        $cart_ids[$cart->id]["sub_prod_id"] = json_encode($sub_prd_ids);
                    }
             if (!empty($cart_ids)) {

            $order->products()->sync($cart_ids);
        }
        
        }
        
          return view(Config('constants.frontendCheckoutView') . '.response');
    }
    
    
}

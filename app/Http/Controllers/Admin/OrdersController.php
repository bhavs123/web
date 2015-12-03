<?php

namespace App\Http\Controllers\Admin;

use Route;
use Input;
use App\Models\Product;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use App\Models\Order;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\ProductType;
use App\Models\AttributeSet;
use App\Models\CatalogImage;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use DB;

class OrdersController extends Controller {

    public function index() {
        // $orderPage = Order::paginate(5);

        $orderInfo = Order::paginate(Config('constants.paginateNo'));
        // dd($orderInfo);
        return view(Config('constants.adminOrderView') . '.index', compact('orderInfo', 'orderPage'));
    }

    public function edit() {

        $orders = Order::find(Input::get('id'));
        // dd($orders);
        //dd($orders->id);
        $orderDetails = DB::table('orders')
                        ->Join('has_products', 'orders.id', '=', 'has_products.order_id')
                        ->Join('products', 'has_products.prod_id', '=', 'products.id')
                        ->select('orders.id', 'orders.cart', 'orders.created_at', DB::raw('SUM(has_products.price) as totalOrderAmt'), DB::raw("group_concat(products.product) as productName"), DB::raw("group_concat(products.id) as productId"), DB::raw("group_concat(has_products.qty) as productQty"), DB::raw("group_concat(has_products.uprice) as productUprice"), DB::raw("group_concat(has_products.price) as productPrice"))
                        ->groupBy('orders.id')
                        ->where('orders.id', "=", $orders->id)->get();

        // dd($orderDetails);
        $action = route("admin.orders.save");

        $order_status = OrderStatus::get()->toArray();
        $orderStatus = ["" => "Please Select Order Status"];
        foreach ($order_status as $status) {
            $orderStatus[$status['id']] = $status['order_status'];
        }

        $payment_status = PaymentStatus::get()->toArray();

        $paymentStatus = ["" => "Please Select Payment Status"];
        foreach ($payment_status as $p_status) {
            $paymentStatus[$p_status['id']] = $p_status['payment_status'];
        }


        $payment_method = PaymentMethod::get()->toArray();


        $paymentMethod = ["" => "Please Select Payment Method"];
        foreach ($payment_method as $p_method) {
            $paymentMethod[$p_method['id']] = $p_method['name'];
        }

        $countryInfo = Country::get()->toArray();


        $country = ["" => "Please Select country"];
        foreach ($countryInfo as $country_val) {
            $country[$country_val['id']] = $country_val['name'];
        }

        $stateInfo = State::get()->toArray();


        $state = ["" => "Please Select state"];
        foreach ($stateInfo as $state_val) {
            $state[$state_val['id']] = $state_val['name'];
        }
        return view(Config('constants.adminOrderView') . '.addEdit', compact('orders', 'orderDetails', 'country', 'state', 'action', 'orderStatus', 'paymentStatus', 'paymentMethod'));
    }

    public function save() {
        $orderId = Order::find(Input::get('id'));
        $orderStatus = Input::get('order_status');
        $cur_Order_Status = $orderId->order_status;
        $cur_Order_Status . "---" . $orderStatus;
        //  dd(Input::all());
        if ($cur_Order_Status == $orderStatus) {
            $orderEdit = Order::find(Input::get('id'));
            $orderEdit->first_name = Input::get('first_name');
            $orderEdit->last_name = Input::get('last_name');
            // $orderEdit->email = Input::get('email');
            $orderEdit->country_id = Input::get('country');
            $orderEdit->state_id = Input::get('state');
            $orderEdit->city = Input::get('city');
            $orderEdit->location = Input::get('location');
            $orderEdit->mobile = Input::get('mobile');
            $orderEdit->order_comment = Input::get('comments');
            $orderEdit->payment_method = Input::get('payment_method');
            $orderEdit->payment_status = Input::get('payment_status');
            $orderEdit->order_status = Input::get('order_status');
            $orderEdit->pay_amt = Input::get('payable_amount');
            $orderEdit->cod_charges = Input::get('cod_charges');

            $orderEdit->shipping_amt = Input::get('shipping_amount');
            $orderEdit->coupon_amt_used = Input::get('coupon_amount');
            $orderEdit->update();

            return redirect()->back();
        }
    }

    public function invoice() {

        $orderIds = explode(",", Input::get('OrderIds'));
      //  dd($orderIds);
        $invoice = "";
        foreach ($orderIds as $id) {
            $order = Order::find($id);
            $address = $order->with('users')->with('address')->first();
            
            $invoice .= view(Config('constants.adminOrderView') . '.invoice', compact('order', 'address'));
        }
        return $invoice;
    }

}

?>
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


        $paymentMethod = ["" => "Please Select Payment Status"];
        foreach ($payment_method as $p_method) {
            $paymentMethod[$p_method['id']] = $p_method['name'];
        }
        return view(Config('constants.adminOrderView') . '.addEdit', compact('orders', 'action','orderStatus','paymentStatus','paymentMethod'));
    }

}

?>
<?php

namespace App\Http\Controllers\Admin;

use Route;
use Input;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductType;
use App\Models\AttributeSet;
use App\Models\CatalogImage;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use DB;

class OrdersController extends Controller {

    public function index() {
       return view(Config('constants.adminOrderView') . '.index');
    }

}

?>
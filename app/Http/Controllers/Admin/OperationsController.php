<?php

namespace App\Http\Controllers\Admin;

use Route;
use Input;
use App\Http\Controllers\Controller;

class OperationsController extends Controller {

    public function all_products_view() {

        return view('admin.pages.operations.all_products');
    }

    public function ordered_products_view() {

        return view('admin.pages.operations.ordered_products');
    }

    public function proforma_invoices_view() {

        return view('admin.pages.operations.proforma_invoices');
    }

    public function ready_products_view() {

        return view('admin.pages.operations.ready_products');
    }

    public function logistic_info_view() {

        return view('admin.pages.operations.logistic_info');
    }

    public function warehouse_products_view() {

        return view('admin.pages.operations.warehouse_products');
    }

}

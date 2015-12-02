<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\UserInterface;

class Order extends Model {

  

    protected $table = 'orders';
    protected $fillable = ["payment_status", "payment_method", "transaction_id", "description", "order_comment", "order_payment_status", "order_status"];

    public function products() {
        return $this->belongsToMany('App\Models\Product', 'has_products', 'order_id', 'prod_id')->withPivot("order_id","prod_id", "sub_prod_id", "qty","qty_returned","price","price_saved", "price", "created_at");
    }

    public function hasproduct() {
        return $this->belongsToMany('App\Models\Order', 'has_products', 'order_id', 'id');
    }

    public function users() {

        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function country() {

        return $this->belongsTo('App\Models\Country', 'country_id');
    }
    
    public function address() {

        return $this->belongsTo('App\Models\Address', 'user_id');
    }

    public function paymentmethod() {
        return $this->belongsTo('App\Models\PaymentMethod', 'payment_method');
    }

    public function paymentstatus() {
        return $this->belongsTo('App\Models\PaymentStatus', 'payment_status');
    }

    public function orderstatus() {
        return $this->belongsTo('App\Models\OrderStatus', 'order_status');
    }

    public function coupon() {

        return $this->belongsTo('App\Models\Coupon', 'coupon_used');
    }

    public function voucher() {

        return $this->belongsTo('App\Models\Coupon', 'voucher_used');
    }

      public function availableslot() {

        return $this->belongsTo('App\Models\AvailableSlot', 'avl_slot_id');
    }
    
    public function delboy(){
         return $this->belongsTo('App\Models\User', 'del_boy');
    }

    
    
}

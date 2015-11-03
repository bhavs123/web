<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\UserInterface;

class Order extends Model {

  

    protected $table = 'orders';
   // protected $fillable = ["payment_status","tripsheet_id","del_boy", "payment_method", "transaction_id", "description", "order_comment", "order_payment_status", "order_status"];

    public function products() {
        return $this->belongsToMany('Product', 'has_products', 'order_id', 'prod_id')->withPivot("id","uprice", "sub_prod_id", "qty","qty_returned","price_saved", "price", "created_at");
    }

    public function hasproduct() {
        return $this->belongsToMany('Order', 'has_products', 'order_id', 'id');
    }

    public function users() {

        return $this->belongsTo('User', 'user_id');
    }
    
    public function address() {

        return $this->belongsTo('Address', 'user_id');
    }

    public function paymentmethod() {
        return $this->belongsTo('PaymentMethod', 'payment_method');
    }

    public function paymentstatus() {
        return $this->belongsTo('PaymentStatus', 'payment_status');
    }

    public function orderstatus() {
        return $this->belongsTo('OrderStatus', 'order_status');
    }

    public function coupon() {

        return $this->belongsTo('Coupon', 'coupon_used');
    }

    public function voucher() {

        return $this->belongsTo('Coupon', 'voucher_used');
    }

      public function availableslot() {

        return $this->belongsTo('AvailableSlot', 'avl_slot_id');
    }
    
    public function delboy(){
         return $this->belongsTo('User', 'del_boy');
    }

    
    
}

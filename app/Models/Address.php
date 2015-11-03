<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\UserInterface;

class Address extends Model {

   

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'has_addresses';
   
     public function users() {
        return $this->belongsTo('User');
    }
    
      public function country() {
        return $this->belongsTo('Country','country_id');
    }
    
    
       public function zone() {
        return $this->belongsTo('Zone','zone_id');
    }

}

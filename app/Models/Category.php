<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Baum\Node;

class Category extends Node implements SluggableInterface {

    protected $table = 'categories';

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'category',
        'save_to' => 'url_key',
    );
    
    

    public function categories() {
        return $this->belongsToMany('App\Models\Category', 'has_categories', 'prod_id', 'cat_id');
    }
    
     protected $orderColumn = "sort_order";
    
}

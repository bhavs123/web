<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Conner\Tagging\TaggableTrait;

class Product extends \Eloquent implements SluggableInterface {

    use SluggableTrait,
        TaggableTrait;

    protected $sluggable = array(
        'build_from' => 'product',
        'save_to' => 'url_key',
    );
    protected $fillable = ["base_qty", "prod_type", "alias", "aq", "factor", "markup", "disc", "mrp", "sp", "savings", "art_cut", "add_desc", "meta_title", "meta_keys", "meta_desc", "is_cod", "is_crowd_funded", "target_date", "target_qty", "attr_set", "product", "is_individual", "added_by", "is_avail", "stock", "short_desc", "long_desc", "url_key", "images", "price", "spl_price", "parent_prod_id", "sort_order"];

    public function categories() {
        return $this->belongsToMany('App\Models\Category', 'has_categories', 'prod_id', 'cat_id');
    }

    public function attributeset() {
        return $this->belongsTo('App\Models\AttributeSet', 'attr_set');
    }

    public function producttype() {
        return $this->belongsTo('App\Models\ProductType', 'prod_type');
    }

    public function attributes() {
        return $this->belongsToMany('App\Models\Attribute', 'has_options', 'prod_id', 'attr_id')->withPivot("id", "attr_val");
    }

    public function relatedproducts() {
        return $this->belongsToMany('App\Models\Product', 'has_related_prods', 'prod_id', 'related_prod_id');
    }

    public function upsellproducts() {
        return $this->belongsToMany('App\Models\Product', 'has_upsell_prods', 'prod_id', 'upsell_prod_id');
    }

    public function parentproduct() {
        return $this->belongsTo('App\Models\Product', 'parent_prod_id');
    }

    public function subproducts() {
        return $this->hasMany('App\Models\Product', 'parent_prod_id');
    }

    public function comboproducts() {
        return $this->belongsToMany('App\Models\Product', 'has_combo_prods', 'prod_id', 'combo_prod_id');
    }
    
    public function catalogimgs(){
           return $this->hasMany('App\Models\CatalogImage', 'catalog_id');
        
    }
    

}

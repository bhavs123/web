<ul class="nav nav-tabs" role="tablist">
    <li class="{{ in_array(Route::currentRouteName(),['admin.products.editinfo']) ? 'active' : '' }}"><a href="{!! route('admin.products.editinfo',['id'=>$id]) !!}"   aria-expanded="false">General Info <span class="badge badge-sm m-l-xs"></span></a></li>
    <li class="{{ in_array(Route::currentRouteName(),['admin.products.images']) ? 'active' : '' }}"><a href="{!! route('admin.products.images',['id'=>$id]) !!}"  aria-expanded="false">Images</a></li>

    @if($prod_type == 2)
    <li class="{{ in_array(Route::currentRouteName(),['admin.products.updateComboProds']) ? 'active' : '' }}"><a href="{!! route('admin.products.updateComboProds',['id'=>$id]) !!}"  aria-expanded="false">Combo Products</a></li>
    @endif

    @if($prod_type == 3)
    <li class="{{ in_array(Route::currentRouteName(),['admin.products.ConfigProdAttrs']) ? 'active' : '' }}"><a href="{!! route('admin.products.ConfigProdAttrs',['id'=>$id]) !!}"  aria-expanded="false">Product Variants </a></li>

    @endif
    <li class="{{ in_array(Route::currentRouteName(),['admin.products.updateUpsellRelatedProds']) ? 'active' : '' }}"><a href="{!! route('admin.products.updateUpsellRelatedProds',['id'=>$id]) !!}"  aria-expanded="false">Related & Upsell Products </a></li>


</ul>




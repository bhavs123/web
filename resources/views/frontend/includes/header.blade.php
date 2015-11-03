<div class="top-bar">
    <div class="container">

        <ul class="top-menu">
            <li> Tag Line Goes Here </li>
            <li> <i class="fa fa-phone"></i> Call Us: <span> 1-223-355-2214 </span></li>

        </ul>

        <div class="top-right custom-top-right">
              @if(Session::get("userName"))
              <span> Hi, </span><strong>{{ ucfirst(Session::get("userName")) }}</strong>|
             <span> <a href="#"> <i class="fa fa-user"></i> My Account </a>| <a href="{{ route('login') }}"></i> Logout </a> |
              <a href="/cart"><i class="fa fa-shopping-cart"></i> Cart <span class="cartQty">({{ count(Cart::instance("shopping")->content())}})</a></span>
              @else
            <a href="{{ route('login') }}"> <span><i class="fa fa-edit"></i> Login</a> | <a href="{{ route('register') }}"><i class="fa fa-user"></i> Register</a> |
            <a href="/cart"><i class="fa fa-shopping-cart"></i> Cart <span class="cartQty">( {{ count(Cart::instance("shopping")->content()) }})</span></a>
            @endif
            <ul class="dt-sc-social-icons">
                <li> <a href="#" title="facebook"> <i class="fa fa-facebook"></i>  </a> </li>
                <li> <a href="#" title="twitter"> <i class="fa fa-twitter"></i>  </a> </li>
                <li> <a href="#" title="youtube"> <i class="fa fa-youtube"></i>  </a> </li>
            </ul>
        </div>

    </div>
</div><!-- **Top Bar - End** -->

<!--<div class="open-panel">
                            
                           
                            @if(Cart::instance("shopping")->count() != 0) 
                            @foreach (Cart::instance("shopping")->content() as $item)
                            
                        
                            <div class="item-in-cart clearfix">
                         
                                <div class="image">
                                    <a href="/{{ @App\Models\Product::find($item->id)->url_key}}"><img src="{{ $item->options->image }}" width="124" height="124" alt="{{ $item->name }}" /></a>
                                </div>
                                <div class="desc">
                                    <strong><a href="/{{ @App\Models\Product::find($item->id)->url_key}}">{{ $item->name }}</a></strong>
                                    <span class="light-clr qty">
                                        Qty: {{ $item->qty }}
                                        &nbsp;
                                        <a href="#" data-rowid="{{$item->rowid}}" class="hCartRemoveItem" title="Remove Item">Remove</a> 
                                    </span>
                                    <div class="light-clr">
                                                          For : {{ $item->options->allocated == 0 ? "Unallocated" :  App\Models\ProjectSpecification::find($item->options->allocated)->room . " (" . App\Models\Category::find(App\Models\ProjectSpecification::find($item->options->allocated)->cat_id)->category . ")" }}</strong>
                                </div>
                                </div>
                                
                            </div>
                            @endforeach 
                            <div class="proceed">
                                <a href="#" class="btn btn-danger pull-right bold headerCheckout higher">CHECKOUT <i class="icon-shopping-cart"></i></a>
                            </div>
                            @else
                            <h3 style='padding: 15px;'>No Items in the Cart</h3>
                            @endif
                        </div>-->


<div id="header-wrapper">
    <!-- **Header** -->
    <header class="header">
        <div class="container">

            <!-- **Logo - End** -->
            <div id="logo">
                <a href="index.php" title="Priority"> <img src="{{ asset(Config('constants.frontendimg') . "/logo.png") }}" alt="logo"/> </a>
            </div><!-- **Logo - End** -->

            <div id="menu-container">
                <!-- **Nav - Starts**-->
                <nav id="main-menu">
                 
                    <ul class="nav" id="mainNavigation" ng-controller="mainNavigation" >
                        <li class="current_page_item menu-item-simple-parent" ng-repeat="nav in navigation" >
                            <a href="/explore/[[ nav.url_key ]]">[[ nav.category ]]</a>
                            <ul class="child">
                                <li ng-repeat="child in nav.children">
                                    <a href="/explore/[[ child.url_key ]]">[[ child.category ]]</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
    </header><!-- **Header - End** -->
</div>
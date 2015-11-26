<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
        <div class="navi-wrap">
            <!-- user -->
            <div class="clearfix hidden-xs text-center hide" id="aside-user">
                <div class="dropdown wrapper">
                    <a href="app.page.profile">
                        <span class="thumb-lg w-auto-folded avatar m-t-sm">
                            <img src="{{ asset('/public/admin/img/a0.jpg') }}" class="img-full" alt="...">
                        </span>
                    </a>
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                        <span class="clear">
                            <span class="block m-t-sm">
                                <strong class="font-bold text-lt">Admin</strong> 
                                <b class="caret"></b>
                            </span>
                            <span class="text-muted text-xs block">Art Director</span>
                        </span>
                    </a>
                    <!-- dropdown -->
                    <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                        <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                            <span class="arrow top hidden-folded arrow-info"></span>
                            <div>
                                <p>300mb of 500mb used</p>
                            </div>
                            <div class="progress progress-xs m-b-none dker">
                                <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                            </div>
                        </li>
                        <li>
                            <a href>Settings</a>
                        </li>
                        <li>
                            <a href="page_profile.html">Profile</a>
                        </li>
                        <li>
                            <a href>
                                <span class="badge bg-danger pull-right">3</span>
                                Notifications
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="page_signin.html">Logout</a>
                        </li>
                    </ul>
                    <!-- / dropdown -->
                </div>
                <div class="line dk hidden-folded"></div>
            </div>
            <!-- / user -->

            <!-- nav -->
            <nav ui-nav class="navi clearfix">
                <ul class="nav">
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">

                    </li>
                    <!--                     <li>
                                            <a href class="auto">
                                                <span class="pull-right text-muted">
                                                    <i class="fa fa-fw fa-angle-right text"></i>
                                                    <i class="fa fa-fw fa-angle-down text-active"></i>
                                                </span>
                                                <i class="glyphicon glyphicon-file icon"></i>
                                                <span>Acl</span>
                                            </a>
                                          
                                        
                                        
                                     <li>-->
                    <li>
                        <a href class="auto">      
                            <span class="pull-right text-muted">
                                <i class="fa fa-fw fa-angle-right text"></i>
                                <i class="fa fa-fw fa-angle-down text-active"></i>
                            </span>
                            <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                            <span class="font-bold">Orders</span>
                        </a>

                        <ul class="nav nav-sub dk">
                            <li>
                               <a href="{!! route('admin.orders.view') !!}">
                                    <span>All Orders</span>
                                </a>
                            </li>
                        </ul>
                        
                            
                        
                    </li> 
                    <li>
                        <a href class="auto">      
                            <span class="pull-right text-muted">
                                <i class="fa fa-fw fa-angle-right text"></i>
                                <i class="fa fa-fw fa-angle-down text-active"></i>
                            </span>
                            <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                            <span class="font-bold">Catalog</span>
                        </a>

                        <ul class="nav nav-sub dk">


                            <li>
                                <a href="{!! route('admin.category.view') !!}">
                                    <span>Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="{!! route('admin.attrSets.view') !!}">
                                    <span>Attribute Sets</span>
                                </a>
                            </li>

                            <li>
                                <a href="{!! route('admin.attrs.view') !!}">
                                    <span>Attribute</span>
                                </a>
                            </li>

                            <li>
                                <a href="{!! route('admin.products.view') !!}">
                                    <span>Products</span>
                                </a>
                            </li>
                        </ul>


                    </li>
                    <ul class="nav nav-sub dk">
                        <li>
                            <a href="{!! route('admin.roles.view') !!}">
                                <span>Manage Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{!! route('admin.systemusers.view') !!}">
                                <span>Manage Attribute Sets</span>
                            </a>
                        </li>
                        <li>
                            <a href="{!! route('admin.systemusers.view') !!}">
                                <span>Manage Attributes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{!! route('admin.systemusers.view') !!}">
                                <span>Manage Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{!! route('admin.systemusers.view') !!}">
                                <span>Upload/Download Products</span>
                            </a>
                        </li>
                    </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-signal"></i>
                            <span>Projects</span>
                        </a>
                    </li>

                    <li>
                        <a href class="auto">      
                            <span class="pull-right text-muted">
                                <i class="fa fa-fw fa-angle-right text"></i>
                                <i class="fa fa-fw fa-angle-down text-active"></i>
                            </span>

                            <i class="glyphicon glyphicon-th"></i>
                            <span>Operations</span>
                        </a>

                        <ul class="nav nav-sub dk">
                            <li>
                                <a href="{!! route('admin.operations.allproducs.view') !!}">
                                    <span>All Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="{!! route('admin.operations.orderedproducts.view') !!}">
                                    <span>Assign PI</span>
                                </a>
                            </li>
                            <li>
                                <a href="{!! route('admin.operations.proformainvoices.view') !!}">
                                    <span>Confirm PI</span>
                                </a>
                            </li>
                            <li>
                                <a href="{!! route('admin.operations.readyproducs.view') !!}">
                                    <span>Track/Update Production</span>
                                </a>
                            </li>

                            <li>
                                <a href="{!! route('admin.operations.logisticinfo.view') !!}">
                                    <span>Manage Consignments</span>
                                </a>
                            </li>
                            <li>
                                <a href="{!! route('admin.operations.warehouseproducts.view') !!}">
                                    <span>Warehouse List</span>
                                </a>
                            </li>      
                        </ul>
                    </li>
                    <li>
                        <a href class="auto">      
                            <span class="pull-right text-muted">
                                <i class="fa fa-fw fa-angle-right text"></i>
                                <i class="fa fa-fw fa-angle-down text-active"></i>
                            </span>

                            <i class="glyphicon glyphicon-th"></i>
                            <span>Sales</span> 
                        </a>
                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>Sales</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>By Order</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>By Product</span>
                                </a>
                            </li>     <li>
                                <a href="#">
                                    <span>By Category</span>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li>
                        <a href class="auto">
                            <span class="pull-right text-muted">
                                <i class="fa fa-fw fa-angle-right text"></i>
                                <i class="fa fa-fw fa-angle-down text-active"></i>
                            </span>
                            <i class="glyphicon glyphicon-file icon"></i>
                            <span>Users</span>
                        </a>
                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>Pages</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Client</span>
                                </a>
                            </li>

                            <li>
                                <a href="{!! route('admin.roles.view')  !!}">
                                    <span>Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{!! route('admin.systemusers.view')  !!}">
                                    <span>System Users</span>
                                </a>
                            </li>


                    </li>

                </ul>
                </li>


                <li>
                    <a href class="auto">
                        <span class="pull-right text-muted">
                            <i class="fa fa-fw fa-angle-right text"></i>
                            <i class="fa fa-fw fa-angle-down text-active"></i>
                        </span>
                        <i class="glyphicon glyphicon-briefcase icon"></i>
                        <span>Miscellaneous </span>
                    </a>
                    <ul class="nav nav-sub dk">
                        <li class="nav-sub-header">
                            <a href>
                                <span>Miscellaneous </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>voluptatem </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">

                                <span>accusantium</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>doloremque</span>
                            </a>
                        </li>


                    </ul>
                </li>



                <li class="line dk hidden-folded"></li>

                <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">          
                    <span>Your Stuff</span>
                </li>  
                <li>
                    <a href="page_profile.html">
                        <i class="icon-user icon text-success-lter"></i>
                        <b class="badge bg-success pull-right"></b>
                        <span>Profile</span>
                    </a>
                </li>

                </ul>
            </nav>
            <!-- nav -->


            <!-- / aside footer -->
        </div>
    </div>
</aside>
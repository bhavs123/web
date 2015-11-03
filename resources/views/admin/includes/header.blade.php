<header id="header" class="app-header navbar" role="menu">
    <!-- navbar header -->
    <div class="navbar-header bg-dark">
        <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
            <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
            <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <!-- brand -->
        <a href="#/" class="navbar-brand text-lt navbar-brand-img ">
             
            <img src="{{ asset('/public/admin/img/logo.png') }}" alt="." class="navbar-brand-img">
             
        </a>
        <!-- / brand -->
    </div> 

    <!-- / navbar header -->

    <!-- navbar collapse -->
    <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
            <a href="#" class="btn no-shadow navbar-btn  vert-middle" ui-toggle="app-aside-folded" target=".app">
                <i class="fa fa-dedent fa-fw text"></i>
                <i class="fa fa-indent fa-fw text-active"></i>
            </a>
             
<!--                <spna class='header-page-heading vert-middle'>All Product</span>
             -->
        </div>
        <!-- / buttons -->

        <!-- link and dropdown -->
      
        <!-- / link and dropdown -->

        <!-- search form -->
       <!--  <form class="navbar-form navbar-form-sm navbar-left shift" ui-shift="prependTo" data-target=".navbar-collapse" role="search" ng-controller="TypeaheadDemoCtrl">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" ng-model="selected" typeahead="state for state in states | filter:$viewValue | limitTo:8" class="form-control input-sm bg-light no-border rounded padder" placeholder="Search projects...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        </form> -->
        <!-- / search form -->

        <!-- nabar right -->
        
        <!-- / navbar right -->
    </div>
    <!-- / navbar collapse -->
</header>
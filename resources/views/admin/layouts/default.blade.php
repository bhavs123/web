<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.includes.head')
        @yield('mystyles')
    </head>
    <body>
        <div class="app app-header-fixed  ">

            <!-- header -->
            @include('admin.includes.header')
            <!-- / header -->

            <!-- sidebar -->
            @include('admin.includes.sidebar')
            <!-- / sidebar -->

            <!-- content -->
            <div id="content" class="app-content" role="main">
                <div class="app-content-body ">
                    @yield('content')
                </div>
            </div>
            <!-- / content -->

            <!-- footer -->
            @include('admin.includes.footer')
            @include('admin.includes.foot')
            @yield('myscripts')
            <!-- / footer -->

        </div>



    </body>
</html>
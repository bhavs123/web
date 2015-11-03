<!Doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js" ng-app="kanha"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js" ng-app="kanha"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js" ng-app="kanha"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js" ng-app="kanha"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('frontend.includes.head')
        @yield('mystyles')
    </head>
    <body>
        <div class="wrapper"> 
            <div class="inner-wrapper">

                <!-- header -->
                @include('frontend.includes.header')
                <!-- / header -->



                <!-- content -->
                <div id="main">
                    @yield('content')

                </div>
                <!-- / content -->


                <!-- footer -->
                @include('frontend.includes.footer')    
                <!-- / footer -->
            </div>

        </div>




        @include('frontend.includes.foot')
        @yield('myscripts')

    </body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.1/angular.min.js"></script>

<script src="{{ asset(Config('constants.frontendjs') . "/jquery-1.10.2.min.js") }}" ></script>
<script src="{{ asset(Config('constants.frontendjs') . "/jquery-migrate.min.js") }}"></script>

<script src="{{ asset(Config('constants.frontendjs') . "/preloader.js") }}" ></script>
<script src="{{ asset(Config('constants.frontendjs') . "/pace.min.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/jquery.tabs.min.js") }}"></script>
<script src="{{ asset(Config('constants.frontendjs') . "/jquery.tipTip.minified.js") }}"></script>

<script src="{{ asset(Config('constants.frontendjs') . "/jquery-easing-1.3.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/jquery.parallax-1.1.3.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/jquery.carouFredSel-6.2.1-packed.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/jquery.inview.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/jquery.nav.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/layerslider.transitions.js") }}"></script> 
<script src="{{ asset(Config('constants.frontendjs') . "/layerslider.kreaturamedia.jquery.js") }}"></script> 
<script src="{{ asset(Config('constants.frontendjs') . "/greensock.js") }}"></script> 

<script src="{{ asset(Config('constants.frontendjs') . "/jquery.jcarousel.min.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/jquery.isotope.min.js") }}" ></script>
<script src="{{ asset(Config('constants.frontendjs') . "/jquery.prettyPhoto.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/masonry.pkgd.min.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/jquery.smartresize.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/responsive-nav.js") }}" ></script>
<script src="{{ asset(Config('constants.frontendjs') . "/jquery.meanmenu.min.js") }}" ></script>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{{ asset(Config('constants.frontendjs') . "/jquery.gmap.min.js") }}"></script>

<!-- **Sticky Nav** -->
<script src="{{ asset(Config('constants.frontendjs') . "/jquery.sticky.js") }}" ></script>

<!-- **To Top** -->
<script src="{{ asset(Config('constants.frontendjs') . "/jquery.ui.totop.min.js") }}" ></script>

<script  src="{{ asset(Config('constants.frontendjs') . "/twitter/jquery.tweet.min.js") }}"></script>

<script src="{{ asset(Config('constants.frontendjs') . "/jquery.viewport.js") }}" ></script> 

<script  src="{{ asset(Config('constants.frontendjs') . "/jquery.validate.min.js") }}"></script>

<script src="{{ asset(Config('constants.frontendjs') . "/retina.js") }}" ></script>

<script src="{{ asset(Config('constants.frontendjs') . "/custom.js") }}" ></script>    
<script src="{{ asset(Config('constants.frontendjs') . "/ng-app.js") }}" ></script>

<script data-cfasync="false" >var lsjQuery = jQuery;</script>
<script data-cfasync="false" >
            lsjQuery(document).ready(function () {
    if (typeof lsjQuery.fn.layerSlider == "undefined") {
        lsShowNotice('layerslider_10', 'jquery'); 
    } else { 
        lsjQuery("#layerslider_10").layerSlider({responsiveUnder: 1240, layersContainer: 1170, startInViewport: false, pauseOnHover: false, forceLoopNum: false, autoPlayVideos: false, skinsPath: 'public/frontend/js/layerslider/skins/'
    });
    }
});                </script>


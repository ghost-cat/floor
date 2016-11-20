<script src="/assets/frontend/js/jquery.min.js"></script>
<script src="/assets/frontend/js/modernizr.custom.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="/assets/frontend/js/bootstrap.js"></script>
<script src="/assets/frontend/js/responsiveslides.min.js"></script>
<script src="/assets/frontend/js/jquery.flexslider.min.js"></script>
<script>
    $(function () {
    // Slideshow 4
    $("#slider4").responsiveSlides({
    auto: true,
    pager: true,
    nav: true,
    speed: 500,
    namespace: "callbacks",
    before: function () {
    $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
        $('.events').append("<li>after event fired.</li>");
        }
        });
        });
</script>
<!-- responsiveslides -->
 <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
        });
    });
</script>
@yield('more_js')

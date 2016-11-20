@extends('frontend.layout.main')

@section('more_css')
@stop

@section('page_content')
<div class="screen-shots">
    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="/assets/frontend/images/20160122122516.jpg" />
            </li>
            <li>
                <img src="/assets/frontend/images/20160122123001.jpg" />
            </li>
            <li>
                <img src="/assets/frontend/images/20160122123107.jpg" />
            </li>
        </ul>
    </div>
</div>

<script src="/assets/frontend/js/owl.carousel.js"></script>
<script>
$(document).ready(function() {
  $("#owl-demo").owlCarousel({
    items :4,
    lazyLoad : true,
    autoPlay : true,
    navigation : false,
    navigationText :  false,
    pagination : true,
  });
});
</script>
<div class="welcome text-center">
    <div class="container">
        <h2>Welcome</h2>
        <p>
            浙江艾维利木业坐落于有“实木之都“之称的南浔，集地板研发、生产、品牌行销领于一体。公司拥有德国顶尖的高效数字智能化生产设备，
            拥有全球A级的进口原木，主要生产加工实木地板、实木多层地板、强化地板，多年来致力于为全球消费者提供品质卓越、时尚领先的地板产品
        </p>
    </div>
</div>
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
<!--latest designs-->
<div id="cate" class="categories">
     <div class="container">
        <div class="cat-head">
            <h3>新品推荐</h3>
        </div>
         <div class="categorie-grids cs-style-1">
                 <div class="col-md-4 cate-grid grid">
                    <figure>
                        <img src="/assets/frontend/images/c1.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>
                 <div class="col-md-4 cate-grid grid">
                     <figure>
                        <img src="/assets/frontend/images/c2.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>


                 <div class="col-md-4 cate-grid grid">
                     <figure>
                        <img src="/assets/frontend/images/c3.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>

                 <div class="col-md-4 cate-grid grid">
                    <figure>
                        <img src="/assets/frontend/images/c4.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>

                 <div class="col-md-4 cate-grid grid">
                    <figure>
                        <img src="/assets/frontend/images/c5.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>

                 <div class="col-md-4 cate-grid grid">
                     <figure>
                        <img src="/assets/frontend/images/c6.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>

             <div class="clearfix"></div>
         </div>
     </div>
</div>

<!-- news -->
<div class="news" id="blog">
    <div class="container">
        <div class="news-head text-center">
            <h3>资讯</h3>
            <p>Cras porttitor imperdiet volutpat nulla malesuada lectus eros ut convallis felis consectetur ut</p>
        </div>
        <div class="news-grids">
            @foreach($news as $item)
            <div class="col-md-4 news-grid">
                <a href="single.html">{{ $item->title }}</a>
                <span>{{ date('Y/m/d', strtotime($item->created_at)) }}</span>
                <a class="mask" href="#"><img src="{{ $item->image }}" class="img-responsive zoom-img" /></a>
                <div class="news-info">
                    <p>{{ $item->overview }}</p>
                </div>
            </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

@stop

@section('more_js')
<script type="text/javascript" charset="utf-8">
$(window).load(function() {
    $('.flexslider').flexslider({
        'animation': 'slide',
        'pauseOnAction': false,
        'slideshowSpeed': 5000, 
    });
});
</script>
@stop



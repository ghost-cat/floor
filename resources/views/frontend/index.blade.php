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
<div class="welcome">
    <div class="container">
        <h2 class="text-center">关于永晨</h2>
        <p style="text-indent: 2em">
            永晨地板是浙江浔梦家居有限公司旗下一品牌 坐落于有“实木地板之都“之称的湖州南浔，集地板研发、生产、品牌行销领于一体。
            公司拥有德国顶尖的高效数字智能化生产设备，拥有全球A级的进口原木，主要生产加工实木地板、实木多层地板、强化地板，
            多年来致力于为全球消费者提供品质卓越、时尚领先的地板产品。永晨地板已经逐步实现设计、生产、行销的国际化运作。
            企业先后通过“ISO09001国际质量管理体系认证”、“ISO014001国际环境管理体系认证”，
            永晨地板销售网络及贸易已覆盖全国30多个省市及北美、欧洲等50多个国家和地区，是具有全球竞争力的优势企业之一，是具有全球竞争力的优势企业之一。
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
                        <img src="/assets/frontend/images/index1.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>
                 <div class="col-md-4 cate-grid grid">
                     <figure>
                        <img src="/assets/frontend/images/index6.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>


                 <div class="col-md-4 cate-grid grid">
                     <figure>
                        <img src="/assets/frontend/images/index3.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>

                 <div class="col-md-4 cate-grid grid">
                    <figure>
                        <img src="/assets/frontend/images/index4.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>

                 <div class="col-md-4 cate-grid grid">
                    <figure>
                        <img src="/assets/frontend/images/index5.jpg" alt="">
                        <figcaption>
                        <h3>standard chunk</h3>
                            <span>Accusantium Dolor</span>
                        </figcaption>
                    </figure>
                 </div>

                 <div class="col-md-4 cate-grid grid">
                     <figure>
                        <img src="/assets/frontend/images/index2.jpg" alt="">
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
            <p>实时发布企业最新动态及行业新闻资讯</p>
        </div>
        <div class="news-grids">
            @foreach($news as $item)
            <div class="col-md-4 news-grid">
                <a href="/news/{{ $item->id }}">{{ $item->title }}</a>
                <span>{{ date('Y/m/d', strtotime($item->created_at)) }}</span>
                <a class="mask" href="/news/{{ $item->id }}"><img src="{{ $item->image }}" class="img-responsive zoom-img" style="max-height: 220px;" /></a>
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



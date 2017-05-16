@extends('frontend.layout.main')

@section('more_css')
<link href="/assets/frontend/css/products.css" rel='stylesheet' type='text/css' />
@stop

@section('page_content')
<div class="row">
    <img src="/assets/frontend/images//ban-products.jpg" style="width: 100%" class="img-responsive" alt="Responsive image">
    <div class="row" style="margin-top: 20px;margin-bottom: 50px;">
        <div class="col-md-2 col-md-offset-1 main_left">
            <div class="title"> 产品中心 </div>
            <ul>
                <li>
                    <ul>
                        <li><a href="/products?parent_cate=recommend">推荐产品</a></li>
                        @foreach($cate['recommend'] as $item)
                            <li><a href="/products?cate_id={{ $item->id }}" id="childnav">>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <hr>
                <li>
                    <ul>
                        <li><a href="/products?parent_cate=solid_wood">实木地板</a></li>
                        @foreach($cate['solid_wood'] as $item)
                            <li><a href="/products?cate_id={{ $item->id }}" id="childnav">>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <hr>
                <li>
                    <ul>
                        <li><a href="/products?parent_cate=layers">多层地板</a></li>
                        @foreach($cate['layers'] as $item)
                            <li><a href="/products?cate_id={{ $item->id }}" id="childnav">>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <hr>
                <li>
                    <ul>
                        <li><a href="/products?parent_cate=heat">地热地板</a></li>
                        @foreach($cate['heat'] as $item)
                            <li><a href="/products?cate_id={{ $item->id }}" id="childnav">>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <hr>
                <li>
                    <ul>
                        <li><a href="/products?parent_cate=pattern">拼花地板</a></li>
                        @foreach($cate['pattern'] as $item)
                            <li><a href="/products?cate_id={{ $item->id }}" id="childnav">>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-md-6 main_right1">
            <ul>
                @foreach($products as $product)
                <li>
                    <a href="{{ $product->image }}">
                        <img src="{{ $product->image }}" width="220" height="140">
                        <span>{{ $product->title }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@stop

@section('more_js')
@stop



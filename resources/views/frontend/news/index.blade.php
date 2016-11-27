@extends('frontend.layout.main')

@section('more_css')
@stop

@section('page_content')
<img src="/assets/frontend/images//ban-news.jpg" class="img-responsive" alt="Responsive image">
<div style="width: 980px;margin: 50px auto;">
    @foreach($news as $item)
    <div class="row" style="">
        <div class="col-md-4 blog-img blog-tag-data">
            <img src="{{ $item->image }}" alt="" class="img-responsive" style="width: 100%;max-height: 210px;">
            <ul class="list-inline">
                <li>
                    <i class="fa fa-calendar"></i>
                    <a href="javascript:;">
                    {{ $item->created_at }}</a>
                </li>
            </ul>
        </div>
        <div class="col-md-8 blog-article">
            <h3>
                <a href="/news/{{ $item->id }}">{{ $item->title }}</a>
            </h3>
            <p>{{ $item->overview }}</p>
            <a class="btn blue" href="/news/{{ $item->id }}">
            更多...... <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    @endforeach
</div>
@stop

@section('more_js')
@stop



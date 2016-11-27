@extends('frontend.layout.main')

@section('more_css')
@stop

@section('page_content')
<img src="/assets/frontend/images//ban-news.jpg" class="img-responsive" alt="Responsive image">
<div style="width: 980px;margin: 100px auto;">
    <h3 align="center">{{ $news->title }}</h3>
    <p align="right">{{ date('Y/m/d', strtotime($news->created_at)) }}</p>
    <hr>
    {!! $news->content !!}
</div>
@stop

@section('more_js')
@stop



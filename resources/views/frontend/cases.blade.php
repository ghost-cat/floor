@extends('frontend.layout.main')

@section('more_css')
@stop

@section('page_content')
<img src="/assets/frontend/images/ban-cases.jpg" class="img-responsive" alt="Responsive image">
<div id="cate" class="categories">
     <div class="container">
        <div class="categorie-grids cs-style-1">
            @foreach($cases as $case)
            <div class="col-md-4 cate-grid grid">
                <figure>
                    <img src="{{ $case->image }}" alt="" style="width: 346px;height: 288px;">
                    <figcaption>
                    <h3>{{ $case->title }}</h3>
                        <span>{{ date('Y/m/d', strtotime($case->created_at)) }}</span>
                    </figcaption>
                </figure>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
     </div>
</div>
@stop

@section('more_js')
@stop



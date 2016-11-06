@extends('admin.layout.main')

@section('more_css')
@stop

@section('page_title')
    新闻资讯
@stop

@section('breadcrumb')
    <li>
        <a href="#">新闻资讯</a>
    </li>
@stop

@section('page_content')
<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header with-border">
                <a href="/admin/news/create">
                    <button class="btn btn-info btn-sm" style="float:right;margin-right: 20px">新建资讯</button>
                </a>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                    <th style="width: 10%">ID</th>
                    <th style="width: 20%">标题</th>
                    <th style="width: 20%">图片</th>
                    <th style="width: 10%">状态</th>
                    <th style="width: 10%">访问量</th>
                    <th style="width: 20%">创建时间</th>
                    <th style="width: 10%">操作</th>
                </tr>
                @foreach($news as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td><a href="{{ $item->image }}" data-lightbox="Image-{{ $item->id }}"><img style="max-width:100px;max-height:100px;" src="{{ $item->image }}" /></a></td>
                    <td>
                        @if($item->status == 'publish')
                        <span class="label label-success">已发布</span>
                        @else
                        <span class="label label-danger">已下架</span>
                        @endif
                    </td>
                    <td>{{ $item->click_count }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="/admin/news/{{ $item->id }}/edit"><button class="btn btn-primary btn-xs">编辑</button></a>
                        <a class="jq-delete" data-id="{{ $item->id }}"><button class="btn btn-danger btn-xs">删除</button></a>
                    </td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <div class="box-footer clearfix">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</section>
@stop

@section('more_js')
<script type="text/javascript">
$(function(){
    $(document).on("click", ".jq-delete", function(){
        $.ajax({
            type: "DELETE",
            url: '/admin/news/'+$(this).data('id'),
            dataType: "json",
            success: function (data) {
                if (data.status == 1) {
                    toastr.success(data.message);
                    window.location.href = '/admin/news';
                } else {
                    toastr.error(data.message);
                }
            },
            error: function() {
                toastr.error('请求服务器失败！');
            }
        });
    });

    // 图片显示js
    lightbox.option({
      'resizeDuration': 100,
      'fadeDuration': 100,
      'wrapAround': true,
      'albumLabel': "%1/%2"
    })
});

</script>
@stop



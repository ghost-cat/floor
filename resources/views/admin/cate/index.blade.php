@extends('admin.layout.main')

@section('more_css')
@stop

@section('page_title')
    分类管理
@stop

@section('breadcrumb')
    <li>
        <a href="#">分类列表</a>
    </li>
@stop

@section('page_content')
<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header with-border">
                <a href="/admin/cate/create">
                    <button class="btn btn-info btn-sm" style="float:right;margin-right: 20px">新建分类</button>
                </a>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                    <th style="width: 20%">ID</th>
                    <th style="width: 20%">标题</th>
                    <th style="width: 20%">一级分类</th>
                    <th style="width: 20%">创建时间</th>
                    <th style="width: 20%">操作</th>
                </tr>
                @foreach($cate as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        {{ [
                            'recommend' => '推荐产品',
                            'solid_wood' => '实木地板',
                            'layers' => '多层地板',
                            'heat' => '地热地板',
                            'pattern' => '拼花地板',
                        ][$item->parent_cate] }}
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="/admin/cate/{{ $item->id }}/edit"><button class="btn btn-primary btn-xs">编辑</button></a>
                        <a class="jq-delete" data-id="{{ $item->id }}"><button class="btn btn-danger btn-xs">删除</button></a>
                    </td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <div class="box-footer clearfix">
                {{ $cate->links() }}
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
            url: '/admin/cate/'+$(this).data('id'),
            dataType: "json",
            success: function (data) {
                if (data.status == 1) {
                    toastr.success(data.message);
                    window.location.href = '/admin/cate';
                } else {
                    toastr.error(data.message);
                }
            },
            error: function() {
                toastr.error('请求服务器失败！');
            }
        });
    });
});

</script>
@stop




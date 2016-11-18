@extends('admin.layout.main')

@section('more_css')
@stop

@section('page_title')
    分类管理
@stop

@section('breadcrumb')
    <li>
        <a href="#">修改分类</a>
    </li>
@stop

@section('page_content')
<section class="content row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">修改分类</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $cate->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">一级分类</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="parent_cate" name="parent_cate">
                                <option value="">--请选择--</option>
                                <option value="recommend" {{ $cate->parent_cate == 'recommend' ? "selected='selected'" : '' }}>推荐产品</option>
                                <option value="solid_wood" {{ $cate->parent_cate == 'solid_wood' ? "selected='selected'" : '' }}>实木地板</option>
                                <option value="layers" {{ $cate->parent_cate == 'layers' ? "selected='selected'" : '' }}>多层地板</option>
                                <option value="heat" {{ $cate->parent_cate == 'heat' ? "selected='selected'" : '' }}>地热地板</option>
                                <option value="pattern" {{ $cate->parent_cate == 'pattern' ? "selected='selected'" : '' }}>拼花地板</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">添加产品</label>
                        <div class="col-sm-5 input-group" style="padding-left: 15px;float: left;">
                            <input type="text" class="form-control input-product" placeholder="输入产品id">
                            <span class="input-group-btn jq-add">
                                <button class="btn btn-info btn-flat" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                            </span>
                        </div>
                        <div class="col-sm-2 control-label product-tips green" style="color: green"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2">
                            <ul class="products-list product-list-in-box col-sm-5">
                            @foreach($cate->products as $product)
                            <li class="item append-list">
                                <div class="product-img">
                                    <img src="{{ $product->image }}" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript::;" class="product-title">{{ $product->title }}</a>
                                    <span class="product-description">{{ $product->size }}</span>
                                    <a class="label label-warning pull-right jq-delete">删除</a>
                                    <input type="hidden" class="product_id" name="product_id[]" value="{{ $product->id }}" />
                                </div>
                            </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="btn btn-info pull-right jq-save" data-id="{{ $cate->id }}">提交</div>
                    <a href="/admin/cate"><div class="btn btn-info pull-right" style="margin-right: 20px">返回</div></a>
                </div>
            </form>
        </div>
    </div>
</section>
@stop

@section('more_js')
<script type="text/javascript">
$(function(){
    // 根据产品id，显示产品信息
    $('.input-product').keyup(function(){
        var productId = $(this).val();

        if (parseInt(productId) == productId) {
            $.ajax({
                type: "GET",
                url: '/admin/products/'+productId,
                dataType: "json",
                success: function (data) {
                    if (data.status == 1) {
                        $('.product-tips').text(data.data.title);
                    } else {
                        $('.product-tips').text('');
                    }
                }
            });
        } else {
            $('.product-tips').text('');
        }
    });

    // 添加产品
    $('.jq-add').click(function(){
        var productId = $(this).siblings('input').val();

        if (parseInt(productId) != productId) {
            toastr.error('请填写整数');
        } else {
            $.ajax({
                type: "GET",
                url: '/admin/products/'+productId,
                dataType: "json",
                success: function (data) {
                    if (data.status == 1) {
                        var appendLi = 
                            '<li class="item append-list">\
                                <div class="product-img">\
                                    <img src="'+data.data.image+'" alt="Product Image">\
                                </div>\
                                <div class="product-info">\
                                    <a href="javascript::;" class="product-title">'+data.data.title+'</a>\
                                    <span class="product-description">'+data.data.size+'</span>\
                                    <a class="label label-warning pull-right jq-delete">删除</a>\
                                    <input type="hidden" class="product_id" name="product_id[]" value="'+data.data.id+'" />\
                                </div>\
                            </li>';
                        $('.products-list').prepend(appendLi);
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function() {
                    toastr.error('请求服务器失败！');
                }
            });
        }
    });

    // 删除产品
    $(document).on("click", ".jq-delete", function(){
        $(this).parents('.append-list').remove();
    });

    // 保存
    $(document).on("click", ".jq-save", function(){
        var product_ids = [];
        $('.product_id').each(function(i){
            product_ids[i] = $(this).val();
        });
        var postData = {
            title: $('#title').val(),
            parent_cate: $('#parent_cate').val(),
            product_ids: product_ids,
        };
        var id = $(this).data('id');
        $.ajax({
            type: "PUT",
            url: '/admin/cate/'+id,
            data: postData,
            dataType: "json",
            success: function (data) {
                if (data.status == 1) {
                    toastr.success(data.message);
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



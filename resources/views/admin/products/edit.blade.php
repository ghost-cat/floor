@extends('admin.layout.main')

@section('more_css')
@stop

@section('page_title')
    产品库
@stop

@section('breadcrumb')
    <li>
        <a href="#">修改产品</a>
    </li>
@stop

@section('page_content')
<section class="content row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">修改产品</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">编号</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code" name="code" value="{{ $product->code }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">规格</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="size" name="size" value="{{ $product->size }}">
                        </div>
                    </div>
                    <div class="form-group upload-img">
                        <label class="col-md-2 control-label"> 资讯封面图 </label>
                        <div class="col-md-10">
                            <div class="fileinput fileinput-new">
                                <div class="fileinput-preview thumbnail fileinput-image-upload" style="width: 240px; height: 120px; line-height: 150px;">
                                    <img src="{{ $product->image }}" style="max-width:220px;max-height:100px;margin:5px" />
                                    <input id="image" type="hidden" name="image" value="" />
                                </div>
                                <div>
                                    <span class="btn default btn-file">
                                    <button class="btn btn-block btn-default" id="image-upload">选择图片</button>
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix">
                                <span class="label label-danger">NOTE! </span>大小不能超过1M
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="btn btn-info pull-right jq-save" data-id="{{ $product->id }}">提交</div>
                    <a href="/admin/products"><div class="btn btn-info pull-right" style="margin-right: 20px">返回</div></a>
                </div>
            </form>
        </div>
    </div>
</section>
@stop

@section('more_js')
<script type="text/javascript">
$(function(){

    $(document).on("click", ".jq-save", function(){
        var id = $(this).data('id');
        var postData = {
            title: $('#title').val(),
            code: $('#code').val(),
            size: $('#size').val(),
            image: $('#image').val()
        };
        $.ajax({
            type: "PUT",
            url: '/admin/products/'+id,
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

    // 图片上传
    function uploader(url, buttonId, fn) {
        var picUpload = new plupload.Uploader({
            headers : { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            runtimes : 'html5',
            browse_button : buttonId,
            url : url,
            filters : {
                max_file_size : '1024kb',
                mime_types : [
                    {
                        title : "Image files",
                        extensions : "jpg,png,jpeg"
                    }
                ]
            }
        });

        picUpload.init(); //初始化

        picUpload.bind('FilesAdded',function(uploader, files){
            picUpload.start();
        });

        picUpload.bind('FileUploaded',function(uploader, files, object){
            fn(object.response);
        });
    };

    // 处理上传返回
    var imageUploadCallback = function(data) {
        data = jQuery.parseJSON(data);
        $(".upload-img .fileinput-image-upload img").remove();
        $(".upload-img .fileinput-image-upload").append('<img src="'+data.path+'" style="max-width:220px;max-height:100px;margin:5px" />');
        $(".upload-img .fileinput-image-upload input[name='image']").val(data.path);
    };

    uploader("/admin/products/imgUpload", 'image-upload', imageUploadCallback);
});

</script>
@stop



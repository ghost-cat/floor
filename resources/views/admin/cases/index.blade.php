@extends('admin.layout.main')

@section('more_css')
@stop

@section('page_title')
    案例展示
@stop

@section('breadcrumb')
    <li>
        <a href="#">案例展示</a>
    </li>
@stop

@section('page_content')
<section class="content">
    <div class="row">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-info btn-sm jq-create" style="float:right;margin-right: 20px">新建案例</button>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                    <th style="width: 10%">ID</th>
                    <th style="width: 20%">标题</th>
                    <th style="width: 20%">图片</th>
                    <th style="width: 20%">创建时间</th>
                    <th style="width: 10%">操作</th>
                </tr>
                @foreach($cases as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td><a href="{{ $item->image }}" data-lightbox="Image-{{ $item->id }}"><img style="max-width:100px;max-height:100px;" src="{{ $item->image }}" /></a></td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a class="jq-delete" data-id="{{ $item->id }}"><button class="btn btn-danger btn-xs">删除</button></a>
                    </td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <div class="box-footer clearfix">
                {{ $cases->links() }}
            </div>
        </div>
    </div>
</section>

<!-- 新增弹窗 -->
<div class="modal fade" id="create-modal" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">添加</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form id="create-form" class="form-horizontal" action="/authentication/index/store">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName" name="title" >
                                </div>
                            </div>
                            <div class="form-group upload-img">
                                <label class="col-md-2 control-label"> 图片 </label>
                                <div class="col-md-10">
                                    <div class="fileinput fileinput-new">
                                        <div class="fileinput-preview thumbnail fileinput-image-upload" style="width: 240px; height: 120px; line-height: 150px;">
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
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="jq-create" data-uid="" >确认保存</button>
            </div>
        </div>
    </div>
</div>
<!-- 新增弹窗 -->
@stop

@section('more_js')
<script type="text/javascript">
$(function(){

    // 新增弹窗
    $('.jq-create').click(function(){
        clearCreateModal()
        $("#create-modal").modal('show');
    });

    function clearCreateModal(){

    }

    // 新增保存
    $(document).on("click", "#jq-create", function(){
         var formData = $('#create-form').serialize();
        $.ajax({
            type: "POST",
            url: '/admin/cases',
            data: formData,
            dataType: "json",
            success: function (data) {
                if (data.status == 1) {
                    $("#create-modal").modal('hide');
                    toastr.success(data.message);
                    window.location.href = '/admin/cases';
                } else {
                    toastr.error(data.message);
                }
            },
            error: function() {
                toastr.error('请求服务器失败！');
            }
        });
    });

    // 删除
    $(document).on("click", ".jq-delete", function(){
        $.ajax({
            type: "DELETE",
            url: '/admin/cases/'+$(this).data('id'),
            dataType: "json",
            success: function (data) {
                if (data.status == 1) {
                    toastr.success(data.message);
                    window.location.href = '/admin/cases';
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

    uploader("/admin/cases/imgUpload", 'image-upload', imageUploadCallback);
});

</script>
@stop



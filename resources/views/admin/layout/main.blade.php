<!DOCTYPE html>
<html lang="en">
    @include('admin.layout.head')
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('admin.layout.header')
            @include('admin.layout.sidebar')
            @include('admin.layout.content')
            @include('admin.layout.footer')
        </div>
        @include('admin.layout.js')
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
    @include('frontend.layout.head')
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('frontend.layout.header')
            @yield('page_content')
            @include('frontend.layout.footer')
        </div>
        @include('frontend.layout.js')
    </body>
</html>
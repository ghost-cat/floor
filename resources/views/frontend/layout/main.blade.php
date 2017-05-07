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
    <script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
    </script>
</html>
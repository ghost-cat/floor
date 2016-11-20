<div class="header" id="header">
    <div class="header-top">
        <div class="container">
            <p class="location"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>您好！欢迎访问艾维利地板官方网站！</p>
            <p class="phonenum"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+ 655 8858 2068 54892</p>
        </div>
    </div>
    <div class="header-bottom">
        <div class="logo text-center">
            <h1><a href="index.html">艾维利地板</a></h1>
        </div>
        <!-- navigation -->
        <div class="navigation">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li {{ Route::currentRouteName() == 'index' ? 'class=active' : '' }}><a href="/">首页 <span class="sr-only">(current)</span></a></li>
                            <li {{ Route::currentRouteName() == 'products' ? 'class=active' : '' }}><a href="/products">产品中心</a></li>
                            <li><a href="#">新闻资讯</a></li>
                            <li><a href="#">案例展示</a></li>
                            <li><a href="#">联系我们</a></li>
                          </ul>
                      <div class="clearfix"></div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- //navigation -->
        <div class="clearfix"></div>
    </div>
</div>
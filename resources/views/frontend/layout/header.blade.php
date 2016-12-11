<div class="header" id="header">
    <div class="header-top">
        <div class="container">
            <p class="location"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>您好！欢迎访问永晨地板官方网站！</p>
            <p class="phonenum"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>0572-3092627</p>
        </div>
    </div>
    <div class="header-bottom">
        <div class="logo text-center">
            <h1><a href="/">永晨地板</a></h1>
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
                            <li {{ in_array(Route::currentRouteName(), ['news', 'news.show']) ? 'class=active' : '' }}><a href="/news">新闻资讯</a></li>
                            <li {{ Route::currentRouteName() == 'cases' ? 'class=active' : '' }}><a href="/cases">案例展示</a></li>
                            <li {{ Route::currentRouteName() == 'about' ? 'class=active' : '' }}><a href="/about">关于永晨</a></li>
                            <li {{ Route::currentRouteName() == 'contact' ? 'class=active' : '' }}><a href="/contact">联系我们</a></li>
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
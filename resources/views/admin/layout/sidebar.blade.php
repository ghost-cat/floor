<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">内容管理</li>
            <li class="{{ starts_with(Route::currentRouteName(), 'admin.news') ? 'active' : '' }}"><a href="/admin/news"><i class="glyphicon glyphicon-list"></i> <span>资讯管理</span></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-list"></i> <span>产品中心</span></a></li>
            <li class="{{ starts_with(Route::currentRouteName(), 'admin.cases') ? 'active' : '' }}"><a href="/admin/cases"><i class="glyphicon glyphicon-list"></i> <span>案例展示</span></a></li>
        </ul>
    </section>
</aside>
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">内容管理</li>
            <li class="{{ starts_with(Route::currentRouteName(), 'admin.news') ? 'active' : '' }}"><a href="/admin/news"><i class="glyphicon glyphicon-list"></i> <span>资讯管理</span></a></li>
            <li class="{{ starts_with(Route::currentRouteName(), 'admin.cases') ? 'active' : '' }}"><a href="/admin/cases"><i class="glyphicon glyphicon-list"></i> <span>案例展示</span></a></li>
            @if(starts_with(Route::currentRouteName(), 'admin.products')
                || starts_with(Route::currentRouteName(), 'admin.cate')
            )
            <li class="treeview active">
                <a href="#"><i class="glyphicon glyphicon-list"></i> <span>产品中心</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu menu-open" style="display: block;">
                    <li><a href="/admin/products">产品库</a></li>
                    <li><a href="#">分类管理</a></li>
                </ul>
            </li>
            @else
            <li class="treeview">
                <a href="#"><i class="glyphicon glyphicon-list"></i> <span>产品中心</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="/admin/products">产品库</a></li>
                    <li><a href="#">分类管理</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </section>
</aside>
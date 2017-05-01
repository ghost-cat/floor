<header class="main-header">

    <a href="/admin/index" class="logo">
        <span class="logo-lg"><b>永晨地板管理后台</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                        hi : {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/logout"><i class="fa fa-btn fa-sign-out"></i>退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
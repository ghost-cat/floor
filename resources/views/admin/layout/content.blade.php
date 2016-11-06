<div class="content-wrapper">
    <section class="content-header">
        <h1>
            @section('page_title')
            后台管理
            <small> 欢迎你，管理员 </small>
            @show
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            @section('breadcrumb')
            <li class="active">Dashboard</li>
            @show
        </ol>

    </section>
    @yield('page_content')
</div>
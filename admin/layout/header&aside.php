<!--header-->
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="home">Quản Trị</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
    <li class="app-search">
        <input class="app-search__input" type="search" placeholder="Tìm Kiếm">
        <button class="app-search__button"><i class="fa fa-search"></i></button>
    </li>
    <!--Notification Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
        <ul class="app-notification dropdown-menu dropdown-menu-right">
        <li class="app-notification__title">You have 4 new notifications.</li>
        <div class="app-notification__content">
            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                <div>
                <p class="app-notification__message">Lisa sent you a mail</p>
                <p class="app-notification__meta">2 min ago</p>
                </div></a></li>
            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                <div>
                <p class="app-notification__message">Mail server not working</p>
                <p class="app-notification__meta">5 min ago</p>
                </div></a></li>
            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                <div>
                <p class="app-notification__message">Transaction complete</p>
                <p class="app-notification__meta">2 days ago</p>
                </div></a></li>
            <div class="app-notification__content">
            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                </div></a></li>
            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                </div></a></li>
            <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                </div></a></li>
            </div>
        </div>
        <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
        </ul>
    </li>
    <!-- User Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> Hồ sơ</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-lock fa-lg"></i> Màn hình khóa</a></li>
        <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</a></li>
        </ul>
    </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
    <div>
        <p class="app-sidebar__user-name"><?php echo $_SESSION['EMAIL']?></p>
        <p class="app-sidebar__user-designation">Admin</p>
    </div>
    </div>
    <ul class="app-menu">
    <li><a class="app-menu__item" href="home"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Trang Chủ</span></a></li>
    <li><a class="app-menu__item" href="category"><i class="app-menu__icon fa fa-th"></i><span class="app-menu__label"> Danh Mục</span></a></li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shopping-basket"></i><span class="app-menu__label">Sản Phẩm</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="add_product"><i class="icon fa fa-circle-o"></i> Thêm mới</a></li>
            <li><a class="treeview-item" href="product"><i class="icon fa fa-circle-o"></i> Danh sách</a></li>
          </ul>
        </li>
    <li><a class="app-menu__item" href="order"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label"> Đơn Hàng</span></a></li>
    <li><a class="app-menu__item" href="settings"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label"> Cài Đặt</span></a></li>


    <li><a class="app-menu__item" href="https://fontawesome.com/v4.7.0/icons/"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label"> Font Icons</span></a></li>
    </ul>
</aside>
<!--//header-->
<!-- header-sidebar.php -->

<header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <!-- User Menu-->
        <li><a class="app-nav__item" href="../index.php"><i class='bx bx-log-out bx-rotate-180'></i> </a></li>
    </ul>
</header>

<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../images/MemeCat.jpg" width="50px" height="50px" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><b>Admin</b></p>
            <p class="app-sidebar__user-designation">Welcome !</p>
        </div>
    </div>
    <hr>
    <ul class="app-menu">
        <li><a class="app-menu__item haha" href="phan-mem-ban-hang.php"><i class='app-menu__icon bx bx-cart-alt'></i>
                <span class="app-menu__label">POS Bán Hàng</span></a></li>
        <!-- Add other menu items as needed -->
        <li><a class="app-menu__item active" href="index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
                    class="app-menu__label">Bảng điều khiển</span></a></li>
        <li><a class="app-menu__item " href="table-data-table.php"><i class='app-menu__icon bx bx-id-card'></i> <span
                    class="app-menu__label">Quản lý nhân viên</span></a></li>
        <li><a class="app-menu__item" href="User/index.php"><i class='app-menu__icon bx bx-user-voice'></i><span
                    class="app-menu__label">Quản lý khách hàng</span></a></li>
        <li><a class="app-menu__item" href="table-data-product.php"><i
                    class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
        </li>
        <li><a class="app-menu__item" href="table-data-order.php"><i class='app-menu__icon bx bx-task'></i><span
                    class="app-menu__label">Quản lý đơn hàng</span></a></li>
        <li><a class="app-menu__item" href="table-data-banned.php"><i class='app-menu__icon bx bx-run'></i><span
                    class="app-menu__label">Quản lý nội bộ
          </span></a></li>
        <li><a class="app-menu__item" href="table-data-money.php"><i class='app-menu__icon bx bx-dollar'></i><span
                    class="app-menu__label">Bảng kê lương</span></a></li>
        <li><a class="app-menu__item" href="quan-ly-bao-cao.php"><i
                    class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
        </li>
        <li><a class="app-menu__item" href="page-calendar.php"><i class='app-menu__icon bx bx-calendar-check'></i><span
                    class="app-menu__label">Lịch công tác </span></a></li>
        <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span class="app-menu__label">Cài
            đặt hệ thống</span></a></li>
    </ul>
</aside>
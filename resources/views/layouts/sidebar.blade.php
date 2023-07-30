<?php 

use Illuminate\Support\Facades\Request;

$urlPath = Request::segment(1);

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">GS Bond Cleaning</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashobard') }}" class="nav-link <?php if($urlPath == 'dashboard') { echo "active"; } ?>"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('usersList') }}" class="nav-link <?php if($urlPath == 'users') { echo "active"; } ?>"><i class="nav-icon fas fa-user"></i><p>Manage Users</p></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('orderList') }}" class="nav-link <?php if($urlPath == 'orders') { echo "active"; } ?>"><i class="nav-icon fas fa-broom"></i><p>Manage Orders</p></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('serviceList') }}" class="nav-link <?php if($urlPath == 'services') { echo "active"; } ?>"><i class="nav-icon fas fa-tools"></i><p>Manage Services</p></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p></a>
                </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
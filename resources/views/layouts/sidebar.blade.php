<?php 

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

$urlPath = Request::segment(1);

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">GS Bond Cleaning</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if(Auth::user()->is_admin == 1) { ?>
                    <li class="nav-item">
                        <a href="{{ route('dashobard') }}" class="nav-link <?php if($urlPath == 'dashboard') { echo "active"; } ?>"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('usersList') }}" class="nav-link <?php if($urlPath == 'users') { echo "active"; } ?>"><i class="nav-icon fas fa-user"></i><p>Manage Users</p></a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="{{ route('orderList') }}" class="nav-link <?php if($urlPath == 'orders' || $urlPath == 'editOrder') { echo "active"; } ?>"><i class="nav-icon fas fa-broom"></i><p>Manage Orders</p></a>
                </li> 
                <?php if(Auth::user()->is_admin == 1) { ?>
                    <li class="nav-item">
                        <a href="{{ route('emailDetail') }}" class="nav-link"><i class="nav-icon fas fa-envelope"></i><p>Mail History</p></a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p></a>
                </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
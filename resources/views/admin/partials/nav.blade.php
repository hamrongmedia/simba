<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Hrm</b>ECOMMMERCE</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="user-menu">
          <a href="{{route('home')}}"><i class="fa fa-globe"></i>  View Website</a>
        </li>

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="overflow:hidden">
            <img src="{{ asset('template/AdminLTE/dist/img/user4-128x128.jpg')}}" class="user-image" alt="User Image">
          </a>
          <ul class="dropdown-menu" style="width: auto; top:50px;">
            <li class="user-footer " style="padding:0">
                 <a href="{{route('admin.logout')}}" style="padding: 10px" class="btn btn-default btn-flat"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
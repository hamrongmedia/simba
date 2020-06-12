<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('images/AdminLTELogo.png') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>HRM Ecommerce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">ADMIN SHOP</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cart-arrow-down"></i> <span>Quản lý đơn hàng</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
          <ul class="treeview-menu">
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/order" class="nav-link">
                <i class="fa fa-circle-o"></i>
                <span>Quản lý đơn hàng</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/order_status" class="nav-link">
                <i class="fa fa-circle-o"></i>
                <span>Trạng thái đơn hàng</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/payment_status" class="nav-link">
                <i class="fa fa-circle-o"></i> <span>Trạng thái thanh toán</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/shipping_status" class="nav-link">
                <i class="fa fa-circle-o"></i> <span>Trạng thái vận chuyển</span></a>
            </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="nav-icon fa fa-folder-open"></i> <span>Sản phẩm & Danh mục</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
          <ul class="treeview-menu">
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/order" class="nav-link">
                <i class="fa fa-circle-o"></i>
                <span>Quản lý sản phẩm</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/order_status" class="nav-link">
                <i class="fa fa-circle-o"></i>
                <span>Quản lý danh mục</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/payment_status" class="nav-link">
                <i class="fa fa-circle-o"></i> <span>Nhóm thuộc tính</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/shipping_status" class="nav-link">
                <i class="fa fa-circle-o"></i> <span>Quản lý phí vận chuyển</span></a>
            </li>
          </ul>
      </li>
      <li class="header">ADMIN CONTENT</li>
      <li class="treeview">
        <a href="">
          <i class="fa fa-edit"></i> <span>Blog/Tin tức</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
          <ul class="treeview-menu">
            <li class="nav-item has-treeview">
              <a href="{{route('admin.posts.create')}}" class="nav-link">
                <i class="fa fa-circle-o"></i>
                <span>Tạo mới tin</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="{{route('admin.posts.index')}}" class="nav-link">
                <i class="fa fa-circle-o"></i>
                <span>Danh sách tin</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/payment_status" class="nav-link">
                <i class="fa fa-circle-o"></i> <span>Danh mục</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/shipping_status" class="nav-link">
                <i class="fa fa-circle-o"></i> <span>Tags</span></a>
            </li>
          </ul>
      </li>
      <li>
        <a href="pages/mailbox/mailbox.html">
          <i class="fa fa-clone"></i> <span>Trang</span>
        </a>
      </li>
      <li>
        <a href="pages/mailbox/mailbox.html">
          <i class="fa fa-image"></i> <span>Thư viện ảnh</span>
        </a>
      </li>
      <li class="header">ADMIN SYSTEM</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i> <span>Quản lý cấu hình</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
          <ul class="treeview-menu">
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/order" class="nav-link">
                <i class="fa fa-circle-o"></i>
                <span>Thông tin cửa hàng</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/order_status" class="nav-link">
                <i class="fa fa-circle-o"></i>
                <span>Cấu hình url</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/payment_status" class="nav-link">
                <i class="fa fa-circle-o"></i> <span>Cấu hình website</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="http://localhost/s-cart/public/sc_admin/shipping_status" class="nav-link">
                <i class="fa fa-circle-o"></i> <span>Cấu hình Email</span></a>
            </li>
          </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<!DOCTYPE html>
<html>
@include('admin.partials.header')
@yield('css')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin.partials.nav')
    @include('admin.partials.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang chủ </a></li>
        <li class="active">@yield('title')</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
         @yield('main')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.partials.footer')
</div>
<!-- ./wrapper -->
@include('admin.partials.scripts')
@include('admin.partials.alert')
@yield('js')
</body>
</html>

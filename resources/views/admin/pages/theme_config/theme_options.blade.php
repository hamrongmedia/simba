@extends('admin.layout')
@section('title')
  {{ $page_name ?? 'Cài đặt website' }}
@endsection

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main')
    <form id="form" class="form-horizontal" role="form" action="{{$_route}}"
          enctype="multipart/form-data" method="POST">
          @csrf
    <div class="theme-options-setting  box box-primary clearfix">
      <div class="clearfix box-header with-border text-right">
        <button type="submit" class="btn btn-primary btn-sm">Lưu thay đổi</button>
      </div>
      <div class="clear box-body clearfix">
        @include('admin.pages.theme_config.nav')
        {{-- tab contnet --}}
        <div class="col-md-10 col-sm-9 no-padding">
          <div class="tab-content">
             @include('admin.pages.theme_config.form.'.$_form)
          </div>
        </div>
      </div>
      <div class="clearfix box-header box-footer text-right">
        <button class="btn btn-primary btn-sm" type="submit">Lưu thay đổi</button>
      </div>

    </div>
  </form>
@endsection


@extends('admin.layout')
@section('title')
  Custom CSS
@endsection

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main')
  <form action="" role="form" >
    <div class="theme-options-setting box box-primary clearfix">
      <h3 class="box-title">Thêm css</h3>
       <div class="clearfix box-header box-footer text-right">
        <button type="button" class="btn btn-primary btn-sm" name="">Save</button>
        <input type="hidden" class="" name="" >
      </div>

    </div>
  </form>
@endsection


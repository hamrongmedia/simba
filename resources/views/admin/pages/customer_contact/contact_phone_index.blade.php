@extends('admin.layout')
@section('main')

<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lí số điện thoại khách hàng
    </div>
    <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>Phone contact</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach($phone as $row)
          <tr>
            <th>{{$row->id}}</th>
            <th>{{$row->phone}}</th>
            <th>
                <a href="{{route('admin.contactphone.edit', $row->id) }}">Sửa</a>
                &nbsp;&nbsp;
                <a href="{{route('admin.contactphone.delete', $row->id) }}">Xoá</a></td>
          </tr>      
        @endforeach
        </tbody>
       <table> 
      
  </div>
</div>
@endsection
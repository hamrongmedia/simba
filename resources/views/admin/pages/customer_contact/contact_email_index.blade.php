@extends('admin.layout')
@section('main')

<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lí email khách hàng
    </div>
    <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>Emai contact</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach($email as $row)
          <tr>
            <th>{{$row->id}}</th>
            <th>{{$row->email}}</th>
            <th>  
                <a href="{{route('admin.contactemail.edit', $row->id) }}">Sửa</a>
                &nbsp;&nbsp;
                <a href="{{route('admin.contactemail.delete', $row->id) }}">Xoá</a>
            </td>
          </tr>      
        @endforeach
        </tbody>
       <table> 
      
  </div>
</div>
@endsection
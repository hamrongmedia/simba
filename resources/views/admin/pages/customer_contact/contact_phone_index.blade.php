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
            <th width="15%"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($phone as $row)
          <tr>
            <th>{{$row->id}}</th>
            <th>{{$row->phone}}</th>
            <th>
                <a class="btn btn-flat btn-danger grid-trash" href="{{route('admin.contactphone.delete', $row->id) }}"><i class="fa fa-trash-o"></i></a>
                &nbsp;&nbsp;
                <a class="btn btn-flat btn-primary grid-refresh" href="{{route('admin.contactphone.edit', $row->id) }}"><i class="fa fa-refresh"></i></a></td>
          </tr>      
        @endforeach
        </tbody>
       <table> 
      
  </div>
</div>
@endsection
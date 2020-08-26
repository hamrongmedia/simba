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
            <th width="15%"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($email as $row)
          <tr>
            <th>{{$row->id}}</th>
            <th>{{$row->email}}</th>
            <th>  
                <a class="btn btn-flat btn-danger grid-trash" href="{{route('admin.contactemail.delete', $row->id) }}"><i class="fa fa-trash-o"></i></a>
                &nbsp;&nbsp;
                <a class="btn btn-flat btn-primary grid-refresh" href="{{route('admin.contactemail.edit', $row->id) }}"><i class="fa fa-refresh"></i></a>
            </td>
          </tr>      
        @endforeach
        </tbody>
       <table> 
      
  </div>
</div>
@endsection
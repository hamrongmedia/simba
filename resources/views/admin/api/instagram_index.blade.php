@extends('admin.layout')
@section('main')

<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Instagram API
    </div>
    <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Id Người dùng</th>
            <th style="width:70%;">Mã Token</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach($api as $row)
          <tr>
            <th>{{$row->id_user}}</th>
            <th><textarea style="width:100%;">{{$row->token}}</textarea></th>
            <th><a href="{{route('admin.instagram.edit', $row->id) }}">Thay đổi</a></td>
          </tr>      
        @endforeach
        </tbody>
       <table> 
      
  </div>
</div>
@endsection
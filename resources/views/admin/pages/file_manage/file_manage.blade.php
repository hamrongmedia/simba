@extends('admin.layout')

@section('title')
  Quản lý Ảnh
@endsection

@section('css')


@endsection

@section('main')
    <iframe src="{{ url('/filemanager?type=image') }}" style="width: 100%; height: 700px; overflow: hidden; border: none;"></iframe>
@endsection

@section('js')


</script>
@endsection
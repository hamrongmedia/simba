@extends('admin.layout')
@section('title','Chỉnh sửa trạng thái vận chuyển')
@section('main')
    <div class="row">
		<div class="col-md-12">
		    <div class="box">
		        <div class="box-header with-border">
		            <h2 class="box-title">Chỉnh sửa</h2>
		            <div class="box-tools">
		                <div class="btn-group pull-right" style="margin-right: 5px">
		                    <a href="{{ route('admin.shipping_status.index') }}" class="btn  btn-flat btn-default" title="List">
		                        <i class="fa fa-list"></i><span class="hidden-xs"> Trở về </span>
		                    </a>
		                </div>
		            </div>
		        </div>
		        <form action="{{route('admin.shipping_status.update',['id'=>$data->id])}}" method="post">
		            @csrf
		            @method('PUT')
		            @include('admin.pages.shipping_status.form')
		        </form>
		    </div>
		</div>
    </div>
@stop
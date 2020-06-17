@extends('admin.layout')

@section('title')
  Tạo mới quyền
@endsection

@section('main')

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h2 class="box-title">Create a new permission</h2>

                <div class="box-tools">
                    <div class="btn-group pull-right" style="margin-right: 5px">
                        <a href="#" class="btn  btn-flat btn-default"
                            title="List"><i class="fa fa-list"></i><span class="hidden-xs"> Back List</span></a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('admin.permission.store')}}" method="post" accept-charset="UTF-8"
                class="form-horizontal" id="form-main" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="fields-group">

                        <div class="form-group   ">
                            <label for="name" class="col-sm-2  control-label">Name</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="text" id="name" name="name" value="" class="form-control name"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group   ">
                            {{-- <label for="slug" class="col-sm-2  control-label">Slug</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="text" id="slug" name="slug" value="" class="form-control slug"
                                        placeholder="">
                                </div>
                            </div> --}}
                        </div>

                        <div class="form-group  kind kind0 kind1 ">
                            <label for="http_uri" class="col-sm-2  control-label">Select URI action</label>
                            <input type="hidden" name="guard_name" value="admin" id="">
                            <div class="col-sm-8">
                                <select class="form-control input-sm http_uri select2 select2-hidden-accessible"
                                    multiple="" data-placeholder="HTTP method" style="width: 100%;" name="action_list[]"
                                    tabindex="-1" aria-hidden="true">
                                    @foreach ($actions as $action)
                                        <option value="{{$action->id}}">{{$action->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-2">
                    </div>

                    <div class="col-md-8">
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        <div class="btn-group pull-left">
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </div>

                <!-- /.box-footer -->
            </form>

        </div>
    </div>
</div>

@endsection

@section('js')
    @include('admin.component.ckeditor_js')
@endsection


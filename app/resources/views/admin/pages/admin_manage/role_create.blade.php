@extends('admin.layout')

@section('title')
  Quản lý User
@endsection

@section('main')

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h2 class="box-title">Create a new role</h2>

                <div class="box-tools">
                    <div class="btn-group pull-right" style="margin-right: 5px">
                        <a href="https://demo.s-cart.org/sc_admin/role" class="btn  btn-flat btn-default"
                            title="List"><i class="fa fa-list"></i><span class="hidden-xs"> Back List</span></a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('admin.role.store')}}" method="post" accept-charset="UTF-8"
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
                            <label for="slug" class="col-sm-2  control-label">Slug</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="text" id="slug" name="slug" value="" class="form-control slug"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group  ">
                            <label for="permission" class="col-sm-2  control-label">Select permission</label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm permission select2 select2-hidden-accessible"
                                    multiple="" data-placeholder="Select permission" style="width: 100%;"
                                    name="permission_list[]" tabindex="-1" aria-hidden="true">
                                    @foreach ($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <label for="administrators" class="col-sm-2  control-label">Select user</label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm administrators select2 "
                                    multiple="" data-placeholder="Select user" style="width: 100%;"
                                    name="guard_name" tabindex="-1" aria-hidden="true">
                                    <option value=""></option>
                                    <option value="admin">Administrator</option>
                                    <option value="user">User</option>
                                </select>
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
<script>
    //Initialize Select2 Elements
    $('.select2').select2()
</script>
@endsection

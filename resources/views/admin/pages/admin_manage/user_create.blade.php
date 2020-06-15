@extends('admin.layout')

@section('title')
Tạo mới user
@endsection



@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h2 class="box-title">Create a new user</h2>

                <div class="box-tools">
                    <div class="btn-group pull-right" style="margin-right: 5px">
                        <a href="https://demo.s-cart.org/sc_admin/user" class="btn  btn-flat btn-default"
                            title="List"><i class="fa fa-list"></i><span class="hidden-xs"> Back List</span></a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="https://demo.s-cart.org/sc_admin/user/create" method="post" accept-charset="UTF-8"
                class="form-horizontal" id="form-main" enctype="multipart/form-data">


                <div class="box-body">
                    <div class="fields-group">

                        <div class="form-group   ">
                            <label for="name" class="col-sm-2  control-label">Full name</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="text" id="name" name="name" value="" class="form-control name"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group   ">
                            <label for="username" class="col-sm-2  control-label">User name</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="text" id="username" name="username" value=""
                                        class="form-control username" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group   ">
                            <label for="email" class="col-sm-2  control-label">Email</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="text" id="email" name="email" value="" class="form-control email"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group   ">
                            <label for="avatar" class="col-sm-2  control-label">Avatar</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" id="avatar" name="avatar" value=""
                                        class="form-control input-sm avatar" placeholder="">
                                    <span class="input-group-btn">
                                        <a data-input="avatar" data-preview="preview_avatar" data-type="avatar"
                                            class="btn btn-sm btn-primary lfm">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                </div>
                                <div id="preview_avatar" class="img_holder">
                                </div>
                            </div>
                        </div>

                        <div class="form-group   ">
                            <label for="password" class="col-sm-2  control-label">Password</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="password" id="password" name="password" value=""
                                        class="form-control password" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group   ">
                            <label for="password" class="col-sm-2  control-label">Confirmation</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        value="" class="form-control password_confirmation" placeholder="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group  ">
                            <label for="roles" class="col-sm-2  control-label">Select roles</label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm roles select2 select2-hidden-accessible"
                                    multiple="" data-placeholder="Select roles" style="width: 100%;" name="roles[]"
                                    tabindex="-1" aria-hidden="true">
                                    <option value=""></option>
                                    <option value="5">Accountant</option>
                                    <option value="1">Administrator</option>
                                    <option value="4">Cms manager</option>
                                    <option value="2">Group only View</option>
                                    <option value="3">Manager</option>
                                    <option value="6">Marketing</option>
                                </select>
                            </div>
                        </div>



                        <div class="form-group  ">
                            <label for="permission" class="col-sm-2  control-label">Select permission</label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm permission select2 select2-hidden-accessible"
                                    multiple="" data-placeholder="Select permission" style="width: 100%;"
                                    name="permission[]" tabindex="-1" aria-hidden="true">
                                    <option value=""></option>
                                    <option value="1">Admin manager</option>
                                    <option value="3">Auth manager</option>
                                    <option value="8">CMS manager</option>
                                    <option value="17">Customer manager</option>
                                    <option value="2">Dashboard</option>
                                    <option value="11">Discount manager</option>
                                    <option value="20">Order Manager</option>
                                    <option value="18">Order status</option>
                                    <option value="15">Payment status</option>
                                    <option value="6">Plugin manager</option>
                                    <option value="19">Product manager</option>
                                    <option value="21">Report manager</option>
                                    <option value="4">Setting manager</option>
                                    <option value="14">Shipping status</option>
                                    <option value="22">Template manager</option>
                                    <option value="5">Upload management</option>
                                </select>
                            </div>
                        </div>


                    </div>
                </div>



                <!-- /.box-body -->

                <div class="box-footer">
                    <input type="hidden" name="_token" value="0LcKMn60tAciFOtr8Qfhczn0pWGHZu6HpivjZWTQ">
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

<!-- Select2 -->
<script src="{{asset('/admin/adminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
    //Initialize Select2 Elements
    $('.select2').select2()
</script>

@endsection
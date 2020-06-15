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
            <form action="https://demo.s-cart.org/sc_admin/role/create" method="post" accept-charset="UTF-8"
                class="form-horizontal" id="form-main" enctype="multipart/form-data">


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
                                <span class="select2 select2-container select2-container--default" dir="ltr"
                                    style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--multiple" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                            <ul class="select2-selection__rendered">
                                                <li class="select2-search select2-search--inline"><input
                                                        class="select2-search__field" type="search" tabindex="0"
                                                        autocomplete="off" autocorrect="off" autocapitalize="none"
                                                        spellcheck="false" role="textbox" aria-autocomplete="list"
                                                        placeholder="Select permission" style="width: 399.188px;"></li>
                                            </ul>
                                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>




                        <div class="form-group  ">
                            <label for="administrators" class="col-sm-2  control-label">Select user</label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm administrators select2 "
                                    multiple="" data-placeholder="Select user" style="width: 100%;"
                                    name="administrators[]" tabindex="-1" aria-hidden="true">
                                    <option value=""></option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Test</option>
                                </select>
                                
                                
                        </div>



                    </div>
                </div>



                <!-- /.box-body -->

                <div class="box-footer">
                    <input type="hidden" name="_token" value="TnIikJAiFIOJnqc6FQ0icP3jrz8ahknAg1LUekFM">
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
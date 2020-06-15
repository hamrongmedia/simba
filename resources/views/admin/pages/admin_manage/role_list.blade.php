@extends('admin.layout')

@section('title')
  Quản lý Roles
@endsection

@section('main')

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="pull-right">
                </div>
                <div class="pull-left">
                </div>
                <!-- /.box-tools -->
            </div>

            <div class="box-header with-border">
                <div class="pull-right">
                    <div class="menu-right">
                            <a href="{{route('admin.role.create')}}" class="btn  btn-success  btn-flat"
                            title="New" id="button_create_new">
                            <i class="fa fa-plus" title="Add new"></i>
                        </a>
                    </div>
                </div>


                <div class="pull-left">
                    <div class="menu-left">
                        <button type="button" class="btn btn-default grid-select-all"><i
                                class="fa fa-square-o"></i></button>
                    </div>
                    <div class="menu-left">
                        <a class="btn btn-flat btn-danger grid-trash" title="Delete"><i class="fa fa-trash-o"></i></a>
                    </div>

                    <div class="menu-left">
                        <a class="btn btn-flat btn-primary grid-refresh" title="Refresh"><i
                                class="fa fa-refresh"></i></a>
                    </div>

                    <div class="menu-left">
                        <div class="btn-group">
                            <select class="form-control" id="order_sort">
                                <option value="id__desc">ID desc</option>
                                <option value="id__asc">ID asc</option>
                                <option value="name__desc">Name desc</option>
                                <option value="name__asc">Name asc</option>
                            </select>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-flat btn-primary" title="Sort" id="button_sort">
                                <i class="fa fa-sort-amount-asc"></i>
                            </a>
                        </div>
                    </div>


                </div>

            </div>
            <!-- /.box-header -->
            <section id="pjax-container" class="table-list">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Slug</th>
                                <th>Name</th>
                                <th>Permission</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="6"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>6</td>
                                <td>maketing</td>
                                <td>Marketing</td>
                                <td><span class="label label-success">Dashboard</span> <span
                                        class="label label-success">Auth manager</span> <span
                                        class="label label-success">Upload management</span> <span
                                        class="label label-success">CMS manager</span> <span
                                        class="label label-success">Discount manager</span> <span
                                        class="label label-success">Shipping status</span> <span
                                        class="label label-success">Payment status</span> <span
                                        class="label label-success">Customer manager</span> <span
                                        class="label label-success">Order status</span> <span
                                        class="label label-success">Product manager</span> <span
                                        class="label label-success">Order Manager</span> <span
                                        class="label label-success">Report manager</span> </td>
                                <td>2020-03-23 22:39:22</td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/role/edit/6"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(6);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="5"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>5</td>
                                <td>accountant</td>
                                <td>Accountant</td>
                                <td><span class="label label-success">Dashboard</span> <span
                                        class="label label-success">Auth manager</span> <span
                                        class="label label-success">Order Manager</span> <span
                                        class="label label-success">Report manager</span> </td>
                                <td>2020-03-23 22:39:22</td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/role/edit/5"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(5);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="4"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>4</td>
                                <td>cms</td>
                                <td>Cms manager</td>
                                <td><span class="label label-success">Auth manager</span> <span
                                        class="label label-success">Upload management</span> <span
                                        class="label label-success">CMS manager</span> </td>
                                <td>2020-03-23 22:39:22</td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/role/edit/4"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(4);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="3"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>3</td>
                                <td>manager</td>
                                <td>Manager</td>
                                <td><span class="label label-success">Admin manager</span> <span
                                        class="label label-success">Dashboard</span> <span
                                        class="label label-success">Auth manager</span> <span
                                        class="label label-success">Setting manager</span> <span
                                        class="label label-success">Upload management</span> <span
                                        class="label label-success">CMS manager</span> <span
                                        class="label label-success">Discount manager</span> <span
                                        class="label label-success">Shipping status</span> <span
                                        class="label label-success">Payment status</span> <span
                                        class="label label-success">Customer manager</span> <span
                                        class="label label-success">Order status</span> <span
                                        class="label label-success">Product manager</span> <span
                                        class="label label-success">Order Manager</span> <span
                                        class="label label-success">Report manager</span> <span
                                        class="label label-success">Template manager</span> </td>
                                <td>2020-03-23 22:39:22</td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/role/edit/3"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(3);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="2"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>2</td>
                                <td>view.all</td>
                                <td>Group only View</td>
                                <td></td>
                                <td>2020-03-23 22:39:22</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="1"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>1</td>
                                <td>administrator</td>
                                <td>Administrator</td>
                                <td></td>
                                <td>2020-03-23 22:39:22</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    Showing <b>1</b> to <b>6</b> of <b>6</b> items
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <!-- Previous Page Link -->
                        <li class="page-item disabled"><span class="page-link pjax-container">«</span></li>

                        <!-- Pagination Elements -->
                        <!-- "Three Dots" Separator -->

                        <!-- Array Of Links -->
                        <li class="page-item active"><span class="page-link pjax-container">1</span></li>

                        <!-- Next Page Link -->
                        <li class="page-item disabled"><span class="page-link pjax-container">»</span></li>
                    </ul>

                </div>


            </section>
            <!-- /.box-body -->
        </div>
    </div>
</div>

@endsection

@section('js')
    @include('admin.component.ckeditor_js')
@endsection
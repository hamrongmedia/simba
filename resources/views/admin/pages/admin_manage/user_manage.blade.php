@extends('admin.layout')

@section('title')
  Quản lý User
@endsection

@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="pull-right">
                    <div class="menu-right">
                        <form action="https://demo.s-cart.org/sc_admin/user" id="button_search">
                            <div onclick="$(this).submit();" class="btn-group pull-right">
                                <a class="btn btn-flat btn-primary" title="Refresh">
                                    <i class="fa  fa-search"></i>
                                </a>
                            </div>
                            <div class="btn-group pull-right">
                                <div class="form-group">
                                    <input type="text" name="keyword" class="form-control"
                                        placeholder="Search Name, ID or Email" value="">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="pull-left">
                </div>
                <!-- /.box-tools -->
            </div>

            <div class="box-header with-border">
                <div class="pull-right">
                    <div class="menu-right">
                        <a href="https://demo.s-cart.org/sc_admin/user/create" class="btn  btn-success  btn-flat"
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
                                <option value="username__desc">Name login desc</option>
                                <option value="username__asc">Name login asc</option>
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
                                <th>User name</th>
                                <th>Full name</th>
                                <th>Roles</th>
                                <th>Permission</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <td>test</td>
                                <td>Test</td>
                                <td><span class="label label-success">Group only View</span> </td>
                                <td></td>
                                <td>2020-03-23 22:39:57</td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/user/edit/2"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                </td>
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
                                <td>admin</td>
                                <td>Administrator</td>
                                <td><span class="label label-success">Administrator</span> </td>
                                <td></td>
                                <td>2020-03-23 22:39:22</td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/user/edit/1"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    Showing <b>1</b> to <b>2</b> of <b>2</b> items
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
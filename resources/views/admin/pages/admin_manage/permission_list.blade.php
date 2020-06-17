@extends('admin.layout')

@section('title')
  Quản lý quyền
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
                            <a href="{{route('admin.permission.create')}}" class="btn  btn-success  btn-flat"
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
                                <th>HTTP path</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="22"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>22</td>
                                <td>template.full</td>
                                <td>Template manager</td>
                                <td><span class="label label-info">ANY</span>
                                    <code>sc_admin/block_content/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/link/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/template/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/22"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(22);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="21"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>21</td>
                                <td>report.full</td>
                                <td>Report manager</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/report/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/21"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(21);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="20"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>20</td>
                                <td>order.full</td>
                                <td>Order Manager</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/order/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/20"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(20);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="19"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>19</td>
                                <td>product.full</td>
                                <td>Product manager</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/category/*</code><br><span
                                        class="label label-info">ANY</span> <code>sc_admin/supplier/*</code><br><span
                                        class="label label-info">ANY</span> <code>sc_admin/brand/*</code><br><span
                                        class="label label-info">ANY</span>
                                    <code>sc_admin/attribute_group/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/product/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/weight_unit/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/length_unit/*
              </code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/19"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(19);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="18"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>18</td>
                                <td>order_status.full</td>
                                <td>Order status</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/order_status/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/18"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(18);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="17"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>17</td>
                                <td>customer.full</td>
                                <td>Customer manager</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/customer/*</code><br><span
                                        class="label label-info">ANY</span> <code>sc_admin/subscribe/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/17"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(17);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="15"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>15</td>
                                <td>payment_status.full</td>
                                <td>Payment status</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/payment_status/*</code>
                                </td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/15"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(15);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="14"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>14</td>
                                <td>shipping_status.full</td>
                                <td>Shipping status</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/shipping_status/*</code>
                                </td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/14"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(14);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="11"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>11</td>
                                <td>discount.full</td>
                                <td>Discount manager</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/shop_discount/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/11"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(11);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                        style="position: relative;"><input class="input" type="checkbox" data-id="8"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins
                                            class="iCheck-helper"
                                            style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div>
                                </td>
                                <td>8</td>
                                <td>cms.full</td>
                                <td>CMS manager</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/page/*</code><br><span
                                        class="label label-info">ANY</span> <code>sc_admin/banner/*</code><br><span
                                        class="label label-info">ANY</span>
                                    <code>sc_admin/cms_category/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/cms_content/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/news/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/8"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(8);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
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
                                <td>plugin.full</td>
                                <td>Plugin manager</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/plugin/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/6"><span title="Edit"
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
                                <td>upload.full</td>
                                <td>Upload management</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/uploads/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/5"><span title="Edit"
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
                                <td>setting.full</td>
                                <td>Setting manager</td>
                                <td><span class="label label-info">ANY</span>
                                    <code>sc_admin/store_info/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/setting/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/url_config/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/product_config/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/customer_config/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/cache_config/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/email/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/email_template/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/language/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/currency/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/backup/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/api_connection/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/maintain/*</code><br><span class="label label-info">ANY</span>
                                    <code>sc_admin/tax/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/4"><span title="Edit"
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
                                <td>auth.full</td>
                                <td>Auth manager</td>
                                <td><span class="label label-info">ANY</span> <code>sc_admin/auth/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/3"><span title="Edit"
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
                                <td>dashboard</td>
                                <td>Dashboard</td>
                                <td><span class="label label-primary">GET</span> <code>sc_admin</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/2"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(2);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
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
                                <td>admin.manager</td>
                                <td>Admin manager</td>
                                <td><span class="label label-primary">GET</span> <code>sc_admin/user</code><br><span
                                        class="label label-primary">GET</span> <code>sc_admin/role</code><br><span
                                        class="label label-primary">GET</span> <code>sc_admin/permission</code><br><span
                                        class="label label-info">ANY</span> <code>sc_admin/log/*</code><br><span
                                        class="label label-info">ANY</span> <code>sc_admin/menu/*</code></td>
                                <td></td>
                                <td>
                                    <a href="https://demo.s-cart.org/sc_admin/permission/edit/1"><span title="Edit"
                                            type="button" class="btn btn-flat btn-primary"><i
                                                class="fa fa-edit"></i></span></a>&nbsp;
                                    <span onclick="deleteItem(1);" title="Delete" class="btn btn-flat btn-danger"><i
                                            class="fa fa-trash"></i></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    Showing <b>1</b> to <b>16</b> of <b>16</b> items
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
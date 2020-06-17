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
                        <a href="https://demo.s-cart.org/sc_admin/user" class="btn  btn-flat btn-default"
                            title="List"><i class="fa fa-list"></i><span class="hidden-xs"> Back List</span></a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="https://demo.s-cart.org/sc_admin/permission/create" method="post" accept-charset="UTF-8"
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

                        <div class="form-group  kind kind0 kind1 ">
                            <label for="http_uri" class="col-sm-2  control-label">Select URI action</label>
                            <div class="col-sm-8">
                                <select class="form-control input-sm http_uri select2 select2-hidden-accessible"
                                    multiple="" data-placeholder="HTTP method" style="width: 100%;" name="http_uri[]"
                                    tabindex="-1" aria-hidden="true">
                                    <option value=""></option>
                                    <option value="ANY::sc_admin/api_connection/*">ANY::sc_admin/api_connection/*
                                    </option>
                                    <option value="GET::sc_admin/api_connection">GET::sc_admin/api_connection</option>
                                    <option value="GET::sc_admin/api_connection/create">
                                        GET::sc_admin/api_connection/create</option>
                                    <option value="POST::sc_admin/api_connection/create">
                                        POST::sc_admin/api_connection/create</option>
                                    <option value="GET::sc_admin/api_connection/edit/{id}">
                                        GET::sc_admin/api_connection/edit/{id}</option>
                                    <option value="POST::sc_admin/api_connection/edit/{id}">
                                        POST::sc_admin/api_connection/edit/{id}</option>
                                    <option value="POST::sc_admin/api_connection/delete">
                                        POST::sc_admin/api_connection/delete</option>
                                    <option value="GET::sc_admin/api_connection/generate_key">
                                        GET::sc_admin/api_connection/generate_key</option>
                                    <option value="ANY::sc_admin/attribute_group/*">ANY::sc_admin/attribute_group/*
                                    </option>
                                    <option value="GET::sc_admin/attribute_group">GET::sc_admin/attribute_group</option>
                                    <option value="GET::sc_admin/attribute_group/create">
                                        GET::sc_admin/attribute_group/create</option>
                                    <option value="POST::sc_admin/attribute_group/create">
                                        POST::sc_admin/attribute_group/create</option>
                                    <option value="GET::sc_admin/attribute_group/edit/{id}">
                                        GET::sc_admin/attribute_group/edit/{id}</option>
                                    <option value="POST::sc_admin/attribute_group/edit/{id}">
                                        POST::sc_admin/attribute_group/edit/{id}</option>
                                    <option value="POST::sc_admin/attribute_group/delete">
                                        POST::sc_admin/attribute_group/delete</option>
                                    <option value="ANY::sc_admin/auth/*">ANY::sc_admin/auth/*</option>
                                    <option value="GET::sc_admin/auth/login">GET::sc_admin/auth/login</option>
                                    <option value="POST::sc_admin/auth/login">POST::sc_admin/auth/login</option>
                                    <option value="GET::sc_admin/auth/logout">GET::sc_admin/auth/logout</option>
                                    <option value="GET::sc_admin/auth/setting">GET::sc_admin/auth/setting</option>
                                    <option value="POST::sc_admin/auth/setting">POST::sc_admin/auth/setting</option>
                                    <option value="ANY::sc_admin/backup/*">ANY::sc_admin/backup/*</option>
                                    <option value="GET::sc_admin/backup">GET::sc_admin/backup</option>
                                    <option value="POST::sc_admin/backup/generate">POST::sc_admin/backup/generate
                                    </option>
                                    <option value="POST::sc_admin/backup/process">POST::sc_admin/backup/process</option>
                                    <option value="ANY::sc_admin/banner/*">ANY::sc_admin/banner/*</option>
                                    <option value="GET::sc_admin/banner">GET::sc_admin/banner</option>
                                    <option value="GET::sc_admin/banner/create">GET::sc_admin/banner/create</option>
                                    <option value="POST::sc_admin/banner/create">POST::sc_admin/banner/create</option>
                                    <option value="GET::sc_admin/banner/edit/{id}">GET::sc_admin/banner/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/banner/edit/{id}">POST::sc_admin/banner/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/banner/delete">POST::sc_admin/banner/delete</option>
                                    <option value="ANY::sc_admin/block_content/*">ANY::sc_admin/block_content/*</option>
                                    <option value="GET::sc_admin/block_content">GET::sc_admin/block_content</option>
                                    <option value="GET::sc_admin/block_content/create">
                                        GET::sc_admin/block_content/create</option>
                                    <option value="POST::sc_admin/block_content/create">
                                        POST::sc_admin/block_content/create</option>
                                    <option value="GET::sc_admin/block_content/edit/{id}">
                                        GET::sc_admin/block_content/edit/{id}</option>
                                    <option value="POST::sc_admin/block_content/edit/{id}">
                                        POST::sc_admin/block_content/edit/{id}</option>
                                    <option value="POST::sc_admin/block_content/delete">
                                        POST::sc_admin/block_content/delete</option>
                                    <option value="ANY::sc_admin/brand/*">ANY::sc_admin/brand/*</option>
                                    <option value="GET::sc_admin/brand">GET::sc_admin/brand</option>
                                    <option value="GET::sc_admin/brand/create">GET::sc_admin/brand/create</option>
                                    <option value="POST::sc_admin/brand/create">POST::sc_admin/brand/create</option>
                                    <option value="GET::sc_admin/brand/edit/{id}">GET::sc_admin/brand/edit/{id}</option>
                                    <option value="POST::sc_admin/brand/edit/{id}">POST::sc_admin/brand/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/brand/delete">POST::sc_admin/brand/delete</option>
                                    <option value="ANY::sc_admin/cache_config/*">ANY::sc_admin/cache_config/*</option>
                                    <option value="GET::sc_admin/cache_config">GET::sc_admin/cache_config</option>
                                    <option value="GET::sc_admin/cache_config/create">GET::sc_admin/cache_config/create
                                    </option>
                                    <option value="POST::sc_admin/cache_config/create">
                                        POST::sc_admin/cache_config/create</option>
                                    <option value="POST::sc_admin/cache_config/ ">POST::sc_admin/cache_config/ </option>
                                    <option value="POST::sc_admin/cache_config/update_info">
                                        POST::sc_admin/cache_config/update_info</option>
                                    <option value="POST::sc_admin/cache_config/clear_cache">
                                        POST::sc_admin/cache_config/clear_cache</option>
                                    <option value="ANY::sc_admin/category/*">ANY::sc_admin/category/*</option>
                                    <option value="GET::sc_admin/category">GET::sc_admin/category</option>
                                    <option value="GET::sc_admin/category/create">GET::sc_admin/category/create</option>
                                    <option value="POST::sc_admin/category/create">POST::sc_admin/category/create
                                    </option>
                                    <option value="GET::sc_admin/category/edit/{id}">GET::sc_admin/category/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/category/edit/{id}">POST::sc_admin/category/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/category/delete">POST::sc_admin/category/delete
                                    </option>
                                    <option value="ANY::sc_admin/currency/*">ANY::sc_admin/currency/*</option>
                                    <option value="GET::sc_admin/currency">GET::sc_admin/currency</option>
                                    <option value="GET::sc_admin/currency/create">GET::sc_admin/currency/create</option>
                                    <option value="POST::sc_admin/currency/create">POST::sc_admin/currency/create
                                    </option>
                                    <option value="GET::sc_admin/currency/edit/{id}">GET::sc_admin/currency/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/currency/edit/{id}">POST::sc_admin/currency/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/currency/delete">POST::sc_admin/currency/delete
                                    </option>
                                    <option value="ANY::sc_admin/customer/*">ANY::sc_admin/customer/*</option>
                                    <option value="GET::sc_admin/customer">GET::sc_admin/customer</option>
                                    <option value="GET::sc_admin/customer/create">GET::sc_admin/customer/create</option>
                                    <option value="POST::sc_admin/customer/create">POST::sc_admin/customer/create
                                    </option>
                                    <option value="GET::sc_admin/customer/edit/{id}">GET::sc_admin/customer/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/customer/edit/{id}">POST::sc_admin/customer/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/customer/delete">POST::sc_admin/customer/delete
                                    </option>
                                    <option value="GET::sc_admin/customer/update-address/{id}">
                                        GET::sc_admin/customer/update-address/{id}</option>
                                    <option value="POST::sc_admin/customer/update-address/{id}">
                                        POST::sc_admin/customer/update-address/{id}</option>
                                    <option value="POST::sc_admin/customer/delete-address">
                                        POST::sc_admin/customer/delete-address</option>
                                    <option value="ANY::sc_admin/customer_config/*">ANY::sc_admin/customer_config/*
                                    </option>
                                    <option value="GET::sc_admin/customer_config">GET::sc_admin/customer_config</option>
                                    <option value="GET::sc_admin/customer_config/create">
                                        GET::sc_admin/customer_config/create</option>
                                    <option value="POST::sc_admin/customer_config/create">
                                        POST::sc_admin/customer_config/create</option>
                                    <option value="POST::sc_admin/customer_config/ ">POST::sc_admin/customer_config/
                                    </option>
                                    <option value="POST::sc_admin/customer_config/update_info">
                                        POST::sc_admin/customer_config/update_info</option>
                                    <option value="ANY::sc_admin/email/*">ANY::sc_admin/email/*</option>
                                    <option value="GET::sc_admin/email">GET::sc_admin/email</option>
                                    <option value="POST::sc_admin/email/delete">POST::sc_admin/email/delete</option>
                                    <option value="POST::sc_admin/email/update_info">POST::sc_admin/email/update_info
                                    </option>
                                    <option value="ANY::sc_admin/email_template/*">ANY::sc_admin/email_template/*
                                    </option>
                                    <option value="GET::sc_admin/email_template">GET::sc_admin/email_template</option>
                                    <option value="GET::sc_admin/email_template/create">
                                        GET::sc_admin/email_template/create</option>
                                    <option value="POST::sc_admin/email_template/create">
                                        POST::sc_admin/email_template/create</option>
                                    <option value="GET::sc_admin/email_template/edit/{id}">
                                        GET::sc_admin/email_template/edit/{id}</option>
                                    <option value="POST::sc_admin/email_template/edit/{id}">
                                        POST::sc_admin/email_template/edit/{id}</option>
                                    <option value="POST::sc_admin/email_template/delete">
                                        POST::sc_admin/email_template/delete</option>
                                    <option value="GET::sc_admin/email_template/list_variable">
                                        GET::sc_admin/email_template/list_variable</option>
                                    <option value="ANY::sc_admin/uploads/*">ANY::sc_admin/uploads/*</option>
                                    <option value="ANY::sc_admin/language/*">ANY::sc_admin/language/*</option>
                                    <option value="GET::sc_admin/language">GET::sc_admin/language</option>
                                    <option value="GET::sc_admin/language/create">GET::sc_admin/language/create</option>
                                    <option value="POST::sc_admin/language/create">POST::sc_admin/language/create
                                    </option>
                                    <option value="GET::sc_admin/language/edit/{id}">GET::sc_admin/language/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/language/edit/{id}">POST::sc_admin/language/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/language/delete">POST::sc_admin/language/delete
                                    </option>
                                    <option value="ANY::sc_admin/length_unit/*">ANY::sc_admin/length_unit/*</option>
                                    <option value="GET::sc_admin/length_unit">GET::sc_admin/length_unit</option>
                                    <option value="GET::sc_admin/length_unit/create">GET::sc_admin/length_unit/create
                                    </option>
                                    <option value="POST::sc_admin/length_unit/create">POST::sc_admin/length_unit/create
                                    </option>
                                    <option value="GET::sc_admin/length_unit/edit/{id}">
                                        GET::sc_admin/length_unit/edit/{id}</option>
                                    <option value="POST::sc_admin/length_unit/edit/{id}">
                                        POST::sc_admin/length_unit/edit/{id}</option>
                                    <option value="POST::sc_admin/length_unit/delete">POST::sc_admin/length_unit/delete
                                    </option>
                                    <option value="ANY::sc_admin/link/*">ANY::sc_admin/link/*</option>
                                    <option value="GET::sc_admin/link">GET::sc_admin/link</option>
                                    <option value="GET::sc_admin/link/create">GET::sc_admin/link/create</option>
                                    <option value="POST::sc_admin/link/create">POST::sc_admin/link/create</option>
                                    <option value="GET::sc_admin/link/edit/{id}">GET::sc_admin/link/edit/{id}</option>
                                    <option value="POST::sc_admin/link/edit/{id}">POST::sc_admin/link/edit/{id}</option>
                                    <option value="POST::sc_admin/link/delete">POST::sc_admin/link/delete</option>
                                    <option value="ANY::sc_admin/log/*">ANY::sc_admin/log/*</option>
                                    <option value="GET::sc_admin/log">GET::sc_admin/log</option>
                                    <option value="POST::sc_admin/log/delete">POST::sc_admin/log/delete</option>
                                    <option value="ANY::sc_admin/maintain/*">ANY::sc_admin/maintain/*</option>
                                    <option value="GET::sc_admin/maintain">GET::sc_admin/maintain</option>
                                    <option value="GET::sc_admin/maintain/edit">GET::sc_admin/maintain/edit</option>
                                    <option value="POST::sc_admin/maintain/edit">POST::sc_admin/maintain/edit</option>
                                    <option value="POST::sc_admin/maintain/update_info">
                                        POST::sc_admin/maintain/update_info</option>
                                    <option value="ANY::sc_admin/menu/*">ANY::sc_admin/menu/*</option>
                                    <option value="GET::sc_admin/menu">GET::sc_admin/menu</option>
                                    <option value="POST::sc_admin/menu/create">POST::sc_admin/menu/create</option>
                                    <option value="GET::sc_admin/menu/edit/{id}">GET::sc_admin/menu/edit/{id}</option>
                                    <option value="POST::sc_admin/menu/edit/{id}">POST::sc_admin/menu/edit/{id}</option>
                                    <option value="POST::sc_admin/menu/delete">POST::sc_admin/menu/delete</option>
                                    <option value="POST::sc_admin/menu/update_sort">POST::sc_admin/menu/update_sort
                                    </option>
                                    <option value="ANY::sc_admin/news/*">ANY::sc_admin/news/*</option>
                                    <option value="GET::sc_admin/news">GET::sc_admin/news</option>
                                    <option value="GET::sc_admin/news/create">GET::sc_admin/news/create</option>
                                    <option value="POST::sc_admin/news/create">POST::sc_admin/news/create</option>
                                    <option value="GET::sc_admin/news/edit/{id}">GET::sc_admin/news/edit/{id}</option>
                                    <option value="POST::sc_admin/news/edit/{id}">POST::sc_admin/news/edit/{id}</option>
                                    <option value="POST::sc_admin/news/delete">POST::sc_admin/news/delete</option>
                                    <option value="ANY::sc_admin/order/*">ANY::sc_admin/order/*</option>
                                    <option value="GET::sc_admin/order">GET::sc_admin/order</option>
                                    <option value="GET::sc_admin/order/detail/{id}">GET::sc_admin/order/detail/{id}
                                    </option>
                                    <option value="GET::sc_admin/order/create">GET::sc_admin/order/create</option>
                                    <option value="POST::sc_admin/order/create">POST::sc_admin/order/create</option>
                                    <option value="POST::sc_admin/order/add_item">POST::sc_admin/order/add_item</option>
                                    <option value="POST::sc_admin/order/edit_item">POST::sc_admin/order/edit_item
                                    </option>
                                    <option value="POST::sc_admin/order/delete_item">POST::sc_admin/order/delete_item
                                    </option>
                                    <option value="POST::sc_admin/order/update">POST::sc_admin/order/update</option>
                                    <option value="POST::sc_admin/order/delete">POST::sc_admin/order/delete</option>
                                    <option value="GET::sc_admin/order/product_info">GET::sc_admin/order/product_info
                                    </option>
                                    <option value="GET::sc_admin/order/user_info">GET::sc_admin/order/user_info</option>
                                    <option value="GET::sc_admin/order/export_detail">GET::sc_admin/order/export_detail
                                    </option>
                                    <option value="ANY::sc_admin/order_status/*">ANY::sc_admin/order_status/*</option>
                                    <option value="GET::sc_admin/order_status">GET::sc_admin/order_status</option>
                                    <option value="GET::sc_admin/order_status/create">GET::sc_admin/order_status/create
                                    </option>
                                    <option value="POST::sc_admin/order_status/create">
                                        POST::sc_admin/order_status/create</option>
                                    <option value="GET::sc_admin/order_status/edit/{id}">
                                        GET::sc_admin/order_status/edit/{id}</option>
                                    <option value="POST::sc_admin/order_status/edit/{id}">
                                        POST::sc_admin/order_status/edit/{id}</option>
                                    <option value="POST::sc_admin/order_status/delete">
                                        POST::sc_admin/order_status/delete</option>
                                    <option value="ANY::sc_admin/page/*">ANY::sc_admin/page/*</option>
                                    <option value="GET::sc_admin/page">GET::sc_admin/page</option>
                                    <option value="GET::sc_admin/page/create">GET::sc_admin/page/create</option>
                                    <option value="POST::sc_admin/page/create">POST::sc_admin/page/create</option>
                                    <option value="GET::sc_admin/page/edit/{id}">GET::sc_admin/page/edit/{id}</option>
                                    <option value="POST::sc_admin/page/edit/{id}">POST::sc_admin/page/edit/{id}</option>
                                    <option value="POST::sc_admin/page/delete">POST::sc_admin/page/delete</option>
                                    <option value="ANY::sc_admin/payment_status/*">ANY::sc_admin/payment_status/*
                                    </option>
                                    <option value="GET::sc_admin/payment_status">GET::sc_admin/payment_status</option>
                                    <option value="GET::sc_admin/payment_status/create">
                                        GET::sc_admin/payment_status/create</option>
                                    <option value="POST::sc_admin/payment_status/create">
                                        POST::sc_admin/payment_status/create</option>
                                    <option value="GET::sc_admin/payment_status/edit/{id}">
                                        GET::sc_admin/payment_status/edit/{id}</option>
                                    <option value="POST::sc_admin/payment_status/edit/{id}">
                                        POST::sc_admin/payment_status/edit/{id}</option>
                                    <option value="POST::sc_admin/payment_status/delete">
                                        POST::sc_admin/payment_status/delete</option>
                                    <option value="ANY::sc_admin/permission/*">ANY::sc_admin/permission/*</option>
                                    <option value="GET::sc_admin/permission">GET::sc_admin/permission</option>
                                    <option value="GET::sc_admin/permission/create">GET::sc_admin/permission/create
                                    </option>
                                    <option value="POST::sc_admin/permission/create">POST::sc_admin/permission/create
                                    </option>
                                    <option value="GET::sc_admin/permission/edit/{id}">
                                        GET::sc_admin/permission/edit/{id}</option>
                                    <option value="POST::sc_admin/permission/edit/{id}">
                                        POST::sc_admin/permission/edit/{id}</option>
                                    <option value="POST::sc_admin/permission/delete">POST::sc_admin/permission/delete
                                    </option>
                                    <option value="ANY::sc_admin/plugin/*">ANY::sc_admin/plugin/*</option>
                                    <option value="GET::sc_admin/plugin/import">GET::sc_admin/plugin/import</option>
                                    <option value="POST::sc_admin/plugin/import">POST::sc_admin/plugin/import</option>
                                    <option value="GET::sc_admin/plugin/{code}">GET::sc_admin/plugin/{code}</option>
                                    <option value="POST::sc_admin/plugin/install">POST::sc_admin/plugin/install</option>
                                    <option value="POST::sc_admin/plugin/uninstall">POST::sc_admin/plugin/uninstall
                                    </option>
                                    <option value="POST::sc_admin/plugin/enable">POST::sc_admin/plugin/enable</option>
                                    <option value="POST::sc_admin/plugin/disable">POST::sc_admin/plugin/disable</option>
                                    <option value="GET::sc_admin/plugin/{code}/online">
                                        GET::sc_admin/plugin/{code}/online</option>
                                    <option value="POST::sc_admin/plugin/install/online">
                                        POST::sc_admin/plugin/install/online</option>
                                    <option value="ANY::sc_admin/product/*">ANY::sc_admin/product/*</option>
                                    <option value="GET::sc_admin/product">GET::sc_admin/product</option>
                                    <option value="GET::sc_admin/product/create">GET::sc_admin/product/create</option>
                                    <option value="POST::sc_admin/product/create">POST::sc_admin/product/create</option>
                                    <option value="GET::sc_admin/product/edit/{id}">GET::sc_admin/product/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/product/edit/{id}">POST::sc_admin/product/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/product/delete">POST::sc_admin/product/delete</option>
                                    <option value="GET::sc_admin/product/import">GET::sc_admin/product/import</option>
                                    <option value="POST::sc_admin/product/import">POST::sc_admin/product/import</option>
                                    <option value="ANY::sc_admin/product_config/*">ANY::sc_admin/product_config/*
                                    </option>
                                    <option value="GET::sc_admin/product_config">GET::sc_admin/product_config</option>
                                    <option value="GET::sc_admin/product_config/create">
                                        GET::sc_admin/product_config/create</option>
                                    <option value="POST::sc_admin/product_config/create">
                                        POST::sc_admin/product_config/create</option>
                                    <option value="POST::sc_admin/product_config/ ">POST::sc_admin/product_config/
                                    </option>
                                    <option value="POST::sc_admin/product_config/update_info">
                                        POST::sc_admin/product_config/update_info</option>
                                    <option value="ANY::sc_admin/report/*">ANY::sc_admin/report/*</option>
                                    <option value="GET::sc_admin/report/product">GET::sc_admin/report/product</option>
                                    <option value="ANY::sc_admin/role/*">ANY::sc_admin/role/*</option>
                                    <option value="GET::sc_admin/role">GET::sc_admin/role</option>
                                    <option value="GET::sc_admin/role/create">GET::sc_admin/role/create</option>
                                    <option value="POST::sc_admin/role/create">POST::sc_admin/role/create</option>
                                    <option value="GET::sc_admin/role/edit/{id}">GET::sc_admin/role/edit/{id}</option>
                                    <option value="POST::sc_admin/role/edit/{id}">POST::sc_admin/role/edit/{id}</option>
                                    <option value="POST::sc_admin/role/delete">POST::sc_admin/role/delete</option>
                                    <option value="ANY::sc_admin/setting/*">ANY::sc_admin/setting/*</option>
                                    <option value="GET::sc_admin/setting">GET::sc_admin/setting</option>
                                    <option value="POST::sc_admin/setting/update_info">
                                        POST::sc_admin/setting/update_info</option>
                                    <option value="ANY::sc_admin/shipping_status/*">ANY::sc_admin/shipping_status/*
                                    </option>
                                    <option value="GET::sc_admin/shipping_status">GET::sc_admin/shipping_status</option>
                                    <option value="GET::sc_admin/shipping_status/create">
                                        GET::sc_admin/shipping_status/create</option>
                                    <option value="POST::sc_admin/shipping_status/create">
                                        POST::sc_admin/shipping_status/create</option>
                                    <option value="GET::sc_admin/shipping_status/edit/{id}">
                                        GET::sc_admin/shipping_status/edit/{id}</option>
                                    <option value="POST::sc_admin/shipping_status/edit/{id}">
                                        POST::sc_admin/shipping_status/edit/{id}</option>
                                    <option value="POST::sc_admin/shipping_status/delete">
                                        POST::sc_admin/shipping_status/delete</option>
                                    <option value="ANY::sc_admin/store_info/*">ANY::sc_admin/store_info/*</option>
                                    <option value="GET::sc_admin/store_info">GET::sc_admin/store_info</option>
                                    <option value="POST::sc_admin/store_info/delete">POST::sc_admin/store_info/delete
                                    </option>
                                    <option value="POST::sc_admin/store_info/update_info">
                                        POST::sc_admin/store_info/update_info</option>
                                    <option value="ANY::sc_admin/subscribe/*">ANY::sc_admin/subscribe/*</option>
                                    <option value="GET::sc_admin/subscribe">GET::sc_admin/subscribe</option>
                                    <option value="GET::sc_admin/subscribe/create">GET::sc_admin/subscribe/create
                                    </option>
                                    <option value="POST::sc_admin/subscribe/create">POST::sc_admin/subscribe/create
                                    </option>
                                    <option value="GET::sc_admin/subscribe/edit/{id}">GET::sc_admin/subscribe/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/subscribe/edit/{id}">
                                        POST::sc_admin/subscribe/edit/{id}</option>
                                    <option value="POST::sc_admin/subscribe/delete">POST::sc_admin/subscribe/delete
                                    </option>
                                    <option value="ANY::sc_admin/supplier/*">ANY::sc_admin/supplier/*</option>
                                    <option value="GET::sc_admin/supplier">GET::sc_admin/supplier</option>
                                    <option value="GET::sc_admin/supplier/create">GET::sc_admin/supplier/create</option>
                                    <option value="POST::sc_admin/supplier/create">POST::sc_admin/supplier/create
                                    </option>
                                    <option value="GET::sc_admin/supplier/edit/{id}">GET::sc_admin/supplier/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/supplier/edit/{id}">POST::sc_admin/supplier/edit/{id}
                                    </option>
                                    <option value="POST::sc_admin/supplier/delete">POST::sc_admin/supplier/delete
                                    </option>
                                    <option value="ANY::sc_admin/tax/*">ANY::sc_admin/tax/*</option>
                                    <option value="GET::sc_admin/tax">GET::sc_admin/tax</option>
                                    <option value="GET::sc_admin/tax/create">GET::sc_admin/tax/create</option>
                                    <option value="POST::sc_admin/tax/create">POST::sc_admin/tax/create</option>
                                    <option value="GET::sc_admin/tax/edit/{id}">GET::sc_admin/tax/edit/{id}</option>
                                    <option value="POST::sc_admin/tax/edit/{id}">POST::sc_admin/tax/edit/{id}</option>
                                    <option value="POST::sc_admin/tax/delete">POST::sc_admin/tax/delete</option>
                                    <option value="ANY::sc_admin/template/*">ANY::sc_admin/template/*</option>
                                    <option value="GET::sc_admin/template/import">GET::sc_admin/template/import</option>
                                    <option value="POST::sc_admin/template/import">POST::sc_admin/template/import
                                    </option>
                                    <option value="GET::sc_admin/template">GET::sc_admin/template</option>
                                    <option value="POST::sc_admin/template/changeTemplate">
                                        POST::sc_admin/template/changeTemplate</option>
                                    <option value="POST::sc_admin/template/remove">POST::sc_admin/template/remove
                                    </option>
                                    <option value="GET::sc_admin/template/online">GET::sc_admin/template/online</option>
                                    <option value="POST::sc_admin/template/online/install">
                                        POST::sc_admin/template/online/install</option>
                                    <option value="ANY::sc_admin/url_config/*">ANY::sc_admin/url_config/*</option>
                                    <option value="GET::sc_admin/url_config">GET::sc_admin/url_config</option>
                                    <option value="GET::sc_admin/url_config/create">GET::sc_admin/url_config/create
                                    </option>
                                    <option value="POST::sc_admin/url_config/create">POST::sc_admin/url_config/create
                                    </option>
                                    <option value="POST::sc_admin/url_config/ ">POST::sc_admin/url_config/ </option>
                                    <option value="POST::sc_admin/url_config/update_info">
                                        POST::sc_admin/url_config/update_info</option>
                                    <option value="ANY::sc_admin/user/*">ANY::sc_admin/user/*</option>
                                    <option value="GET::sc_admin/user">GET::sc_admin/user</option>
                                    <option value="GET::sc_admin/user/create">GET::sc_admin/user/create</option>
                                    <option value="POST::sc_admin/user/create">POST::sc_admin/user/create</option>
                                    <option value="GET::sc_admin/user/edit/{id}">GET::sc_admin/user/edit/{id}</option>
                                    <option value="POST::sc_admin/user/edit/{id}">POST::sc_admin/user/edit/{id}</option>
                                    <option value="POST::sc_admin/user/delete">POST::sc_admin/user/delete</option>
                                    <option value="ANY::sc_admin/weight_unit/*">ANY::sc_admin/weight_unit/*</option>
                                    <option value="GET::sc_admin/weight_unit">GET::sc_admin/weight_unit</option>
                                    <option value="GET::sc_admin/weight_unit/create">GET::sc_admin/weight_unit/create
                                    </option>
                                    <option value="POST::sc_admin/weight_unit/create">POST::sc_admin/weight_unit/create
                                    </option>
                                    <option value="GET::sc_admin/weight_unit/edit/{id}">
                                        GET::sc_admin/weight_unit/edit/{id}</option>
                                    <option value="POST::sc_admin/weight_unit/edit/{id}">
                                        POST::sc_admin/weight_unit/edit/{id}</option>
                                    <option value="POST::sc_admin/weight_unit/delete">POST::sc_admin/weight_unit/delete
                                    </option>
                                    <option value="ANY::sc_admin/*">ANY::sc_admin/*</option>
                                    <option value="GET::sc_admin">GET::sc_admin</option>
                                    <option value="ANY::sc_admin/cms_category/*">ANY::sc_admin/cms_category/*</option>
                                    <option value="GET::sc_admin/cms_category">GET::sc_admin/cms_category</option>
                                    <option value="GET::sc_admin/cms_category/create">GET::sc_admin/cms_category/create
                                    </option>
                                    <option value="POST::sc_admin/cms_category/create">
                                        POST::sc_admin/cms_category/create</option>
                                    <option value="GET::sc_admin/cms_category/edit/{id}">
                                        GET::sc_admin/cms_category/edit/{id}</option>
                                    <option value="POST::sc_admin/cms_category/edit/{id}">
                                        POST::sc_admin/cms_category/edit/{id}</option>
                                    <option value="POST::sc_admin/cms_category/delete">
                                        POST::sc_admin/cms_category/delete</option>
                                    <option value="ANY::sc_admin/cms_content/*">ANY::sc_admin/cms_content/*</option>
                                    <option value="GET::sc_admin/cms_content">GET::sc_admin/cms_content</option>
                                    <option value="GET::sc_admin/cms_content/create">GET::sc_admin/cms_content/create
                                    </option>
                                    <option value="POST::sc_admin/cms_content/create">POST::sc_admin/cms_content/create
                                    </option>
                                    <option value="GET::sc_admin/cms_content/edit/{id}">
                                        GET::sc_admin/cms_content/edit/{id}</option>
                                    <option value="POST::sc_admin/cms_content/edit/{id}">
                                        POST::sc_admin/cms_content/edit/{id}</option>
                                    <option value="POST::sc_admin/cms_content/delete">POST::sc_admin/cms_content/delete
                                    </option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                    style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--multiple" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                            <ul class="select2-selection__rendered">
                                                <li class="select2-search select2-search--inline"><input
                                                        class="select2-search__field" type="search" tabindex="0"
                                                        autocomplete="off" autocorrect="off" autocapitalize="none"
                                                        spellcheck="false" role="textbox" aria-autocomplete="list"
                                                        placeholder="HTTP method" style="width: 399.188px;"></li>
                                            </ul>
                                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
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
@endsection
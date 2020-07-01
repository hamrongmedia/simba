@extends('admin.layout')

@php
    $list_root = $list_menu->filter(function ($value) {
        return $value->parent_id == null;
    });
@endphp

@section('title')
  Quản lý Menu
@endsection

@section('css')

<link rel="stylesheet" href="{{ asset('admin/plugin/iconpicker/fontawesome-iconpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugin/nestable/jquery.nestable.min.css')}}">

<style>

    /* .dd-expand, .dd-collapse {
        top:10px;
    } */
    #menu-sort>.dd-list>li{
        background: #d2d6de;
        margin-bottom: 50px;
        padding-bottom: 10px;
    }

    #menu-sort>.dd-list>li>.dd-expand{
        top:10px;
    }
    #menu-sort>.dd-list>li>.dd-collapse{
        top:10px;
    }


    

    #menu-sort>.dd-list>li>.dd-handle{
        background: #3c8dbc;
        border-radius: 0;
        border: 1px solid #3c8dbc;
        height: 50px;
        line-height: 40px;
    }



</style>

@endsection

@section('main')
<div class="row">

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <div class="btn-group">
                        <a class="btn btn-warning btn-flat btn-sm menu-sort-save" title="Save"><i
                                class="fa fa-save"></i><span class="hidden-xs">&nbsp;Save</span></a>
                    </div>
                </h3>
            </div>

            <div class="box-body table-responsive no-padding box-primary">
                <div class="dd" id="menu-sort">
                    @include('admin.partials.menu_child', ['list' => $list_root])
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create menu</h3>

            </div>
                <form action="{{route('admin.menu.update',$menu->id)}}" method="post" accept-charset="UTF-8"
                class="form-horizontal" id="form-main" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="fields-group">

                        <div class="form-group   ">
                            <label for="name" class="col-sm-2 col-form-label">Parent</label>
                            <div class="col-sm-8">
                                <select class="form-control parent select2 select2-hidden-accessible"
                                    style="width: 100%;" name="parent_id" tabindex="-1" aria-hidden="true">
                                    <option value=""></option>
                                    <option value="" selected="">== ROOT ==</option>
                                    @php
                                        $parent = $menu->parent;
                                        function renderMenu($list, $order, $parent){
                                            foreach ($list as $item) {
                                                $line = '';
                                                for ($i=0; $i < $order; $i++) { 
                                                    $line = $line . '-';
                                                }
                                                if($parent->id == $item->id) echo  "<option selected value='".$item->id."'>" .$line.' '.$item->title. "</option>";
                                                else echo  "<option value='".$item->id."'>" .$line.' '.$item->title. "</option>";
                                                if($item->child){
                                                    $new_order = $order + 1;
                                                    renderMenu($item->child, $new_order, $parent);
                                                }
                                            }
                                        };
                                        renderMenu($list_root, 0, $parent);
                                    @endphp
                                </select>
                            </div>
                        </div>
                        <div class="form-group   ">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="text" id="title" name="title" value="{{$menu->title}}"
                                        class="form-control title" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="{{$menu->icon}}"></i></span>
                                    <input required="1" style="width: 140px" type="text" id="icon" name="icon" value="{{ $menu->icon }}" class="form-control icon" placeholder="Input Icon" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group   ">
                            <label for="uri" class="col-sm-2 col-form-label">Link</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="text" id="uri" name="link" value="{{$menu->link}}"
                                        class="form-control uri" placeholder="Example: admin.dashboard">
                                </div>
                            </div>
                        </div>
                        <div class="form-group    ">
                            <label for="sort" class="col-sm-2 col-form-label">Sort</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                    <input type="number" style="width: 100px;" id="sort" name="sort" value="{{$menu->sort}}"
                                        class="form-control input-sm sort" placeholder="">
                                </div>
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
<script src="{{ asset('admin/plugin/nestable/jquery.nestable.min.js')}}"></script>
<script src="{{ asset('admin/plugin/iconpicker/fontawesome-iconpicker.min.js')}}"></script>


<script>
    const MenuToast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000
    });

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });

    function saveTree(data){
        $.ajax({
            type: 'post',
            url: "{{route('admin.menu.savetree')}}",
            data: {
                jsonData:data,
            },
        }).done(function (result) {
            MenuToast.fire({
                type: 'success',
                title: 'Cập nhật menu thành công'
            })
        })
    }

    function deleteMenu(id) {
        $.ajax({
            type: 'post',
            url: "{{route('admin.menu.delete')}}",
            data: {
                id:id,
            },
        }).done(function (result) {
            MenuToast.fire({
                type: 'success',
                title: result.message
            })
        })
    }

    
    $('#menu-sort').nestable();
    $('.dd').on('change', function() {
    /* on change event */
        //var data = $('.dd').nestable('serialize');
        var data = $('.dd').nestable('serialize');
        console.log(data);
        saveTree(data);
    });
    //Initialize Select2 Elements
    $('.select2').select2();
    $('.icon').iconpicker();

    $('.dd-item .remove-menu').on('click', function(){
        let id = $(this).attr('data-id');
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((result) => {
                if (result.value) {
                    $(this).parent().parent().parent().remove();
                    deleteMenu(id);
                }
            })
    })
</script>
@endsection
@extends('admin.layout')
@section('title')
  Quản lý chuyên mục
@endsection

@section('main')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <div class="box-header with-border">
                </div>
                <div class="box-header with-border">
                    <div class="pull-right">
                        <div class="menu-right">
                            <a href="{{route('admin.category.create')}}" class="btn  btn-success  btn-flat" title="New"
                                id="button_create_new">
                                <i class="fa fa-plus" title="Add new"></i>
                            </a>
                        </div>
                    </div>

                </div>
                <section id="pjax-container" class="table-list">
                    @include('admin.pages.category.table')

                </section>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@endsection

@section('js')
<script>
    var type = 'sort';

    function deleteAjax(id) {
        $.ajax({
            url: "{{route('admin.category.destroy')}}",
            type: 'POST',
            data: {
                id: id
            }
        }).done(function () {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success',
            );
            $('#category-' + id).remove();
        })
    }


    function deleteItem(id) {
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
                    deleteAjax(id);
                }
            })
    }

    function multipleDelete() {
        let idList = [];
        let input = document.querySelectorAll('.table-checkbox:checked').forEach(function (item) {
            idList.push(item.getAttribute('data-id'));
        })

        if (idList.length > 0) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    idList.forEach(function (id) {
                        deleteAjax(id);
                    })
                }
            })
        }
    }
    
</script>
@endsection
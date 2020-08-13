@extends('admin.layout')

@section('title')
Cập nhật sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('admin.product.update', $data->id)}}" method="post" accept-charset="UTF-8" class="" id="form-main"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.pages.product.form')
    </form>
    <!-- end Modal -->
    <div id="add-new-product-variation-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><i class="til_img"></i><strong>Thêm biến thể mới</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body with-padding">
                    <form action="" method="POST" id="form-add-variation">
                        {{ csrf_field() }}
                        <div class="variation-form-wrapper">
                            <div class="row">
                                @if( count($product_attribute_map) > 0 )
                                    @foreach($product_attribute_map as $pam)
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="attribute-{{ $pam->id }}" class="text-title-field required" aria-required="true">{{  $pam->name }}</label>
                                                <div class="ui-select-wrapper">
                                                    <select class="ui-select form-control" id="attribute-{{ $pam->id }}" name="attribute_sets[{{ $loop->index }}]">
                                                        @foreach($pam->attributeValues as $atv)
                                                            <option value="{{ $atv->id }}">{{ $atv->value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="attribute-icon" class="text-title-field required" aria-required="true">
                                    Icon đại diện
                                </label>
                                <div class="variation-images clearfix">
                                    <div class="product-images-wrapper">
                                        <a href="#" class="add-new-product-image js-thumbnail-add-image" data-input="thumbnailedit" data-preview="holderedit">Chọn hình ảnh
                                        </a>
                                        <div class="images-wrapper">
                                            <input id="thumbnailedit" type="hidden" name="thumbnail" class="image-data" value="{{ $data->image_path }}">
                                            <div class="text-center">
                                                @if($data->image_path)
                                                    <img width="120" id="holderedit" class="preview_image" src="" type="text" name="filepath" alt="preview image">
                                                @else
                                                    <img width="120" id="holderedit" class="preview_image" src="{{ asset('template/images/placeholder.png') }}" type="text" name="filepath" alt="preview image">
                                                @endif
                                                <br>
                                                <p style="color:#c3cfd8">Chọn nút <strong>Chọn hình ảnh</strong> để thêm ảnh.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="variation-images clearfix">
                                <label for="attribute-images" class="required">
                                    Hình ảnh
                                </label>
                                <div class="product-images-wrapper clearfix">
                                    <a href="#" class="multi-image-variation add-new-product-image js-btn-trigger-add-image">
                                        Chọn hình ảnh
                                    </a>
                                    <div class="images-wrapper">
                                        <div class="text-center">
                                            <p style="color:#c3cfd8">Chọn nút <strong>Chọn hình ảnh</strong> để thêm ảnh.</p>
                                        </div>
                                    </div>
                                    <div class="images-show"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="float-left btn btn-warning" data-dismiss="modal">Hủy bỏ</button>
                    <a class="float-right btn btn-info" id="store-product-variation-button" href="#">Lưu thay đổi</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->
    <div id="edit-product-variation-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><i class="til_img"></i><strong>Chỉnh sửa biến thể</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body with-padding">
                    <div class="variation-form-wrapper"></div>
                </div>
                <div class="modal-footer">
                    <button class="float-left btn btn-warning" data-dismiss="modal">Hủy bỏ</button>
                    <a class="float-right btn btn-info" id="update-product-variation-button" href="#">Lưu thay đổi</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal -->
    <div id="generate-all-versions-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog    modal-xs  ">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title"><i class="til_img"></i><strong>Tạo tất cả các biến thể</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body with-padding">
                    Bạn có chắc chắn muốn tạo tất cả các biến thể cho sản phẩm này?
                </div>

                <div class="modal-footer">
                    <button class="float-left btn btn-warning" data-dismiss="modal">Hủy bỏ</button>
                    <a class="float-right btn btn-info" id="generate-all-versions-button" href="#">Tiếp tục</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('admin.pages.product.script')
<!-- DataTables -->
<script>
    $(document).ready(function(){
        form_attr = $('.box-body').find('.form-group--attribute');
        if(form_attr.children().length == 1){
            $('.remove-attribute').css('display', 'none');
        }
        $('.form-group--attribute').on('click', '.add-attribute', function(){
            form = $(this).parent().parent();
            html = form[0].outerHTML;
            form.parent().append(html);
            $('.remove-attribute').css('display', 'inline-block');
        })
        $('.form-group--attribute').on('click', '.remove-attribute', function(){
            form = $(this).parent().parent();
            html = form[0].outerHTML;
            form.remove();
            if(form_attr.children().length == 1){
                $('.remove-attribute').css('display', 'none');
            }
        })
        $('.form-group--attribute').on('change', ".select_attribute", function(){
            if($(this).val()!=''){
                el = $(this);
                $.ajax({
                    url: "{{route('ajaxGetValue')}}",
                    method: "GET",
                    data: {
                        id: $(this).val(),
                    },
                    success: function(result){
                        values = result.data;
                        html = '<option value="" disabled selected>Chọn giá trị cho thuộc tính</option>';
                        $.each(values, function(index, value){
                            html += "<option value='"+value.id+"'>"+value.value+"</option>"
                        });
                        el.parent().parent().find('.select_value').html(html);
                    }
                })
            }
            console.log($(this).val());
        });
        // Logic product
        function createSlug(name,model) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route('slug.create') }}',
                type: 'POST',
                data: {
                    name: name,
                    model: model,
                },
                success: (data) => {
                    if(data.status) {
                        $('input[name="slug"]').val(data.data);
                    }
                },
                error: (data) => {
                    alert(data.msg)
                }
            });            
        }
        $('input[name="name"]').blur(() => {
            let name = $('input[name="name"]').val();
            let model = 'product';
            if (name !== null && name !== '') {
                createSlug(name, model);
            }
        });

        $('button[name="save"]').click(() => {
            let name = $('input[name="name"]').val();
            let model = 'product';
            if (name !== null && name !== '') {
                createSlug(name, model);
            }
        });

        $(document).on("change", ".product-select-attribute-item", (function() {
            var e = [];
            $.each($(".product-select-attribute-item"), (function(t, a) {
                "" !== $(a).val() && e.push(t)
            })), e.length ? $(".btn-trigger-add-attribute-to-simple-product").removeClass("hidden") : $(".btn-trigger-add-attribute-to-simple-product").addClass("hidden")
        }));
        $(document).on("change", ".product-select-attribute-item", (function(t) {
            $(t.currentTarget).closest(".product-attribute-set-item").find(".product-select-attribute-item-value-wrap").html($(".list-product-attribute-values-wrap .product-select-attribute-item-value-wrap-" + $(t.currentTarget).val()).html()), $(t.currentTarget).closest(".product-attribute-set-item").find(".product-select-attribute-item-value-id-" + $(t.currentTarget).val()).prop("name", "added_attributes[" + $(t.currentTarget).val() + "]")
        }));

        $(document).on("click", ".product-set-item-delete-action a", (function(t) {
            t.preventDefault(), $(t.currentTarget).closest(".product-attribute-set-item").remove();
            var a = $(".list-product-attribute-wrap-detail");
            a.find(".product-attribute-set-item").length < 2 && $(".product-set-item-delete-action").addClass("hidden"), 
            a.find(".product-attribute-set-item").length < $(".list-product-attribute-values-wrap .product-select-attribute-item-wrap-template").length && $(".btn-trigger-add-attribute-item").removeClass("hidden")
        }))
        
        $(document).on("click", ".btn-trigger-add-attribute-item", (function(t) {
            t.preventDefault();
            var a = $(".list-product-attribute-values-wrap .product-select-attribute-item-template"),
                r = null;
            $.each($(".product-attribute-set-item:visible .product-select-attribute-item option"), (function(e, t) {
                $(t).prop("value") !== $(t).closest("select").val() && !1 === $(t).prop("disabled") && (a.find(".product-select-attribute-item-value-wrap").html($(".list-product-attribute-values-wrap .product-select-attribute-item-value-wrap-" + $(t).prop("value")).html()), 
                r = $(t).prop("value"))
            }));
            var n = $(".list-product-attribute-wrap-detail");
            n.append(a.html()), 
            n.find(".product-attribute-set-item:last-child .product-select-attribute-item").val(r), 
            n.find(".product-select-attribute-item-value-id-" + r).prop("name", "added_attributes[" + r + "]"), 
            n.find(".product-attribute-set-item").length === $(".list-product-attribute-values-wrap .product-select-attribute-item-wrap-template").length 
                && $(t.currentTarget).addClass("hidden"), 
                $(".product-set-item-delete-action").removeClass("hidden")
        }))
    })
</script>
<script>
    $(document).ready(function(){
        form_attr = $('.box-body').find('.form-group--attribute');
        if(form_attr.children().length == 1){
            $('.remove-attribute').css('display', 'none');
        }
        $('.form-group--attribute').on('click', '.add-attribute', function(){
            form = $(this).parent().parent();
            html = form[0].outerHTML;
            form.parent().append(html);
            $('.remove-attribute').css('display', 'inline-block');
        })
        $('.form-group--attribute').on('click', '.remove-attribute', function(){
            form = $(this).parent().parent();
            html = form[0].outerHTML;
            form.remove();
            if(form_attr.children().length == 1){
                $('.remove-attribute').css('display', 'none');
            }
        })

        $('.form-group--attribute').on('change', ".select_attribute", function(){
            if($(this).val()!=''){
                el = $(this);
                $.ajax({
                    url: "{{route('ajaxGetValue')}}",
                    method: "GET",
                    data: {
                        id: $(this).val(),
                    },
                    success: function(result){
                        values = result.data;
                        html = '<option value="" disabled selected>Chọn giá trị cho thuộc tính</option>';
                        $.each(values, function(index, value){
                            html += "<option value='"+value.id+"'>"+value.value+"</option>"
                        });
                        el.parent().parent().find('.select_value').html(html);
                    }
                })
            }
        })

        $.each($('.form-group--attribute').find('.select_attribute'), function(){
            el = $(this);
            $.ajax({
                url: "{{route('ajaxGetValue')}}",
                method: "GET",
                data: {
                    id: $(this).val(),
                },
                success: function(result){
                    values = result.data;
                    attr_val = el.parent().parent().find('.select_value').attr('data');
                    html = '<option value="" disabled>Chọn giá trị cho thuộc tính</option>';
                    $.each(values, function(index, value){
                        if(attr_val == value.id)
                            html += "<option value='"+value.id+"' selected>"+value.value+"</option>"
                        else html += "<option value='"+value.id+"'>"+value.value+"</option>"
                    });
                    el.parent().parent().find('.select_value').html(html);
                }
            })
        });

        $('#select-category').val({{json_encode($data->getCategories())}}); // Select the option with a value of '1'
        $('#select-category').trigger('change');
        $(".imgAdd").click(function(){
            $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
        });
    });
    function removeAtrImage() {
        $(this).parents('.item-prev').remove();
    }
    $(window).on("load", (function() {
        $.fn.customthumbnailfilemanager = function(type, options) {
            type = type || 'file';

            this.on('click', function(e) {
              var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
              var target_input = $('#' + $(this).data('input'));
              var target_preview = $('#' + $(this).data('preview'));
              window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
              window.SetUrl = function (items) {
                var file_path = items.map(function (item) {
                  return item.url;
                }).join(',');

                // set the value of the desired input to image url
                target_input.val('').val(file_path).trigger('change');

                // clear previous preview
                target_preview.html('');

                // set or change the preview image src
                items.forEach(function (item) {
                   $(target_preview).attr('src', item.thumb_url);
                });

                // trigger change event
                target_preview.trigger('change');
              };
              return false;
            });
        }
        $('.js-thumbnail-add-image').customthumbnailfilemanager('image');

        $.fn.customfilemanager = function(type, options) {
            type = type || 'file';

            this.on('click', function(e) {
              var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
              var target_input = $('#' + $(this).data('input'));
              var target_preview = $('#' + $(this).data('preview'));
              window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
              window.SetUrl = function (items) {
                var file_path = items.map(function (item) {
                  return item.url;
                }).join(',');

                // set the value of the desired input to image url
                target_input.val('').val(file_path).trigger('change');

                // clear previous preview
                target_preview.html('');

                // set or change the preview image src
                items.forEach(function (item) {
                    $('.images-show').append('<div class="item-prev"><div class="atr-image"><img src="'+item.url+'"/></div><div class="atr-elm"><input type="hidden" name="product_images[]" value="'+item.url+'"><a class="atr-remove" href="javascript:void(0);" onclick="removeAtrImage()" data-dz-remove="">Xóa hình ảnh</a></div></div>');
                    // $(target_preview).attr('src', item.thumb_url);
                });

                // trigger change event
                target_preview.trigger('change');
              };
              return false;
            });
        }
        $('.js-btn-trigger-add-image').customfilemanager('image');

        function boloa()
        {
           $('.js-btn-trigger-add-image').customfilemanager('image'); 
        }

        $(document).on("click", ".btn-trigger-select-product-attributes", (function(e) {
            e.preventDefault();
            $("#store-related-attributes-button").data("target", $(e.currentTarget).data("target") );
            $("#select-attribute-sets-modal").modal("show");
        }));
        $(document).on("click", "#store-product-variation-button", (function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("form-add-variation"));
            var url = '{{ route('admin.product.info.store',['id'=>$data->id]) }}';
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#form-add-variation p.error').remove();
                    if(data.status == true) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                          });

                        Toast.fire({
                            type: 'success',
                            title: 'Thêm biến thể thành công'
                        })
                        $("#product-variations-wrapper").html(data.data);
                        $('#add-new-product-variation-modal').modal('toggle');
                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                          });

                        Toast.fire({
                            type: 'warning',
                            title: data.msg
                        })                        
                    }
                },
                error: function (data) {
                    $('#form-add-variation p.error').remove();
                    var errors = data.responseText;
                        errors = JSON.parse(errors);
                    $.each(errors.errors, function (key, value) {
                        if( key == 'product_images') {
                            $('.multi-image-variation').after('<p class="error">' + value[0] + '</p>');
                        } else {
                            $('#form-add-variation input[name="'+key+'"]').after('<p class="error">' + value[0] + '</p>');
                        }
                    });
                }
            });
        }));
        // 
        $(document).on("click", ".btn-trigger-add-new-product-variation", (function(e) {
            e.preventDefault(), 
            $("#store-product-variation-button").data("target", $(e.currentTarget).data("target")), 
            $("#add-new-product-variation-modal").modal("show")
        }));
        $(document).on("click", ".btn-trigger-generate-all-versions", (function(e) {
            e.preventDefault(), 
            $('#generate-all-versions-modal').modal('show');
        }));
        $(document).on("click", "#generate-all-versions-button", (function(e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("form-add-variation"));
            var url = '{{ route('admin.product.info.all',['id'=>$data->id]) }}';
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#generate-all-versions-modal').modal('hide');
                    if(data.status == true) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                          });

                        Toast.fire({
                            type: 'success',
                            title: 'Tạo tất cả các biến thể thành công'
                        });
                        $("#product-variations-wrapper").html(data.data);                        
                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                          });

                        Toast.fire({
                            type: 'warning',
                            title: data.msg
                        })
                    }
                },
                error: function (data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      });

                    Toast.fire({
                        type: 'warning',
                        title: 'Thất bại'
                    })
                }
            });
        }));        
    }));
    function OpenWindow(query, w, h, scroll) {
        var l = (screen.width - w) / 2;
        var t = (screen.height - h) / 2;

        winprops = 'resizable=1, height=' + h + ',width=' + w + ',top=' + t + ',left=' + l + 'w';
        if (scroll) winprops += ',scrollbars=1';
        var f = window.open(query, "_blank", winprops);
        f.window.focus();
        f.onbeforeunload = function(){ /* my code */ 
            console.log('vao day');
            popupCallback();
        }
    }
    function popupCallback(){
        var product_id = {{ $data->id }};
        url_reload = '{{ route('admin.product.info.reload') }}';
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: url_reload,
            data: {
                product_id : product_id
            },
            dataType: 'json',
            success: function (data){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });
                Toast.fire({
                    type: 'success',
                    title: 'Chỉnh sửa biến thể thành công'
                });
                console.log(data);
                $("#product-variations-wrapper").html(data.data);
            },
            error: function (data) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });
                Toast.fire({
                    type: 'error',
                    title: 'Không thể chỉnh sửa biến thể'
                });
            }
        });
    }
    function deleteVarition(id , product_id)
    {
        Swal.fire({
            title: 'Bạn có chắc chắn không?',
            text: 'Bạn có chắc chắn muốn xóa biến thể này? Hành động này không thể hoàn tác.',
            type: 'warning',
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Xác nhận",
            cancelButtonText: "Hủy",
            preConfirm: function() {
                url_delete = '{{ route('admin.product.info.delete') }}';
                jQuery.ajax({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: url_delete,
                    data: {
                        id : id,
                        product_id : product_id,
                    },
                    dataType: 'json',
                    success: function (data){
                        Swal.fire( 'Thành công!','Bạn đã xóa biến thể thành công','success' );
                        $("#product-variations-wrapper").html(data.data);
                    },
                    error: function (data) {
                        Swal.fire( 'Thất bại!','Không thể xóa biến thể','error' );
                    }
                });
            }
        });
    }
</script>
@include('admin.component.ckeditor_js')
@endsection
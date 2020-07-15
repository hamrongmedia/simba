<script src="{{ asset('admin/js/jquery.inputmask.min.js') }}"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    $("#dropzone").dropzone({
        maxFilesize: 10,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        previewsContainer: ".dropzone-previews",
        dictDefaultMessage: '<i class="fa fa-cloud-upload fa-3x text-ec-lightGray mx-3 align-middle" aria-hidden="true"></i> <span class="btn-upload-dropzon"> Kéo thả hình ảnh</span>',
        dictRemoveFile: 'Xóa hình ảnh',
        url: "{{ route('admin.product.image.upload') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        thumbnail: function (file, dataUrl) {
            if (file.previewElement) {
                file.previewElement.classList.remove("dz-file-preview");
                var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                for (var i = 0; i < images.length; i++) {
                    var thumbnailElement = images[i];
                    thumbnailElement.alt = file.name;
                    thumbnailElement.src = dataUrl;
                }
                setTimeout(function () {
                    file.previewElement.classList.add("dz-image-preview");
                }, 1);
            }
        },
        init: function () {
            @if(isset($data) && $data->productImage())
                @foreach($data->productImage()->orderBy('sort_order', 'asc')->get() as $product_image)
                    var myDropzone = this;
                    var mockFile = {
                        name: '{{ $product_image->image_file  }}',
                        size: 120
                    };
                    // Call the default addedfile event handler
                    myDropzone.options.addedfile.call(myDropzone, mockFile);
                    myDropzone.options.thumbnail.call(myDropzone, mockFile, '{{ Storage::url($product_image->image_file) }}');
                    // Init Image
                    var element_add = $("div.dz-preview").last();
                    element_add.append('<input type="hidden" name="product_images[]" value="{{ $product_image->image_file }}">');
                @endforeach
            @endif
        },
        uploadprogress: function (file, progress, bytesSent) {
            // Display the progress
        },
        removedfile: function (file) {
            var name = file.name;
            var image_item = $('input[name="product_images[]"]');
            var element_delete = file.previewElement;
            var el_delete = $(element_delete).find(image_item).val();
            if (el_delete) {
                $('.dropzone-deletes').append('<input type="hidden" name="delete_images[]" value="' + el_delete + '">');
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{ route("admin.product.image.remove") }}',
                data: {
                    filename: name,
                    el_delete: el_delete
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (e) {
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ? fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function (file, response) {
            console.log('vao day');
            var element_add = file.previewElement;
            $(element_add).append('<input type="hidden" name="product_images[]" value="' + response.data + '">');
        },
        error: function (file, response) {
            console.log('vao day 2');
            return false;
        }
    });
    $(function () {
        $(".dropzone-previews").sortable({
            items: '.dz-preview',
            cursor: 'move',
            opacity: 0.5,
            containment: '.dropzone-previews',
            distance: 20,
            tolerance: 'pointer'
        });
    });
    $(".inputmask").inputmask({
        alias: "numeric",
        rightAlign: !1,
        digits: 2,
        groupSeparator: ",",
        placeholder: "0",
        autoGroup: !0,
        autoUnmask: !0,
        removeMaskOnSubmit: !0
    });
    $('.switch-assign').on('change.bootstrapSwitch', function () {
        console.log("inside switchchange");
    });
    $(window).on("load", (function() {
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
                    $(target_preview).attr('src', item.thumb_url);
                });

                // trigger change event
                target_preview.trigger('change');
              };
              return false;
            });
        }
         $('.js-btn-trigger-add-image').customfilemanager('image');

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
                    if(data.status) {
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
                        $("#product-variations-wrapper").html(data);
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
                        $('#form-add-variation input[name="'+key+'"]').after('<p class="error">' + value[0] + '</p>');
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
    }));
</script>
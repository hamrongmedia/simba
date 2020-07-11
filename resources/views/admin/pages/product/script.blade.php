<script type="text/javascript">
    Dropzone.autoDiscover = false;
    $("#dropzone").dropzone({
        maxFilesize: 10,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        previewsContainer: ".dropzone-previews",
        dictDefaultMessage: '<i class="fa fa-cloud-upload fa-3x text-ec-lightGray mx-3 align-middle" aria-hidden="true"></i> <span class="btn-upload-dropzon"> Kéo thả hình ảnh</span>',
        dictRemoveFile: 'Xóa hình ảnh',
        url: "{{ route('slug.create') }}",
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
                    myDropzone.options.thumbnail.call(myDropzone, mockFile, '{{ URL::asset($product_image->image_file) }}');
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
                url: '{{ route("slug.create") }}',
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
            var element_add = file.previewElement;
            $(element_add).append('<input type="hidden" name="product_images[]" value="' + response.data + '">');
        },
        error: function (file, response) {
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
</script>
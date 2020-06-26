<!--ckeditor-->
{{-- <script src="{{ asset('public/admin/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/admin/js/ckeditor/jquery.js') }}"></script> --}}
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/file?type=Images',
        filebrowserImageUploadUrl: '/file/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/file?type=Files',
        filebrowserUploadUrl: '/file/upload?type=Files&_token='
    };

    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor', options);
    })
</script>
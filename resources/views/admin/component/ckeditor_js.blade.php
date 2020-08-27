<!--ckeditor-->
{{-- <script src="{{ asset('public/admin/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/admin/js/ckeditor/jquery.js') }}"></script> --}}
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>

<script>
    var options = {
        filebrowserImageBrowseUrl: '/filemanager?type=Images',
        filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/filemanager?type=Files',
        filebrowserUploadUrl: '/filemanager/upload?type=Files&_token=',
        allowedContent: true
    };

    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.editorConfig = function(config) {
            config.extraAllowedContent = true;
        };
        $('.ck-textarea').each(function(){
            if ($(this).attr('id')) {
                CKEDITOR.replace($(this).attr('id'));
            }
        });

        
        CKEDITOR.replace('editor', options);
        
    })
</script>
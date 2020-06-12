<!--ckeditor-->
{{-- <script src="{{ asset('public/admin/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/admin/js/ckeditor/jquery.js') }}"></script> --}}
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor')
})
</script>
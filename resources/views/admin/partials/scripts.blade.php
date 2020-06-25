<!-- jQuery 3 -->
<script src="{{ asset('admin/AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('js\jquery-3.4.1.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('admin/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('admin/AdminLTE/dist/js/adminlte.min.js')}}"></script>
{{-- sweetalert2 --}}
<script src="{{ asset('admin/plugin/sweetalert2.all.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('/admin/adminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<!-- iCheck -->
<script src="{{ asset('admin/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/AdminLTE/dist/js/demo.js')}}"></script>

<script>
    //Initialize Select2 Elements
    $('.select2').select2()

    $(function () {
        $('.input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
        });
    });
</script>
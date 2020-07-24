<!-- jQuery 3 -->
<script src="{{ asset('template/AdminLTE/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('js\jquery-3.4.1.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('template/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('template/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('template/AdminLTE/dist/js/adminlte.min.js')}}"></script>
{{-- sweetalert2 --}}
<script src="{{ asset('template/plugin/sweetalert2.all.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('/template/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<!-- iCheck -->
<script src="{{ asset('template/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/AdminLTE/dist/js/demo.js')}}"></script>
<script src="{{ asset('template/js/dropzone.js') }}"></script>
<!--image button-->
<script src="{{asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>


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
    
   // Select row
    $(function () {
        //Enable check and uncheck all functionality
        $(".grid-select-all").click(function () {
        var clicks = $(this).data('clicks');
        if (clicks) {
            //Uncheck all checkboxes
            $(".box-body input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
        } else {
            //Check all checkboxes
            $(".box-body input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
        }
        $(this).data("clicks", !clicks);
        });
    });
// == end select row

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
});

// hightlight menu
const treeMenu = document.querySelectorAll('.sidebar-menu>li');
let url = location.href;
treeMenu.forEach(function (item) {
    item.querySelectorAll('a').forEach(function (link) {
        if (link.getAttribute('href') == url) {
            item.classList.add('active');
        }
    })
})
</script>
@extends('admin.layout')

@section('title')
Tạo sản phẩm
@endsection

@section('main')
<div class="row">
    <form action="{{route('admin.product.store')}}" method="post" accept-charset="UTF-8" class="" id="form-main" enctype="multipart/form-data">
        @csrf
        <!-- {{ csrf_field() }} -->
        @include('admin.pages.product.form')
    </form>
</div>
@endsection
@section('js')
<!-- DataTables -->
@include('admin.pages.product.script')
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
                console.log('vao day');
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
@include('admin.component.ckeditor_js')
@endsection
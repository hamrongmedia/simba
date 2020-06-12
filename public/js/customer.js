jQuery(document).ready(function($) {
    $(document).ready(function(){
        var stickyTop = $("#sticky-wrapper").offset().top;
        jQuery(window).scroll(function(){
            if (jQuery(window).scrollTop() > stickyTop){
                jQuery('.sticky-wrapper').addClass('header-sticky');
            }
            else{
                jQuery('.sticky-wrapper').removeClass('header-sticky');
            }
        });
    });
    $(".btn-click-cart").click( function (){
        $("#site-cart").addClass("active");
    });
    $("#site-close-handle").click( function (){
        $("#site-cart").removeClass("active");
    });
    $(".btn-search-mb").click(function () {
        $(this).toggleClass("open");
        $(".wp-box-search-mb").slideToggle( "fast", function() {
        });
    });



    jQuery('.mobile-main-menu .menu-item-has-children > a').after('<i class="fa fa-plus fa1" aria-hidden="true"></i>');

    jQuery('.mobile-main-menu .menu-item-has-children .fa1').click( function () {
        jQuery(this).closest('li').children('.sub-menu').toggle(600);
        jQuery(this).toggleClass('fa1');
    });




    $('.wp-menu-mobile').click( function(){
         $('.mobile-main-menu').slideToggle(200);
         $('.wp-main-header').toggleClass('bg-white');
    });

    // $('.ng-has-child1 .ul-has-child1 .ng-has-child2 a .fa2').on('click', function(e){
    //     e.preventDefault();
    //     var $this = $(this);
    //     $this.parents('.ng-has-child1 .ul-has-child1 .ng-has-child2').find('.ul-has-child2').stop().slideToggle();
    //     $(this).toggleClass('active')
    //     return false;
    // });
    //xóa cart
    // $(document).on('click', '.delete_item', function () {
    //     var idprd = $(this).parent().find('.ajax-quantity').val();
    //     ajax_cart_update_delete(idprd);
    //     return false;
    // });
    // function ajax_cart_update_delete(idprd) {
    //     $.post('https://venuscharm.vn/products/ajax/cart/deletecartv.html', {idprd: idprd}, function (data) {
    //         var price = JSON.parse(data);
    //         $('#ajax-cart-form').html(price.html);
    //         $('#total-view-cart').html(price.total);
    //         $('#qtotalitems').html(price.item);
    //     });
    // }
    // //end xóa cart
    // //thêm vào giỏ hàng
    // $(document).on('click', '.ajax-addtocart', function () {
    //     var product = $(this);
    //     $.post('products/ajax/cart/addtocartv', {
    //         id : product.attr('data-id'),
    //         quantity : product.attr('data-quantity'),
    //         color : product.attr('data-color'),
    //         size : product.attr('data-size'),
    //         price : product.attr('data-price'),
    //         sanpham : product.attr('data-sanpham'),
    //     },function(data){
    //         var json = JSON.parse(data);
    //         if(json.error == 1){
    //             $('.error_size').html('Vui lòng chọn size');

    //         }else{
    //             $('#ajax-cart-form').html(json.html);
    //             $('#total-view-cart').html(json.total);
    //             $('#qtotalitems').html(json.item);
    //             $("#site-cart").addClass("active");
                
    //             //Gtag nút mua ngay
    //             gtag_report_conversion(window.location.href);
    //         }


    //     });
    // });

    $(".btn-click-dosize").click(function () {
        var value_chieucao = $('#value_chieucao').val();
        var value_cannang = $('#value_cannang').val();
        var value_vong1 = $('#value_vong1').val();
        test_size(value_chieucao, value_cannang, value_vong1);
        return false;
    });
    // function test_size(value_chieucao, value_cannang, value_vong1) {
    //     $.post('', {
    //         value_chieucao: value_chieucao,
    //         value_cannang: value_cannang,
    //         value_vong1: value_vong1
    //     }, function (data) {
    //         var json = JSON.parse(data);
    //         $('#form-view-2').html(json.html);
    //         $(".wp-list-form-dosize").find(".form-1").addClass("hidden");
    //         $(".wp-list-form-dosize").find(".form-2").addClass("active");
    //     });
    // }
    $('input[name="participants"]').rangeslider({
        polyfill: false, onInit: function () {
            $handle = $('.rangeslider-group1 .rangeslider__handle');
            updateHandle($handle[0], this.value);
            $('#value_chieucao').val(this.value);
        }
    }).on('input', function () {
        updateHandle($handle[0], this.value);
        $('#value_chieucao').val(this.value);
    });
    $('input[name="participants2"]').rangeslider({
        polyfill: false, onInit: function () {
            $handle2 = $('.rangeslider-group2 .rangeslider__handle');
            updateHandle($handle2[0], this.value);
            $('#value_cannang').val(this.value);
        }
    }).on('input', function () {
        updateHandle($handle2[0], this.value);
        $('#value_cannang').val(this.value);
    });
    $('input[name="participants3"]').rangeslider({
        polyfill: false, onInit: function () {
            $handle3 = $('.rangeslider-group3 .rangeslider__handle');
            updateHandle($handle3[0], this.value);
            $('#value_vong1').val(this.value);
        }
    }).on('input', function () {
        updateHandle($handle3[0], this.value);
        $('#value_vong1').val(this.value);
    });
    function updateHandle(el, val) {
        el.textContent = val;
    }


    if($(window).width() < 768) {
        $(".wp-ft-main").click(function () {
            $(this).toggleClass("open");
            $(this).find(".list-ft-main").slideToggle("slow", function () {
            });
        });
    }


    $(".btn-chinhsua-lai").click( function() {
        $(".wp-list-form-dosize").find(".form-1").removeClass("hidden");
        $(".wp-list-form-dosize").find(".form-2").removeClass("active");
    });
     $(".btn-click-dosize").click( function() {
        $(".wp-list-form-dosize").find(".form-1").addClass("hidden");
        $(".wp-list-form-dosize").find(".form-2").addClass("active");
    });
    $(".closedong").click( function() { 
        $(".wp-list-form-dosize").find(".form-1").removeClass("hidden");
        $(".wp-list-form-dosize").find(".form-2").removeClass("active");
    });

    $(".btn-click-boloc").click( function (){
        $('body, html').addClass("active");
        $(this).parent().addClass("open");
        $(this).parent().find(".wp-bo-loc-1").addClass("open");
    });

    $(".close-fil").click( function (){
        $('body, html').removeClass("active");

        $(this).parent().removeClass("open");

        $(this).parent().find(".wp-bo-loc-1").removeClass("open");

    });
    

    $(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 2,
        vertical: true,
    });

    $('.slide-uudai').owlCarousel({
        loop:true,
        margin:1,
        dots:false,
        nav:false,
        autoplay:true,
        autoplayTimeout:5000,
        autoplaySpeed:1200,
        smartSpeed:1200,
        responsive:{
            0:{

                items:2

            },
            320:{

                items:2

            },
            767:{

                items:3

            },
            1000:{

                items:3

            }
        }
    });

    // js sản phẩm
    $(".list-color-sp li").click( function() {
        $(this).parents(".list-color-sp").find(".item-color").removeClass('active');
        $(this).addClass('active');
    });


    $(".list-color-sp li").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main").removeClass('active');
    });
    $(".list-color-sp li:nth-child(1)").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main:nth-child(1)").addClass('active');
    });
    $(".list-color-sp li:nth-child(2)").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main:nth-child(2)").addClass('active');
    });
    $(".list-color-sp li:nth-child(3)").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main:nth-child(3)").addClass('active');
    });
    $(".list-color-sp li:nth-child(4)").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main:nth-child(4)").addClass('active');
    });
    $(".list-color-sp li:nth-child(5)").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main:nth-child(5)").addClass('active');
    });
    $(".list-color-sp li:nth-child(6)").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main:nth-child(6)").addClass('active');
    });
    $(".list-color-sp li:nth-child(7)").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main:nth-child(7)").addClass('active');
    });
    $(".list-color-sp li:nth-child(8)").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main:nth-child(8)").addClass('active');
    });
    $(".list-color-sp li:nth-child(9)").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main:nth-child(9)").addClass('active');
    });
    $(".list-color-sp li:nth-child(10)").click( function() {
        $(this).parents(".wp-item-sp").find(".wp-item-sp-main:nth-child(10)").addClass('active');
    });

    // function stick(id, el_class, offset_top, stick, unstick) {
    //     if ($(id).length > 0) {
    //         $(id).stick_in_parent({
    //             sticky_class: el_class,
    //             offset_top: offset_top
    //         }).on("sticky_kit:stick", function (e) {
    //             $(stick).hide();
    //         }).on("sticky_kit:unstick", function (e) {
    //             $(unstick).show();
    //         });
    //     }
    // };    /*---------- Cố định menu dọc trang danh sách sản phẩm khi scroll ----------*/
    // stick(".pca-pl-r", "fixed-menu", 1, "", "");

    $('.slide-sp-title').owlCarousel({
        loop:true,
        margin:0,
        dots:false,
        nav:true,
        autoplay:false,
        autoplayTimeout:3000,
        autoplaySpeed:1200,
        smartSpeed:1200,
        responsive:{
            0:{
                items:3,
                
            },
            600:{
                items:5
            },
            1000:{

                items:5
            }
        }

    });

    $('.slide-sp').owlCarousel({
        loop:true,
        margin:0,
        dots:false,
        nav:true,
        autoplay:false,
        autoplayTimeout:3000,
        autoplaySpeed:1200,
        smartSpeed:1200,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    $('.slide-sp-mobile').owlCarousel({
        loop:true,margin:0,
        dots:true,
        nav:true,
        autoplay:false,
        autoplayTimeout:3000,
        autoplaySpeed:1200,
        smartSpeed:1200,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
});

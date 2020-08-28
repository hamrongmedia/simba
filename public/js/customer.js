$(function () {
    changeColor();
    $(".wp-img-ctsp").on("click", ".wp-chonmau li a", function () {
        $(this).tab("show");
    });
    $(".wp-img-ctsp").on("click", ".wp-text-right li", function () {
        $(this).addClass("active").siblings().removeClass("active");
        var colorId;
        var sizeId;
        changeColor();
        colorId = $(this).attr("data-color");
        $(".add_bag_size")
            .find("li")
            .each(function () {
                if ($(this).hasClass("active")) {
                    sizeId = $(this).attr("data-size");
                    $(".sizeError").hide();
                }
            });
    });

    siteCloseHandle();

    // Add To Cart
    $(document).on("click", ".ajax-addtocart", function () {
        var product_type = $(this).data("product-type");
        // Case When Product Attribute
        if (product_type == 2 && $(".wp-chonsize").length > 0) {
            if (!validateChooseSize()) {
                return;
            }
        }
        var params = getDetailGoodsParams();
        var url = $(this).data("href");
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            url: url,
            type: "POST",
            data: params,
            success: (data) => {
                console.log(data.data.total_quantity);
                $("#site-cart").html(data.data.data);
                $(".wp-cart .cout-cart").text(data.data.total_quantity);
                $("#site-cart").addClass("active");
            },
            error: (data) => {
                alert(data.msg);
            },
        });
    });

    function validateChooseSize() {
        var sizeId = $(".add_bag_size li.active").data("size");
        var colorId = $(".add_bag_color li.active").data("color");
        var colorName = $(".add_bag_color li.active a").attr("title");
        var sizeName = $(".add_bag_size li.active").html();
        var productId = $("#productId").val();
        var productType = $(".ajax-addtocart").data("product-type");
        if (sizeId == undefined) {
            $(".sizeError").show();
            $(".add_bag_size").addClass("errorAnimate");
            setTimeout(function () {
                $(".add_bag_size").removeClass("errorAnimate");
            }, 1000);
            return false;
        }
        return true;
    }
});

function getDetailGoodsParams() {
    var goodsParams = {};
    goodsParams.productId = $("#productId").val();
    goodsParams.quantity = 1;
    goodsParams.colorId = $(".add_bag_color .active").attr("data-color");
    goodsParams.color = $(".add_bag_color .active").find("a").attr("title");
    goodsParams.sizeId = $(".add_bag_size .active").attr("data-size");
    goodsParams.size = $(".add_bag_size .active").text();
    return goodsParams;
}

function changeColor() {
    var _this = $(".add_bag_color li.active");
    var hasActiveSize = false;
    var sizeId = $(".add_bag_size li.active").data("size");
    $(".add_bag_size li").each(function (index) {
        if (
            $(_this).attr("data-sizeids") != undefined &&
            $(_this)
                .attr("data-sizeids")
                .indexOf("|" + $(this).attr("data-size") + "|") == -1
        ) {
            $(this).css("display", "none");
            $(this).removeClass("active");
        } else {
            $(this).css("display", "");
        }
        if ($(this).hasClass("active")) {
            sizeId = $(this).attr("data-size");
            hasActiveSize = true;
        }
    });
    if (!hasActiveSize) {
        $(".add_bag_size li").each(function (index) {
            if (
                $(_this).attr("data-sizeids") != undefined &&
                $(_this)
                    .attr("data-sizeids")
                    .indexOf("|" + $(this).attr("data-size") + "|") > -1
            ) {
                sizeId = $(this).attr("data-size");
            }
        });
    }
}

// Trigger Cart
function siteCloseHandle() {
    $("#site-cart").removeClass("active");
}
// Remove Product From Cart Item
function removeCartItem(cart_item_id, url_delete) {
    $(".delete_item").click(function () {
        var current_target = $(this);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            type: "POST",
            url: url_delete,
            data: {
                cart_item_id: cart_item_id,
            },
            dataType: "json",
            success: function (data) {
                $("#qtotalitems b").text(data.data.total_quantity);
                $(".wp-cart .cout-cart").text(data.data.total_quantity);
                $(current_target).parents("tr.item-cart").remove();
            },
            error: function (data) {},
        });
    });
}
// Remove Product From Cart
function removeProductCart(product_id, url_delete) {
    $(".delete_item").click(function () {
        var current_target = $(this);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            type: "POST",
            url: url_delete,
            data: {
                product_id: product_id,
            },
            dataType: "json",
            success: function (data) {
                $(current_target).parents("tr.item-cart").remove();
            },
            error: function (data) {},
        });
    });
}

// Trigger Cart
function siteCloseHandle() {
    $("#site-cart").removeClass("active");
}
// Remove Product From Cart Item
function removeCartItem(cart_item_id, url_delete) {
    $(".delete_item").click(function () {
        var current_target = $(this);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            type: "POST",
            url: url_delete,
            data: {
                cart_item_id: cart_item_id,
            },
            dataType: "json",
            success: function (data) {
                $("#qtotalitems b").text(data.data.total_quantity);
                $(".wp-cart .cout-cart").text(data.data.total_quantity);
                $(current_target).parents("tr.item-cart").remove();
            },
            error: function (data) {},
        });
    });
}
// Remove Product From Cart
function removeProductCart(product_id, url_delete) {
    $(".delete_item").click(function () {
        var current_target = $(this);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            type: "POST",
            url: url_delete,
            data: {
                product_id: product_id,
            },
            dataType: "json",
            success: function (data) {
                $(current_target).parents("tr.item-cart").remove();
            },
            error: function (data) {},
        });
    });
}
jQuery(document).ready(function ($) {
    var stickyTop = $("#sticky-wrapper").offset().top;
    jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > stickyTop) {
            jQuery(".sticky-wrapper").addClass("header-sticky");
        } else {
            jQuery(".sticky-wrapper").removeClass("header-sticky");
        }
    });
    $(".btn-click-cart").click(function () {
        $("#site-cart").addClass("active");
    });
    $("#site-close-handle").click(function () {
        $("#site-cart").removeClass("active");
    });
    $(".btn-search-mb").click(function () {
        $(this).toggleClass("open");
        $(".wp-box-search-mb").slideToggle("fast", function () {});
    });

    jQuery(".mobile-main-menu .menu-item-has-children > a").after(
        '<i class="fa fa-plus fa1" aria-hidden="true"></i>'
    );

    jQuery(".mobile-main-menu .menu-item-has-children .fa1").click(function () {
        jQuery(this).closest("li").children(".sub-menu").toggle(600);
        jQuery(this).toggleClass("fa1");
    });

    $(".wp-menu-mobile").click(function () {
        $(".mobile-main-menu").slideToggle(200);
        $(".wp-main-header").toggleClass("bg-white");
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
    //

    $(".wp-img-ctsp").on("hover", ".add_bag_size li", function () {
        $(".sizeError").hide();
        var newIntro = $(this).attr("data-intro");
        newIntro
            ? $(".sizeIntro").text(newIntro).show()
            : $(".sizeIntro").hide();
    });

    $(".btn-click-dosize").click(function () {
        var value_chieucao = $("#value_chieucao").val();
        var value_cannang = $("#value_cannang").val();
        var value_vong1 = $("#value_vong1").val();
        test_size(value_chieucao, value_cannang, value_vong1);
        return false;
    });

    function test_size(value_chieucao, value_cannang, value_vong1) {
        $(".wp-list-form-dosize").find(".form-1").addClass("hidden");
        $(".wp-list-form-dosize").find(".form-2").addClass("active");
    }

    $('input[name="participants"]')
        .rangeslider({
            polyfill: false,
            onInit: function () {
                $handle = $(".rangeslider-group1 .rangeslider__handle");
                updateHandle($handle[0], this.value);
                $("#value_chieucao").val(this.value);
            },
        })
        .on("input", function () {
            updateHandle($handle[0], this.value);
            $("#value_chieucao").val(this.value);
        });
    $('input[name="participants2"]')
        .rangeslider({
            polyfill: false,
            onInit: function () {
                $handle2 = $(".rangeslider-group2 .rangeslider__handle");
                updateHandle($handle2[0], this.value);
                $("#value_cannang").val(this.value);
            },
        })
        .on("input", function () {
            updateHandle($handle2[0], this.value);
            $("#value_cannang").val(this.value);
        });
    $('input[name="participants3"]')
        .rangeslider({
            polyfill: false,
            onInit: function () {
                $handle3 = $(".rangeslider-group3 .rangeslider__handle");
                updateHandle($handle3[0], this.value);
                $("#value_vong1").val(this.value);
            },
        })
        .on("input", function () {
            updateHandle($handle3[0], this.value);
            $("#value_vong1").val(this.value);
        });
    function updateHandle(el, val) {
        el.textContent = val;
    }

    if ($(window).width() < 768) {
        $(".wp-ft-main").click(function () {
            $(this).toggleClass("open");
            $(this)
                .find(".list-ft-main")
                .slideToggle("slow", function () {});
        });
    }

    $(".btn-click-show-top").click(function () {
        $(this).toggleClass("active");
        $(this)
            .parent()
            .parent()
            .find(".wp-bottom-text-sp-22")
            .slideToggle("slow", function () {});
        $(this).parent().parent().toggleClass("active");
        $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .toggleClass("active");
    });

    $(".btn-chinhsua-lai").click(function () {
        $(".wp-list-form-dosize").find(".form-1").removeClass("hidden");
        $(".wp-list-form-dosize").find(".form-2").removeClass("active");
    });
    $(".btn-click-dosize").click(function () {
        $(".wp-list-form-dosize").find(".form-1").addClass("hidden");
        $(".wp-list-form-dosize").find(".form-2").addClass("active");
    });
    $(".closedong").click(function () {
        $(".wp-list-form-dosize").find(".form-1").removeClass("hidden");
        $(".wp-list-form-dosize").find(".form-2").removeClass("active");
    });

    $(".btn-click-boloc").click(function () {
        $("body, html").addClass("active");
        $(this).parent().addClass("open");
        $(this).parent().find(".wp-bo-loc-1").addClass("open");
    });

    $(".close-fil").click(function () {
        $("body, html").removeClass("active");

        $(this).parent().removeClass("open");

        $(this).parent().find(".wp-bo-loc-1").removeClass("open");
    });

    $(".wp-tab-mota > ul > li > a").click(function () {
        var jsid = $(this).data("tabsd");
        $(this)
            .closest(".wp-tab-mota")
            .find(".tab-contets")
            .removeClass("active in");
        $(jsid).addClass("active in");
    });

    $(".wp-chonmau > ul > li > a").click(function () {
        var jsid = $(this).data("tabsd");
        $(this)
            .closest(".wp-img-ctsp")
            .find(".tab-images")
            .removeClass("active in");
        $(jsid).addClass("active in");
    });

    $(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 2,
        vertical: true,
    });

    $(".slide-uudai").owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplaySpeed: 1200,
        smartSpeed: 1200,
        responsive: {
            0: {
                items: 2,
                margin: 20,
            },
            320: {
                items: 2,
                margin: 20,
            },
            767: {
                items: 3,
                margin: 20,
            },
            1000: {
                items: 3,
                margin: 30,
            },
        },
    });

    $(".slider-instagram").owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplaySpeed: 1200,
        smartSpeed: 1200,
        responsive: {
            0: {
                items: 2,
                margin: 1,
            },
            320: {
                items: 2,
                margin: 1,
            },

            767: {
                items: 3,
                margin: 1,
            },
            800: {
                items: 4,
                margin: 1,
            },
            1199: {
                items: 5,
                margin: 1,
            },
        },
    });

    // js sản phẩm
    $(".list-color-sp li").click(function () {
        $(this)
            .parents(".list-color-sp")
            .find(".item-color")
            .removeClass("active");
        $(this).addClass("active");
    });

    $(".list-color-sp li").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main")
            .removeClass("active");
    });
    $(".list-color-sp li:nth-child(1)").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main:nth-child(1)")
            .addClass("active");
    });
    $(".list-color-sp li:nth-child(2)").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main:nth-child(2)")
            .addClass("active");
    });
    $(".list-color-sp li:nth-child(3)").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main:nth-child(3)")
            .addClass("active");
    });
    $(".list-color-sp li:nth-child(4)").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main:nth-child(4)")
            .addClass("active");
    });
    $(".list-color-sp li:nth-child(5)").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main:nth-child(5)")
            .addClass("active");
    });
    $(".list-color-sp li:nth-child(6)").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main:nth-child(6)")
            .addClass("active");
    });
    $(".list-color-sp li:nth-child(7)").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main:nth-child(7)")
            .addClass("active");
    });
    $(".list-color-sp li:nth-child(8)").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main:nth-child(8)")
            .addClass("active");
    });
    $(".list-color-sp li:nth-child(9)").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main:nth-child(9)")
            .addClass("active");
    });
    $(".list-color-sp li:nth-child(10)").click(function () {
        $(this)
            .parents(".wp-item-sp")
            .find(".wp-item-sp-main:nth-child(10)")
            .addClass("active");
    });

    $(".slide-sp-title").owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: true,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplaySpeed: 1200,
        smartSpeed: 1200,
        responsive: {
            0: {
                items: 3,
            },
            600: {
                items: 5,
            },
            1000: {
                items: 5,
            },
        },
    });

    $(".slide-sp").owlCarousel({
        loop: false,
        margin: 0,
        dots: false,
        nav: true,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplaySpeed: 1200,
        smartSpeed: 1200,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
    $(".product-mobile").owlCarousel({
        loop: false,
        margin: 0,
        dots: false,
        nav: true,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplaySpeed: 1200,
        smartSpeed: 1200,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
    $(".slide-sp-mobile").owlCarousel({
        loop: true,
        margin: 0,
        dots: true,
        nav: true,
        autoplay: false,
        autoplayTimeout: 3000,
        autoplaySpeed: 1200,
        smartSpeed: 1200,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
    $(".slider-home").owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplaySpeed: 1200,
        smartSpeed: 1200,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
    // var hef = $(".sticky-wrapper").height();
    // $(document).on("click", '.product-gallery-thumbs a[href*="#"]', function (
    //   event
    // ) {
    //   event.preventDefault();

    //   $("html, body").animate(
    //     {
    //       scrollTop: $($.attr(this, "href")).offset().top - hef,
    //     },
    //     500
    //   );
    // });

    // $(".product-gallery-thumbs, .fixed-menu").stickySidebar({
    //   topSpacing: hef,
    //   bottomSpacing: 400,
    // });

    $(".product-slider-thumbs").owlCarousel({
        loop: true,
        items: 1,
        margin: 0,
        stagePadding: 0,
        autoplay: false,
    });

    dotcount = 1;

    jQuery(".owl-dot").each(function () {
        jQuery(this).addClass("dotnumber" + dotcount);
        jQuery(this).attr("data-info", dotcount);
        dotcount = dotcount + 1;
    });

    slidecount = 1;

    jQuery(".owl-item")
        .not(".cloned")
        .each(function () {
            jQuery(this).addClass("slidenumber" + slidecount);
            slidecount = slidecount + 1;
        });

    jQuery(".owl-dot").each(function () {
        grab = jQuery(this).data("info");
        slidegrab = jQuery(".slidenumber" + grab + " img").attr("src");
        jQuery(this).html("<img src=" + slidegrab + ">");
    });

    amount = $(".owl-dot").length;
    gotowidth = 100 / amount;
    jQuery(".owl-dot").css("height", "25%");
});

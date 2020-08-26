    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/sticky-sidebar.js')}}"></script>
    <script src="{{asset('js/owl.carousel.js')}}"></script>
    <script src="{{asset('js/rangeslider.js')}}"></script>
    <script src="{{asset('js/fontawesome.min.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('js/sticky-kit.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/customer.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('input change', '.search-input', function(){
            $.ajax({
                url: "{{route('search.get_suggestions')}}",
                data: {
                    keyword: $(this).val(),
                },
                error: function(){

                }
            }).done(function(data){ 
                $('.search-result').html('');
                var products = Object.values(data);
                if(products.length == 0){
                    $('.search-result').append(`
                    <div class="search-suggestion" style="padding-bottom: 10px">Không có kết quả</div>
                    `);
                    return;
                }
                products.forEach(item => {
                    $('.search-result').append(`
                    <div class="search-suggestion" style="padding-bottom: 10px; cursor:pointer">${item}</div>
                    `)
                });
            })
        });
        $(document).on('click', '.search-suggestion', function(){
            $('.search-input').val($(this).text());
        });


    </script>
@yield('custom-js')
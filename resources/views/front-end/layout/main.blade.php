<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('front-end.partials.header.head')
    
    <!-- yêu cầu người code chức năng để ý kỹ code html của các trang copy thiếu hay tự làm lỗi thì tự chỉnh 
         thêm class ( page-child ) ở các trang chừ trang chủ 
     -->
    <body class="page-child" >
        @include('front-end.partials.header.header')
        <!-- Nội dung conter -->
        <main id="main-site">
            @yield('content')
        </main><!--  end -->

        <!-- chân trang -->
        @include('front-end.partials.footer.footer')
    </body>
    <!-- js -->
    @include('front-end.partials.footer.js')
    @yield('addJs')

</html>

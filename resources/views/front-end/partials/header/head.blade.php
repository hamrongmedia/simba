<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    @if(isset($themeOptionHeader->favicon_setting))
    <link rel="icon" type="image/png" sizes="16x16" href="{{$themeOptionHeader->favicon_setting}}">
    @endif
    <link rel="canonical" href="{{url('/')}}">

    <!-- các thẻ meta -->

     <!-- SEO -->
    <meta name="robots" content="index, follow" />
    <meta name="description" content="@yield('description')">
    <meta name="title" content="@yield('title')">
    <meta name="keywords" content="@yield('keywords')" >
    <!-- end SEO -->
    <!-- tag share facebook -->
    <meta property="og:description" content="@yield('og:description')">
    <meta property="og:title" content="@yield('og:title')">
    <meta property="og:image" content="@yield('og:image')">
    <meta property="og:site_name" content="">
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN">
    <!-- end tag facebook -->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- thư viện css -->
    <link rel="stylesheet"  href="{{asset('css/fontawesome.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('css/all.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('css/jquery.fancybox.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('css/bootstrap.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('css/owl.carousel.css')}}"/>
    <!-- code css -->
    <link rel="stylesheet"  href="{{asset('css/style.css')}}"/>
    @yield('css')
{{--     @if(isset($themeOptionScript->header_script))
        {{$themeOptionScript->header_script}}
    @endif --}}
</head>
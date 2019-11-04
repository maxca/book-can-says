<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script src="{{asset('js/font-size.js')}}"></script>
    {{--<script src="{{asset('js/display-mode.js')}}"></script>--}}
    <link rel="stylesheet" href="{{asset('css/view-bilnd.css')}}">
    <link rel="stylesheet" href="{{asset('css/darkmode.css')}}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">




    @stack('styles-head')

    <title>@yield('title','Book Can Says')</title>

</head>
<body>


<div id="app">

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="/">
            <img src="<?php echo asset('img/logo.svg'); ?>" width="45" height="45" alt="Book can says">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="ค้นหาชื่อหนังสือ" aria-label="ค้นหาชื่อหนังสือ">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">ค้นหา</button>
            </form>

            <div class="col-md-1">
                <button class="fa fa-font A" aria-label="เพิ่มขนาดตัวหนังสือ" type="button" onclick="tsw_demo_change_font_size();"></button>

                <a class="fa fa-adjust" aria-label="โหลดกลางคืน" href="/view-blind"></a>

            </div>

        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">กลับขึ้นไปด้านบน</a>
            </p>
            <p>© Book Can Says ,2019</p>
            <p>SIT,KMUTT</p>
        </div>
    </footer>


</div>


</body>

<script src="{{mix('js/app.js')}}"></script>
@stack('scripts-after')
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</html>

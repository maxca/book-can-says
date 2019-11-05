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
        <div class="col-1"></div>
        <div class="col-9">
            <a class="navbar-brand" href="/">
                <img src="<?php echo asset('img/logo-w-darkmode.svg'); ?>" width="45" height="45" alt="Book can says">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <div class="col-1 col-md-1">
                <button class="fa fa-font A " alt="เพิ่มขนาดตัวหนังสือ" type="button" data-toggle="tooltip"
                        title="เพิ่มขนาดตัวหนังสือ!"
                        onclick="tsw_demo_change_font_size();"></button>
            </div>
            <div class="col-1 col-md-1">
                <a class="btn" href="/view-blind">
                    <button class="fa fa-adjust A" alt="โหลดกลางคืน"
                            type="button" data-toggle="tooltip" title="โหลดกลางคืน!"></button>
                </a>
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

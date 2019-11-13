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
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <script src="{{asset('js/font-size.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/view-bilnd.css')}}">
    <link rel="stylesheet" href="{{asset('css/darkmode.css')}}">
    <link rel="stylesheet" href="{{asset('css/player.css')}}">


    @stack('styles-head')

    <title>@yield('title','Book Can Says')</title>
</head>
<body>
<div id="app">

    <nav class="navbar navbar-light bg-dark custom-switch">
        <div class="col-md-7">
            <a class="navbar-brand " href="/view-blind" alt="กลับหน้าเลือกหนังสือ"  aria-label="กลับหน้าเลือกหนังสือ">
                <p class="fa fa-chevron-left "></p><span class="back font-weight-bold" alt="กลับหน้าเลือกหนังสือ" aria-label="กลับหน้าเลือกหนังสือ">กลับ</span>
            </a>
        </div>

    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#" aria-label="กลับขึ้นไปด้านบน" alt="กลับขึ้นไปด้านบน">Back to top</a>
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

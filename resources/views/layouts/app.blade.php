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


    @stack('styles-head')

    <title>@yield('title','Book Can Says')</title>
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="<?php echo asset('img/logo.svg'); ?>" width="40" height="40" alt="Book can says">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/view-book">หนังสือน่าอ่าน <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
{{--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}

                        <form class="form-inline my-2 my-lg-0" action="/view-book" method="get" id="category">
                            <select name="category" class="form-control" onchange="getSelectValue()">
                                <option value="0" href="/view-book/"> หมวดหมู่หนังสือ </option>
                                @foreach ($bookcat_array as $data)
                                    <option value="{{ $data->id }}" href="/view-book/">   {{ $data->name }} </option>
                                @endforeach
                            </select>
                        </form>
{{--                        </a>--}}
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/view-form-create-book">สร้างหนังสือ</a>
                    </li>


                </ul>
                <form class="form-inline my-2 my-lg-0" action="/search" method="get">
                    <div class="input-group">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="ค้นหา"
                               aria-label="Search">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">ค้นหา</button>
                        </span>
                    </div>
                </form>

            {{--                <form class="form-inline my-2 my-lg-0">--}}
            {{--                    <input class="form-control mr-sm-2" type="search" placeholder="ค้นหา" aria-label="Search">--}}
            {{--                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>--}}
            {{--                </form>--}}


            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('สมัครสมาชิก') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="ีurl{{''}}" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ url('/view-book-list') }}">
                                    จัดการหนังสือ
                                </a>


                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('ออกจากระบบ') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @if(auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.books') }}">การเผยแพร่</a>
                            </li>

                        @endif
                    @endguest
                </ul>
            </div>


        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
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

//    $( '#app .navbar-nav a' ).on( 'click', function () {
//        $( '#app .navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
//        $( this ).parent( 'li' ).addClass( 'active' );
//    });

</script>

<script>
    function getSelectValue(){
        var selectValue = document.getElementById("category").value;
        console.log(selectValue);
        document.querySelector("#category").submit()
    }
</script>
</html>

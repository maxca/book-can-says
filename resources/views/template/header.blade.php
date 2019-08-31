<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token()}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">


    @stack('styles-head')

    <title>@yield('title','Book Can Says')</title>

</head>




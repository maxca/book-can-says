@extends('layouts.app')

@section('content')

    @include('sweetalert::alert')
    @yield('contents')
    @include('template.footer')

@endsection

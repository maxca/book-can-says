@extends('template.master')

@section("contents")
    <img src="{{route('render.img',['file_name' => 'upload/bg.jpg'])}}" alt="">
@endsection
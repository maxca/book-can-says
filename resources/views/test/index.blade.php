@extends('template.master')

@section("contents")
    <img src="{{route('render.img',['file_name' => 'public/images/n.png'])}}" alt="book cover">
@endsection
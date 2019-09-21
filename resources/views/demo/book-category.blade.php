@extends('template.body')

@section('title','Book Can see : Custom title list')

@section('contents')

@endsection


@push('styles-head')
    <style>
        .a1 {
            color: red;
        }
        #a1 {
            color: red;
        }
    </style>

@endpush


@push('scripts-after')
    <script></script>
@endpush

<input type="text" class="a1" id="a1" name="ab" href="" action="" data-maxca="xxx">


$("#a").data('maxca')
$("#a").attr('name');
$(".
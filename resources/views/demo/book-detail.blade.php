@extends('template.playerNavBody')

@section('title','Book Can Say')

@section('contents')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1 class=" font-weight-bold" alt="เรื่อง.{{$book->name}}" aria-label="เรื่อง.{{$book->name}}">เรื่อง {{$book->name}}</h1>
            </div>

        </div>

        <div class="row">
            <div class="col mt-lg-5">
                <ul class="list-group">
                    <li class="list-group-item">
                        @include('demo.player')
                    </li>
                </ul>
            </div>

        </div>

        {{--        {{dd($book)}}--}}
        <div class="container-inline mt-3">
            <div class="row">
                <div class="col">
                    <div class="media">

                        <div class="media-body ml-2">
                            {{--<h5 class="font-weight-bold" aria-label="ชื่อหนังสือ.{{$book->name}}">{{$book->name}}</h5>--}}
                            <div class="card-body">

                                <div class="col">

                                    <ul class="list-group">
                                        @foreach($book->audio as $key => $audio)
                                            <li class="list_sound list-group-item list-group-item-action justify-content-between align-items-center d-flex"
                                                id="list_{{$key}}"
                                                data-id="{{++$key}}"
                                                aria-label="ชื่อบท.{{$audio->chapter_name}}"
                                            alt="ชื่อบท.{{$audio->chapter_name}}">
                                                {{$audio->chapter_name}}
                                                {{--<span class="badge badge-primary badge-pill">5:30 min</span>--}}
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-lg-2">


            </div>


        </div>
        @endsection



        @push('styles-head')
            <style>
                .checked {
                    color: orange;
                }

                .list_sound {
                    cursor: pointer;
                }

            </style>

        @endpush




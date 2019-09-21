@extends('template.body')

@section('title','Book Can see : Custom title list')

@section('contents')
    <div class="container">
        <div class="container-inline border p-4">
            <div class="row">
                <div class="col">
                    <div class="media">
                        <img class="img-thumbnail rounded" src="{{route('render.img',['file_name' => 'public/images/'. $book->cover_page])}}" alt="" width="150" height="150">
                        <div class="media-body ml-2">
                            <h5>Title</h5>
                            <span>Detail</span>
                            <div class="review">
                                <i class="fa fa-star checked"></i>
                                <i class="fa fa-star checked"></i>
                                <i class="fa fa-star checked"></i>
                                <i class="fa fa-star checked"></i>
                                <i class="fa fa-star checked"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-lg-2">
                <div class="col">

                    <ul class="list-group">
                        @foreach($book->audio as $key => $audio)
                        <li class="list_sound list-group-item list-group-item-action justify-content-between align-items-center d-flex" id="list_{{$key}}">
                            {{$audio->chapter_name}}
                            <span class="badge badge-primary badge-pill">5:30 min</span>
                        </li>
                        @endforeach

                    </ul>
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col mt-lg-5">
                <ul class="list-group">
                    <li class="list-group-item  justify-content-center d-flex">
                        @include('demo.player')
                    </li>
                </ul>
            </div>

        </div>
    </div>
@endsection



@push('styles-head')
    <style>
        .checked {
            color: orange;
        }

    </style>

@endpush


@push('scripts-after')
    <script>
        $("body").on('click', function(){
            activeSoundList()
        });

        $(document).ready(function () {
            activeSoundList()
        });

        function activeSoundList() {
            let id= $(".cover-sound.active").attr('id');
            console.log(id);
            $(".list_sound").removeClass('list-group-item-info');
            $("#list" + id).addClass('list-group-item-info');
            console.log($("#list" + id));
        }

    </script>
@endpush
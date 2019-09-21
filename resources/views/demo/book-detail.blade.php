@extends('template.body')

@section('title','Book Can see : Custom title list')

@section('contents')
    <div class="container">
        <div class="container-inline border p-4">
            <div class="row">
                <div class="col">
                    <div class="media">
                        <svg class="bd-placeholder-img img-thumbnail" width="200" height="200"
                             xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                             role="img"
                             aria-label="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera: 200x200">
                            <title>A generic square placeholder image with a white border around it, making it resemble
                                a
                                photograph taken with an old instant camera</title>
                            <rect width="100%" height="100%" fill="#868e96"/>
                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">200x200</text>
                        </svg>
                        <div class="media-body ml-2">
                            <h5>Title</h5>
                            <span>Detail</span>
                            <div class="review">
                                <i class="fa fa-star checked"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-lg-2">
                <div class="col">
                    <ul class="list-group d-flex justify-content-between">
                        <li class="list-group-item">Chapter xxx
                            <span class="badge badge-primary badge-pill">5:30 min</span>
                        </li>
                        <li class="list-group-item">Chapter xxx <span class="badge">5:30 min</span></li>
                        <li class="list-group-item">Chapter xxx <span class="badge">5:30 min</span></li>
                        <li class="list-group-item">Chapter xxx <span class="badge">5:30 min</span></li>
                        <li class="list-group-item">Chapter xxx <span class="badge">5:30 min</span></li>
                    </ul>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action justify-content-between align-items-center d-flex">
                            New
                            <span class="badge badge-secondary badge-pill">12</span>
                        </li>
                        <li class="list-group-item list-group-item-action">New <span
                                    class="badge badge-secondary badge-pill pull-right">12</span></li>
                        <li class="list-group-item list-group-item-action">New <span
                                    class="badge badge-secondary badge-pill pull-right">12</span></li>
                        <li class="list-group-item list-group-item-action">New <span
                                    class="badge badge-secondary badge-pill pull-right">12</span></li>
                        <li class="list-group-item list-group-item-action">New <span
                                    class="badge badge-secondary badge-pill pull-right">12</span></li>
                        <li class="list-group-item list-group-item-action">New <span
                                    class="badge badge-secondary badge-pill pull-right">12</span></li>
                        <li class="list-group-item list-group-item-action">New <span
                                    class="badge badge-secondary badge-pill pull-right">12</span></li>
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

        });

    </script>
@endpush
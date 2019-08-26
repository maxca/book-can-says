@extends('template.body')

@section('contents')

    <section>

        <div class="container">
            @foreach($books as $key =>  $cards)
            <div class="card mb-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$cards['name']}}</h5>
                    {{--Total Author : <p class="card-author">{{$cards->first('author_name')}}</p>--}}
                    {{--Total Publisher : <p class="card-publisher">{{$cards->first('publisher_name')}}</p>--}}
                    Total Chapter : <p class="card-chapter">{{$cards['total_chapter']}}</p>
                    Total Page :    <p class="card-page">{{$cards['total_page']}}</p>
                    Description :   <p class="card-des">{{$cards['description']}}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>

                    </div>
@endforeach
    </section>
@endsection

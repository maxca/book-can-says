@extends('template.body')


@section('contents')

    <div class="jumbotron" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <h1 class="display-4">Book Can Say</h1>
            <p class="lead">หนังสือเป็นเพื่อนที่เงียบและมั่นคงมากที่สุด เป็นที่ปรึกษาที่เข้าถึงได้ง่ายและรอบรู้ที่สุด
                และเป็นครูที่อดทนที่สุด </p>
            <hr class="my-4">
            <p>มาร่วมแบ่งปันน้ำใจโดยการอ่าน</p>
            <a class="btn btn-ligth btn-lg ex" href="/view-tutorial" role="button">ดูตัวอย่างการบันทึกหนังสือเสียง</a>
        </div>

    </div>
    <section>

        <div class="container">

            @foreach($books->chunk(3) as  $cards)

                <div class="row">

                    @foreach($cards as $key => $book)

                        <div class="col-md-3 mb-4">


                            <div class="card" style="width: 18rem;">
                                <img class="card-img img-thumbnail book-cover"
                                     src="{{route('render.img',['file_name' => 'public/images/'. $book->cover_page])}}"
                                     alt="book cover">

                                <div class="card-body">
                                    <h5 class="card-title">{{$book->name}}</h5>


                                    <div class="book-author">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-user-o"></i> ชื่อผู้แต่ง
                                        </span>
                                        @foreach($book->authors as $author)
                                            <span class="f">{{$author->name}}</span>
                                        @endforeach
                                    </div>
                                    <div class="book-category">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-address-book-o"></i> หมวดหมู่
                                        </span>
                                        <span class="f">{{$book->category->name}}</span>
                                    </div>

                                    <div class="book-publisher">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-book"></i> สำนักพิมพ์
                                        </span>
                                        @foreach($book->publisher as $publisher)
                                            <span class="f">{{$publisher->name}}</span>
                                        @endforeach
                                    </div>
                                    <div class="book-chapter">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-bookmark-o"></i> จำนวนบท
                                        </span>
                                        <span class="f">{{$book->total_chapter}}</span>
                                    </div>

                                    <div class="book-chapter">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-bookmark-o"></i> หน้าที่อ่านล่าสุด
                                        </span>
                                        @if($book->audio->count() > 0)
                                                 {{$book->audio->first()->total_page}}
                                        @endif
                                        @if($book->audio->count() == 0)
                                            ยังไม่ถูกอ่าน
                                        @endif
                                    </div>


                                    <p class="card-text">{{$book->description}}</p>

                                    <div class="c">

                                        {{--                                        <a href="{{route('render.download',['file_name' => 'public/pdfs/'. $book->pdf])}}" class="btn btn-dark pdf">รับหนังสือ</a>--}}
                                        <a href="{{route('view.book.record.sound', ['book_id' => $book->id])}}"
                                           class="btn btn-dark record">อัดเสียง</a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="align-bottom">
                {{$books->links()}}
            </div>
        </div>
    </section>
@endsection

@push('styles-head')
<style>
    .book-cover {
        width: 100%;
        height: 230px;
    }

    .card-text {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .row {
        margin-top: 60px;
    }

    .f {
        margin-left: 20px;
        margin-bottom: 10px;
    }

    .mb-4 {
        margin-left: 70px;
    }

    .pdf {
        background: transparent;
        color: black;
    }

    .jumbotron {
        background-color: #343a40;
        color: white;
    }

    .ex {
        background: white;
        color: black;
    }


</style>
@endpush

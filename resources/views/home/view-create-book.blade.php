

@extends('template.body')


@section('contents')

    <div class="jumbotron" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <h1 class="display-4">Book can says</h1>
            <p class="lead">หนังสือเป็นเพื่อนที่เงียบและมั่นคงมากที่สุด เป็นที่ปรึกษาที่เข้าถึงได้ง่ายและรอบรู้ที่สุด
                และเป็นครูที่อดทนที่สุด </p>
            <hr class="my-4">
            <p>มาร่วมแบ่งปันน้ำใจโดยการอ่าน</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">ตัวอย่างหนังสือเสียง</a>
        </div>

    </div>

    <section>
        <div class="container">

            @foreach($books->chunk(4) as  $cards)
                <section class="row">
                    @foreach($cards as $key => $book)

                        <div class="col-md-3 mb-4">
                            <div class="card" style="width: 18rem; margin-outside: 4rem;">

                                <img src="{{route('render.img',['file_name' => 'public/images/'. $book->cover_page])}}"

                                     style="height: 18rem !important;
                                   object-fit: cover;"
                                     alt="หน้าปกหนังสือ">


                                <div class="card-body">
                                    <div class="book-name">

                                <span class="font-weight-bolder">
                                    <h5 class="card-title">{{$book->name}}</h5>
                                </span>

                                    </div>

                                    <div class="book-author">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-user-o"></i> ชื่อผู้แต่ง:
                                        </span>
                                        @foreach($book->authors as $authors)
                                            <span class="font-italic">{{$authors->name}}</span>
                                        @endforeach
                                    </div>
                                    <div class="book-category">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-address-book-o"></i> หมวดหมู่:
                                        </span>
                                        <span class="font-italic">{{$book->category->name}}</span>
                                    </div>

                                    <div class="book-publisher">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-book"></i> สำนักพิมพ์:
                                        </span>
                                        @foreach($book->publisher as $publisher)
                                            <span class="font-italic">{{$publisher->name}}</span>
                                        @endforeach
                                    </div>
                                    <div class="book-chapter">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-bookmark-o"></i> จำนวนบท:
                                        </span>
                                        <span class="font-italic">{{$book->total_chapter}}</span>
                                    </div>
                                    <div class="book-chapter">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-bookmark-o"></i> จำนวนหน้า:
                                        </span>
                                        <span class="font-italic">{{$book->total_page}}</span>
                                    </div>
                                    <p class="card-text">{{$book->description}}</p>
                                    <div class="text-left">

                                        <a href="{{route('view.book.record.sound',['book_id' => $book->id ])}}"
                                           class="btn btn-primary">สร้างหนังสือเสียง</a>
                                    </div>

                                </div>
                            </div>
                        </div>

            @endforeach

        </div>
        @endforeach
        <br>
        <br>

        <div class="align-bottom">
            {{$books->links()}}
        </div>

        </div>

    </section>
@endsection





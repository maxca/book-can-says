@extends('template.body')

@section('contents')

    <section>
        <div class="container">


            @foreach($data as $cards)
                <div class="row">

                    @foreach($cards as $key => $book)

                         <div class="card mb-3">
                            <div class="card" style="width: 18rem; margin-outside: 4rem;">

                                <img src="{{route('render.img',['file_name' => 'public/images/'. $book->cover_page])}}"

                                     style="height: 18rem !important;
                                   object-fit: cover;"
                                     alt="หน้าปกหนังสือ" >

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
                                        <a href="#" class="btn btn-primary">ดาวน์โหลดหนังสือ</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            @endforeach
            <br>
            <br>

        </div>
    </section>
@endsection

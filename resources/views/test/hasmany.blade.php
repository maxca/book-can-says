@extends('template.body')

@section('contents')

    <div class="jumbotron">
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

                <div class="row">
                    @foreach($cards as $key => $book)

                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img class="card-img img-thumbnail"
                                     src="{{route('render.img',['file_name' => 'public/images/'. $book->cover_page])}}"
                                     alt="book cover">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-group-item-success font-weight-bold">{{$book->name}}</li>
                                </ul>
                                <div class="card-body">
                                    <div class="book-author">
                                        <span class="font-weight-bold">
                                            <i class="fa fa-user-o"></i> ชื่อผู้แต่ง:
                                        </span>
                                        @foreach($book->author as $author)
                                            <span class="font-italic">{{$author->name}}</span>
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
                                    <div class="text-right">
                                        <a href="#" class="btn btn-primary btn-sm">
                                            <i class="fa fa-download" aria-hidden="true"></i>ดาวโหลด
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <div class="row m-2">
                <!-- Modal structure -->
                <div id="modal">
                    <data-iziModal-fullscreen="true"  data-iziModal-title="Welcome"  data-iziModal-subtitle="Subtitle"  data-iziModal-icon="icon-home"></data-iziModal-fullscreen>
                    <!-- Modal content -->
                </div>

                <!-- Trigger to open Modal -->
                <a href="https://github.com/marcelodolza/iziModal" class="trigger">Modal</a>
            </div>
            <div class="align-bottom">
                {{$books->links()}}
            </div>
        </div>
    </section>
@endsection

@push('scripts-after')
    <script>
        $("#modal").iziModal();
    </script>
@endpush

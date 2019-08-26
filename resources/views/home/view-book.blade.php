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

            @foreach($books as $key => $cards)

                <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                       <img src="{{route('render.img',['file_name' => 'public/images/'.$cards['cover_page']])}}"
                             style="width: 18rem" alt="book cover">

                        <div class="card-body">
                            <h5 class="card-title">{{$cards['name']}}</h5>
                            <p class="card-text">{{$cards['description']}}</p>
                            <a href="#" class="btn btn-primary">DOWNLOAD</a>
                        </div>
                    </div>
                    <br>
                </div>

                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{route('render.img',['file_name' => 'public/images/'.$cards['cover_page']])}}"
                                 style="width: 18rem" alt="book cover">

                            <div class="card-body">
                                <h5 class="card-title">{{$cards['name']}}</h5>
                                <p class="card-text">{{$cards['description']}}</p>
                                <a href="#" class="btn btn-primary">DOWNLOAD</a>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{route('render.img',['file_name' => 'public/images/'.$cards['cover_page']])}}"
                                 style="width: 18rem" alt="book cover">

                            <div class="card-body">
                                <h5 class="card-title">{{$cards['name']}}</h5>
                                <p class="card-text">{{$cards['description']}}</p>
                                <a href="#" class="btn btn-primary">DOWNLOAD</a>
                            </div>
                        </div>
                        <br>
                    </div>


                </div>
                 @endforeach
            <div class="pagination-bot" align="right">

                <nav aria-label="Page navigation example" >
                    <ul class="pagination" >
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
                </div>
            </div>
        </div>
    </section>
    @endsection

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
                        <img src="{{asset('images/'.$cards->cover_page)}}" class="card-img-top" alt="bookscover">
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
            </div>
        </div>
    </section>
    @endsection

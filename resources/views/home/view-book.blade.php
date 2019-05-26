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

        @foreach($data as $key => $item)
            {{++$key}}
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/'.$item->cover_page)}}" alt="pic cover" >
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text">
                                category : {{$item->category->name}}
                                auther : {{$item->author->name}}
                            </p>

                            <a href="#" class="btn btn-primary">DOWNLOAD</a>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width: 18rem;">
                        <img src="img/2.jpg" class="card-img-top" alt="2">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">DOWNLOAD</a>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width: 18rem;">
                        <img src="img/2.jpg" class="card-img-top" alt="2">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">DOWNLOAD</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="img/4.jpg" class="card-img-top" alt="4">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">DOWNLOAD</a>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width: 18rem;">
                        <img src="img/4.jpg" class="card-img-top" alt="4">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">DOWNLOAD</a>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width: 18rem;">
                        <img src="img/4.jpg" class="card-img-top" alt="4">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">DOWNLOAD</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="img/3.jpg" class="card-img-top" alt="3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">DOWNLOAD</a>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width: 18rem;">
                        <img src="img/3.jpg" class="card-img-top" alt="3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">DOWNLOAD</a>
                        </div>
                    </div>
                    <br>
                    <div class="card" style="width: 18rem;">
                        <img src="img/3.jpg" class="card-img-top" alt="3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">DOWNLOAD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                {{$data->render()}}
            </div>
        @endforeach
    </section>
    @endsection

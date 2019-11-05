@extends('template.blind')

@push('styles-head')
<link rel="stylesheet" href="{{asset('css/view-blind.css')}}"/>
@endpush

@section('content')

    <section>
        <div class="container" id="myContent">
            <div class="row justify-content-center">
                <div class="dropdown " id="dropdownFont" aria-label="กดเพื่อเลือกประเภทหนังสือ">
                    <form class="form-inline my-2 my-lg-0" action="/view-blind" method="get" id="category">
                        <select name="category" class="form-control" onchange="getSelectValue()">
                            <option value="0" href="/view-blind/"> หมวดหมู่หนังสือ</option>
                            @foreach ($bookcat_array as $data)
                                <option value="{{ $data->id }}" href="/view-book/">   {{ $data->name }} </option>
                            @endforeach
                        </select>
                    </form>


                </div>
            </div>

            @foreach($books->chunk(3) as $rows)
                <div class="row">
                    @foreach($rows as $book)
                        <div class="col-md-3 mb-4">
                            <div class="card ">
                                <img class="card-img img-thumbnail book-cover btn-light"
                                     src="{{route('render.img',['file_name' => 'public/images/'. $book->cover_page])}}"
                                     alt="รูปปกหนังสือ">
                                <div class="card-body ">
                                    <p class="card-title ">
                                    <div class="book-name font-weight-bold" aria-label="ชื่อหนังสือ.{{$book->name}}">
                                        {{$book->name}}
                                    </div>
                                    </p>
                                    <p class="author-name">
                                        @foreach($book->authors as $author)
                                            <span class="font-weight-bold" aria-label="ชื่อผู้แต่ง.{{$author->name}}">
                                                ชื่อผู้แต่ง</span>
                                            <span class="name"> {{$author->name}}</span>
                                        @endforeach
                                    </p>

                                    <p class="myContent">
                                        <span class="font-weight-bold" aria-label="ชื่อตอน.{{$book->total_chapter}}">
                                            ชื่อตอน</span>
                                        <span class="name"> {{$book->total_chapter}}</span>
                                    </p>

                                    <p class="myContent">
                                    <div class="card-text" aria-label="เรื่องย่อ.{{$book->description}}">
                                        {{$book->description}}</div>
                                    </p>

                                    <a href="{{route('show.book.detail',['id' => $book->id])}}"
                                       class="btn btn-dark myContent"
                                    >
                                        <div class="font-weight-normal" aria-label="กดเพื่อฟังหนังสือเสียง">
                                            ฟังหนังสือเสียง
                                        </div>
                                    </a>

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

<script>
    function getSelectValue() {
        var selectValue = document.getElementById("category").value;
        console.log(selectValue);
        document.querySelector("#category").submit()
    }
</script>




@extends('template.body')

@section('contents')
    <div class="container">

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ชื่อหนังสือ</th>
                <th scope="col">ผู้แต่ง</th>
                <th scope="col">สำนักพิมพ์</th>
                <th scope="col">สถานะ</th>
                <th scope="col" style="text-align: right">อัดเสียง</th>
            </tr>
            </thead>

            <tbody>
            @foreach($books->chunk(4) as  $cards)
                @foreach($cards as $key => $book)
                    <tr>
                        <td>{{$book->name}}</td>
                        @foreach($book->authors as $author)
                            <td>{{$author->name}}</td>
                        @endforeach

                        @foreach($book->publisher as $publisher)
                            <td>{{$publisher->name}}</td>
                        @endforeach

                        <td>
                            @if($book->publish_status == 'publisher')
                                <span class="badge-pill badge badge-success">เผยแพร่</span>
                            @else
                                <span class="badge-pill badge badge-danger">ไม่เผยแพร่</span>
                            @endif
                        </td>

                        <td style="text-align: right">
                            <a href="{{route('view.own.book.record.sound', ['book_id' => $book->id])}}"  class="btn btn-dark record">อัดเสียง</a>

                        </td>

                        @endforeach
                        @endforeach
                    </tr>


            </tbody>
        </table>

    </div>

@endsection

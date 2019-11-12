@extends('template.body')

@section('contents')
    <div class="container">
        <div class="container">

            {{--            @if (session('success_message'))--}}
            {{--                <div class="alert alert-success">--}}
            {{--                    {{ session('success_message') }}--}}
            {{--                </div>--}}
            {{--            @endif--}}
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif

            @if ($message = Session::get('warning'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">วันที่</th>
                    <th scope="col">ชื่อหนังสือ</th>
                    <th scope="col">ผู้แต่ง</th>
                    <th scope="col">สำนักพิมพ์</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col" style="text-align: right">จัดการ</th>
                    <th scope="col" style="text-align: right">แก้ไข</th>
                    <th scope="col" style="text-align: right">ลบหนังสือ</th>

                </tr>
                </thead>

                <tbody>
                @foreach($books->chunk(4) as  $cards)
                    @foreach($cards as $key => $book)
                        <tr>

                            <td style="width: 110px">{{$book->created_at}}</td>

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
                                <a href="{{route('home.manage-audio',['id' => $book->id])}}"
                                   class="btn btn-dark">จัดการเสียง</a>

                            </td>

                            <td style="text-align: right">
                                <a href="{{route('edit',['id' => $book->id])}}"
                                   class="btn btn-dark">แก้ไขข้อมูลหนังสือ</a>

                            </td>
                            <td style="text-align: right">

                                <div id="id_confrmdiv"> ต้องการลบข้อมูลหนังสือ?
                                    <div class="confirm">
                                        <a id="delete-btn" href="{{route('delete.book',['id' => $book->id])}}"
                                           class="btn btn-light">
                                            <button id="id_truebtn">ยืนยัน</button>
                                        </a>
                                    </div>
                                    <div class="unconfirm">
                                        <button id="id_falsebtn">ยกเลิก</button>
                                    </div>
                                </div>

                                <button type="button" onclick="doSomething()" class="btn btn-light">ลบข้อมูลหนังสือ
                                </button>

                            </td>

                            @endforeach
                            @endforeach
                        </tr>

                </tbody>
            </table>

        </div>
    </div>

    @include('sweetalert::alert')
@endsection

<script>

    function doSomething() {
        var id_confrmdiv = $("#id_confrmdiv");
        document.getElementById('id_confrmdiv').style.display = "block"; //this is the replace of this line

        document.getElementById('id_truebtn').onclick = function () {
            //do your delete operation
            //alert('true');
        };

        document.getElementById('id_falsebtn').onclick = function () {
            id_confrmdiv.hide();
            //alert('false');
            return false;
        };
    }

</script>

<style>

    .table {
        margin-top: 30px;
    }

    #id_confrmdiv {
        display: none;
        background-color: #eee;
        border-radius: 5px;
        border: 1px solid #aaa;
        position: fixed;
        width: 30%;
        height: 20%;
        left: 50%;
        margin-left: -150px;
        padding: 6px 8px 8px;
        box-sizing: border-box;
        text-align: center;
    }

    #id_confrmdiv button {
        background-color: #ccc;
        display: inline-block;
        border-radius: 3px;
        border: 1px solid #aaa;
        padding: 2px;
        text-align: center;
        width: 80px;
        cursor: pointer;
    }

    #id_confrmdiv button:hover {
        background-color: #ddd;
    }

    #confirmBox .message {
        text-align: left;
        margin-bottom: 8px;
        padding-top: 1.5%;
    }
</style>


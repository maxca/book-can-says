@extends('template.body')

@section('title','Book Can Say : ผู้ดุแลระบบจัดการข้อมูลหนังสือ')

@section('contents')
    <div class="container">
        <div class="card">
            <div class="card-header" style="color: #1f1f1f">
                <h3 class="card-title">จัดการหนังสือเสียง</h3>
            </div>
            <!-- /.card-header -->


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

            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th style="width: 7%">No.</th>
                        <th style="width: 12%">วันที่สร้าง</th>
                        <th style="width: 15%">ชื่อหนังสือ</th>
                        <th style="width: 10%">ผู้แต่ง</th>
                        <th style="width: 10%">ชื่อผู้อ่าน</th>
                        <th style="width: 10%">ชื่อตอน</th>
                        <th class="text-center" style="width: 35%">เสียง</th>
                        <th style="width: 10%">สถานะ</th>
                        <th style="width: 10%">ลบเสียง</th>


                    </tr>
                    </thead>
                    <tbody>
                    @php $count = $books->firstItem(); @endphp

                    @foreach($books as $key => $book)
                        @foreach($book->audio as $audio)
                            {{--{{dd($audio)}}--}}
                            <tr>
                                <td>{{( $count++)}}.</td>
                                <td>{{$audio->created_at}}</td>
                                <td>{{$book->name}}</td>
                                <td>{{$book->authors->first()->name}}</td>
                                <td>{{$book->user->name ?? ''}}</td>
                                <td>
                                    <span class="chapter-name">{{$audio->chapter_name}}</span>

                                </td>
                                {{--<td>--}}
                                {{--<span class="sub-chapter-name">{{$audio->sub_book_chap}}</span>--}}
                                {{--</td>--}}

                                <td class="text-right">
                                    {{--{{dd($audio->path)}}--}}

                                    <audio controls>

                                        <source src="{{route('get.sound', ['file_name' =>  $audio->path])}}"
                                                type="audio/wav">
                                        Your browser does not support the audio element.
                                    </audio>


                                </td>

                                <td>

                                    @if($audio->status == 'active')
                                        <span class="badge-pill badge badge-success">เผยแพร่</span>
                                    @else
                                        <span class="badge-pill badge badge-danger">ไม่เผยแพร่</span>
                                    @endif

                                </td>

                                <td style="text-align: right">

                                    <button type="button" class="btn btn-ligth" data-toggle="modal" data-target="#exampleModal">
                                        ลบเสียง
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">ต้องการลบข้อมูลหนังสือเสียง?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-ligth" data-dismiss="modal">ปฏิเสธ</button>
                                                    <a id="delete-btn" href="{{route('delete.audio',['id' => $audio->id])}}">
                                                        <button type="button" class="btn btn-dark">ตกลง</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </td>


                                @endforeach

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        {!! $books->render() !!}
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection


@push('styles-head')
<style></style>

@endpush


@push('scripts-after')

<script>
    var YOUR_MESSAGE_STRING_CONST = "ต้องการลบหนังสือเสียงหรือไม่?";
    $('#btnDelete').on('click', function(e){
        confirmDialog(YOUR_MESSAGE_STRING_CONST, function(){
            //My code to delete
            console.log("deleted!");
        });
    });

    function confirmDialog(message, onConfirm){
        var fClose = function(){
            modal.modal("hide");
        };
        var modal = $("#confirmModal");
        modal.modal("show");
        $("#confirmMessage").empty().append(message);
        $("#confirmOk").unbind().one('click', onConfirm).one('click', fClose);
        $("#confirmCancel").unbind().one("click", fClose);
    }


    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
@endpush

<style>
    .table {
        table-layout: fixed;
        overflow: hidden;
        word-wrap: break-word;
    }
</style>

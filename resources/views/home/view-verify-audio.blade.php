@extends('template.body')

@section('title','Book Can Say : ผู้ดุแลระบบจัดการข้อมูลหนังสือ')

@section('contents')
    <div class="container">
        <div class="card">
            <div class="card-header" style="color: #1f1f1f">
                <h3 class="card-title">จัดการหนังสือ</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th style="width: 7%">No.</th>
                        <th style="width: 15%">ชื่อหนังสือ</th>
                        <th style="width: 10%">ผู้แต่ง</th>
                        <th style="width: 10%">ชื่อผู้อ่าน</th>
                        <th style="width: 10%">ชื่อตอน</th>
                        <th style="width: 10%">ชื่อตอนย่อย</th>
                        <th class="text-center" style="width: 35%">จัดการเสียง</th>
                        <th style="width: 10%">สถานะ</th>
                        <th class="text-center" style="width: 15%">การเผยแพร่</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php $count = $books->firstItem(); @endphp
                    @foreach($books as $key => $book)
                        @foreach($book->audio as $audio)

                            <tr>
                            <td>{{( $count++)}}.</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->authors->first()->name}}</td>
                            <td>{{$book->user->name ?? ''}}</td>
                            <td>
                                    <span class="chapter-name">{{$audio->chapter_name}}</span>

                            </td>
                            <td>
                                    <span class="sub-chapter-name">{{$audio->sub_book_chap}}</span>
                            </td>

                            <td class="text-right">
                                <audio controls>
                                    <source  src="{{route('get.sound', ['file_name' =>  $audio->path])}}" type="audio/wav">
                                    Your browser does not support the audio element.
                                </audio>


                            </td>

                            <td>

                                    @if($audio->status == 'publisher')
                                        <span class="badge-pill badge badge-success">เผยแพร่</span>
                                    @else
                                        <span class="badge-pill badge badge-danger">ไม่เผยแพร่</span>
                                    @endif

                            </td>
                            <td class="text-right">
                                <button class="btn btn-success btn-sm publisher" data-book_id="{{$audio->id}}">
                                    <i class="fa fa-book"></i>
                                    เผยแพร่
                                </button>


                                <button class="btn btn-danger btn-sm unpublish" data-book_id="{{$audio->id}}">
                                    <i class="fa fa-trash"></i>
                                    ไม่เผยแพร่
                                </button>
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
    var route = "{{url('admin/book')}}/"
    $('.unpublish').on('click', function () {
        console.log($(this).data('book_id'))
        $.LoadingOverlay('show')
        updateBook($(this).data('book_id'), 'unpublish')
    })
    $(".publisher").on('click', function () {
        $.LoadingOverlay('show')
        console.log($(this).data('book_id'))
        updateBook($(this).data('book_id'), 'publisher')
    })

    function updateBook(bookId, status) {
        $.LoadingOverlay('hide')
        $.post(route + bookId, {publish_status: status}, function (response) {
            console.log(response)
            window.location.reload()
        }, 'json')
    }
</script>
@endpush

<style>
    .table {
        table-layout: fixed;
        overflow: hidden;
        word-wrap: break-word;
    }
</style>
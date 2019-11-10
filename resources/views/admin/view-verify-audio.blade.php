@extends('template.body')

@section('title','Book Can Say : ผู้ดุแลระบบจัดการข้อมูลหนังสือ')

@section('contents')
    <div class="container">
        <div class="card">
            <div class="card-header" style="color: #1f1f1f">
                <h3 class="card-title">จัดการหนังสือเสียง</h3>
            </div>
            <!-- /.card-header -->
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
                        <th class="text-center" style="width: 15%">การเผยแพร่</th>

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

                                <td class="text-right">
                                    <button class="btn btn-success btn-sm active" data-book_id="{{$audio->id}}"
                                            style="width: 77%">
                                        <i class="fa fa-book"></i>
                                        เผยแพร่
                                    </button>


                                    <button class="btn btn-danger btn-sm inactive" data-book_id="{{$audio->id}}">
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

    var route = "{{url('admin/audio')}}/"
    $('.inactive').on('click', function () {
        console.log($(this).data('book_id'))
        $.LoadingOverlay('show')
        updateAudio($(this).data('book_id'), 'inactive')
    })
    $(".active").on('click', function () {
        $.LoadingOverlay('show')
        console.log($(this).data('book_id'))
        updateAudio($(this).data('book_id'), 'active')
    })

    function updateAudio(audioId, status) {
        $.LoadingOverlay('hide')
        $.post(route + audioId, {status: status}, function (response) {
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

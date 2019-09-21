@extends('template.body')

@section('title','Book Can see : ผู้ดุแลระบบจัดการข้อมูลหนังสือ')

@section('contents')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">จัดการหนังสือ</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>ชื่อหนังสือ</th>
                        <th>ผู้แต่ง</th>
                        <th>ชื่อผู้อ่าน</th>
                        <th>สถานะการเผยแพร่</th>
                        <th class="text-right">จัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $count = $books->firstItem(); @endphp
                    @foreach($books as $key => $book)
                        <tr>
                            <td>{{( $count++)}}.</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->authors->first()->name}}</td>
                            <td>{{$book->user->name ?? ''}}</td>
                            <td>
                                @if($book->publisher == 'publisher')
                                    <span class="badge-pill badge badge-success">เผยแพร่</span>
                                @else
                                    <span class="badge-pill badge badge-danger">ไม่เผยแพร่</span>
                                @endif
                            </td>
                            <td class="text-right">
                                <button class="btn btn-success btn-sm publisher" data-book_id="{{$book->id}}">
                                    <i class="fa fa-book"></i>
                                    เผยแพร่
                                </button>
                                <button class="btn btn-danger btn-sm unpublish" data-book_id="{{$book->id}}">
                                    <i class="fa fa-trash"></i>
                                    ไม่เผยแพร่
                                </button>
                            </td>
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
            $.post(route + bookId, {publisher: status}, function (response) {
                console.log(response)
                window.location.reload()
            }, 'json')
        }
    </script>
@endpush
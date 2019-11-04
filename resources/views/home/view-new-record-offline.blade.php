@extends('template.body')

@push('styles-head')
    {{-- include file counter css --}}
    @component('template.counter-style') @endcomponent
@endpush

@section('contents')
    <div class="container">
        <form action="{{route("view-offline-upload.file")}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">อัพโหลดเสียงแบบออพไลน์</div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{request('id')}}">
                        <div><label>เลือกไฟล์เพื่ออัพโหลด</label></div>
                        <div class="form-group">
                            <input type="file" name="select_audio" id="select_audio"
                                   value="{{old('select_audio')}}">
                        </div>
                        <div class="form-group">
                            <input name="chapter_name" type="text" class="form-control" placeholder="ชื่อบทที่อ่าน"
                                   id="chapter_name">
                        </div>

                        <div class="form-group">
                            <input name="total_page" type="text" class="form-control" placeholder="จำนวนหน้า"
                                   id="total_page">
                        </div>
                        <input type="submit" class="btn btn-primary">
{{--                        <button type="submit" id="uploadOfflineButton" class="btn btn-danger">อัพโหลดเสียง</button>--}}
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection




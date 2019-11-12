@extends('template.body')

@push('styles-head')
    {{-- include file counter css --}}
    @component('template.counter-style') @endcomponent
@endpush

@section('contents')
    <div class="container">
        <form action="{{url('/view-new-record/upload')}}" method="post" enctype="multipart/form-data">

            <div class="row mt-4">
                <div class="col">
                    <div class="card">

                        <div class="card-header">คุณมีเวลาในการอัดเสียง 30 นาที</div>
                        <div class="card-body">
                            <div class="clockdiv">
                                <div>
                                    <span class="minutes" id="minute"></span>
                                    <div class="smalltext">นาที</div>
                                </div>
                                <div>
                                    <span class="seconds" id="second"></span>
                                    <div class="smalltext">วินาที</div>
                                </div>
                            </div>
                            <div class="timeup"></div>
                        </div>
                    </div>
                    <div class="card-header">บันทึกเสียงของคุณแบบออนไลน์</div>
                    <div class="card-body">
                        <button id="recordButton" class="btn btn-danger" onclick="CountDown.Timer.toggle();">
                            เริ่มอัด
                        </button>
                        <button id="pauseButton" class="btn btn-secondary" onclick="CountDown.Timer.toggle();"
                                disabled>
                            หยุดพัก
                        </button>
                        <button id="stopButton" class="btn btn-secondary" onclick="CountDown.resetStopwatch();"
                                disabled>หยุด
                        </button>
                        <div id="formats">กดเริ่มเพื่ออัดเสียง</div>
                    </div>
                    <ul id="recordingsList" class="list-group"></ul>
                </div>


        </form>

        <input type="hidden" name="book_id" value="{{request('book_id')}}">
        {{--        {{dd($data->pdf)}}--}}
        <div class="col">

        <div class="card">
            <iframe src="{{route('render.pdf',['file_name' => $data->pdf])}}"
                    width="700px" height="1000px">
            </iframe>
        </div>
    </div>
    </div>


    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-md-4 block">--}}
    {{--                <div class="circle">--}}
    {{--                    <p>หรือ</p>--}}
    {{--                </div>--}}
    {{--                <div>--}}
    {{--                    <button onclick="window.location.href='/view-offline-upload'">อัพโหลดเสียงของคุณแบบออฟไลน์</button>--}}
    {{--                    <input type="button" value="อัพโหลดเสียงของคุณแบบออฟไลน์"--}}
    {{--                           onclick="window.location.href='/view-offline-upload'"/>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <form action="{{route("view-offline-upload.file")}}" method="post" enctype="multipart/form-data">--}}
    {{--            {{csrf_field()}}--}}
    {{--            <div class="col-md-10">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">อัพโหลดเสียงแบบออฟไลน์</div>--}}
    {{--                    <div class="card-body">--}}
    {{--                        <input  type="hidden" name="book_id" value="{{request('book_id')}}">--}}
    {{--                        <div><label>เลือกไฟล์เพื่ออัพโหลด</label></div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input type="file" name="select_audio" id="select_audio"--}}
    {{--                                   value="{{old('select_audio')}}">--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input name="chapter_name" type="text" class="form-control" placeholder="ชื่อบทที่อ่าน"--}}
    {{--                                   id="chapter_name">--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group">--}}
    {{--                            <input name="total_page" type="text" class="form-control" placeholder="จำนวนหน้า"--}}
    {{--                                   id="total_page">--}}
    {{--                        </div>--}}
    {{--                        <input type="submit" class="btn btn-primary" value="อัพโหลด">--}}
    {{--                        --}}{{--                        <button type="submit" id="uploadOfflineButton" class="btn btn-danger">อัพโหลดเสียง</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </form>--}}



@endsection

@push('scripts-after')
    {{--include file counter javascript--}}
    @component('template.counter-js') @endcomponent
    <script>
        var uploadUrlSoundUrl = "{{route('submit.upload.sound')}}"
    </script>
    <script src="{{asset('js/base.js')}}"></script>
    <script src="{{asset('js/recorder.js')}}"></script>

@endpush


@push('styles-head')
    <style>
        .audio-list {
            list-style-type: none;
        }

    </style>
@endpush

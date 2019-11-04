@extends('template.body')

@push('styles-head')
    {{-- include file counter css --}}
    @component('template.counter-style') @endcomponent
@endpush

@section('contents')
    <div class="container">
        <form action="{{url('/view-new-record/upload')}}" method="post" enctype="multipart/form-data">

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
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

                </div>
                <div class="col-md-6">
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
                </div>
            </div>
        </form>
        <div class="row justify-content-center">
            <div class="col-md-4 block">
                <div class="circle">
                    <p>หรือ</p>
                    <input type="button" value="Put Your Text Here" onclick="window.location.href='view-new-record-offline'" />
                </div>
            </div>
        </div>
        {{--        <div class="card">--}}
        {{--            <div class="card-header">อัพโหลดไฟล์จากเครื่องของคุณ</div>--}}
        {{--            <div class="card-body">--}}
        {{--                <div class="input-group mb-3">--}}
        {{--                    <div class="input-group-prepend">--}}
        {{--                        <span class="input-group-text">MP3 file</span>--}}
        {{--                    </div>--}}
        {{--                    <div class="custom-file">--}}
        {{--                        <input type="file" class="custom-file-input" id="uploadFile">--}}
        {{--                        <label class="custom-file-label" for="uploadFile">เลือกไฟล์เพื่ออัพโหลด</label>--}}
        {{--                    </div>--}}
        {{--                    <div class="input-group-append">--}}
        {{--                        <button class="btn btn-outline-primary" type="submit">อัพโหลด</button>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        <form action="{{url('/view-new-record-offline/upload')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">อัพโหลดเสียงแบบออพไลน์</div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{request('id')}}">
                        <div><label>เลือกไฟล์เพื่ออัพโหลด</label></div>
                        <div class="form-group">
                            <input type="file" name="select_audio" id="select_audio" value="{{old('select_audio')}}">
                        </div>
                        <div class="form-group">
                            <input name="chapter_name" type="text" class="form-control" placeholder="ชื่อบทที่อ่าน"
                                   id="chapter_name">
                        </div>

                        <div class="form-group">
                            <input name="total_page" type="text" class="form-control" placeholder="จำนวนหน้า"
                                   id="total_page">
                        </div>
                        <button type="submit" id="uploadOfflineButton" class="btn btn-danger">อัพโหลดเสียง</button>
                    </div>
                </div>
            </div>
        </form>


        {{--        <table class="table">--}}
        {{--            <tr>--}}
        {{--                <td width="40%" align="right"><label> เลือกไฟล์เพื่ออัพโหลด </label></td>--}}
        {{--                <td width="30"><input type="file" name="select_image"/></td>--}}
        {{--                <td width="30%" align="left">--}}
        {{--                    <input type="submit" name="upload" class="btn btn-primary"--}}
        {{--                           value="อัพโหลด"></td>--}}
        {{--            </tr>--}}
        {{--            <tr>--}}
        {{--                <td width="40%" align="right"></td>--}}
        {{--                <td width="30"><span class="text-muted">อัพโหลดเป็นไฟล์ .mp3 เท่านั้น!!</span></td>--}}
        {{--                <td width="30%" align="left"></td>--}}
        {{--            </tr>--}}
        {{--        </table>--}}

    </div>
    </div>
    </div>

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

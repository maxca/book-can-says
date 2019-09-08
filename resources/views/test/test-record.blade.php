@extends('template.body')

@push('styles-head')
    {{-- include file counter css --}}
    @component('template.counter-style') @endcomponent
@endpush

@section('contents')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">บันทึกเสียงของคุณแบบออนไลน์</div>
                    <div class="card-body">
                        <button id="recordButton" class="btn btn-danger" onclick="CountDown.Timer.toggle();">Record</button>
                        <button id="pauseButton" class="btn btn-secondary" onclick="CountDown.Timer.toggle();" disabled>Pause</button>
                        <button id="stopButton" class="btn btn-secondary" onclick="CountDown.resetStopwatch();" disabled>Stop</button>
                        <div id="formats">Format: start recording to see sample rate</div>

                        <ol id="recordingsList"></ol>
                    </div>
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
        <div class="row justify-content-center">
            <div class="col-md-4 block">
                <div class="circle">
                    <p>หรือ</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">อัพโหลดไฟล์จากเครื่องของคุณ</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td width="40%" align="right"><label> เลือกไฟล์เพื่ออัพโหลด </label></td>
                        <td width="30"><input type="file" name="select_image"/></td>
                        <td width="30%" align="left">
                            <input type="submit" name="upload" class="btn btn-primary"
                                   value="อัพโหลด"></td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"></td>
                        <td width="30"><span class="text-muted">อัพโหลดเป็นไฟล์ .mp3 เท่านั้น!!</span></td>
                        <td width="30%" align="left"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts-after')
    {{--include file counter javascript--}}
    @component('template.counter-js') @endcomponent
    <script src="{{asset('js/sound/base.js')}}"></script>
    <script src="{{asset('js/sound/recorder.js')}}"></script>

@endpush

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

            </div>

        </form>
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

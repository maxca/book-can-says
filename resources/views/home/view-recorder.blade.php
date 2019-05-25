@extends('template.body')

@section('contents')
    <script src="{{asset('js/base.js')}}"></script>
    <script src="{{asset('js/recorder.js')}}"></script>

    <div class="container">
        <div class="item">

            <div id="controls">
                <button id="recordButton">Record</button>
                <button id="pauseButton" disabled>Pause</button>
                <button id="stopButton" disabled>Stop</button>
            </div>

        </div>
            <div id="formats">Format: start recording to see sample rate</div>
            <h3>Recordings</h3>
            <ol id="recordingsList"></ol>





    @endsection


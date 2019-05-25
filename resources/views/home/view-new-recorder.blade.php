@extends('template.body')
@section('contents')
{{--    <link rel="stylesheet" href="{{asset('css/style.css') }}">--}}
    <script src="{{asset('js/base.js')}}"></script>
    <script src="{{asset('js/recorder.js')}}"></script>


    <div class="container">
        <div class="item">

            <div id="controls">
{{--                <button type="button" class="btn btn-default btn-circle btn-lg" id="recordButton">Record--}}
{{--                </button>--}}

                <button id="recordButton" class="btn btn-danger">Record</button>
                <button id="pauseButton" class="btn" disabled>Pause</button>
                <button id="stopButton" class="btn" disabled>Stop</button>
                <h5>บันทึกเสียงของคุณแบบออนไลน์</h5>
                <hr class="my-4">

                <div>
                    <br><br>
                    <h5>หรือ</h5><br>
                    <h3>อัพโหลดไฟล์จากเครื่องของคุณ</h3>
                    <table class="table">
                    <tr>
                        <td width="40%" align="right"><label> เลือกไฟล์เพื่ออัพโหลด </label></td>
                        <td width="30"><input type="file" name="select_image" /></td>
                        <td width="30%" align="left"><input type="submit" name="upload" class="btn btn-primary" value="อัพโหลด"></td>
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

        <ol id="recordingsList"></ol>


@endsection

@extends('template.body')
@section('contents')
{{--    <link rel="stylesheet" href="{{asset('css/main.css') }}">--}}
    <script src="{{asset('js/base.js')}}"></script>
    <script src="{{asset('js/recorder.js')}}"></script>


    <div class="container">
        <div class="item">

            <div id="controls">
{{--                <button type="button" class="btn btn-default btn-circle btn-lg" id="recordButton">Record--}}
{{--                </button>--}}
                <button id="recordButton">Record</button>
                <button id="pauseButton" disabled>Pause</button>
                <button id="stopButton" disabled>Stop</button>

                <div>
                <br><br><br>
                    <h1>อัพโหลดไฟล์จากเครื่องของคุณ</h1>
                    <table class="table">
                    <tr>
                        <td width="40%" align="right"><label> เลือกไฟล์เพื่ออัพโหลด </label></td>
                        <td width="30"><input type="file" name="select_image" /></td>
                        <td width="30%" align="left"><input type="submit" name="upload" class="btn btn-primary" value="อัพโหลด"></td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"></td>
                        <td width="30"><span class="text-muted">อัพโหลดเป็นไฟล์ mp3 เท่านั้น!!</span></td>
                        <td width="30%" align="left"></td>
                    </tr>
                </table>
                </div>
            </div>
            </form>
            </div>

        </div>

        <ol id="recordingsList"></ol>


@endsection

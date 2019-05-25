<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Simple Recorder.js demo with record, stop and pause</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css') }}">


</head>
<body>
<h1>Simple Recorder.js demo</h1>
<p>
    Matt Diamond‘s <a href="https://github.com/mattdiamond/Recorderjs">Recorder.js</a> is a popular JavaScript library
    for recording audio in the browser as uncompressed pcm audio in .wav containers. Before it the only way to record
    audio was to use Flash.
</p>

<p>Check out the <a href="https://github.com/addpipe/simple-recorderjs-demo" target="_blank">code on GitHub</a> and our
    <a href="https://addpipe.com/blog/using-recorder-js-to-capture-wav-audio-in-your-html5-web-site/" target="_blank">blog
        post on using Recorder.js to capture WAV audio</a>.</p>
<div id="controls">
    <button id="recordButton">Record</button>
    <button id="pauseButton" disabled>Pause</button>
    <button id="stopButton" disabled>Stop</button>
</div>
<div id="formats">Format: start recording to see sample rate</div>
<h3>Recordings</h3>
<ol id="recordingsList"></ol>

<!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
<script src="{{asset('js/base.js')}}"></script>
<script src="{{asset('js/recorder.js')}}"></script>

<style>
    /*body{*/
    /*text-align: center;*/
    /*background: #00ECB9;*/
    /*font-family: sans-serif;*/
    /*font-weight: 100;*/
    /*}*/
    /*h1{*/
    /*color: #396;*/
    /*font-weight: 100;*/
    /*font-size: 40px;*/
    /*margin: 40px 0px 20px;*/
    /*}*/
    .clockdiv {
        font-family: sans-serif;
        color: #fff;
        display: inline-block;
        font-weight: 100;
        text-align: center;
        font-size: 30px;
    }

    .clockdiv > div {
        padding: 10px;
        border-radius: 3px;
        background: #00BF96;
        display: inline-block;
    }

    .clockdiv div > span {
        padding: 15px;
        border-radius: 3px;
        background: #00816A;
        display: inline-block;
    }

    .smalltext {
        padding-top: 5px;
        font-size: 16px;
    }

    .show-timer {
        display: none;
    }
</style>
<div class="container show-timer">
    <h1>Countdown Clock</h1>
    <div class="clockdiv">
        <div>
            <span class="minutes" id="minute"></span>
            <div class="smalltext">Minutes</div>
        </div>
        <div>
            <span class="seconds" id="second"></span>
            <div class="smalltext">Seconds</div>
        </div>
    </div>
    <div class="timeup"></div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
</script>
<script src="{{asset('js/jquery.timer.js')}}"></script>
<script>
    $('#recordButton:not(:disabled)').on('click', function () {
        $('.show-timer').show();
        countDown('start');
    });

    $('#pauseButton').on('click', function () {
        console.log('pauseButton')
        $('.show-timer').show();
        countDown('pause');
    });

    function countDown(type) {
        var setTime = 30;  // 30 minute
        var deadline = new Date();
        deadline = deadline.setMinutes(deadline.getMinutes() + setTime);

        var timer = $.timer(function () {
            var now = new Date().getTime();
            // console.log(now);
            // console.log(deadline);

            var t = deadline - now;
            // var days = Math.floor(t / (1000 * 60 * 60 * 24));
            // var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((t % (1000 * 60)) / 1000);
            // document.getElementById("day").innerHTML =days ;
            // document.getElementById("hour").innerHTML =hours;
            document.getElementById("minute").innerHTML = minutes;
            document.getElementById("second").innerHTML = seconds;
            if (t < 0) {
                $('#stopButton').click();
                $('#recordButton').attr('disabled', 'disabled');
                $('#stopButton').attr('disabled', 'disabled');
                timer.stop();
                $('.timeup').html('Time up');

                document.getElementById("minute").innerHTML = '0';
                document.getElementById("second").innerHTML = '0';
            }
        });
        timer.set({time: 10, autostart: true});
        if (type == 'start') {
            timer.play()
        } else {
            timer.pause();
        }

    }

</script>
</body>
</body>

</html>
<script src="{{asset('js/jquery.timer.js')}}"></script>

<script>

    var CountDown = new (function () {
        var $setTime = 30;  // 30 minute

        // Stopwatch element on the page
        var $stopwatch;
        var $deadline;

        var $minute = $("#minute");
        var $second = $("#second");

        // Timer speed in milliseconds
        var incrementTime = 1000;

        // Current timer position in milliseconds
        var currentTime = 0;

        // Start the timer
        $(function () {
            $deadline = new Date();
            $deadline = $deadline.setMinutes($deadline.getMinutes() + $setTime);
            $stopwatch = $('#stopwatch');

            CountDown.Timer = $.timer(updateTimer, incrementTime, false);
        });

        // Output time and increment
        function updateTimer() {
            var timeString = formatTime(currentTime);
            $stopwatch.html(timeString);
            currentTime += incrementTime;

            var now = new Date().getTime();
            // console.log(now);
            // console.log(deadline);
            var k = ($setTime * 60 * 1000) - currentTime;
            var t = $deadline - now;

            var min = Math.floor((k % (1000 * 60 * 60)) / (1000 * 60));
            var sec = Math.floor((k % (1000 * 60)) / 1000);

            $minute.html(min)
            $second.html(sec)
            if (min == 0 && sec == 0) {
                alert('หมดเวลาแล้วค่ะ')
                CountDown.resetStopwatch()
                $("#stopButton").click();
            }
        }

        // Reset timer
        this.resetStopwatch = function () {
            $minute.html(0);
            $second.html(0);
            currentTime = 0;
            CountDown.Timer.stop().once();

        };

    });

    // Common functions
    function pad(number, length) {
        var str = '' + number;
        while (str.length < length) {
            str = '0' + str;
        }
        return str;
    }

    function formatTime(time) {
        time = time / 10;
        var min = parseInt(time / 6000),
            sec = parseInt(time / 100) - (min * 60),
            hundredths = pad(time - (sec * 100) - (min * 6000), 2);
        return (min > 0 ? pad(min, 2) : "00") + ":" + pad(sec, 2) + ":" + hundredths;
    }

</script>
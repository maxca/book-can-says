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
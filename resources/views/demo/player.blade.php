<div id="app-cover">
    {{--<div id="bg-artwork"></div>--}}
    {{--<div id="bg-layer"></div>--}}
    <div id="player">
        {{--<div id="player-track">--}}
            {{--<div id="album-name"></div>--}}
            {{--<div id="track-name"></div>--}}
            {{--<div id="track-time">--}}
                {{--<div id="current-time"></div>--}}
                {{--<div id="track-length"></div>--}}
            {{--</div>--}}
            {{--<div id="s-area">--}}
                {{--<div id="ins-time"></div>--}}
                {{--<div id="s-hover"></div>--}}
                {{--<div id="seek-bar"></div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div id="player-content">
            {{--<div id="album-art">--}}
                {{--@foreach($sound['albumArtworksLink'] as $key => $covers)--}}
                    {{--<img src="{{$covers}}" alt="ปกหนังสือ"--}}
                         {{--class="active cover-sound" id="{{$sound['albumArtworks'][$key]}}">--}}
                {{--@endforeach--}}

                {{--<div id="buffer-box">กำลังโหลด</div>--}}
            {{--</div>--}}
            <div id="row  player-controls">
                <div class="control col">
                    <div class="button" id="play-previous">
                        <i class="btn fa fa-backward" aria-label="กดสองครั้งเพื่อตอนก่อนหน้า" alt="กดสองครั้งเพื่อตอนก่อนหน้า"></i>
                    </div>
                </div>
                <div class="col"></div>
                <div class="control col">
                    <div class="button" id="play-pause-button">
                        <i class="btn fa-play" aria-label="กดเล่นเสียงหรือหยุดเล่น" alt="กดเล่นเสียงหรือหยุดเล่น"></i>
                    </div>
                </div>
                <div class="col"></div>
                <div class="control col">
                    <div class="button" id="play-next">
                        <i class="btn fa fa-forward" aria-label="กดสองครั้งเพื่อไปตอนถัดไป" alt="กดสองครั้งเพื่อไปตอนถัดไป"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts-after')
    <script>
        $(function () {
            var playerTrack = $("#player-track"), bgArtwork = $('#bg-artwork'), bgArtworkUrl,
                albumName = $('#album-name'), trackName = $('#track-name'), albumArt = $('#album-art'),
                sArea = $('#s-area'), seekBar = $('#seek-bar'), trackTime = $('#track-time'), insTime = $('#ins-time'),
                sHover = $('#s-hover'), playPauseButton = $("#play-pause-button"), i = playPauseButton.find('i'),
                tProgress = $('#current-time'), tTime = $('#track-length'), seekT, seekLoc, seekBarPos, cM, ctMinutes,
                ctSeconds, curMinutes, curSeconds, durMinutes, durSeconds, playProgress, bTime, nTime = 0,
                buffInterval = null, tFlag = false,
                albums = @json($sound['albums']),
                trackNames = @json($sound['trackNames']),
                albumArtworks = @json($sound['albumArtworks']),
                trackUrl = @json($sound['trackUrl']),
                playPreviousTrackButton = $('#play-previous'), playNextTrackButton = $('#play-next'), currIndex = -1, old = 0;


            $(".list_sound").on('click', function () {
                $(".list_sound").removeClass("active");
                $(this).addClass('active');
                var loop = $(this).data('id');
                if(old == 0) {

                    if(old == 0 && loop == 1) {
                        playPause()
                    } else {
                        for (var i =0; i < loop-1; i++) {
                            selectTrack(1);
                        }
                    }
                }

                else if(old < loop) {
                    for (var i =0; i < (loop - old); i++) {
                        console.log('i', i)
                        selectTrack(1);
                        console.log('more',old - loop)
                    }
                }else if(old == loop) {
                    playPause()
                }
                else {
                    for (var i =0; i < (old - loop); i++) {
                        console.log('i', i)
                        console.log('lesse',old - loop)
                        selectTrack(-1);
                    }
                }
                console.log('old',old);
                console.log('loop',loop);
                old = loop;


            });

            function playPause() {
                setTimeout(function () {
                    if (audio.paused) {
                        playerTrack.addClass('active');
                        albumArt.addClass('active');
                        checkBuffering();
                        i.attr('class', 'fa fa-pause');
                        audio.play();
                    }
                    else {
                        playerTrack.removeClass('active');
                        albumArt.removeClass('active');
                        clearInterval(buffInterval);
                        albumArt.removeClass('buffering');
                        i.attr('class', 'fa fa-play');
                        audio.pause();
                    }
                }, 300);
            }


            function showHover(event) {
                seekBarPos = sArea.offset();
                seekT = event.clientX - seekBarPos.left;
                seekLoc = audio.duration * (seekT / sArea.outerWidth());

                sHover.width(seekT);

                cM = seekLoc / 60;

                ctMinutes = Math.floor(cM);
                ctSeconds = Math.floor(seekLoc - ctMinutes * 60);

                if ((ctMinutes < 0) || (ctSeconds < 0))
                    return;

                if ((ctMinutes < 0) || (ctSeconds < 0))
                    return;

                if (ctMinutes < 10)
                    ctMinutes = '0' + ctMinutes;
                if (ctSeconds < 10)
                    ctSeconds = '0' + ctSeconds;

                if (isNaN(ctMinutes) || isNaN(ctSeconds))
                    insTime.text('--:--');
                else
                    insTime.text(ctMinutes + ':' + ctSeconds);

                insTime.css({'left': seekT, 'margin-left': '-21px'}).fadeIn(0);

            }

            function hideHover() {
                sHover.width(0);
                insTime.text('00:00').css({'left': '0px', 'margin-left': '0px'}).fadeOut(0);
            }

            function playFromClickedPos() {
                audio.currentTime = seekLoc;
                seekBar.width(seekT);
                hideHover();
            }

            function updateCurrTime() {
                nTime = new Date();
                nTime = nTime.getTime();

                if (!tFlag) {
                    tFlag = true;
                    trackTime.addClass('active');
                }

                curMinutes = Math.floor(audio.currentTime / 60);
                curSeconds = Math.floor(audio.currentTime - curMinutes * 60);

                durMinutes = Math.floor(audio.duration / 60);
                durSeconds = Math.floor(audio.duration - durMinutes * 60);

                playProgress = (audio.currentTime / audio.duration) * 100;

                if (curMinutes < 10)
                    curMinutes = '0' + curMinutes;
                if (curSeconds < 10)
                    curSeconds = '0' + curSeconds;

                if (durMinutes < 10)
                    durMinutes = '0' + durMinutes;
                if (durSeconds < 10)
                    durSeconds = '0' + durSeconds;

                if (isNaN(curMinutes) || isNaN(curSeconds))
                    tProgress.text('00:00');
                else
                    tProgress.text(curMinutes + ':' + curSeconds);

                if (isNaN(durMinutes) || isNaN(durSeconds))
                    tTime.text('00:00');
                else
                    tTime.text(durMinutes + ':' + durSeconds);

                if (isNaN(curMinutes) || isNaN(curSeconds) || isNaN(durMinutes) || isNaN(durSeconds))
                    trackTime.removeClass('active');
                else
                    trackTime.addClass('active');


                seekBar.width(playProgress + '%');

                if (playProgress == 100) {
                    i.attr('class', 'fa fa-play');
                    seekBar.width(0);
                    tProgress.text('00:00');
                    albumArt.removeClass('buffering').removeClass('active');
                    clearInterval(buffInterval);
                }
            }

            function checkBuffering() {
                clearInterval(buffInterval);
                buffInterval = setInterval(function () {
                    if ((nTime == 0) || (bTime - nTime) > 1000)
                        albumArt.addClass('buffering');
                    else
                        albumArt.removeClass('buffering');

                    bTime = new Date();
                    bTime = bTime.getTime();

                }, 100);
            }

            function selectTrack(flag) {
                console.log('flag',flag)
                if (flag == 0 || flag == 1)
                    ++currIndex;
                else
                    --currIndex;

                if ((currIndex > -1) && (currIndex < albumArtworks.length)) {
                    if (flag == 0)
                        i.attr('class', 'fa fa-play');
                    else {
                        albumArt.removeClass('buffering');
                        i.attr('class', 'fa fa-pause');
                    }

                    seekBar.width(0);
                    trackTime.removeClass('active');
                    tProgress.text('00:00');
                    tTime.text('00:00');

                    currAlbum = albums[currIndex];
                    currTrackName = trackNames[currIndex];
                    currArtwork = albumArtworks[currIndex];

                    audio.src = trackUrl[currIndex];

                    nTime = 0;
                    bTime = new Date();
                    bTime = bTime.getTime();

                    if (flag != 0) {
                        audio.play();
                        playerTrack.addClass('active');
                        albumArt.addClass('active');

                        clearInterval(buffInterval);
                        checkBuffering();
                    }

                    albumName.text(currAlbum);
                    trackName.text(currTrackName);
                    albumArt.find('img.active').removeClass('active');
                    $('#' + currArtwork).addClass('active');

                    bgArtworkUrl = $('#' + currArtwork).attr('src');

                    bgArtwork.css({'background-image': 'url(' + bgArtworkUrl + ')'});
                }
                else {
                    if (flag == 0 || flag == 1)
                        --currIndex;
                    else
                        ++currIndex;
                }
            }

            function initPlayer() {
                audio = new Audio();

                selectTrack(0);

                audio.loop = false;

                playPauseButton.on('click', playPause);

                sArea.mousemove(function (event) {
                    showHover(event);
                });

                sArea.mouseout(hideHover);

                sArea.on('click', playFromClickedPos);

                $(audio).on('timeupdate', updateCurrTime);

                playPreviousTrackButton.on('click', function () {
                    selectTrack(-1);
                });
                playNextTrackButton.on('click', function () {
                    selectTrack(1);
                });
            }

            initPlayer();
        });
    </script>
@endpush

//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording

// shim for AudioContext when it's not avb.
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record

var recordButton = document.getElementById("recordButton");
var stopButton = document.getElementById("stopButton");
var pauseButton = document.getElementById("pauseButton");

//add events to those 2 buttons
recordButton.addEventListener("click", startRecording);
stopButton.addEventListener("click", stopRecording);
pauseButton.addEventListener("click", pauseRecording);

function startRecording() {
    console.log("recordButton clicked");

    /*
     Simple constraints object, for more advanced audio features see
     https://addpipe.com/blog/audio-constraints-getusermedia/
     */

    var constraints = {audio: true, video: false}

    /*
     Disable the record button until we get a success or fail from getUserMedia()
     */

    recordButton.disabled = true;
    stopButton.disabled = false;
    pauseButton.disabled = false

    /*
     We're using the standard promise based getUserMedia()
     https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
     */

    navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
        console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

        /*
         create an audio context after getUserMedia is called
         sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
         the sampleRate defaults to the one set in your OS for your playback device
         */
        audioContext = new AudioContext();

        //update the format
        document.getElementById("formats").innerHTML = "Format: 1 channel pcm @ " + audioContext.sampleRate / 1000 + "kHz"

        /*  assign to gumStream for later use  */
        gumStream = stream;

        /* use the stream */
        input = audioContext.createMediaStreamSource(stream);

        /*
         Create the Recorder object and configure to record mono sound (1 channel)
         Recording 2 channels  will double the file size
         */
        rec = new Recorder(input, {numChannels: 1})

        //start the recording process
        rec.record()

        console.log("Recording started");

    }).catch(function (err) {
        //enable the record button if getUserMedia() fails
        recordButton.disabled = false;
        stopButton.disabled = true;
        pauseButton.disabled = true
    });
}

function pauseRecording() {
    console.log("pauseButton clicked rec.recording=", rec.recording);
    if (rec.recording) {
        //pause
        rec.stop();
        pauseButton.innerHTML = "Resume";
    } else {
        //resume
        rec.record()
        pauseButton.innerHTML = "Pause";

    }
}

function stopRecording() {
    console.log("stopButton clicked");

    //disable the stop button, enable the record too allow for new recordings
    stopButton.disabled = true;
    recordButton.disabled = false;
    pauseButton.disabled = true;

    //reset button just in case the recording is stopped while paused
    pauseButton.innerHTML = "Pause";

    //tell the recorder to stop the recording
    rec.stop();

    //stop microphone access
    gumStream.getAudioTracks()[0].stop();

    //create the wav blob and pass it on to createDownloadLink
    rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {

    var url = URL.createObjectURL(blob);
    var au = document.createElement('audio');
    var li = document.createElement('li');
    var li2 = document.createElement('li');
    var li3 = document.createElement('li');
    var li4 = document.createElement('li');
    var link = document.createElement('a');
    var ptag = document.createElement('p');


    //name of .wav file to use during upload and download (without extendion)
    var filename = new Date().toISOString();

    //add controls to the <audio> element
    au.controls = true;
    au.src = url;

    //save to disk link
    link.href = url;
    link.className = "btn btn-secondary"
    link.download = filename + ".wav"; //download forces the browser to donwload the file using the  filename
    link.innerHTML = "บันทึก";

    // add class audio listing
    li2.setAttribute('class', 'audio-list');
    li3.setAttribute('class', 'audio-list');
    li4.setAttribute('class', 'audio-list');


    //add the new audio element to li
    li2.appendChild(ptag.appendChild(au));

    //add the filename to the li
    li3.appendChild(ptag.appendChild(document.createTextNode( "ชื่อไฟล์ :" + filename + ".wav")))

    //add the save to disk link to li
    li4.appendChild(ptag.appendChild(link));

    //upload link
    var upload = document.createElement('a');
    upload.href = "javascript:void(0);";
    upload.id = "uploadSound"
    upload.className ="btn btn-danger"
    upload.innerHTML = "อัพโหลด";

    upload.addEventListener("click", function (event) {
        // add show loading
        $.LoadingOverlay('show')
        var xhr = new XMLHttpRequest();
        xhr.onload = function (e) {
            // add hide loading
            $.LoadingOverlay('hide')
            if (this.readyState === 4) {

                alert('upload success')
                console.log("Server returned: ", e.target.responseText);
            }
        };
        var fd = new FormData();
        // custom post form data
        // send to server
        fd.append("audio_data", blob, filename);
        fd.append("book_id", getQueryString('book_id'))
        // uploadUrlSoundUrl form set on .blade file
        // section script
        xhr.open("POST", uploadUrlSoundUrl, true);
        xhr.send(fd);

        document.getElementById("mySpan").innerHTML = HTTPRequest.responseText;
        document.getElementById("book_category_id").value = '';
        document.getElementById("book_chap_id").value = '';
        document.getElementById("path").value = '';
        document.getElementById("total_page").value = '';
        document.getElementById("sub_book_chap").value = '';
        document.getElementById("amoung_listening").value = '';


    })


    li.appendChild(document.createTextNode(" "))//add a space in between
    li.appendChild(upload)//add the upload link to li

    li4.appendChild(document.createTextNode(" "))//add a space in between
    li4.appendChild(upload)//add the upload link to li


    //add the li element to the ol

    recordingsList.appendChild(li2);
    recordingsList.appendChild(li3);
    recordingsList.appendChild(li4);
}

function getQueryString(key) {
    var queryString = location.search;
    var urlParams = new URLSearchParams(queryString)
    if(urlParams.has(key)) {
        return urlParams.get(key)
    }
    return ''
}
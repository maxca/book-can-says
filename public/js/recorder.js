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
    var time = Date.now()
    var url = URL.createObjectURL(blob);
    var au = document.createElement('audio');
    var li = document.createElement('li');
    var li2 = document.createElement('li');
    var li3 = document.createElement('li');
    var li4 = document.createElement('li');
    var li5 = document.createElement('li');


    var link = document.createElement('a');
    var ptag = document.createElement('p');
    var inputTextChapterName = document.createElement('input')
    var inputTextTotalPage = document.createElement('input')
    var inputTextSubChap = document.createElement('input')
    var formInput = document.createElement('form')

    var listInputPage = document.createElement('li');

    formInput.className = "form form-control"

    // create input text chapter name
    inputTextChapterName.name = "chapter_name"
    inputTextChapterName.type = "text"
    inputTextChapterName.className = "form-control"
    inputTextChapterName.placeholder = "ชื่อบทที่อ่าน"
    inputTextChapterName.setAttribute('id', 'chapter_name_' + time)

    // create input text total page
    inputTextTotalPage.name = "total_page"
    inputTextTotalPage.type = "text"
    inputTextTotalPage.className = "form-control"
    inputTextTotalPage.placeholder = "จำนวนหน้า"
    inputTextTotalPage.setAttribute('id', 'total_page_' + time)

    // create input text sub chap
    inputTextSubChap.name = "sub_book_chap"
    inputTextSubChap.type = "text"
    inputTextSubChap.className = "form-control"
    inputTextSubChap.placeholder = "บทย่อย"
    inputTextSubChap.setAttribute('id', 'sub_book_chap_' + time)

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
    li.setAttribute('class', 'list-group-item');
    li2.setAttribute('class', 'list-group-item list-group-item-action');
    li3.setAttribute('class', 'list-group-item list-group-item-action');
    li4.setAttribute('class', 'list-group-item list-group-item-warning');
    li5.setAttribute('class', 'list-group-item list-group-item-warning');
    listInputPage.setAttribute('class', 'list-group-item');

    // add input chapter name
    // add input text
    li.appendChild(formInput.appendChild(inputTextChapterName))
    listInputPage.appendChild(inputTextTotalPage)
    listInputPage.appendChild(inputTextSubChap)


    //add the new audio element to li
    li2.appendChild(ptag.appendChild(au));

    //add the filename to the li
    li3.appendChild(ptag.appendChild(document.createTextNode("ชื่อไฟล์ :" + filename + ".wav")))

    //add the save to disk link to li
    li4.appendChild(ptag.appendChild(link));

    //add the save to disk link to li
    li5.appendChild(ptag.appendChild(link));


    //upload link
    var upload = document.createElement('a');
    upload.href = "javascript:void(0);";
    upload.id = "uploadSound" + time
    upload.innerHTML = "อัพโหลด";
    upload.setAttribute('item-key', time)
    upload.setAttribute('class', 'btn btn-danger btn-upload')

    upload.addEventListener("click", function (event) {
        // find element chapter name [input[name='chapter_name']]
        var key = $(this).attr('item-key')
        console.log(key)
        var chapter = document.getElementById('chapter_name_' + key).value
        var totalPage = document.getElementById('total_page_' + key).value
        var subChap = document.getElementById('sub_book_chap_' + key).value

        if (chapter == '') {
            alert('กรุณากรอกชื่อบท')
            document.getElementById('chapter_name_' + key).focus()
            return false
        }
        if (totalPage == '') {
            alert('กรุณากรอกจำนวนหน้า')
            document.getElementById('total_page_' + key).focus()
            return false
        }
        if (subChap == '') {
            alert('กรุณากรอกจำนวนหน้า')
            document.getElementById('sub_book_chap_' + key).focus()
            return false
        }
        console.log(chapter)
        console.log(totalPage)
        console.log(subChap)


        $.LoadingOverlay('show')
        var xhr = new XMLHttpRequest();
        xhr.onload = function (e) {
            // add hide loading
            $.LoadingOverlay('hide')
            if (this.readyState === 4) {
                alert('upload success')
            }
        };
        var fd = new FormData();
        // custom post form data
        // send to server
        fd.append("audio_data", blob, filename);
        fd.append("book_id", getQueryString('book_id'))
        fd.append("chapter_name", chapter)
        fd.append("sub_book_chap", subChap)
        // uploadUrlSoundUrl form set on .blade file
        // section script
        xhr.open("POST", uploadUrlSoundUrl, true);
        xhr.send(fd);

    })


    li.appendChild(document.createTextNode(" "))//add a space in between
    li.appendChild(upload)//add the upload link to li

    li4.appendChild(document.createTextNode(" "))//add a space in between
    li4.appendChild(upload)//add the upload link to li

    li5.appendChild(document.createTextNode(" "))//add a space in between
    li5.appendChild(upload)//add the upload link to li


    //add the li element to the ol

    recordingsList.appendChild(li);
    recordingsList.appendChild(listInputPage);
    recordingsList.appendChild(li2);
    recordingsList.appendChild(li3);
    recordingsList.appendChild(li4);
    recordingsList.appendChild(li5);

}

function getQueryString(key) {
    var queryString = location.search;
    var urlParams = new URLSearchParams(queryString)
    if (urlParams.has(key)) {
        return urlParams.get(key)
    }
    return ''
}
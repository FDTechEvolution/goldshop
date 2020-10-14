<style type="text/css">
    body { font-family: Helvetica, sans-serif; }
    h2, h3 { margin-top:0; }
    form { margin-top: 15px; }
    form > input { margin-right: 15px; }
    #my_camera { }
    </style>

    <div class="row mt-md-2 mb-md-3">

    <div class="col-6 text-center" id="box-cam">
     
        <div id="my_camera" class="col-12"></div>
        <form>
            <button type="button" id="bt-snapshot" class="btn btn-primary mt-md-2" onClick="take_snapshot()">จับภาพ</button>
        </form>
    </div>
    <div class="col-6 text-center" id="results">
        <p>Your captured image will appear here...</p>
    </div>
</div>


<?= $this->Html->script('/css/webcamjs-master/webcam.min.js') ?>

<script language="JavaScript">
    function take_snapshot() {
        // take snapshot and get image data
        Webcam.snap(function (data_uri) {
            // display results in page
            document.getElementById('results').innerHTML =
                    '' +
                    '<img src="' + data_uri + '" class="w-100" id="img-snap"/> <button type="button" id="bt-process" class="btn btn-primary mt-md-2" onClick="saveSnap()">วิเคราะห์</button>';
        });
        shutterPlay();
    }

    function shutterPlay() {
        // preload shutter audio clip
        var shutter = new Audio();
        //shutter.autoplay = true;
        shutter.src = navigator.userAgent.match(/Firefox/) ? SITE_URL + 'css/webcamjs-master/demos/shutter.ogg' : SITE_URL + 'css/webcamjs-master/demos/shutter.mp3';
        shutter.play();
    }

    function saveSnap() {
        // Get base64 value from <img id='imageprev'> source
        var base64image = document.getElementById("img-snap").src;
        //console.log(base64image);

        Webcam.upload(base64image, SITE_URL+'thai-cards/upload-image/', function (code, text) {
            console.log('Save successfully');
            console.log(text);
            console.log(code);
        });

    }


    $(document).ready(function () {
        var width = $('#box-cam').width();
        console.log(width);
        Webcam.set({
            force_flash: true,
            width: 400,
            height: (400/1.78),
            image_format: 'jpeg',
            jpeg_quality: 100,
            constraints: {
                width: 400, // { exact: 320 },
                height:(400/1.78), // { exact: 180 },
                facingMode: 'user',
                frameRate: 30
            }
        });
        Webcam.attach('#my_camera');


    });



</script>
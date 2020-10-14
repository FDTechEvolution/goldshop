
<div class="row mt-md-2 mb-md-1">
    <div class="col-md-12 text-center">
        <button type="button" class="btn btn-dark waves-effect waves-light" id="smartcard-alert" style="display: none;">ดึงข้อมูลจากบัตรประชาชน</button>
        <button type="button" class="btn btn-dark waves-effect waves-light" id="bt-smartcard-detect">ถ่ายบัตรประชาชน</button>
    </div>
</div>
<div class="row " id="box-cam-process" style="display: none;">

    <div class="col-8 offset-2 text-center" id="box-cam">
        <video id="video" width="500" height="300" autoplay id="box-vdo"></video>
        <button id="snap" type="button" class="btn btn-outline-info">จับภาพ</button>

    </div>
    <div class="col-8 offset-2 text-center" id="results" style="display: none;">
        <canvas id="canvas" width="500" height="300"></canvas>
        <button id="bt-process-img" type="button" class="btn btn-outline-secondary">วิเคราะห์</button>
    </div>
    <div class="col-12">
        <span id="t-read"></span>

    </div>
</div>

<script>
    $(document).ready(function () {
        $('#bt-smartcard-detect').on('click', function () {
            if ($('#box-cam-process').is(':visible')) {
                $('#box-cam-process').hide();
            } else {
                $('#box-cam-process').show();
            }

        });
    });

    $(document).ready(function () {
        // Grab elements, create settings, etc.
        var video = document.getElementById('video');

        //Get access to the camera!
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            // Not adding `{ audio: true }` since we only want video now
            navigator.mediaDevices.getUserMedia({video: {facingMode: "environment"}}).then(function (stream) {
                //video.src = window.URL.createObjectURL(stream);
                video.srcObject = stream;
                video.play();
            });
        } else if (navigator.getUserMedia) { // Standard
            navigator.getUserMedia({video: {facingMode: "environment"}}, function (stream) {
                video.src = stream;
                video.play();
            }, errBack);
        } else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
            navigator.webkitGetUserMedia({video: {facingMode: "environment"}}, function (stream) {
                video.src = window.webkitURL.createObjectURL(stream);
                video.play();
            }, errBack);
        } else if (navigator.mozGetUserMedia) { // Mozilla-prefixed
            navigator.mozGetUserMedia({video: {facingMode: "environment"}}, function (stream) {
                video.srcObject = stream;
                video.play();
            }, errBack);
        }



        // Elements for taking the snapshot
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        var video = document.getElementById('video');

        // Trigger photo take
        document.getElementById("snap").addEventListener("click", function () {
            $('#box-cam').hide();
            //navigator.camera.getPicture(camSuccess, camError, {quality: 75, targetWidth: 400, targetHeight: 400, destinationType: Camera.DestinationType.FILE_URI});
            //context.width = $('#box-cam').width();
            //context.height = $('#box-cam').height();
            // console.log($('#box-cam').width());
            $('#canvas').width($('#box-cam').width());
            $('#canvas').height($('#box-cam').height());
            context.drawImage(video, 0, 0, 500, 280);
            $('#results').show();


        });

        $('#--bt-process-img').on('click', function () {
            var dataURL = canvas.toDataURL('image/png');
            //SITE_URL+'thai-cards/upload-image


        });

        $('#bt-process-img').on('click', function () {
            $('#box-cam-process').hide();
            $('#results').hide();
            $('#box-cam').show();
            var dataURL = canvas.toDataURL('image/png');
            //console.log(dataURL);
            dataURL = dataURL.replace('data:image/png;base64,', '');
            var markers = {

                "requests": [
                    {
                        "image": {
                            "content": dataURL
                        },
                        "features": [
                            {
                                "type": "TEXT_DETECTION"
                            }
                        ]
                    }
                ]

            };
            /*
             $.ajax({
             type: "POST",
             url: SITE_URL + 'thai-cards/upload-image',
             data: {
             imgBase64: dataURL
             }
             }).done(function (o) {
             console.log('saved');
             console.log(o);
             });
             * 
             */


            $.ajax({
                type: "POST",
                url: "https://vision.googleapis.com/v1/images:annotate?key=AIzaSyBkxLp24HC_3-QC1pzYJheDv8f9BJKCo4I",
                // The key needs to match your method's input parameter (case-sensitive).
                data: JSON.stringify(markers),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (data) {
                    console.log(data);

                    var datas = data['responses'][0]['textAnnotations'];

                    //Find title
                    var title = 'คุณ';
                    $(datas).each(function (index, text) {
                        var t = $.trim(text['description']);
                        if (t.startsWith('นาย')) {
                            title = 'นาย';
                        } else if (t.startsWith('นาง')) {
                            title = 'นาง';
                        } else if (t.startsWith('นางสาว')) {
                            title = 'นางสาว';
                        }
                    });
                    $('#title').val(title);

                    //Fullname
                    var firstname = '';
                    var lastname = '';
                    $(datas).each(function (index, text) {
                        var t = $.trim(text['description']);
                        if (t.startsWith('ชื่อ')) {
                            firstname = $.trim(datas[index + 2]['description']);
                            lastname = $.trim(datas[index + 3]['description']);

                            $('#firstname').val(firstname);
                            $('#lastname').val(lastname);
                        }
                    });

                    //ID Card
                    $(datas).each(function (index, text) {
                        var t = $.trim(text['description']);
                        if (t.startsWith('เลขประจำ')) {
                            var cardno = datas[index + 1]['description'] + datas[index + 2]['description'] + datas[index + 3]['description'] + datas[index + 4]['description'] + datas[index + 5]['description'];
                            $('#cardno').val(cardno);
                        }
                    });




                    $(datas).each(function (index, text) {
                        var t = $.trim(text['description']);
                        console.log(index + ": " + t);
                        if (index == 0) {
                            $('#t-read').text(t);
                            var t1 = (t.split("\n"));
                            $(t1).each(function (i, text1) {
                                if (text1.startsWith('ที่อยู่')) {
                                    $('#address_line').val(text1);
                                }
                            });
                        }



                    });

                },
                failure: function (errMsg) {
                    console.log(errMsg);
                }
            });
        });
    });
</script>
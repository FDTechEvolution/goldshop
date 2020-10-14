
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


<div id="modal-cam-barcode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-6 text-center">
                        <video id="preview" class="w-100"></video>

                    </div>
                    <div class="col-6 text-center" id="results">
                       
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script type="text/javascript">
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
        mirror:false
    });
    scanner.addListener('scan', function (content) {
        alert(content);
    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
</script>
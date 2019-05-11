<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap-3.3.0.css">
    <script type="text/javascript" src="js/qrscanner/grid.js"></script>
    <script type="text/javascript" src="js/qrscanner/version.js"></script>
    <script type="text/javascript" src="js/qrscanner/detector.js"></script>
    <script type="text/javascript" src="js/qrscanner/formatinf.js"></script>
    <script type="text/javascript" src="js/qrscanner/errorlevel.js"></script>
    <script type="text/javascript" src="js/qrscanner/bitmat.js"></script>
    <script type="text/javascript" src="js/qrscanner/datablock.js"></script>
    <script type="text/javascript" src="js/qrscanner/bmparser.js"></script>
    <script type="text/javascript" src="js/qrscanner/datamask.js"></script>
    <script type="text/javascript" src="js/qrscanner/rsdecoder.js"></script>
    <script type="text/javascript" src="js/qrscanner/gf256poly.js"></script>
    <script type="text/javascript" src="js/qrscanner/gf256.js"></script>
    <script type="text/javascript" src="js/qrscanner/decoder.js"></script>
    <script type="text/javascript" src="js/qrscanner/qrcode.js"></script>
    <script type="text/javascript" src="js/qrscanner/findpat.js"></script>
    <script type="text/javascript" src="js/qrscanner/alignpat.js"></script>
    <script type="text/javascript" src="js/qrscanner/databr.js"></script>
    <script type="text/javascript" src="js/qrscanner/teste.js"></script>
    <script type="text/javascript" src="js/bootstrap-3.3.0/bootstrap-3.3.0.min.js"></script>
    <script>
        function tick() {
            var video                   = document.getElementById("video-preview");
            var qrCanvasElement         = document.getElementById("qr-canvas");
            var qrCanvas                = qrCanvasElement.getContext("2d");
            var width, height;

            if (video.readyState === video.HAVE_ENOUGH_DATA) {
                qrCanvasElement.height  = video.videoHeight;
                qrCanvasElement.width   = video.videoWidth;
                qrCanvas.drawImage(video, 0, 0, qrCanvasElement.width, qrCanvasElement.height);
                try {
                    var result = qrcode.decode();
                    console.log(result)
                    /* Video can now be stopped */
                    video.pause();
                    video.src = "";
                    video.srcObject.getVideoTracks().forEach(track => track.stop());

                    /* Display Canvas and hide video stream */
                    qrCanvasElement.classList.remove("hidden");
                    video.classList.add("hidden");
                    location.replace(result);
                } catch(e) {
                    /* No Op */
                }
            }

            /* If no QR could be decoded from image copied in canvas */
            if (!video.classList.contains("hidden"))
                setTimeout(tick, 100);
        }
    </script>
</head>

<body>
<div class="video-container">
    <video id="video-preview"></video>
    <canvas id="qr-canvas" class="hidden" ></canvas>
</div>
</body>
</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//iniciar a sessão
date_default_timezone_set('America/Fortaleza');
$hora = date('H:i:s');

$key = uniqid(md5(rand()));

require 'conexao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags -->
    <title>Pede Fácil</title>
    <meta name="keywords" content="Pede Fácil"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- stylesheets -->
    <link href="css/bootstrap-3.3.0.css" rel="stylesheet">
    <link rel="shortcut icon" sizes="196x196" href="images/icon-196x196.png">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css?key=<?php echo $key ?>">
    <!-- google fonts  -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
    <!-- scripts -->
    <script src="js/bootstrap-3.3.0/bootstrap-3.3.0.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/qr_reader.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script src="https://www.googletagmanager.com/gtag/js?id=UA-132452994-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-132452994-1');
    </script>
    <script type="text/javascript">
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
                    var link = JSON.stringify(result);
                    link = link.split("mesa=").pop();
                    var num_mesa = link.split("\"").shift();
                    console.log(num_mesa);
                    sessionStorage.setItem('mesa', num_mesa);
                    /* Video can now be stopped */
                    Swal({
                        title: 'Leitura realizada com sucesso',
                        text: 'Em instantes você será redirecionado ao cardápio',
                        type: 'success'
                    });
                    video.pause();
                    video.src = "";
                    video.srcObject.getVideoTracks().forEach(track => track.stop());
                    location.replace(result);

                    /* Display Canvas and hide video stream */
                    qrCanvasElement.classList.remove("hidden");
                    video.classList.add("hidden");
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
<body class="fadeIn">
<div class="agile-login">
    <div class="logo-text"></div>
    <div class="wrapper">
        <div id="qr_reader" class="w3ls-form">
            <div class="video-container" style="width: 100%; height: 100%;">
                <video id="video-preview" style="width: 100%; height: 100%;"></video>
                <canvas id="qr-canvas" class="hidden" style="width: 100%; height: 100%;"></canvas>
            </div>
        </div>
    </div>
    <br>
    <div class="copyright">
        <p>© Copyright 2019 <a href="https://contatostreamline.wixsite.com/pedefacil2" target="_blank">Streamline
                Technologies</a></p>
    </div>
</div>

</body>
</html>
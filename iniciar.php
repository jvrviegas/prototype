<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//iniciar a sessão
session_start();
date_default_timezone_set('America/Fortaleza');
$hora = date('H:i:s');

$key = uniqid(md5(rand()));


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags -->
    <title>Pede Fácil - Iniciar</title>
    <meta name="keywords" content="Pede Fácil"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- stylesheets -->
    <link href="css/bootstrap-3.3.0.css" rel="stylesheet">
    <link rel="shortcut icon" sizes="196x196" href="images/icon-196x196.png">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/iniciar.css?key=<?php echo $key ?>">
    <!-- google fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
    <!-- scripts -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap-3.3.0/bootstrap-3.3.0.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script src="https://www.googletagmanager.com/gtag/js?id=UA-132452994-1"></script>
    <script src="js/index.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-132452994-1');
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $("#btn_start").click(function (){
                location.replace("leitor_qr.php");
            });
        });
    </script>

</head>
<body class="fadeIn">
<div class="agile-login">
    <div class="logo-text"></div>
    <div class="wrapper">
        <div class="w3ls-form">
            <h3 style="text-align: center; font-size: 20px;">Aponte a câmera para o <span style="color:darkred;">QR Code</span> localizado na sua mesa</h3>
            <img class="qr-code" src="images/qr_code.png">
            <button id="btn_start" class="btn btn-block btn-info">ABRIR CÂMERA</button>
            <div class="mini-tutorial-qrcode">
                <p>Quer saber como ler o QR Code? <span style="color: darkred">Clique aqui</span></p>
                <img src="images/qr_code.png">
            </div>
        </div>

        <!--		<div class="agile-icons">-->
        <!--                    <a href="#"><span class="fa fa-facebook"> Entrar com o Facebook</span></a>-->
        <!--		</div>-->
    </div>
    <br>
    <div class="copyright">
        <p>© Copyright 2019 <a href="https://contatostreamline.wixsite.com/pedefacil2" target="_blank">Streamline
                Technologies</a></p>
    </div>
</div>

</body>
</html>


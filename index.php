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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap-3.3.0/bootstrap-3.3.0.min.js"></script>
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
        jQuery(document).ready(function ($) {
            $("#enviaDados").click(function () {
                var dados = {
                    usuario: $("input[name=usuario]").val(),
                    senha: $("input[name=senha]").val(),
                    opc: 1
                };
                now = new Date();
                $.ajax({
                    url: 'conexao.php',
                    data: dados,
                    type: "POST",
                    dataType: 'json',
                    success: function (result) {
                        if (result == 2) {
                            location.replace("gerente.php");
                        } else if (result === 1) {
                            Swal.mixin({
                                input: 'number',
                                confirmButtonText: 'Próximo &rarr;',
                                showCancelButton: true,
                                progressSteps: ['1', '2']
                            }).queue([
                                {
                                    title: 'Insira o código de acesso:',
                                },
                                'Insira o número da sua mesa:'
                            ]).then((resultado) => {
                                if (resultado.value) {
                                    if(resultado.value[0] == 9548){
                                        if(resultado.value[1] > 0 && resultado.value[1] <= 3){
                                            sessionStorage.setItem('num_mesa', resultado.value[1]);
                                            Swal({
                                                title: 'Acesso válido',
                                                text: 'Você será redirecionado automaticamente para a página de cardápio.',
                                                type: 'success'
                                            }).then((result2) => {
                                                if(result2.value){
                                                    location.replace("cardapio.php");
                                                }
                                            });
                                            setTimeout("location.replace(\"cardapio.php\")", 4000);
                                        }
                                        else {
                                            Swal({
                                                title: 'Mesa inválida',
                                                html: '<h5>Por favor, informe corretamente o número da sua mesa.</h5>',
                                                type: 'error'
                                            })
                                        }
                                    }
                                    else if(resultado.value !== 9548){
                                        Swal({
                                            title: 'Código de acesso inválido',
                                            html: "<h5>Por favor, dirija-se a um de nossos representates e solicite o código de acesso.</h5>",
                                            type: 'error'
                                        })
                                    }
                                }
                            })
                        } else if (result === 0) {
                            Swal("Usuário e/ou senha incorretos!");
                        }
                    }
                });
            });
        });
    </script>

</head>
<body class="fadeIn">
<div class="agile-login">
    <div class="logo-text"></div>
    <div class="wrapper">
        <h2 id="h2_login">Login</h2>
        <div id="login" class="w3ls-form">
            <form action="index.php" method="post">
                <label>Usuário</label>
                <input type="text" name="usuario" autocorrect="off" autocapitalize="off" placeholder="Usuário"
                       required/>
                <label>Senha</label>
                <input type="password" name="senha" autocorrect="off" autocapitalize="off" placeholder="Senha"
                       required/>
                <a href="#" class="pass">Esqueceu sua senha ?</a>
                <input type="button" id="enviaDados" value="Entrar"/>
                <a href="cadastro.php"><input type="button" value="Cadastrar-se"/></a>
            </form>
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
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
    <title>Pede Fácil - Seu jeito fácil de pedir</title>
    <meta name="keywords" content="Pede Fácil"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <!-- stylesheets -->
    <link rel="shortcut icon" sizes="196x196" href="images/icon-196x196.png">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css?key=<?php echo $key ?>">
    <!-- google fonts  -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
    <!-- scripts -->
    <script src="js/jquery-3.3.1.min.js"></script>
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
                var dados={
                    usuario:$("input[name=usuario]").val(),
                    senha:$("input[name=senha]").val()
                }
                 now = new Date();
                 if (now.getHours() >= 10 && now.getHours() <= 23) {
                     $.ajax({
                         url: 'conexao.php',
                         data: dados,
                         type: "POST",
                         dataType: 'json',
                         success: function (result) {
                             if(result === 1){
                                Swal({
                                    title: 'Insira o código de acesso:',
                                    input: 'number',
                                    type: 'warning',
                                }).then((resultado) => {
                                    if(resultado.value == 9548){
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
                                    else if(resultado.value !== 9548){
                                        Swal({
                                            title: 'Código de acesso inválido',
                                            html: "<h3>Por favor, dirija-se a um de nossos representates e solicite o código de acesso.</h3>",
                                            type: 'error'
                                        })
                                    }
                                });
                            }
                            else if(result === 0){
                                Swal("Usuário e/ou senha incorretos!");
                            }
                         }
                     });
                 } else {
                     Swal({
                         title: 'Manda Pizza',
                         html: "<h3>Estabelecimento fechado, retorne mais tarde.</h3><br><h4>Horário de funcionamento: <br>" +
                             "<table style='margin-left: 18%;'><tbody><tr class=\"K7Ltle\"><td class=\"SKNSIb\">Segunda-feira</td><td>18:00–22:45</td><br></tr><tr><td class=\"SKNSIb\">Terça-feira</td><td>18:00–23:00</td></tr><tr><td class=\"SKNSIb\">Quarta-feira</td><td>18:00–23:30</td></tr><tr><td class=\"SKNSIb\">Quinta-feira</td><td>18:00–23:30</td></tr><tr><td class=\"SKNSIb\">Sexta-feira</td><td>18:00–23:45</td></tr><tr><td class=\"SKNSIb\">Sábado</td><td>18:00–23:59</td></tr><tr><td class=\"SKNSIb\">Domingo</td><td>20:45–23:00</td></tr></h4></tbody></table>",
                         type: 'warning',
                         confirmButtonColor: '#3085d6',
                         confirmButtonText: 'Ok'
                     });
                 }
            });
        });
    </script>

</head>
<body class="fadeIn">
<div class="agile-login">
    <div class="logo-text"></div>
    <div class="wrapper">
        <h2>Login</h2>
        <div class="w3ls-form">
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

                <?php
                if (isset($mensagem)) {
                    ?>
                    <script>
                        swal({
                            title: "Usuário e/ou senha incorreto(s) !",
                            type: "info",
                            confirmButtonText: 'Ok'
                        });
                    </script>
                    <?php
                }
                ?>
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
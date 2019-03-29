<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
//iniciar a sessão
    session_start();

    $key = uniqid(md5(rand()));

    require 'conexao.php';
    
    $conn = new Conexao();
    if(!$conn){
        echo "Não foi possível conectar ao banco de dados!";
        exit();
    }
    
    if($_POST){
        $usuario = preg_replace('/[^[:alnum:]_]/', '',$_POST['usuario']);
        $senha = preg_replace('/[^[:alnum:]_@]/', '',$_POST['senha']);
        $select = $conn->select($usuario, $senha);
        if(empty($select)){
            $mensagem = "Login sem sucesso";
        }
        else{
            $_SESSION['id'] = $select[0]["id"];
            $_SESSION['user'] = $select[0]["usuario"];
            header("location:cardapio.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags -->
    <title>Pede Fácil - Seu jeito fácil de pedir</title>
    <meta name="keywords" content="Pede Fácil" />
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
    <script src="js/sweetalert2.all.min.js" async></script>
    <script src="js/jquery-1.11.1.min.js" async></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132452994-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-132452994-1');
        
        $(document).ready(function(){
        $("#enviaDados").on('click', function(){
            $.ajax({
                url: 'index.php',
                cache: false,
                type: "POST",
                success: function(){

                }
            })
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
                        <input type="text" name="usuario" autocorrect="off" autocapitalize="off" placeholder="Usuário" required/>
                        <label>Senha</label>
                        <input type="password" name="senha" autocorrect="off" autocapitalize="off" placeholder="Senha" required />
                        <a href="#" class="pass">Esqueceu sua senha ?</a>
                        <input type="submit" id="enviaDados" value="Entrar" />
                        <a href="cadastro"><input type="button" value="Cadastrar-se" /></a>
                        
                        <?php 
                            if(isset($mensagem)){
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
			
		<div class="agile-icons">
                    <a href="#"><span class="fa fa-facebook"> Entrar com o Facebook</span></a>
		</div>
            </div>
            <br>
            <div class="copyright">
		<p>© Copyright 2019 <a href="https://contatostreamline.wixsite.com/pedefacil2" target="_blank">Streamline Technologies</a></p> 
            </div>
    </div>
	
</body>
</html>
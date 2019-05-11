<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
//    session_start();
    $key = uniqid(md5(rand()));

    require 'conexao.php';
    
    $conn = new Conexao();
    if(!$conn){
        echo "Não foi possível conectar ao banco de dados!";
        exit();
    }
    
    if($_POST && isset($_POST['usuario']) && isset($_POST['senha']) && isset($_POST['email'])){
        $usuario = preg_replace('/[^[:alnum:]_@.-]/', '',$_POST['usuario']);
        $senha = preg_replace('/[^[:alnum:]_@.-]/', '',$_POST['senha']);
        $email = preg_replace('/[^[:alpha:]_@.-]/', '',$_POST['email']);
        $select = $conn->validarUsuario($usuario);
        if(empty($select)){
            $cadastro = $conn->cadastrarUsuario($usuario, $senha, $email);
            $ok = "ok";
        }
        else{
            $erro = "teste";
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
    <script src="js/jquery.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132452994-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-132452994-1');
        </script>
<!--        <script>
            $(document).ready(function(){
            $("#cadastrar").on('click', function(){
            $.ajax({
                    url: 'cadastro.php',
                    cache: false,
                    type: "POST",
                    success: function(){
                        
                    }
                    })
                })
        });
        </script>-->
</head>
<body class="fadeIn">
	<div class="agile-login">
		<div class="logo-text"></div>
		<div class="wrapper">
                    <h2>Cadastro</h2>
                    <div class="w3ls-form">
			<form action="cadastro.php" method="post">
                            <label>Usuário</label>
                            <input type="text" name="usuario" placeholder="Usuário" autocorrect="off" autocomplete="off" autocapitalize="off" required/>
                            <label>Senha</label>
                            <input type="password" name="senha" placeholder="Senha" autocorrect="off" autocomplete="off" autocapitalize="off" required />
                            <label>E-mail</label>
                            <input type="text" name="email" placeholder="exemplo@exemplo.com" autocorrect="off" autocapitalize="off" required/>
                            <br>
                            <input type="submit" id="cadastrar" value="Cadastrar" />
                            <a href="index.php"><input type="button" value="Voltar" /></a>
                            
                            <?php 
                                if(isset($erro)){
                            ?>
                            <script>
                                swal({
                                    title: "Usuário já cadastrado !",
                                    type: "error",
                                    confirmButtonText: 'Ok',
                                });
                            </script>
                            <?php
                                }
                            ?>
                            <?php
                                if(isset($ok)){
                            ?>
                            <script>
                                swal({
                                    title: "Cadastro realizado com sucesso!",
                                    type: "success",
                                    confirmButtonText: 'Ok',
                                }). then((result) => {
                                    window.location = 'index.php';
                                });
                            </script>
                            <?php
                                }
                            ?>
			</form>
                    </div>	
		</div>
		<br>
		<div class="copyright">
		<p>© Copyright 2019 <a href="https://contatostreamline.wixsite.com/pedefacil2" target="_blank">Streamline Technologies</a></p> 
	</div>
	</div>
	
</body>
</html>
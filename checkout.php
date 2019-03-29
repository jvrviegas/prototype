<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
//iniciar a sessão
    session_start();
    
    if(!isset($_SESSION['id']) && !isset($_SESSION['user'])){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Pede Fácil - Carrinho</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--      <link href="css/bootstrap-3.3.0.css" rel='stylesheet' type='text/css' />
       jQuery (necessary for Bootstrap's JavaScript plugins) 
      <script src="js/jquery-1.11.1.min.js"></script>-->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <!-- Custom Theme files -->
      <link href="css/cardapio.css" rel="stylesheet" type="text/css" media="all" />
      <!-- Custom Theme files -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
      <!--webfont-->
      <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
      <link href='//fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
      <!--Animation-->
      <script src="js/wow.min.js"></script>
      <link href="css/animate.css" rel='stylesheet' type='text/css' />
      <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-132452994-1');
      </script>
      <script>
         new WOW().init();
      </script>
      <script type="text/javascript" src="js/move-top.js"></script>
      <script type="text/javascript" src="js/easing.js"></script>
      <script type="text/javascript">
         jQuery(document).ready(function($) {
         	$(".scroll").click(function(event){		
         		event.preventDefault();
         		$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
         	});
         });
      </script>		
      <script src="js/simpleCart.min.js"> </script>
      <script>
          simpleCart.currency({
            code: "BR" ,
            name: "Brazilian Real" ,
            symbol: "R$ " ,
            delimiter: " " , 
            decimal: "," , 
            after: false ,
            accuracy: 2
        });
      </script>
   </head>
   <body>
      <!-- header-section-starts -->
      <div class="header">
         <div class="container">
            <div class="top-header">
               <div class="logo">
                   <a href="index.php"><img src="images/logo-pincelada.png" style="width: 210px; height: 70px;" class="img-responsive" alt="" /></a>
               </div>
               <div class="header-right">
                  <div class="cart box_1">
                     <a href="checkout.php">
                        <h3> <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span> items)<img src="images/bag.png" alt=""></h3>
                     </a>
                     <p><a href="javascript:;" class="simpleCart_empty">Empty card</a></p>
                     <div class="clearfix"> </div>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <div class="menu-bar">
            <div class="container">
               <div class="top-menu">
                  <ul>
                     <li><a href="cardapio.php">Cardápio</a></li>
                     |
                     <li class="active"><a href="#">Carrinho</a></li>
                     |
                     <li><img src="images/logo-manda-pizza.png" style="width:60px; height: 60px;"></li>
                     |
                     <li><a href="sobre.php">Sobre nós</a></li>
                     |
                     <li><a href="sair.php">Sair</a></li>
                     <div class="clearfix"></div>
                  </ul>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
      <!-- header-section-ends -->
      <!-- content-section-starts -->
      <!-- checkout -->
      <div class="cart-items fadeIn">
         <div class="container">
             <h1>Meu carrinho</h1>
            <script>$(document).ready(function(c) {
               $('.close1').on('click', function(c){
               	$('.cart-header').fadeOut('slow', function(c){
               		$('.cart-header').remove();
               	});
               	});	  
               });
                
            </script>
            <div class="container">
                <div class="row">
                    <div class="col simpleCart_items">
                        <p>Teste 1</p>
                        
                    </div>
                     
                    <div class="col simpleCart_total">
                        <p>Teste 2</p>
                        
                    </div>
                </div>
            </div>
<!--            <a href="javascript:;" class="simpleCart_checkout">Enviar pedido</a>-->

         </div>
      </div>
      <!-- checkout -->
      <!-- content-section-ends -->
      <!-- footer-section-starts -->
      <div class="footer">
         <div class="container">
            <p class="wow fadeInLeft" data-wow-delay="0.2s">&copy; 2019  Todos os direitos reservados | &nbsp;<a href="https://contatostreamline.wixsite.com/pedefacil2" target="target_blank">Streamline Technologies</a></p>
         </div>
      </div>
      <!-- footer-section-ends -->
      <script type="text/javascript">
         $(document).ready(function() {
         	/*
         	var defaults = {
          			containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear' 
         		};
         	*/
         	
         	$().UItoTop({ easingType: 'easeOutQuart' });
         	
         });
      </script>
      <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
   </body>
</html>
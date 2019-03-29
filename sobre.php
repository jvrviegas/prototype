<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
//iniciar a sessão
    session_start();

//    if(!isset($_SESSION['id']) && !isset($_SESSION['user'])){
//        header("location:index.php");
//    }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Pede Fácil - Sobre nós</title>
      <link href="css/bootstrap-3.3.0.css" rel='stylesheet' type='text/css' />
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="js/jquery-1.11.1.min.js"></script>
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
   </head>
   <body>
      <!-- header-section-starts -->
      <div class="header">
      <div class="container">
         <div class="top-header">
            <div class="logo">
               <a href="index.html"><img src="images/logo-pincelada.png" class="img-responsive" alt="" /></a>
            </div>
            <div class="header-right">
               <div class="cart box_1">
                  <a href="checkout.html">
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
                  <li><a href="checkout.php">Carrinho</a></li>
                  |
                  <li><img src="images/logo-manda-pizza.png" style="width:60px; height: 60px;"></li>
                  |
                  <li class="active"><a href="#">Sobre nós</a></li>
                  |
                  <li><a href="sair.php">Sair</a></li>
                  <div class="clearfix"></div>
               </ul>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>
      <!-- header-section-ends -->
      <div class="contact-section-page fadeIn">
         <div class="contact-head">
            <div class="container">
               <h3>Contact</h3>
               <p>Home/Contact</p>
            </div>
         </div>
         <div class="contact_top">
            <div class="container">
               <div class="col-md-6 contact_left wow fadeInRight" data-wow-delay="0.4s">
                  <h4>Contact Form</h4>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Donec tincidunt dolor et tristique bibendum. Aenean sollicitudin vitae dolor ut posuere.</p>
                  <form>
                     <div class="form_details">
                        <input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
                        <input type="text" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}">
                        <input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
                        <textarea value="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                        <div class="clearfix"> </div>
                        <div class="sub-button wow swing animated" data-wow-delay= "0.4s">
                           <input name="submit" type="submit" value="Send message">
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6 company-right wow fadeInLeft" data-wow-delay="0.4s">
                  <div class="contact-map">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1578265.0941403757!2d-98.9828708842255!3d39.41170802696131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1407515822047"> </iframe>
                  </div>
                  <div class="company-right">
                     <div class="company_ad">
                        <h3>Contact Info</h3>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit velit justo.</span>
                        <address>
                           <p>email:<a href="mailto:info@example.com">info@display.com</a></p>
                           <p>phone:  +255 55 55 777</p>
                           <p>28-7-169, 2nd Ave South</p>
                           <p>Saskabush, SK   S7M 1T6</p>
                        </address>
                     </div>
                  </div>
                  <div class="follow-us">
                     <h3>follow us on</h3>
                     <a href="#"><i class="facebook"></i></a>
                     <a href="#"><i class="twitter"></i></a>
                     <a href="#"><i class="google-pluse"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
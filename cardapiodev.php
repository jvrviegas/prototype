<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include "carrinhodev.php";
    //iniciar a sessão
    //    session_start();
    $key = uniqid(md5(rand()));   
    
    //    if(!isset($_SESSION['id']) && !isset($_SESSION['user'])){
    //        header("location:index.php");
    //    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pede Fácil - Cardápio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="mobile-web-app-capable" content="yes">
        <!-- CSS -->
        <!--      <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
            <link href='//fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>-->
        <link href="css/fonts.css" rel="stylesheet">
        <link href="css/bootstrap-3.3.0.css" rel="stylesheet" id="bootstrap-css">
        <link href="css/cardapio.css?key=<?php echo $key ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="css/animate.css" rel='stylesheet' type='text/css' />
        <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- JAVASCRIPT -->
        <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap-3.3.0/bootstrap-3.3.0.min.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script>
            // PLUG-IN ANALYTICS //
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
            
              gtag('config', 'UA-132452994-1');
              
              // TOAST 
              function exibirToast(id) {
                  // Get the snackbar DIV
                  var x = document.getElementById(id);
            
                  // Add the "show" class to DIV
                  x.className = "show";
            
                  // After 3 seconds, remove the show class from DIV
                  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 1900);
              }
            
            function confirmarPedido(){
                Swal.fire({
                    title: 'Enviar pedido?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar envio'
                  }).then((result) => {
                    if (result.value) {
                      localStorage.removeItem('carrinho');
                      document.getElementById('container').innerHTML = "Carrinho vazio !";
                      $('#meuCarrinho').modal('hide');
                      Swal.fire({
                        title: 'Pedido enviado com sucesso',
                        type: 'success',
                        timer: 1500
                      });
                      /* ADICIONAR O CÓDIGO DE ENVIO DO PEDIDO */
                    }
                  });
            }
            function enviarPedido(){
                Swal(
                    'Pedido enviado!',
                    'Tempo médio de espera: 40 mins.',
                    'success'
                  );
            }
            function limparCarrinho(){
                if(localStorage.getItem('carrinho')){
                    localStorage.removeItem('carrinho');
                    document.getElementById('container').innerHTML = "Carrinho vazio !";
                    document.getElementById('snackbar').innerHTML = "Carrinho vazio com sucesso !";
                    exibirToast('snackbar');
                }
                else{
                    document.getElementById('snackbar').innerHTML = "O carrinho ainda não possui itens !";
                    exibirToast('snackbar');
                }
            }
        </script>
        <script>
            new WOW().init();
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#table_id').DataTable({
                    paging: false,
                    searching: false,
                    ordering: false,
                    info: false
                });
                var soma = 0;
            	$(".scroll").click(function(event){		
            		event.preventDefault();
            		$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            	});
                $(".itemCarrinho").click(function(event){
                    var itemCarrinho = $(this).attr('id');
                    $.ajax({
                        url: "carrinhodev.php",
                        type: "POST",
                        data: 'id='+itemCarrinho,
                        async: true,
                        dataType: "json",
                        success: function(result){
                            
                        }
                        
                        /* PARA IDENTIFICAR O ERRO NA REQUISIÇÃO, CASO HAJA ALGUM */
            //          error: function (xhr, ajaxOptions, thrownError) {
            //              alert(xhr.status);
            //              console.log(xhr);
            //              alert(thrownError);
            //          }
                    });
                });
                  
            });
        </script>
        <!-- META TAGS -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <!-- header-section-starts -->
        <div class="header">
            <div class="container">
                <div class="top-header">
                    <div class="logo">
                        <a href="index.php"><img src="images/logo-pincelada.png" style="width: 210px; height:70px;" class="img-responsive" alt="" /></a>
                    </div>
                    <div class="header-right">
                        <div class="cart box_1">
                            <a href="javascript:;" data-toggle="modal" data-target="#meuCarrinho">
                                <h3> <span class="simpleCart_total">$0.00</span> (<span id="carrinhoItensQtd"></span> items)<img src="images/bag.png" alt=""></h3>
                            </a>
                            <p><a onclick="limparCarrinho()">Esvaziar carrinho</a></p>
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
                            <li class="active"><a href="#">Cardápio</a></li>
                            |
                            <li><a href="#">Carrinho</a></li>
                            |
                            <li><img id="menu-logo" src="images/logo-manda-pizza.png" style="width:60px; height: 60px;"></li>
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
        <div class="Popular-Restaurants-content fadeIn">
            <div class="Popular-Restaurants-grids">
                <div class="container">
                    <div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.2s">
                        <div class="col-md-3 restaurent-logo">
                            <img src="images/pizza-tradicional-logo.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="col-md-2 restaurent-title">
                            <div class="logo-title">
                                <h4><a data-toggle="collapse" href="#collapsePizzaTradicional" role="button" aria-expanded="false" aria-controls="collapseExample">Pizzas Tradicionais</a></h4>
                            </div>
                            <div class="collapse fade" id="collapsePizzaTradicional">
                                <div class="card card-body">
                                    <div class="orders">
                                        <div class="container">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                     <div class="rating">
                                <span>ratings</span>
                                <a href="#"> <img src="images/star1.png" class="img-responsive" alt="">(004)</a>
                                </div>-->
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="Popular-Restaurants-grid wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="col-md-3 restaurent-logo">
                            <img src="images/pizza-premium-logo.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="col-md-2 restaurent-title">
                            <div class="logo-title logo-title-1">
                                <h4><a data-toggle="collapse" href="#collapsePizzaPremium" role="button" aria-expanded="false" aria-controls="collapseExample">Pizzas Premium</a></h4>
                            </div>
                            <div class="collapse fade" id="collapsePizzaPremium">
                                <div class="card card-body">
                                    <div class="orders">
                                        <div class="container" id="lista_pizzas_premium">
                                            <!-- CARREGA OS ITENS DE UMA PÁGINA EXTERNA -->
                                            <script>$("#lista_pizzas_premium").load("cardapios/manda_pizza/pizzas_tradicionais.php");</script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                     <div class="rating">
                                <span>ratings</span>
                                <a href="#"> <img src="images/star2.png" class="img-responsive" alt="">(005)</a>
                                </div>-->
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.2s">
                        <div class="col-md-3 restaurent-logo">
                            <img src="images/massa-tradicional-logo.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="col-md-2 restaurent-title">
                            <div class="logo-title logo-title-2">
                                <h4><a data-toggle="collapse" href="#collapseMassaTradicional" role="button" aria-expanded="false" aria-controls="collapseExample">Massas Tradicionais</a></h4>
                            </div>
                            <div class="collapse fade" id="collapseMassaTradicional">
                                <div class="card card-body">
                                    <div class="orders">
                                        <div class="container">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                     <div class="rating">
                                <span>ratings</span>
                                <a href="#"> <img src="images/star1.png" class="img-responsive" alt="">(004)</a>
                                </div>-->
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="Popular-Restaurants-grid wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="col-md-3 restaurent-logo">
                            <img src="images/massa-premium-logo.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="col-md-2 restaurent-title">
                            <div class="logo-title logo-title-3">
                                <h4><a data-toggle="collapse" href="#collapseMassaPremium" role="button" aria-expanded="false" aria-controls="collapseExample">Massas Premium</a></h4>
                            </div>
                            <div class="collapse fade" id="collapseMassaPremium">
                                <div class="card card-body">
                                    <div class="orders">
                                        <div class="container">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                     <div class="rating">
                                <span>ratings</span>
                                <a href="#"> <img src="images/star2.png" class="img-responsive" alt="">(005)</a>
                                </div>-->
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.2s">
                        <div class="col-md-3 restaurent-logo">
                            <img src="images/bebidas-logo.jpg" class="img-responsive" alt="" />
                        </div>
                        <div class="col-md-2 restaurent-title">
                            <div class="logo-title logo-title-4">
                                <h4><a data-toggle="collapse" href="#collapseBebidas" role="button" aria-expanded="false" aria-controls="collapseExample">Bebidas</a></h4>
                            </div>
                            <br>
                            <div class="collapse fade" id="collapseBebidas">
                                <div class="card card-body">
                                    <div class="orders">
                                        <div class="container">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                     <div class="rating">
                                <span>ratings</span>
                                <a href="#"> <img src="images/star1.png" class="img-responsive" alt="">(004)</a>
                                </div>-->
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
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
        <!-- The Modal -->
        <div class="modal fade" id="calabresa">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Pizza Calabresa</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <img src="images/pizza-tradicional-logo.jpg"><br><br>
                        <p>Molho de tomate, mussarela, calabresa, cebola, azeitona e orégano.</p>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carrinho Modal -->
        <div class="modal fade" id="meuCarrinho">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Meu Carrinho</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" id="container">
                        <div class="container">
                            <table class="table table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                    </tr>
                                </thead>
                                <tbody id="itensCarrinho">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" onclick="confirmarPedido()" class="btn btn-secondary" style="color:#006ff5;">Finalizar pedido</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--      <div class="alert alert-primary" role="alert" id="adicionadoCarrinho">
            Adicionado ao carrinho!
            
            </div>-->
        <!-- The actual snackbar -->
        <div id="snackbar"></div>
    </body>
</html>
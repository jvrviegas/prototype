<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//include "conexao.php";
/* INCLUI O ARQUIVO PARA UTILIZAÇÃO DAS FUNÇÕES NOS ARQUIVOS GERADORES DOS ITENS DOS CARDAPIOS - EX: PIZZA_PREMIUM.PHP */
include "carrinho.php";
//iniciar a sessão
//session_start();
$key = uniqid(md5(rand()));

if (!isset($_SESSION['id']) && !isset($_SESSION['user'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Pede Fácil - Cardápio</title>
        <!-- CSS -->
        <!--      <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
              <link href='//fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>-->
        <!--        <link href="css/base.css" rel="stylesheet">	-->
        <link href="css/fonts.css" rel="stylesheet">
        <link href="css/bootstrap-3.3.0.css" rel="stylesheet">
        <link href="css/cardapio.css?key=<?php echo $key; ?>" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <!-- JAVASCRIPT -->
        <script src="js/jquery-3.3.1.min.js"></script>
<!--        <script src="js/base.js"></script>-->
        <script src="js/bootstrap-3.3.0/bootstrap-3.3.0.min.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        <script src="js/move-top.js"></script>
        <script src="js/easing.js"></script>
        <script src="js/wow.min.js"></script>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script>
            // PLUG-IN ANALYTICS //
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-132452994-1');

            // TOAST 'ADICIONADO AO CARRINHO'
            function exibirToast(mensagem) {
                // Get the snackbar DIV
                var x = document.getElementById("snackbar");
                x.innerHTML = mensagem;

                // Add the "show" class to DIV
                x.className = "show";

                // After 3 seconds, remove the show class from DIV
                setTimeout(function () {
                    x.className = x.className.replace("show", "");
                }, 1900);
            }
            
            // CONSERTAR FUNÇÃO PARA ATUALIZAR O VALOR TOTAL DO ITEM
            function atualizarValor(){
                var teste = $(this).closest('tr').find('.valor_total').val();
                console.log(teste);
            }

        </script>
        <script>
            new WOW().init();
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                // Função para incremento do elemento 'quantidade'

                var itensCarrinho = [];
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
                });
                // Adiciona o ID e a quantidade do item nos vetores para consulta posteriormente
                $(".itemCarrinho").click(function (event) {
                    var idProduto = $(this).attr('id');

                    event.preventDefault();

                    var textoCarrinho = $(this).text()
                    if (textoCarrinho === "Adicionar" && !itensCarrinho.includes(idProduto)) {
                        itensCarrinho.push(idProduto);
                        $(this).text("Remover");
                        $("#quantidadeItens").text(Object.keys(itensCarrinho).length);
                    } else if (textoCarrinho === "Remover") {
                        if (itensCarrinho.includes(idProduto)) {
                            var index = $.inArray(idProduto, itensCarrinho);
                            itensCarrinho.splice(index, 1);
                            $(this).text("Adicionar");
                            $("#quantidadeItens").text(Object.keys(itensCarrinho).length);
                        }
                    }
                    console.log("Itens carrinho: " + itensCarrinho);
                });

                $("#esvaziarCarrinho").click(function () {
                    if (itensCarrinho.length > 0) {
                        itensCarrinho = [];
                        $("#modal-body-carrinho").html("Carrinho vazio!");
                        $("#quantidadeItens").text(Object.keys(itensCarrinho).length);
                        exibirToast("Carrinho limpo com sucesso!");
                        $(".itemCarrinho").each(function (key, value) {
                            var textoBotao = $(this).text();
                            if (textoBotao === "Remover") {
                                $(this).text("Adicionar");
                            }
                        });
                    } else {
                        Swal({
                            title: 'Você não possui itens no carrinho',
                            text: "Vamos aproveitar e pedir alguma coisa?",
                            type: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Vou pedir agora !'
                        });
                    }
                });

                $("#meuCarrinho").click(function () {
                    if (itensCarrinho.length === 0) {
                        $("#modal-body-carrinho").html("Carrinho vazio!");
                        $("#carrinho").modal('show');
                    } else if (itensCarrinho) {
                        $("#modal-body-carrinho").html('<div class="container table-responsive-sm"> <table class="table"> <thead class="thead-dark"> <tr> <th>Produto</th> <th>Preço</th> <th>Quantidade</th> </tr> </thead> <tbody id="tabelaProdutos"> </tbody> </table> </div>');
                        $.ajax({
                            url: "carrinho.php",
                            type: "POST",
                            data: 'lista_cod=' + itensCarrinho,
                            async: true,
                            dataType: "json",
                            beforeSend: function () {
                                $(".modalLoading").modal('show');
                            },
                            success: function (result) {
                                $.each(result, function (key, value) {
                                    $("#tabelaProdutos").append("<tr> <td>" + value.produto + "</td> <td>" + value.preco + "</td> <td><button type='button' id='arrowDown' class='button numberArrow' onclick='this.parentNode.querySelector(\"[type=number]\").stepDown();atualizarValor()'> - </button> <input type='number' name='number' class='qtd_item' id='quant' min='1' max='100' value='1' readonly> <button type='button' id='arrowUp' class='button numberArrow' onclick='this.parentNode.querySelector(\"[type=number]\").stepUp();atualizarValor()'> + </button> </td> </tr>");
                                });
//                                $("#tabelaProdutos").html(result);
                                $("#carrinho").modal('show');
                                $(".modalLoading").modal('hide');
                            }
                        });
                    }
                });

                $("#enviarPedido").click(function () {
                    if (itensCarrinho && itensCarrinho.length > 0) {
                        var itens_qtd = new Array();
                        Swal({
                            title: "Confirmar pedido",
                            text: "Deseja enviar o pedido?",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Sim, enviar pedido!'
                        }).then((result) => {
                            if (result.value) {
                                $(".qtd_item").each(function (key, value) {
                                    var qtd = $(this).val();
                                    itens_qtd.push(qtd);
                                });
                                console.log("Itens qtd: " + itens_qtd);
                                $.ajax({
                                    url: 'pedidos.php',
                                    type: 'POST',
                                    data: 'lista_cod=' + itensCarrinho + '&&itens_qtd=' + itens_qtd + '&&opc=1',
                                    async: true,
                                    beforeSend: function () {
                                        $("#carrinho").modal('hide');
                                        $(".modalLoading").modal('show');
                                    },
                                    success: function () {
                                        $(".modalLoading").modal('hide');
                                        Swal({
                                            title: 'Pedido enviado com sucesso!',
                                            text: 'Tempo médio de espera: 40 mins.',
                                            type: 'success',
                                            timer: 8000
                                        });
                                        itensCarrinho = [];
                                        $("#modal-body-carrinho").html("Carrinho vazio!");
                                        $("#quantidadeItens").text(Object.keys(itensCarrinho).length);
                                        $(".itemCarrinho").each(function (key, value) {
                                            var textoBotao = $(this).text();
                                            if (textoBotao === "Remover") {
                                                $(this).text("Adicionar");
                                            }
                                        });
                                        setTimeOut(window.location.replace("meusPedidos.php"), 5000);
                                    }
                                });
                            }
                        });
                    } else {
                        $("#carrinho").modal('hide');
                        Swal({
                            title: 'Você não possui itens no carrinho',
                            text: "Vamos aproveitar e pedir alguma coisa?",
                            type: 'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Vou pedir agora !'
                        });
                    }
                });
            });
        </script>

        <!-- META TAGS -->
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="mobile-web-app-capable" content="yes">
        <meta charset="utf-8">
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
                            <a id="meuCarrinho">
                                <h3> <span class="simpleCart_total">$0.00</span> (<span id="quantidadeItens"> 0 </span> itens)<img src="images/bag.png" alt=""></h3>
                            </a>
                            <p><a id="esvaziarCarrinho">Esvaziar carrinho</a></p>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <?php include "menu.php" ?>
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
                                        <div class="container" id="lista_pizzas_tradicionais">
                                            <?php include "cardapios/manda_pizza/pizzas_tradicionais.php" ?>
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
                                        <div class="container">
                                            <?php include "cardapios/manda_pizza/pizzas_premium.php" ?>
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
                                            <?php include "cardapios/manda_pizza/massas_tradicionais.php" ?>
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
                                            <?php include "cardapios/manda_pizza/massas_premium.php" ?>
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
                            </div><br>
                            <div class="collapse fade" id="collapseBebidas">
                                <div class="card card-body">
                                    <div class="orders">
                                        <div class="container">
                                            <?php include "cardapios/manda_pizza/bebidas.php" ?>
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
  <!--      <script type="text/javascript">
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
        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>-->


        <!-- The Modal -->
        <div class="modal fade" id="carrinho">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Meu Carrinho</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" id="modal-body-carrinho">
                        <div class="container table-responsive-sm">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Produto</th>
                                        <th>Preço</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody id="tabelaProdutos">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="enviarPedido" style="color:#006ff5;">Finalizar pedido</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>

                </div>
            </div>
        </div>
        <!--      <div class="alert alert-primary" role="alert" id="adicionadoCarrinho">
                Adicionado ao carrinho!
                
              </div>-->
        <!-- CARREGA OS MODAIS COM AS DESCRICOES DOS PRODUTOS -->
        <?php include 'cardapios/manda_pizza/descricoes.php'; ?>
        <!-- The actual snackbar -->
        <div id="snackbar"></div>
        <div class="modalLoading"><!-- Place at bottom of page --></div>
    </body>
</html>
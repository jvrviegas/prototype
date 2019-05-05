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
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
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

    </script>
    <script>
        new WOW().init();
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            // Função para incremento do elemento 'quantidade'
            var controle2sabores = 0;
            var itensCarrinho = [];
            var itensQtd = new Array();
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
            });
            // Adiciona o ID e a quantidade do item nos vetores para consulta posteriormente
            $(".itemCarrinho").click(function (event) {
                var idProduto = $(this).attr('id');
                if (idProduto > 0 && idProduto < 47) {
                    var qtdProduto = $(this).closest('div').find('input').val();
                } else if (idProduto > 46) {
                    var qtdProduto = $(this).closest('tr').find('input').val();
                }
                event.preventDefault();

                /* ADICIONAR POSTERIORMENTE A FUNÇÃO PARA ADICIONAR NO ARRAY "ITENS_QTD" O VALOR DO INPUT MAIS PRÓXIMO */


                var textoCarrinho = $(this).text();
                if (textoCarrinho === "Adicionar") {
                    itensCarrinho.push(idProduto);
                    itensQtd.push(qtdProduto);
                    $(this).text("Remover");
                    $("#quantidadeItens").text(Object.keys(itensCarrinho).length);
                } else if (textoCarrinho === "Remover" && itensCarrinho.includes(idProduto)) {
                    var index = $.inArray(idProduto, itensCarrinho);
                    itensCarrinho.splice(index, 1);
                    itensQtd.splice(index, 1);
                    $(this).text("Adicionar");
                    if (idProduto > 0 && idProduto < 47) {
                        var qtdProduto = $(this).closest('div').find('input').val(1);
                    } else if (idProduto > 46) {
                        var qtdProduto = $(this).closest('tr').find('input').val(1);
                    }
                    $("#quantidadeItens").text(Object.keys(itensCarrinho).length);

                }
                console.log("Itens carrinho: " + itensCarrinho);
                console.log("Qtd itens: " + itensQtd);
            });

            $(".itemCarrinho2sabores").click(function (event) {
                var idProduto = $(this).attr('id');
                var qtdProduto = $(this).closest('div').find('input').val();
                event.preventDefault();

                /* ADICIONAR POSTERIORMENTE A FUNÇÃO PARA ADICIONAR NO ARRAY "ITENS_QTD" O VALOR DO INPUT MAIS PRÓXIMO */


                var textoCarrinho = $(this).text();
                if (textoCarrinho === "Adicionar") {
                    controle2sabores += 1;
                    itensCarrinho.push(idProduto);
                    itensQtd.push(qtdProduto);
                    $(this).text("Remover");
                    $("#quantidadeItens").text(Object.keys(itensCarrinho).length);
                } else if (textoCarrinho === "Remover"  && itensCarrinho.includes(idProduto)) {
                    if (itensCarrinho.includes(idProduto)) {
                        if (controle2sabores > 0) {
                            controle2sabores -= 1;
                        }
                        var index = $.inArray(idProduto, itensCarrinho);
                        itensCarrinho.splice(index, 1);
                        itensQtd.splice(index, 1);
                        $(this).text("Adicionar");
                        $(this).closest('div').find('input').val(0.5);
                        $("#quantidadeItens").text(Object.keys(itensCarrinho).length);
                    }
                }
                console.log("Itens carrinho: " + itensCarrinho);
                console.log("Qtd itens: " + itensQtd);
            });

            // FUNÇÃO PARA SELECIONAR AS BEBIDAS CONFORME O SABOR ESCOLHIDO
            $(".itemCarrinhoBebida").click(function (event) {
                var idProduto = $(this).attr('id');

                event.preventDefault();

                switch (idProduto) {
                    case '37':
                        $("#refrigerante_lata").modal('show');
                        break;
                    case '38':
                        $("#refrigerante_1l").modal('show');
                        break;
                    case '39':
                        $("#refrigerante_2l").modal('show');
                        break;
                    case '40':
                        $("#sucos").modal('show');
                        break;
                    case '43':
                        $("#cerveja").modal('show');
                        break;
                }
            });

            $(".btn_close").click(function () {
                if ((controle2sabores % 2) != 0) {
                    Swal("Por favor, selecione o segundo sabor !");
                    console.log(controle2sabores);
                } else if (controle2sabores % 2 == 0) {
                    $("#pizza2sabores").modal('hide');
                }
            });

            $(".dois-sabores").click(function () {
                $('#pizza2sabores').modal('show');
            });


            $("#esvaziarCarrinho").click(function () {
                if (itensCarrinho.length > 0) {
                    itensCarrinho = [];
                    itensQtd = [];
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
                    $("#modal-body-carrinho").html('<div class="container table-responsive-sm"> <table class="table"> <thead class="thead-dark"> <tr> <th>Produto</th> <th>Preço</th> <th>Quantidade</th> <th>Total</th> </tr> </thead> <tbody id="tabelaProdutos"> </tbody> </table> </div>');
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
                            var i = 0;
                            var total = 0;
                            var preco_unitario, preco_total;
                            $.each(result, function (key, value) {
                                preco_unitario = parseFloat(value.preco);
                                preco_total = preco_unitario * itensQtd[i];
                                total += preco_unitario * itensQtd[i];
                                $("#tabelaProdutos").append("<tr> <td>" + value.produto + "</td> <td>" + preco_unitario.toLocaleString('pt-br', {
                                    style: 'currency',
                                    currency: 'BRL'
                                }) + "</td> <td> <input type='number' name='number' class='qtd_item' id='quant' min='1' max='100' value='" + itensQtd[i] + "' readonly> </td> <td>" + preco_total.toLocaleString('pt-br', {
                                    style: 'currency',
                                    currency: 'BRL'
                                }) + "</td> </tr>");
                                i++;
                            });
                            $("#total_conta").html(total.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'}));
                            $("#carrinho").modal('show');
                            $(".modalLoading").modal('hide');
                        }
                    });
                }
            });

            $("#enviarPedido").click(function () {
                if (itensCarrinho && itensCarrinho.length > 0) {
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
                            console.log("Itens qtd: " + itensQtd);
                            $.ajax({
                                url: 'pedidos.php',
                                type: 'POST',
                                data: 'lista_cod=' + itensCarrinho + '&&itens_qtd=' + itensQtd + '&&opc=1',
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
                                    controle2sabores = 0;
                                    itensCarrinho = [];
                                    $("#modal-body-carrinho").html("Carrinho vazio!");
                                    $("#quantidadeItens").text(Object.keys(itensCarrinho).length);
                                    $(".itemCarrinho").each(function (key, value) {
                                        var textoBotao = $(this).text();
                                        if (textoBotao === "Remover") {
                                            $(this).text("Adicionar");
                                        }
                                    });
                                    setTimeout("window.location.replace('meusPedidos.php')", 5000);
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
                <a href="index.php"><img src="images/logo-pincelada.png" style="width: 210px; height:70px;"
                                         class="img-responsive" alt=""/></a>
            </div>
            <div class="header-right">
                <div class="cart box_1"
                     style="width: 100px; height: 30px; background: #3079ED; padding-left: 17px; padding-top: 5px; border: 1px #FFF solid; border-radius: 15px;">
                    <a id="meuCarrinho">
                        <h3 style="color: #FFF;"><span id="quantidadeItens"> 0 </span>
                            itens<img src="images/bag.png" alt=""></h3>
                    </a>
                </div>
                <p><a id="esvaziarCarrinho">Esvaziar carrinho</a></p>
                <div class="clearfix"></div>
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
                <div class="col-md-3 restaurent-logo" data-toggle="collapse" href="#collapsePizzaTradicional">
                    <img src="images/pizza-tradicional-logo.jpg" class="img-responsive" alt=""/>
                </div>
                <div class="col-md-2 restaurent-title">
                    <div class="logo-title">
                        <h4><a data-toggle="collapse" href="#collapsePizzaTradicional" role="button"
                               aria-expanded="false" aria-controls="collapseExample">Pizzas Tradicionais</a></h4>
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

                <div class="clearfix">
                    <button class="btn btn-primary btn-sm dois-sabores">2 Sabores</button>
                </div>
            </div>
            <div class="Popular-Restaurants-grid wow fadeInLeft" data-wow-delay="0.2s">
                <div class="col-md-3 restaurent-logo" data-toggle="collapse" href="#collapsePizzaPremium">
                    <img src="images/pizza-premium-logo.jpg" class="img-responsive" alt=""/>
                </div>
                <div class="col-md-2 restaurent-title">
                    <div class="logo-title logo-title-1">
                        <h4><a data-toggle="collapse" href="#collapsePizzaPremium" role="button" aria-expanded="false"
                               aria-controls="collapseExample">Pizzas Premium</a></h4>
                    </div>

                    <!--                    ADICIONAR POSTERIORMENTE - RATINGS -->
                    <!--<div class="rating">
                        <span>ratings</span>
                        <a href="#"> <img src="images/star2.png" class="img-responsive" alt="">(005)</a>
                    </div>-->
                    <!--                    ADICIONAR POSTERIORMENTE - RATINGS -->

                    <div class="collapse fade" id="collapsePizzaPremium">
                        <div class="card card-body">
                            <div class="orders">
                                <div class="container">
                                    <?php include "cardapios/manda_pizza/pizzas_premium.php" ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="collapse fade" id="collapsePizzaPremium2sabores">
                        <div class="card card-body">
                            <div class="orders">
                                <div class="container">
                                    <?php include "cardapios/manda_pizza/pizzas_premium_2sabores.php" ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="clearfix">
                    <button class="btn btn-primary btn-sm dois-sabores">2 Sabores</button>
                </div>
            </div>
            <div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.2s">
                <div class="col-md-3 restaurent-logo" data-toggle="collapse" href="#collapseMassaTradicional">
                    <img src="images/massa-tradicional-logo.jpg" class="img-responsive" alt=""/>
                </div>
                <div class="col-md-2 restaurent-title">
                    <div class="logo-title logo-title-2">
                        <h4><a data-toggle="collapse" href="#collapseMassaTradicional" role="button"
                               aria-expanded="false" aria-controls="collapseExample">Massas Tradicionais</a></h4>
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
                <div class="col-md-3 restaurent-logo" data-toggle="collapse" href="#collapseMassaPremium">
                    <img src="images/massa-premium-logo.jpg" class="img-responsive" alt=""/>
                </div>
                <div class="col-md-2 restaurent-title">
                    <div class="logo-title logo-title-3">
                        <h4><a data-toggle="collapse" href="#collapseMassaPremium" role="button" aria-expanded="false"
                               aria-controls="collapseExample">Massas Premium</a></h4>
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
                <div class="col-md-3 restaurent-logo" data-toggle="collapse" href="#collapseBebidas">
                    <img src="images/bebidas-logo.jpg" class="img-responsive" alt=""/>
                </div>
                <div class="col-md-2 restaurent-title">
                    <div class="logo-title logo-title-4">
                        <h4><a data-toggle="collapse" href="#collapseBebidas" role="button" aria-expanded="false"
                               aria-controls="collapseExample">Bebidas</a></h4>
                    </div>
                    <br>
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
        <p class="wow fadeInLeft" data-wow-delay="0.2s">&copy; 2019 Todos os direitos reservados | &nbsp;<a
                    href="https://contatostreamline.wixsite.com/pedefacil2" target="target_blank">Streamline
                Technologies</a></p>
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


<!-- The Modal Carrinho -->
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
            <div id="carrinho_footer" class="modal-footer">
                <h4 style='float: left; font-weight: bold'>Total = <span id="total_conta"></span></h4>
                <button type="button" class="btn btn-secondary" id="enviarPedido" style="color:#006ff5;">Finalizar
                    pedido
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>
<!-- MODAIS PARA SABORES DAS BEBIDAS -->
<?php include "cardapios/manda_pizza/refrigerante_lata.php" ?>
<?php include 'cardapios/manda_pizza/refrigerante_lata.php'; ?>
<?php include 'cardapios/manda_pizza/refrigerante_1l.php'; ?>
<?php include 'cardapios/manda_pizza/refrigerante_2l.php'; ?>
<?php include 'cardapios/manda_pizza/sucos.php'; ?>
<?php include 'cardapios/manda_pizza/cerveja.php'; ?>

<?php include 'cardapios/manda_pizza/pizzas_2_sabores.php'; ?>
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
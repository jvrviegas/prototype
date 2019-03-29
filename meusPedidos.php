<?php
$key = uniqid(md5(rand()));
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Pede Fácil - Meus Pedidos</title>
        <!--         CSS -->
        <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href="css/base.css" rel="stylesheet">	
        <link href="css/fonts.css" rel="stylesheet">
        <link href="css/bootstrap-3.3.0.css" rel="stylesheet">
        <link href="css/meusPedidos.css?key=<?php echo $key; ?>" rel="stylesheet">
        <!--         JAVASCRIPT -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/base.js"></script>
        <script src="js/bootstrap-3.3.0/bootstrap-3.3.0.min.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                var id_usuario = 1;
                var controlePedidos = new Array();
                $("#att_pedidos").click(function () {
                    $.ajax({
                        url: 'consultarPedidos.php',
                        type: 'POST',
                        data: 'id_usuario=' + id_usuario,
                        dataType: 'json',
                        success: function (result) {
                            console.log(result);
//                            $.each(result, function (key, value) {
//                                if (controlePedidos.indexOf(value.id_pedido) === -1) {
//                                    $("#tbody_pedidos").append("<tr> <td id='id_pedido'>" + value.id_pedido + "</td> <td>" + value.lista_cod + "</td> <td>" + value.lista_cod + "</td> <td>" + value.status_pedido + "</td> </tr>");
//                                    controlePedidos.push(value.id_pedido);
//                                    console.log(result)
//                                }
//                            });
                        }
                    });
                });

//                $("#att_pedidos").click(function (event) {
//                    var id_usuario = 1;
//                    console.log(id_usuario);
//                    
//                });

            });
        </script>

        <!--         META TAGS -->
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta charset="utf-8">
    </head>
    <body>
        <!--header-section-starts--> 
        <div class="header">
            <div class="container">
                <div class="top-header">
                    <div class="logo">
                        <a href="index.php"><img src="images/logo-pincelada.png" style="width: 210px; height:70px;" class="img-responsive" alt="" /></a>
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
                            <li class="active"><a href="meusPedidos.php">Pedidos</a></li>
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
        <!--header-section-ends--> 
        <!--content-section-starts--> 

        <div class="special-offers-section">
            <div class="container">
                <button id="att_pedidos">Atualizar pedidos</button>
                <!--INSERIR AQUI O CONTEÚDO PARA RECEBER OS PEDIDOS-->
                <div class="lista_pedidos">
                    <h3>Pedidos em aberto</h3>
                    <div id="tabela_pedidos_aberto" class="table-responsive">
                        <table id="pedidos_em_aberto" class="table"> 
                            <thead> 
                                <tr> 
                                    <th>ID</th> 
                                    <th>Produto</th> 
                                    <th>Valor</th> 
                                    <th>Quantidade</th> 
                                </tr> </thead> 
                            <tbody id="tbody_pedidos"> 
                                <!--                                Conteúdo adicionado dinamicamente-->
                            </tbody> 
                        </table>
                    </div>
                </div>
                <div class="lista_pedidos">
                    <h3>Pedidos encerrados</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

</div>
<!--content-section-ends--> 
<!--footer-section-starts--> 
<div class="footer">
    <div class="container">
        <p class="wow fadeInLeft" data-wow-delay="0.2s">&copy; 2019  Todos os direitos reservados | &nbsp;<a href="https://contatostreamline.wixsite.com/pedefacil2" target="target_blank">Streamline Technologies</a></p>
    </div>
</div>
<!--footer-section-ends--> 
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


<!--The Modal--> 
<div class="modal fade" id="carrinho">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!--Modal Header--> 
            <div class="modal-header">
                <h4 class="modal-title">Meu Carrinho</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!--Modal body--> 
            <div class="modal-body" id="modal-body-carrinho">
                <div class="container table-responsive-sm">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="tabelaProdutos">
                            <tr id="colunaPrecosTotais">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="font-weight: bold;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!--Modal footer--> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="botaoConfirmar" style="color:#006ff5;">Finalizar pedido</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>

</body>
</html>
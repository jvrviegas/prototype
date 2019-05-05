<?php
$categoria = "pizza_premium";
$retorno = new Consulta();
$produtos = $retorno->carregarProdutos($categoria);
?>
<!-- The Modal Refrigerantes em Lata -->
<div class="modal fade" id="pizza2sabores" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Selecione os sabores</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="modal-body-carrinho">
                <button class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapsePizzaTradicional_modal">Pizzas Tradicionais</button>
                <button class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapsePizzaPremium_modal">Pizzas Premium</button>
            </div>

            <div class="collapse fade" id="collapsePizzaTradicional_modal">
                <div class="card card-body">
                    <div class="orders">
                        <div class="container" id="lista_pizzas_tradicionais">
                            <?php include "cardapios/manda_pizza/pizzas_tradicionais_2sabores.php" ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse fade" id="collapsePizzaPremium_modal">
                <div class="card card-body">
                    <div class="orders">
                        <div class="container" id="lista_pizzas_tradicionais">
                            <?php include "cardapios/manda_pizza/premium2sabores.php" ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn_close">Fechar</button>
            </div>

        </div>
    </div>
</div>
<?php
$categoria = "pizza_premium_grande";
$retorno = new Consulta();
$produtos = $retorno->carregarProdutos($categoria);
?>
<!-- The Modal Refrigerantes em Lata -->
<div class="modal fade" id="pizza2sabores_pequena" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Selecione os sabores</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="modal-body-carrinho">
                <button class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapsePizzaTradicionalPequena_modal">Pizzas Tradicionais - Pequena</button>
                <button class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapsePizzaPremiumPequena_modal">Pizzas Premium - Pequena</button>
            </div>

            <div class="collapse fade" id="collapsePizzaTradicionalPequena_modal">
                <div class="card card-body">
                    <div class="orders">
                        <div class="container" id="lista_pizzas_tradicionais">
                            <?php include "cardapios/manda_pizza/pizzas_tradicionais_2sabores_pequena.php" ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="collapse fade" id="collapsePizzaPremiumPequena_modal">
                <div class="card card-body">
                    <div class="orders">
                        <div class="container" id="lista_pizzas_tradicionais">
                            <?php include "cardapios/manda_pizza/premium2sabores_pequena.php" ?>
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
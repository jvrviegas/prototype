<?php
$categoria = "pizza_tradicional";
$retorno = new Consulta();
$pizzas_tradicionais = $retorno->carregarProdutos($categoria);
foreach ($pizzas_tradicionais as $produto) {
    $desc_title = strtolower(sanitizeString($produto['produto']));
    ?>
    <!-- LISTA DE PRODUTOS | INÍCIO -->
    <!-- PRODUTO 1 -->
    <div class="order-top">
        <li class="item-lists">
            <p><a class="desc-link" data-toggle="modal" data-target="#<?php echo $desc_title; ?>"><span
                            class="sabor-title item_name"><?php echo $produto['produto']; ?></span><br>Foto e descrição</a>
            </p>
        <li class="item-lists itensCarrinho">
            <div class="special-info grid_1 simpleCart_shelfItem">
                <div class="pre-top">
                    <div class="pr-left">
                        <div class="item_add">
                        <span class="item_price">
                            <h6><?php echo "R$ " . number_format($produto['preco'], 2, ",", ".");?></h6>
                        </span>
                        </div>
                    </div>
                    <div class="pr-right">
                        <button type='button' id='arrowDown' class='button numberArrow'
                                onclick='this.parentNode.querySelector("[type=number]").stepDown();'>
                            -
                        </button>
                        <input type='number' name='number' class='qtd_item' id='quant' min='1' max='100'
                               value='1' readonly>
                        <button style='margin-right: 15px;' type='button' id='arrowUp' class='button numberArrow'
                                onclick='this.parentNode.querySelector("[type=number]").stepUp();'>
                            +
                        </button>
                        <a class="itemCarrinho" id="<?php echo $produto['cod']; ?>">Adicionar</a>
                        <div class="clearfix"></div>
                    </div>
        </li>
        <div class="clearfix"></div>
    </div>
    <?php
}
?>
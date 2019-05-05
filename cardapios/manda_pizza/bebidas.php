<?php
$categoria = "bebidas";
$retorno = new Consulta();
$bebidas = $retorno->carregarProdutos($categoria);
foreach ($bebidas as $produto) {
    $desc_title = strtolower(sanitizeString($produto['produto']));
    ?>
    <!-- LISTA DE PRODUTOS | INÍCIO -->
    <!-- PRODUTO 1 -->
    <div class="order-top">
        <li class="item-lists">
            <p><span
                            class="sabor-title item_name"><?php echo $produto['produto']; ?></span>
            </p>
        <li class="item-lists itensCarrinho">
            <div class="special-info grid_1 simpleCart_shelfItem">
                <div class="pre-top">
                    <div class="pr-left">
                        <div class="item_add">
                        <span class="item_price">
                            <h6><?php echo $produto['preco']; ?></h6>
                        </span>
                        </div>
                    </div>
                    <div class="pr-right">
                        <?php if($produto['produto'] === "Água com gás" || $produto['produto'] === "Água sem gás") {?>
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
                        <?php }
                        else {?>
                            <a class="itemCarrinhoBebida" id="<?php echo $produto['cod']; ?>">Adicionar</a>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
        </li>
        <div class="clearfix"></div>
    </div>
    <?php
}
?>
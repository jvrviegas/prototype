<?php
$retorno = new Consulta();
$todos = $retorno->carregarTodosProdutos();
foreach ($todos as $produto) {
    $desc_title = strtolower(sanitizeString($produto['produto']));
?>
<!-- LISTA DE DESCRIÇÕES -->

<!-- The Modal -->
        <div class="modal fade" id="<?php echo $desc_title; ?>">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo $produto['produto'];?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <img src="images/pizza-tradicional-logo.jpg"><br><br>
                        <p><?php echo $produto['descricao'];?></p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>

                </div>
            </div>
        </div>            
<?php
}
?>
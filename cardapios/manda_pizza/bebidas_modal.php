<?php
?>

<!-- The Modal Refrigerantes em Lata -->
<div class="modal fade" id="bebidas">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Refrigerante Lata</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="modal-body-carrinho">
                <div class="container table-responsive-sm">
                    <table class="table">

                        <tbody id="tabelaProdutos">
                        <tr>
                            <td>Coca-cola</td>
                            <td>
                                <button type='button' id='arrowDown' class='button numberArrow'
                                        onclick='this.parentNode.querySelector("[type=number]").stepDown();'>
                                    -
                                </button>
                                <input type='number' name='number' class='qtd_item' id='quant' min='1' max='100'
                                       value='1' readonly>
                                <button type='button' id='arrowUp' class='button numberArrow'
                                        onclick='this.parentNode.querySelector("[type=number]").stepUp();'>
                                    +
                                </button>
                            </td>
                            <td><a href="#">Adicionar</a></td>
                        </tr>
                        <tr>
                            <td>Coca-cola</td>
                            <td>
                                <button type='button' id='arrowDown' class='button numberArrow'
                                        onclick='this.parentNode.querySelector("[type=number]").stepDown();'>
                                    -
                                </button>
                                <input type='number' name='number' class='qtd_item' id='quant' min='1' max='100'
                                       value='1' readonly>
                                <button type='button' id='arrowUp' class='button numberArrow'
                                        onclick='this.parentNode.querySelector("[type=number]").stepUp();'>
                                    +
                                </button>
                            </td>
                            <td><a href="#">Adicionar</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>


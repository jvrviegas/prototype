jQuery(document).ready(function ($) {
    // Função para incremento do elemento 'quantidade'
    var num_mesa = JSON.parse(sessionStorage.getItem('num_mesa'));
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
        if (idProduto > 0 && idProduto < 47 || idProduto > 74) {
            var qtdProduto = $(this).closest('div').find('input').val();
        } else if (idProduto > 46 && idProduto <= 74) {
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
            if (idProduto > 0 && idProduto < 47 || idProduto > 74) {
                var qtdProduto = $(this).closest('div').find('input').val(1);
            } else if (idProduto > 46 && idProduto <= 74) {
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
        } else if (textoCarrinho === "Remover" && itensCarrinho.includes(idProduto)) {
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
            case '75':
                $("#refrigerante_2e5l").modal('show');
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
        if (controle2sabores > 2) {
            Swal("Por favor, selecione apenas dois sabores !");
        } else if (controle2sabores < 2 && controle2sabores > 0) {
            Swal("Por favor, selecione o segundo sabor !");
        } else if (controle2sabores === 2 || controle2sabores === 0) {
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
                        data: 'lista_cod=' + itensCarrinho + '&&itens_qtd=' + itensQtd + '&&num_mesa='+ num_mesa + '&&opc=1',
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
                            }).then((result) => {
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
                                window.location.replace('meusPedidos.php');
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

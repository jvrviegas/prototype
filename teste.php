<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

include "pedidos.php";

class Teste{

    var $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=pedefacil_db', 'root', 'p3d3f4c1l@db');
    }

    /* FUNÇÃO PARA INSERÇÃO DO PEDIDO AO BANCO DE DADOS NA TBL_PEDIDOS - LÓGICA:
       Primeiro:
        realizar uma consulta na tbl_vendas para pegar o id do último registro do usuário
        Se estiver vazio, o id_pedido vai receber 1; senão, realizar uma consulta na tabela e pegar o último
        id_pedido registrado na tabela referente àquele usuário
       Segundo:
        verificar se àquele id_pedido está com status_pedido = em aberto
        se estiver aberto, calcular a soma de todos os produtos a serem adicionados e somar ao valor da coluna valor_conta;
        senão, incrementar o id_pedido e realizar uma nova inserção nas tabelas
     */
    public function inserirPedido($id_usuario, $lista_cod, $itens_qtd)
    {
        /* TRANSFORMA AS STRINGS EM ARRAYS */
        $lista_ids = explode(",", $lista_cod);
        $lista_qtd = explode(",", $itens_qtd);

        /* CAPTURA O ÚLTIMO REGISTRO DA TABELA PARA VERIFICAR SEU ID_PEDIDO */
        $verificaTabela = $this->pdo->prepare("SELECT * FROM tbl_vendas WHERE id_usuario='$id_usuario' ORDER BY id_pedido DESC LIMIT 1");
        $verificaTabela->execute();
        if($verificaTabela->rowCount() === 0){
            $id_pedido = 1;
            $registra_conta = 0;
            $consultaProduto = new Consulta();
            /* ADICIONAR REGISTRO - TESTE DE IMPLEMENTAÇÃO DE CONTROLE DO PEDIDO PELA TBL_VENDAS */
            while ($id_produto = array_shift($lista_ids)) {
                $quantidade = array_shift($lista_qtd);
                $produto = $consultaProduto->consultaProduto($id_produto);
                $valor_unitario = $produto['preco'];
                $valor_total = $quantidade * $valor_unitario;
                $registra_conta += $valor_total;
            }
            $stmt_entry = $this->pdo->prepare("INSERT INTO tbl_vendas (id_pedido, id_usuario, valor_conta, status_pedido, data_abertura, data_encerramento) VALUES (:id_pedido, :id_usuario, :valor_conta, 'Em aberto', NOW(), NOW())");
            $stmt_entry->bindValue(':id_pedido', $id_pedido);
            $stmt_entry->bindValue(':id_usuario', $id_usuario);
            $stmt_entry->bindValue(':valor_conta', $registra_conta);
            $stmt_entry->execute();
        } else {
            $ultimo_registro = $verificaTabela->fetch(PDO::FETCH_ASSOC);
            /* PRIMEIRA PARTE | SE O ÚLTIMO PEDIDO AINDA ESTIVER EM ABERTO, ADICIONA NO MESMO ID, SENÃO (CASO PEDIDO ENCERRADO) ADICIONA NO ID SEGUINTE */
            if ($ultimo_registro['status_pedido'] === "Em aberto") {
                $id_pedido = $ultimo_registro['id_pedido'];
                $att_conta = 0;
                $consultaProduto = new Consulta();
                /* ATUALIZAR PEDIDO - TESTE DE IMPLEMENTAÇÃO DE CONTROLE DO PEDIDO PELA TBL_VENDAS */
                while ($id_produto = array_shift($lista_ids)) {
                    $quantidade = array_shift($lista_qtd);
                    $produto = $consultaProduto->consultaProduto($id_produto);
                    $valor_unitario = $produto['preco'];
                    $valor_total = $quantidade * $valor_unitario;
                    $att_conta += $valor_total;
                }
                $stmt_update = $this->pdo->prepare("UPDATE tbl_vendas SET valor_conta = valor_conta+'$att_conta', data_encerramento=NOW() WHERE id_pedido = '$id_pedido'");
                $stmt_update->execute();

                /* TESTE DE IMPLEMENTAÇÃO DE CONTROLE DO PEDIDO PELA TBL_VENDAS */
            } else {
                $id_pedido = $ultimo_registro['id_pedido'] + 1;
                $registra_conta = 0;
                $consultaProduto = new Consulta();
                /* ADICIONAR REGISTRO - TESTE DE IMPLEMENTAÇÃO DE CONTROLE DO PEDIDO PELA TBL_VENDAS */
                while ($id_produto = array_shift($lista_ids)) {
                    $quantidade = array_shift($lista_qtd);
                    $produto = $consultaProduto->consultaProduto($id_produto);
                    $valor_unitario = $produto['preco'];
                    $valor_total = $quantidade * $valor_unitario;
                    $registra_conta += $valor_total;
                }
                $stmt_entry = $this->pdo->prepare("INSERT INTO tbl_vendas (id_pedido, id_usuario, valor_conta, status_pedido, data_abertura, data_encerramento) VALUES (:id_pedido, :id_usuario, :valor_conta, 'Em aberto', NOW(), NOW())");
                $stmt_entry->bindValue(':id_pedido', $id_pedido);
                $stmt_entry->bindValue(':id_usuario', $id_usuario);
                $stmt_entry->bindValue(':valor_conta', $registra_conta);
                $stmt_entry->execute();
                /* TESTE DE IMPLEMENTAÇÃO DE CONTROLE DO PEDIDO PELA TBL_VENDAS */
            }
        }
    }

    public function consultarPedidosGerente() {
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_vendas WHERE status_pedido = 'Em aberto'");
        $stmt->execute();
        $pedido = Array();
        while ($teste = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produtos[] = array_map("utf8_encode", $teste);
        }

        return $produtos;
    }
}
$consulta = new Consulta();
$pedido = new Pedidos();
$teste = $consulta->consultaProduto(22);
$array = array_map("utf8_encode", $teste);
$teste2 = $pedido->consultarPedidos(15);
echo "<pre>";
print_r($teste2);

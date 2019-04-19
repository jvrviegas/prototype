<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

include "carrinho.php";

class Pedidos {

    var $pdo;

    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=pedefacil_db', 'root', 'p3d3f4c1l@db');
    }

    /* FUNÇÃO PARA INSERÇÃO DO PEDIDO AO BANCO DE DADOS NA TBL_PEDIDOS */

    public function inserirPedido($id_usuario, $lista_cod, $itens_qtd) {
        /* TRANSFORMA AS STRINGS EM ARRAYS */
        $lista_ids = explode(",", $lista_cod);
        $lista_qtd = explode(",", $itens_qtd);

        /* CAPTURA O ÚLTIMO REGISTRO DA TABELA PARA VERIFICAR SEU ID_PEDIDO */
        $verificaTabela = $this->pdo->prepare("SELECT * FROM tbl_vendas ORDER BY id_pedido DESC LIMIT 1");
        $verificaTabela->execute();
        $ultimo_registro = $verificaTabela->fetch(PDO::FETCH_ASSOC);

        /* SE O ÚLTIMO PEDIDO AINDA ESTIVER EM ABERTO, ADICIONA NO MESMO ID, SENÃO (CASO PEDIDO ENCERRADO) ADICIONA NO ID SEGUINTE */
        if ($ultimo_registro['status_pedido'] == "Em aberto") {
            $id_pedido = $ultimo_registro['id_pedido'];
        } else {
            $id_pedido = $ultimo_registro['id_pedido'] + 1;
        }
        /* CRIA UMA VARIÁVEL PARA REALIZAR AS CONSULTAS DOS PRODUTOS NO BANCO DE DADOS */
        $consulta = new Consulta();

        /* STRING SQL PARA PREPARAR A INSERÇÃO DOS DADOS */
        $sql = "INSERT INTO tbl_pedidos (id_pedido, id_usuario, id_produto, nome_produto, quantidade, valor_unitario, valor_total, data, status_pedido) VALUES (:id_pedido, :id_usuario, :id_produto, :nome_produto, :quantidade, :valor_unitario, :valor_total, NOW(), 'Em aberto')";
        $sql2 = "INSERT INTO tbl_vendas (id_pedido, id_usuario, valor_conta, status_pedido) VALUES (:id_pedido, :id_usuario, :valor_conta, 'Em aberto')";
        /* ITERAÇÃO PARA ADICIONAR CADA PRODUTO EM UMA LINHA NA TABELA */
        $valor_conta = 0;
        $stmt = $this->pdo->prepare($sql);

        while ($id_produto = array_shift($lista_ids)) {
            $quantidade = array_shift($lista_qtd);
            $produto = $consulta->consultaProduto($id_produto);
            $nome_produto = $produto['produto'];
            $valor_unitario = $produto['preco'];
            $valor_total = $quantidade * $valor_unitario;
            $valor_conta += $valor_total;

            $stmt->bindValue(':id_pedido', $id_pedido);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->bindValue(':id_produto', $id_produto);
            $stmt->bindValue(':nome_produto', $nome_produto);
            $stmt->bindValue(':quantidade', $quantidade);
            $stmt->bindValue(':valor_unitario', $valor_unitario);
            $stmt->bindValue(':valor_total', $valor_total);
            $stmt->execute();
        }
        $sql_teste = "SELECT * FROM tbl_vendas WHERE id_usuario = '$id_usuario' AND status_pedido = 'Em aberto'";
        $stmt_teste = $this->pdo->prepare($sql_teste);
        $stmt_teste->bindValue(':id_usuario', $id_usuario);
        $stmt_teste->execute();
        $count = $stmt_teste->rowCount();
        if ($count < 0) {
            $stmt = $this->pdo->prepare($sql2);
            $stmt->bindValue(':id_pedido', $id_pedido);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->bindValue(':valor_conta', $valor_conta);
            $stmt->execute();
        }
    }

    public function consultarPedidos($id_usuario) {
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_pedidos WHERE id_usuario = '$id_usuario' AND status_pedido = 'Em aberto'");
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        while ($teste = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = array_map("utf8_encode", $teste);
        }
        return $result;
    }

    public function consultarPedidosGerente() {
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_pedidos WHERE status_pedido = 'Em aberto'");
        $stmt->execute();
        $result = Array();
        $pedido = Array();
        $valor_conta = 0;
        while ($teste = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produtos[] = array_map("utf8_encode", $teste);
        }
        foreach ($produtos as $value) {
            $valor_conta += $value['valor_total'];
        }
        array_push($pedido, $value['id_pedido']);
        array_push($pedido, $value['id_usuario']);
        array_push($pedido, $valor_conta);
        array_push($pedido, $value['status_pedido']);

        array_push($result, $pedido);
        return $result;
    }

    // IMPLEMENTAR A FUNÇÃO PARA ENCERRAMENTO DO PEDIDO
    public function encerrarPedido($id_usuario) {
        // PESQUISAR O VALOR TOTAL DA CONTA REALIZANDO UMA BUSCA NO BANCO DE DADOS NA TBL_PEDIDOS
        $sql_tblvendas = "INSERT INTO tbl_vendas (id_usuario, valor_conta, data, status_pedido) VALUES (:id_usuario, :valor_conta, NOW(), 'Em aberto')";
        $stmt_tblvendas = $this->pdo->prepare($sql_tblvendas);
        $stmt_tblvendas->bindValue(':id_usuario', $id_usuario);
        $stmt_tblvendas->bindValue(':valor_conta', $valor_conta);
        $stmt_tblvendas->execute();
    }

}

/*
  TABELA DE OPÇÕES
 * 1 -> ENVIAR PEDIDO
 * 2 -> EXIBIR PEDIDO (USUÁRIO)
 * 3 -> EXIBIR PEDIDO (GERENTE)
 * 4 -> ENCERRAR PEDIDO (GERENTE)

 */

if (isset($_POST) && isset($_POST['opc'])) {
    $opc = $_POST['opc'];
    $id_usuario = $_SESSION['id'];
    /* TRABALHAR COM SWITCH CASE PARA REALIZAR AS OPERAÇÕES */
    switch ($opc) {
        case '1':
            if (isset($_POST['lista_cod']) && isset($_POST['itens_qtd'])) {
                $lista_cod = $_POST['lista_cod'];
                $itens_qtd = $_POST['itens_qtd'];
                $pedido = new Pedidos();
                $pedido->inserirPedido($id_usuario, $lista_cod, $itens_qtd);
            }
            break;

        case '2':
            if (isset($_POST['id_usuario'])) {
                $id_usuario = $_POST['id_usuario'];
                $consulta = new Pedidos();
                $pedidos = $consulta->consultarPedidos($id_usuario);
                $carrinho = new Consulta();
                $pedido_aberto = Array();
                $pedidos_encerrados = Array();
                $teste = Array();
                $teste2 = Array();
                foreach ($pedidos as $value) {
                    if ($value['status_pedido'] === "Em aberto") {
                        array_push($pedido_aberto, $value);
                    }
                }
                echo json_encode($pedido_aberto);
            }
            break;

        case '3':
            $consulta = new Pedidos();
            $pedidos = $consulta->consultarPedidosGerente();
            $pedido_aberto = Array();
            foreach ($pedidos as $value) {
                if ($value['status_pedido'] === "Em aberto") {
                    array_push($pedido_aberto, $value);
                }
            }
            echo json_encode($pedido_aberto);
            break;

        default:
            break;
    }
}
?>

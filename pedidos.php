<?php
header("Content-Type: text/html; charset=UTF-8",true);
error_reporting(E_ALL);
ini_set('display_errors', true);

include "carrinho.php";

class Pedidos {

    var $pdo;

    function __construct() {
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
    public function inserirPedido($id_usuario, $lista_cod, $itens_qtd, $num_mesa) {
        /* TRANSFORMA AS STRINGS EM ARRAYS */
        $lista_ids = explode(",", $lista_cod);
        $lista_qtd = explode(",", $itens_qtd);

        /* CAPTURA O ÚLTIMO REGISTRO DA TABELA PARA VERIFICAR SEU ID_PEDIDO */
        $verificaTabela = $this->pdo->prepare("SELECT * FROM tbl_vendas WHERE id_usuario='$id_usuario' ORDER BY id_pedido DESC LIMIT 1");
        $verificaTabela->execute();
        /* VERIFICA SE A TBL_VENDAS JÁ POSSUI ALGUM REGISTRO, SE NÃO POSSUIR, REALIZA O PRIMEIRO REGISTRO */
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
            $stmt_entry = $this->pdo->prepare("INSERT INTO tbl_vendas (id_pedido, id_usuario, num_mesa, valor_conta, status_pedido, data_abertura, data_encerramento) VALUES (:id_pedido, :id_usuario, :num_mesa, :valor_conta, 'Em aberto', NOW(), NOW())");
            $stmt_entry->bindValue(':id_pedido', $id_pedido);
            $stmt_entry->bindValue(':id_usuario', $id_usuario);
            $stmt_entry->bindValue(':num_mesa', $num_mesa);
            $stmt_entry->bindValue(':valor_conta', $registra_conta);
            $stmt_entry->execute();
        }
        /* SE JÁ POSSUIR ALGUM REGISTRO, VERIFICA SE O MESMO ESTÁ "EM ABERTO" */
        else {
            $ultimo_registro = $verificaTabela->fetch(PDO::FETCH_ASSOC);
            /* PRIMEIRA PARTE | SE O ÚLTIMO PEDIDO AINDA ESTIVER EM ABERTO, ADICIONA NO MESMO ID, SENÃO (CASO PEDIDO ENCERRADO) ADICIONA NO ID SEGUINTE */
            if ($ultimo_registro['status_pedido'] === "Em aberto") {
                $id_pedido = $ultimo_registro['id_pedido'];
                $att_conta = 0;
                $consultaProduto = new Consulta();
                /* ATUALIZAR O VALOR DA CONTA DO PEDIDO EM QUESTÃO */
                while ($id_produto = array_shift($lista_ids)) {
                    $quantidade = array_shift($lista_qtd);
                    $produto = $consultaProduto->consultaProduto($id_produto);
                    $valor_unitario = $produto['preco'];
                    $valor_total = $quantidade * $valor_unitario;
                    $att_conta += $valor_total;
                }
                $stmt_update = $this->pdo->prepare("UPDATE tbl_vendas SET valor_conta = valor_conta+'$att_conta', data_encerramento=NOW() WHERE id_usuario = '$id_usuario' AND id_pedido = '$id_pedido'");
                $stmt_update->execute();

                /* SENÃO, REALIZA UM NOVO REGISTRO NA TABELA COM UM NOVO ID */
            } else {
                $id_pedido = $ultimo_registro['id_pedido'] + 1;
                $registra_conta = 0;
                $consultaProduto = new Consulta();
                /* ADICIONAR REGISTRO */
                while ($id_produto = array_shift($lista_ids)) {
                    $quantidade = array_shift($lista_qtd);
                    $produto = $consultaProduto->consultaProduto($id_produto);
                    $valor_unitario = $produto['preco'];
                    $valor_total = $quantidade * $valor_unitario;
                    $registra_conta += $valor_total;
                }
                $stmt_entry = $this->pdo->prepare("INSERT INTO tbl_vendas (id_pedido, id_usuario, num_mesa, valor_conta, status_pedido, data_abertura, data_encerramento) VALUES (:id_pedido, :id_usuario, :num_mesa, :valor_conta, 'Em aberto', NOW(), NOW())");
                $stmt_entry->bindValue(':id_pedido', $id_pedido);
                $stmt_entry->bindValue(':id_usuario', $id_usuario);
                $stmt_entry->bindValue(':num_mesa', $num_mesa);
                $stmt_entry->bindValue(':valor_conta', $registra_conta);
                $stmt_entry->execute();
            }
        }

        /* CRIA UMA VARIÁVEL PARA REALIZAR AS CONSULTAS DOS PRODUTOS NO BANCO DE DADOS */
        $consulta = new Consulta();

        /* TRANSFORMA AS STRINGS EM ARRAYS NOVAMENTE PARA QUE SEJA FEITA A ADIÇÃO NA SEGUNDA TABELA (TBL_PEDIDOS) */
        $lista_ids = explode(",", $lista_cod);
        $lista_qtd = explode(",", $itens_qtd);

        /* STRING SQL PARA PREPARAR A INSERÇÃO DOS DADOS */
        $sql = "INSERT INTO tbl_pedidos (id_pedido, id_usuario, id_produto, nome_produto, quantidade, valor_unitario, valor_total, data, status_pedido) VALUES (:id_pedido, :id_usuario, :id_produto, :nome_produto, :quantidade, :valor_unitario, :valor_total, NOW(), 'Em aberto')";
        /* ITERAÇÃO PARA ADICIONAR CADA PRODUTO EM UMA LINHA NA TABELA */
        $valor_conta = 0;
        $stmt = $this->pdo->prepare($sql);
        while ($id_produto = array_shift($lista_ids)) {
            $quantidade = array_shift($lista_qtd);
            $produto = array_map("utf8_encode", $consulta->consultaProduto($id_produto));
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
    }

    /* REALIZA UMA CONSULTA NA TBL_PEDIDOS E RETORNA OS PEDIDOS "EM ABERTO" DO USUÁRIO EM QUESTÃO */
    public function consultarPedidos($id_usuario) {
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_pedidos WHERE id_usuario = '$id_usuario' AND status_pedido = 'Em aberto'");
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        $result= [];
        while ($teste = $stmt->fetch(PDO::FETCH_ASSOC)) {
             array_push($result, $teste);
        }
        return $result;
    }

    /* REALIZA UMA CONSULTA NA TBL_VENDAS E RETORNA TODOS OS PEDIDOS "EM ABERTO" DE TODOS OS USUÁRIOS */
    public function consultarPedidosGerente() {
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_vendas WHERE status_pedido = 'Em aberto'");
        $stmt->execute();
        $pedido = Array();
        while ($teste = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produtos[] = array_map("utf8_encode", $teste);
        }

        return $produtos;
    }

    /* FUNÇÃO PARA ENCERRAR O PEDIDO - TROCAR O "STATUS_PEDIDO" DE "EM ABERTO" PARA "ENCERRADO" */
    public function encerrarPedido($id_usuario) {
        // PESQUISAR O VALOR TOTAL DA CONTA REALIZANDO UMA BUSCA NO BANCO DE DADOS NA TBL_PEDIDOS
        $sql_tblvendas = "UPDATE tbl_vendas SET status_pedido = 'Encerrado', data_encerramento=NOW() WHERE id_usuario = '$id_usuario'";
        $sql_tblpedidos = "UPDATE tbl_pedidos SET status_pedido = 'Encerrado' WHERE id_usuario = '$id_usuario'";
        $stmt_tblvendas = $this->pdo->prepare($sql_tblvendas);
        $stmt_tblpedidos = $this->pdo->prepare($sql_tblpedidos);
        $stmt_tblvendas->execute();
        $stmt_tblpedidos->execute();
    }

}

/*
  TABELA DE OPÇÕES
 * 1 -> ENVIAR PEDIDO
 * 2 -> EXIBIR PEDIDO (USUÁRIO)
 * 3 -> EXIBIR PEDIDO (GERENTE)
 * 4 -> ENCERRAR PEDIDO (GERENTE)
 * 5 -> ENCERRAR PEDIDO (USUÁRIO)

 */

if (isset($_POST) && isset($_POST['opc'])) {
    $opc = $_POST['opc'];
    /* TRABALHAR COM SWITCH CASE PARA REALIZAR AS OPERAÇÕES */
    switch ($opc) {
        case '1':
            if (isset($_POST['lista_cod']) && isset($_POST['itens_qtd']) && isset($_POST['num_mesa'])) {
                $id_usuario = $_SESSION['id'];
                $lista_cod = $_POST['lista_cod'];
                $itens_qtd = $_POST['itens_qtd'];
                $num_mesa = $_POST['num_mesa'];
                $pedido = new Pedidos();
                $pedido->inserirPedido($id_usuario, $lista_cod, $itens_qtd, $num_mesa);
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

        case '4':
            if(isset($_POST['id_usuario'])){
                $pedidos = new Pedidos();
                $pedidos->encerrarPedido($_POST['id_usuario']);
            }
            break;

        default:
            break;
    }
}
?>

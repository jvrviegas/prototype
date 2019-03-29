<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
session_start();

class Pedidos {
    var $pdo;
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=pedefacil_db', 'root', 'p3d3f4c1l@db');
    }
    
    public function inserirPedido($id_usuario, $lista_ids, $status_pedido){
        $captura_id = $this->pdo->prepare("SELECT MAX(ID) FROM tbl_pedidos");
        $captura_id->execute();
        $id_pedido = $captura_id->fetch(PDO::FETCH_ASSOC);
        // Adicionar as informações do produto e capturar o ID do último pedido
        $stmt = $this->pdo->prepare("INSERT INTO tbl_pedidos (id_pedido, id_usuario, id_produto, status_pedido, data) VALUES('$id_usuario', '$lista_ids', '$status_pedido', NOW())");
        
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->bindValue(':lista_cod', $lista_ids);
        $stmt->bindValue(':status_pedido', $status_pedido);
        $stmt->execute();
    }
    
    public function consultarPedidos($id_usuario){
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_pedidos WHERE id_usuario = '$id_usuario'");
        $stmt->bindValue(':id_usuario', $id_usuario);
        $stmt->execute();
        while($teste = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[]= array_map("utf8_encode",$teste);
        }
        return $result;
    }
}

if (isset($_POST) && isset($_POST['id'])) {
    $lista_ids = $_POST['id'];
    $id_usuario = $_SESSION['id'];
    $status_pedido = "Em aberto";
    
    $pedido = new Pedidos();
    $enviarPedido = $pedido->inserirPedido($id_usuario, $lista_ids, $status_pedido);
}
?>

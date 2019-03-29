<?php
include "conexao.php";

session_start();

class Carrinho{
    var $pdo;
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=pedefacil_db', 'root', 'p3d3f4c1l@db');
    }
    /* FUNÇÕES DE VENDA */
    public function consultaProduto($cod){
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_produtos WHERE cod = '$cod'");
        $stmt->bindValue(':cod', $cod);
        $run = $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
}
if(isset($_POST) && isset($_POST['id'])){
    $codProduto = $_POST['id'];
    $retorno = new Carrinho();
    $produto = $retorno->consultaProduto($codProduto);
//    $resultado = implode("*", $produto);
//    $result = utf8_encode($produto);
    $result = array_map("utf8_encode", $produto);

    echo json_encode($result);
}
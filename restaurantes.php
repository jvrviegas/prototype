<?php
session_start();

class Restaurantes
{
    var $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=213.190.6.74;dbname=u945705568_db', 'u945705568_admin', 'p3d3f4c1l@db');
    }

    function consulta($id_restaurante){
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_restaurantes WHERE id_restaurante = '$id_restaurante'");
        $stmt->bindValue(':id_restaurante', $id_restaurante);
        $run = $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

if(isset($_GET['id']) && isset($_GET['mesa']) && (isset($_SESSION['id']) && isset($_SESSION['user']))){
    $id_restaurante = $_GET['id'];
    $num_mesa = $_GET['mesa'];
    $consulta = new Restaurantes();
    $restaurante = $consulta->consulta($id_restaurante);
    if(!empty($restaurante)){
        $pagina = $restaurante['link'];
        header("location:$pagina");
    }
}
?>

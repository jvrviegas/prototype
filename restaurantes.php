<?php
session_start();

class Restaurantes
{
    var $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=pedefacil_db', 'root', 'p3d3f4c1l@db');
    }

    function consulta($id_restaurante){
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_restaurantes WHERE id_restaurante = '$id_restaurante'");
        $stmt->bindValue(':id_restaurante', $id_restaurante);
        $run = $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

echo $_SESSION['id'].$_SESSION['user'];

if(isset($_GET['id']) && isset($_GET['mesa'])){
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
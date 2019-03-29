<?php

error_reporting(E_ALL);
ini_set('display_errors', true);
include "pedidos.php";
include "carrinho.php";

//if (isset($_POST) && $_POST['id_usuario']) {
//    $id_usuario = $_POST['id_usuario'];
    $consulta = new Pedidos();
    $pedidos = $consulta->consultarPedidos(1);
    $carrinho = new Consulta();
    $pedido_aberto = Array();
    $pedidos_encerrados = Array();
    $teste = Array();
    $teste2 = Array();
    foreach ($pedidos as $value) {
        if ($value['status_pedido'] === "Em aberto") {
            $lista_ids = explode(",", $value['lista_cod']);
            array_push($pedido_aberto, $value['id_pedido']);
            array_push($pedido_aberto, $value['status_pedido']);
            for ($i = 0; $i < count($lista_ids); $i++) {
                array_push($teste, $carrinho->consultaProduto($lista_ids[$i])['produto']);
                array_push($teste, $carrinho->consultaProduto($lista_ids[$i])['preco']);
            }
            array_push($pedido_aberto, $teste);
        }
    }
    
//    echo "<pre>";
//    print_r($pedido_aberto);
//    echo json_encode($pedido_aberto);
//
//echo "<h2>Pedidos fechados</h2>";
//
//foreach ($pedidos as $value) {
//    if ($value['status_pedido'] === "Encerrado") {
//        print_r($value);
//        $lista_ids = explode(",", $value['lista_cod']);
//        print_r($lista_ids);
//        array_push($pedidos_encerrados, $value['id_pedido']);
//        array_push($pedidos_encerrados, $value['status_pedido']);
//        for($i = 0 ; $i<count($lista_ids) ; $i++){
//            array_push($teste2, $carrinho->consultaProduto($lista_ids[$i]));
//        }
//        array_push($pedidos_encerrados, $teste2);
//    }
//}
//print_r($pedidos_encerrados);
//}
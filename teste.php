<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

include "pedidos.php";

$pedidos = new Pedidos();
echo "<pre>";
print_r($pedidos->consultarPedidosGerente());

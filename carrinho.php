<?php
include "conexao.php";

session_start();

function sanitizeString($str) {
    $str = preg_replace('/[áàãâä]/ui', 'a', $str);
    $str = preg_replace('/[éèêë]/ui', 'e', $str);
    $str = preg_replace('/[íìîï]/ui', 'i', $str);
    $str = preg_replace('/[óòõôö]/ui', 'o', $str);
    $str = preg_replace('/[úùûü]/ui', 'u', $str);
    $str = preg_replace('/[ç]/ui', 'c', $str);
    // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
    $str = preg_replace('/[^a-z0-9]/i', '_', $str);
    $str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
    return $str;
}

class Consulta{
    var $pdo;
    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=pedefacil_db', 'root', 'p3d3f4c1l@db');
    }
    /* FUNÇÕES DE VENDA */
    public function consultaProduto($cod){
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_produtos WHERE cod = '$cod'");
        $stmt->bindValue(':cod', $cod);
        $stmt->execute();
        $result = array_map("utf8_encode", $stmt->fetch(PDO::FETCH_ASSOC));
        return $result;
    }
    /* CARREGAR OS PRODUTOS POR CATEGORIA */
    public function carregarProdutos($categoria){
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_produtos WHERE categoria = '$categoria'");
        $stmt->bindValue(':categoria', $categoria);
        $run = $stmt->execute();
        while($teste = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[]= array_map("utf8_encode",$teste);
        }
        return $result;
    }
    public function carregarTodosProdutos(){
        $stmt = $this->pdo->prepare("SELECT produto,descricao FROM tbl_produtos");
        $run = $stmt->execute();
        while($teste = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[]= array_map("utf8_encode",$teste);
        }
        return $result;
    }
    
}

/* INICIAR A MONTAGEM DO CARRINHO AQUI */
if(isset($_POST) && isset($_POST['lista_cod'])){
    /* Transforma os ID's em um array */
    $codProduto = explode(',' ,$_POST['lista_cod']);
    $produtos = array();
    $retorno = new Consulta();
    $total = 0;
    $html = "";
    foreach ($codProduto as $key => $value) {
        array_push($produtos, $retorno->consultaProduto($value)) ;
    }
    echo json_encode($produtos);
//    foreach ($produtos as $value){
//        $total += $value['preco'];
//        $html .= "<tr>";
//        $html .=    "<td>".$value['produto']."</td>";
//        $html .=    "<td>".$value['preco']."</td>";
//        $html .=    "<td>";
//        $html .=    "<div>";
//        $html .=        "<button type='button' id='arrowDown' class='button numberArrow' onclick='this.parentNode.querySelector(\"[type=number]\").stepDown();'> - </button>";
//        $html .=        "<input type='number' name='number' min='1' max='100' value='1' readonly>";
//        $html .=        "<button type='button' id='arrowUp' class='button numberArrow' onclick='this.parentNode.querySelector(\"[type=number]\").stepUp();'> + </button>";
//        $html .=    "</div>";
//        $html .=    "</td>";
//        $html .=    "<td id='".$value['produto']."Total'>".$value['preco']."</td>";
//        $html .= "</tr>";
//    }
//    echo json_encode($html);

}

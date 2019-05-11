<?php
session_start();

class Conexao
{
    var $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=pedefacil_db', 'root', 'p3d3f4c1l@db');
    }

    /* FUNÇÕES DE LOGIN */
    public function select($usuario, $senha)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_users WHERE usuario = '$usuario' AND senha = '$senha'");
        $stmt->bindValue(':usuario', $usuario);
        $stmt->bindValue(':senha', $senha);
        $run = $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function validarUsuario($usuario)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tbl_users WHERE usuario = '$usuario'");
        $stmt->bindValue(':usuario', $usuario);
        $run = $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarUsuario($usuario, $senha, $email)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tbl_users (usuario, senha, email, data) VALUES ('$usuario', '$senha', '$email', NOW())");
        $stmt->bindValue(':usuario', $usuario);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
    }

}

$conn = new Conexao();
if (!$conn) {
    echo "Não foi possível conectar ao banco de dados!";
    exit();
}

if (isset($_POST) && isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = preg_replace('/[^[:alnum:]_]/', '', $_POST['usuario']);
    $senha = preg_replace('/[^[:alnum:]_@]/', '', $_POST['senha']);
    $select = $conn->select($usuario, $senha);
    if (empty($select)) {
        $mensagem = 0;
        echo json_encode($mensagem);
    } else {
        $_SESSION['id'] = $select[0]['id_usuario'];
        $_SESSION['user'] = $select[0]['usuario'];

        if($_SESSION['id'] == 1){
            $mensagem = 2;
        } else {
            $mensagem = 1;
        }
        echo json_encode($mensagem);
    }
}
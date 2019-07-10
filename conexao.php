<?php
session_start();

class Conexao
{
    var $pdo;

    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=u945705568_db', 'u945705568_admin', 'p3d3f4c1l@db');
    }

    /* FUNÇÕES DE LOGIN */
    function encrypt_passwd($string){
        return sha1(md5(sha1($string)));
    }

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

if(isset($_POST) && isset($_POST['opc'])) {
    $opc = $_POST['opc'];
    switch ($opc){
        case '1':
            if (isset($_POST) && isset($_POST['usuario']) && isset($_POST['senha'])) {
                $usuario = preg_replace('/[^[:alnum:]_]/', '', $_POST['usuario']);
                $senha = preg_replace('/[^[:alnum:]_@]/', '', $_POST['senha']);
                $hash = $conn->encrypt_passwd($senha);
                $select = $conn->select($usuario, $hash);
                if (empty($select)) {
                    $mensagem = 0;
                    echo json_encode($mensagem);
                } else {
                    $_SESSION['id'] = $select[0]['id_usuario'];
                    $_SESSION['user'] = $select[0]['usuario'];

                    if ($_SESSION['id'] == 1 || $_SESSION['id'] == 2) {
                        $mensagem = 2;
                    } else {
                        $mensagem = 1;
                    }
                    echo json_encode($mensagem);
                }
            }
            break;
        case '2':
            if (isset($_POST['usuario']) && isset($_POST['senha']) && isset($_POST['email'])) {
                $usuario = preg_replace('/[^[:alnum:]_@.-]/', '', $_POST['usuario']);
                $senha = preg_replace('/[^[:alnum:]_@.-]/', '', $_POST['senha']);
                $email = preg_replace('/[^[:alpha:]_@.-]/', '', $_POST['email']);
                $select = $conn->validarUsuario($usuario);
                if (empty($select)) {
                    $hash = $conn->encrypt_passwd($senha);
                    $cadastro = $conn->cadastrarUsuario($usuario, $hash, $email);
                    echo json_encode(1);
                } else {
                    echo json_encode(0);
                }
            }
            break;
    }

}
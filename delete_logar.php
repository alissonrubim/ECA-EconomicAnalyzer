<?php

require_once "DAO/conexao.php";

session_start();
$login = $_POST['user'];
$passwd = $_POST['pass'];

try {
    $statement = $pdo->prepare("SELECT name_user, login, senha WHERE login = :login and senha = :senha");
    $statement->bindValue(":login", $login);
    $statement->bindValue(":senha", sha1($passwd));
    if ($statement->execute()) {
        $rs = $statement->fetch(PDO::FETCH_OBJ);
        $usuario = $rs->Usuario;
        $nome = $rs->Nome;
        $senha = $rs->Senha;
        if( $usuario!=null and $senha != null)
        {
            $_SESSION['login'] = $nome;
            $_SESSION['senha'] = $senha;
            header('location:index.php');
        }
        else{
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            header('location:index.php');

        }
    } else {
        throw new PDOException("Erro: Não foi possível executar a declaração sql");
    }
} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}

?>

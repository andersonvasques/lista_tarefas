<?php 

session_start();
include('../connection.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {

    header('Location: ../index.php');
    exit();

}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT key_usuario, nome, senha FROM tbl_users WHERE usuario = '$usuario'";

$result = mysqli_query($conexao, $query);

if($result && mysqli_num_rows($result) === 1) {

    $usuario_bd = mysqli_fetch_assoc($result);

    if(password_verify($_POST['senha'], $usuario_bd['senha'])) {

        $_SESSION['nome'] = $usuario_bd['nome'];
        $_SESSION['key_usuario'] = $usuario_bd['key_usuario'];
        header('Location: ../dashboard.php');
        exit();

    } else {

        $_SESSION['unauthenticated'] = true;
        header('Location: ../index.php');
        exit();

    }

} else {

    $_SESSION['unauthenticated'] = true;
    header('Location: ../index.php');
    exit();

}
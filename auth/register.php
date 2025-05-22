<?php 

session_start();
include('../connection.php');

if(empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['senha'])) {

    header('Location: ../page_register.php');
    exit();

}

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(password_hash($_POST['senha'], PASSWORD_DEFAULT)));

$sql = "SELECT COUNT(*) AS total FROM tbl_users WHERE usuario = '$usuario'";

$result = mysqli_query($conexao, $sql);

$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {

    $_SESSION['user_exists'] = true;
    header('Location: ../page_register.php');
    exit;

}

$sql = "INSERT INTO tbl_users (nome, usuario, senha, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())";

if($conexao->query($sql) === TRUE) {

    $_SESSION['register_status'] = true;

}

$conexao->close();

header('Location: ../page_register.php');

exit;

?>
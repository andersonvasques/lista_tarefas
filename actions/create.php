<?php 

session_start();
include('../connection.php');

if(!isset($_SESSION['key_usuario'])) {

    $_SESSION['task_error'] = "Você não está logado. Faça seu login para adicionar uma tarefa.";
    header('Location: ../dashboard.php');
    exit();

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'], $_POST['descricao'], $_POST['fk_usuario'])) {

    $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
    $fk_usuario = intval($_POST['fk_usuario']);

    if(empty($titulo) || empty($descricao)) {
        
        $_SESSION['task_error'] = "Preencha todos os campos.";
        header('Location: ../dashboard.php');
        exit();
        
    }

    $query = "INSERT INTO tbl_list (titulo, descricao, data_criacao, fk_usuario) VALUES ('$titulo', '$descricao', NOW(), $fk_usuario)";

    if(mysqli_query($conexao, $query)) {

        $_SESSION['task_success'] = "Tarefa adicionada com sucesso.";

    } else {

        $_SESSION['task_error'] = "Erro ao adicionar tarefa: " . mysqli_error($conexao);

    }

    header('Location: ../dashboard.php');
    exit();

} else {
 
    $_SESSION['task_error'] = "Erro ao processar o formulário.";
    header('Location: ../dashboard.php');
    exit();

}

?>
<?php 

session_start();
include('../connection.php');

if(!isset($_SESSION['key_usuario'])) {

    $_SESSION['task_error'] = "Você não está logado. Faça seu login para adicionar uma tarefa.";
    header('Location: ../dashboard.php');
    exit();

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['key_tarefa'], $_POST['titulo'], $_POST['descricao'])) {

    $key_tarefa = intval($_POST['key_tarefa']);
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
    $fk_usuario = $_SESSION['key_usuario'];

    if(empty($titulo) || empty($descricao)) {
        
        $_SESSION['task_error'] = "Preencha todos os campos.";
        header('Location: ../dashboard.php');
        exit();

    }

    $query_check = "SELECT * FROM tbl_list WHERE key_tarefa = $key_tarefa AND fk_usuario = $fk_usuario";
    $result_check = mysqli_query($conexao, $query_check);

    if(mysqli_num_rows($result_check) === 0) {

        $_SESSION['task_error'] = "Tarefa não encontrada.";
        header('Location: ../dashboard.php');
        exit();

    }

    $query_update = "UPDATE tbl_list SET titulo = '$titulo', descricao = '$descricao' WHERE key_tarefa = $key_tarefa AND fk_usuario = $fk_usuario";

    if(mysqli_query($conexao, $query_update)) {

        $_SESSION['task_success'] = "Tarefa atualizada com sucesso.";

    } else {

        $_SESSION['task_error'] = "Erro ao atualizar a tarefa: " . mysqli_error($conexao);

    }

    header('Location: ../dashboard.php');
    exit();

} else {

    $_SESSION['task_error'] = "Erro ao processar o formulário.";
    header('Location: ../dashboard.php');
    exit();

}

?>
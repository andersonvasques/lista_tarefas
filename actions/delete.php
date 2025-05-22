<?php 

session_start();
include('../connection.php');

if(!isset($_SESSION['key_usuario'])) {

    $_SESSION['task_error'] = "Você não está logado. Faça seu login para adicionar uma tarefa.";
    header('Location: ../dashboard.php');
    exit();

}

if(isset($_GET['key_tarefa'])) {

    $key_tarefa = intval($_GET['key_tarefa']);
    $fk_usuario = $_SESSION['key_usuario'];

    $query_check = "SELECT * FROM tbl_list WHERE key_tarefa = $key_tarefa AND fk_usuario = $fk_usuario";
    $result_check = mysqli_query($conexao, $query_check);

    if(mysqli_num_rows($result_check) === 0) {

        $_SESSION['task_error'] = "Tarefa não encontrada.";
        header('Location: ../dashboard.php');
        exit();

    }

    $query_delete = "DELETE FROM tbl_list WHERE key_tarefa = $key_tarefa AND fk_usuario = $fk_usuario";

    if(mysqli_query($conexao, $query_delete)) {

        $_SESSION['task_success'] = "Tarefa excluida com sucesso.";

    } else {

        $_SESSION['task_error'] = "Erro ao excluir a tarefa: " . mysqli_error($conexao);

    }

    header('Location: ../dashboard.php');
    exit();

} else {

    $_SESSION['task_error'] = "ID da tarefa não fornecido.";
    header('Location: ../dashboard.php');
    exit();

}

?>
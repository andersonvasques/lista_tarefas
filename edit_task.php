<?php

session_start();

include('./connection.php');

if (isset($_GET['key_tarefa'])) {
    $key_tarefa = intval($_GET['key_tarefa']);
    $fk_usuario = $_SESSION['key_usuario'];

    $query = "SELECT * FROM tbl_list WHERE key_tarefa = $key_tarefa AND fk_usuario = $fk_usuario";
    $result = mysqli_query($conexao, $query);

    if ($row = mysqli_fetch_assoc($result)) {

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/edit-task-style.css" rel="stylesheet">

</head>
    <body class="container mt-5">
        <h2>Editar Tarefa</h2>
        <form action="./actions/update.php" method="POST">
            <input type="hidden" name="key_tarefa" value="<?php echo $row['key_tarefa']; ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label"> Título </label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo htmlspecialchars($row['titulo']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label"> Descrição </label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3" required><?php echo htmlspecialchars($row['descricao']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary"> Salvar Alterações </button>
            <a href="./dashboard.php" class="btn btn-secondary"> Cancelar </a>
            </form>
    </body>
</html>
<?php
    } else {
        $_SESSION['task_error'] = "Tarefa não encontrada.";
        header("Location: dashboard.php");
        exit();
    }
} else {
    $_SESSION['task_error'] = "ID da tarefa não fornecido.";
    header("Location: dashboard.php");
    exit();
}
?>
<?php

session_start();

if (!isset($_SESSION['key_usuario'])) {

    header("Location: index.php");
    exit();

}
$key_usuario = $_SESSION['key_usuario'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Adicionar Nova Tarefa </title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/add-task-style.css" rel="stylesheet">

</head>
<body>

    <div class="container mt-5">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Adicionar Nova Tarefa</div>
            <div class="card-body">
                <form action="./actions/create.php" method="POST">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Digite o título da tarefa" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea name="descricao" id="descricao" rows="3" class="form-control" placeholder="Digite a descrição da tarefa" required></textarea>
                    </div>
                    <input type="hidden" name="fk_usuario" value="<?php echo $key_usuario; ?>">
                    <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
                </form>
            </div>
        </div>
        <a href="./dashboard.php" class="btn btn-secondary">Voltar</a>
    </div>

</body>
</html>
<?php 

include('./auth/verify_login.php');

$key_usuario = $_SESSION['key_usuario'];

function corta_com_ellipsis($texto, $limite = 200) {
    if (mb_strlen($texto) > $limite) {
        return mb_substr($texto, 0, $limite) . '...';
    } else {
        return $texto;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lista de Tarefas </title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">

</head>
<body class="d-flex flex-column min-vh-100">
    <header class="py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1> Bem-vindo(a), <?php echo $_SESSION['nome']; ?> </h1>
            <div class="d-flex flex-column align-items-end">
                <a href="logout.php" class="btn btn-logout mt-2" onclick="return confirm('Tem certeza que deseja sair?')">Sair</a>
                <a href="./add_task.php" class="btn btn-add mt-3" style="font-size: 1.05rem; min-width: 160px;"> Adicionar Tarefa </a>         
            </div>
        </div>
    </header>    

    <main class="flex-grow-1">
        <div class="container mt-4">
            <?php 
                if(isset($_SESSION['task_success'])):   
            ?>
                <div class="alert alert-success">
                    <?php 
                        echo $_SESSION['task_success']; 
                        unset($_SESSION['task_success']); 
                    ?>
                </div>
            <?php 
                endif; 
            ?>
            <?php 
                if(isset($_SESSION['task_error'])): 
            ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['task_error']; 
                    unset($_SESSION['task_error']); 
                ?>
            </div>
            <?php 
                endif; 
            ?>

            <div class="card mb-4">
                <div class="card-header text-white"> Buscar Tarefas </div>
                    <div class="card-body">
                        <input type="text" id="busca-tarefa" class="form-control" placeholder="Digite para buscar por título ou descrição">
                    </div>
            </div>

            <div id="resultados-tarefas" style="display: none;"></div>
            <div id="tabela-tarefas">
                <div class="card">
                    <div class="card-header text-white"> Minhas Tarefas </div>
                    <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Título </th>
                                        <th class="actions-cell" style="width: 700px;"> Descrição </th>
                                        <th> Data de Criação </th>
                                        <th class="actions-cell"> Ações </th>
                                    </tr>
                                </thead>
                                <tbody id="tarefas-tbody">
                                    <?php
                                        include('./connection.php');
                                        $query = "SELECT * FROM tbl_list WHERE fk_usuario = $key_usuario ORDER BY data_criacao";
                                        $result = mysqli_query($conexao, $query);

                                        if (mysqli_num_rows($result) > 0):
                                            while ($row = mysqli_fetch_assoc($result)):
                                    ?>
                                    <tr>
                                        <td><?php echo $row['titulo']; ?></td>
                                        <td class="description-cell">
                                            <div class="description-ellipsis">
                                                <?php echo corta_com_ellipsis($row['descricao'], 200); ?>
                                            </div>
                                        </td>
                                        <td><?php echo date('d/m/Y', strtotime($row['data_criacao'])); ?></td>
                                        <td class="actions-cell" style="min-width: 200px;">
                                            <div>
                                                <a href="./edit_task.php?key_tarefa=<?php echo $row['key_tarefa']; ?>" class="btn btn-sm btn-warning"> Editar </a>
                                                <a href="./actions/delete.php?key_tarefa=<?php echo $row['key_tarefa']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa tarefa?')"> Excluir </a>
                                            </div>
                                    </tr>
                                    <?php
                                        endwhile;
                                    else:
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center"> Nenhuma tarefa encontrada. Adicione sua primeira tarefa. </td>
                                    </tr>
                                    <?php 
                                        endif; 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

        $(function() {
            
            $("#busca-tarefa").on("input", function() {

                var termo = $(this).val().trim();

                if(termo.length > 0) {

                    $.get("./actions/search_tasks.php", {q: termo}, function(data) {
                        $("#resultados-tarefas").html(data).show();
                        $("#tabela-tarefas").hide();

                    });

                } else {

                    $("#resultados-tarefas").hide();
                    $("#tabela-tarefas").show();

                }

            });
        });

    </script>

</body>
</html>
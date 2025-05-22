<?php
session_start();
include('../connection.php');

$fk_usuario = $_SESSION['key_usuario'];
$search = isset($_GET['q']) ? trim($_GET['q']) : '';
$search_esc = mysqli_real_escape_string($conexao, $search);

$sql = "SELECT * FROM tbl_list WHERE fk_usuario = $fk_usuario";
if ($search_esc !== '') {
    $sql .= " AND (titulo LIKE '%$search_esc%' OR descricao LIKE '%$search_esc%')";
}
$sql .= " ORDER BY data_criacao";

$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) > 0): ?>
    <div class="card">
        <div class="card-header text-white"> Minhas Tarefas </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th> Título </th>
                        <th> Descrição </th>
                        <th> Data de Criação </th>
                        <th> Ações </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td> <?php echo htmlspecialchars($row['titulo']); ?> </td>
                            <td> <?php echo htmlspecialchars($row['descricao']); ?> </td>
                            <td> <?php echo date('d/m/Y', strtotime($row['data_criacao'])); ?> </td>
                            <td>
                                <a href="../edit_task.php?key_tarefa=<?php echo $row['key_tarefa']; ?>" class="btn btn-sm btn-warning"> Editar </a>
                                <a href="./delete.php?key_tarefa=<?php echo $row['key_tarefa']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir essa tarefa?')"> Excluir </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else:
    echo "<div class='alert alert-warning'> Nenhuma tarefa encontrada. </div>";
endif;
?>
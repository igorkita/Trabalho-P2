<?php
session_start();
require_once('conexao.php');

$sql = 'SELECT * FROM tarefa';

$resultado = mysqli_query($con, $sql);




?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>To Do List</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Tarefas
                            <a href="addtarefa.php" class="btn btn-primary float-end">Adicionar Tarefa</a>
                        </h4>
                    </div>         
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Status da tarefa</th>
                                <th>ID da tarefa</th>
                                <th>Descrição da tarefa</th>
                                <th>Data limite da tarefa</th>
                                <th>Excluir tarefa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultado as $tarefas):?>
                                <tr>
                                    <td>
                                        <form action="acoes.php" method="POST">
                                            <input type="hidden" name="id" value="<?=$tarefas['id'];?>">
                                            <select name="status" class="form-select" onchange="this.form.submit()">
                                                <option value="em_andamento"<?php if($tarefas['status'] === 'em_andamento') echo "selected"?>>Em Andamento 🕐</option>
                                                <option value="pendente"<?php if($tarefas['status'] === 'pendente') echo "selected"?>>Pendente ⏳</option>
                                                <option value="concluida"<?php if($tarefas['status'] === 'concluida') echo "selected"?>>Concluída ✅</option>
                                            </select>
                                            <input type="hidden" name="alterar_status">
                                        </form>
                                    </td>
                                    <td><?php echo $tarefas['id']; ?></td>
                                    <td><?php echo $tarefas['descricao']; ?></td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($tarefas['date'])); ?></td>
                                    </td>
                                    <td><a href="acoes.php?deletar=<?php echo $tarefas['id']; ?> " class="btn btn-danger float-center">Excluir Tarefa 🗑️</a>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
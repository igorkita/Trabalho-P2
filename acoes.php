<?php
session_start();
require_once('conexao.php');

if (isset($_POST['create_tarefa'])){
    $descricao = trim($_POST['txtDesc']);
    $data = trim($_POST["txtDataLimite"]);
    $sql = "INSERT INTO tarefa (descricao, date) VALUES ('$descricao', '$data')";

    mysqli_query($con, $sql);

    header('Location: index.php');

}

if (isset($_GET['deletar'])){
    $id = $_GET['deletar'];
    $sql = "DELETE FROM tarefa WHERE id = $id";
    mysqli_query($con, $sql);
    header('Location: index.php');
}
if (isset($_POST['alterar_status'])){
    $id = $_POST['id'];
    $status = $_POST['status'];
    $sql = "UPDATE tarefa SET status = '$status' WHERE id = '$id' ";
    mysqli_query($con, $sql);
    header('Location: index.php');


}
?>
<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $banco = "to_do_list";
    $con = mysqli_connect($host, $user, $pass, $banco);

    if(!$con){
        die("Erro ao conectar com o banco de dados: " . mysqli_connect_error());
    }
?>
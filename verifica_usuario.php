<?php
session_start();
include_once("conexao.php");

// = $_POST['CPF'];

$result_status = "SELECT funcao FROM usuario WHERE cpf = '$_SESSION[CPF]';";
$result_status = mysqli_query($conn, $result_status);
$row = mysqli_fetch_row($result_status);


if($row[0] == 'setor de estagio'){
    header("Location: administrador.php");
    
}else{
    header("Location: painel.php");
   
}

//echo $row[0];
?>
<?php
header ('Content-type: text/html; charset=UTF-8');
session_start();
include_once("conexao.php");

$result_status = "UPDATE usuario SET visibilidade = '0' WHERE (cpf = '$_SESSION[CPF]');";
$result_status = mysqli_query($conn, $result_status);

if($result_status){
    header("Location: login.html");
    
}else{
    die("Erro: ". mysqli_error($conn));
        
}

?>
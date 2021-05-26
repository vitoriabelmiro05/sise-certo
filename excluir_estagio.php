<?php
header ('Content-type: text/html; charset=UTF-8');
session_start();

include('conexao.php');

$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);
$id=$_GET['idestagio'];


$query5 = mysqli_query($conn, "DELETE from estagio where idestagio = '$idestagio'");

if($query5){
    header("Location: administrador.php");
} else{
   die("Erro: ". mysqli_error($query5));
}




?>
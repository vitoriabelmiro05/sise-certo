<?php
session_start();

include('conexao.php');

$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);

$query5= "DELETE FROM estagio WHERE idestagio = '$idestagio'; ";
$con5= mysqli_query($conn, $query5);

if($query5){
    header("Location: administrador.php");
} else{
   die("Erro: ". mysqli_error($query5));
}




?>
<?php
session_start();

include('conexao.php');

$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);



$query5 = mysqli_query($conn, "DELETE from estagio where idestagio = '$idestagio'");

if($query5){
    header("Location: administrador.php");
} else{
   die("Erro: ". mysqli_error($query5));
}




?>
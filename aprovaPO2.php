<?php
session_start();

include('conexao.php');


$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);
$nome_orientador = filter_input(INPUT_POST, 'NOMEO', FILTER_SANITIZE_EMAIL);

$sql= mysqli_query($conn, "SELECT cpf from usuario where nome = '$nome_orientador';");
$cpf_prof= mysqli_fetch_row($sql);

    $query = mysqli_query($conn, "update estagio set nome_orientador = '$nome_orientador', aprovacao= '1', cpf_usuario = '$cpf_prof' where idestagio = '$idestagio';" );

     if($query){
         header("Location: verifica_usuario.php");
     } else{
        die("Erro: ". mysqli_error($query));
     }






?>
<?php
session_start();

include('conexao.php');


$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);
$nome_orientador = filter_input(INPUT_POST, 'NOMEO', FILTER_SANITIZE_STRING);



    $query = mysqli_query($conn, "update estagio set nome_orientador = '$nome_orientador', cpf_usuario = (select cpf from usuario where nome = '$nome_orientador') where idestagio = '$idestagio';");

     if($query){
        echo "<script> alert('Indicação enviada com  sucesso!');";
        echo "javascript:window.location='verifica_usuario.php';</script>";
   
     } else{
        die("Erro: ". mysqli_error($query));
     }






?>
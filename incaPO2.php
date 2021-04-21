<?php
session_start();

include('conexao.php');


$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);
$nome_orientador = filter_input(INPUT_POST, 'NOMEO', FILTER_SANITIZE_EMAIL);



    $query = mysqli_query($conn, "update estagio set nome_orientador = '$nome_orientador' where idestagio = '$idestagio';" );
    // $query2= mysqli_query($conn, "update estagio inner join usuario on usuario.nome = '$nome_orientador' set cpf_usuario = cpf where idestagio = '$idestagio';");

     if($query){
        echo "<script> alert('Indicação enviada com  sucesso!');";
        echo "javascript:window.location='verifica_usuario.php';</script>";
        
     } else{
        die("Erro: ". mysqli_error($query));
     }






?>
<?php
session_start();

include('conexao.php');


//$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);
$id= $_GET["idestagio"];



    $query = mysqli_query($conn, "update estagio set aprovacao= '1' where idestagio = '$id=';");

     if($query){
        echo "<script> alert('Aprovação enviada com  sucesso!');";
        echo "javascript:window.location='verifica_usuario.php';</script>";
   
     } else{
        die("Erro: ". mysqli_error($query));
     }






?>
<?php
session_start();

include('conexao.php');

$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$funcao = filter_input(INPUT_POST, 'funcao', FILTER_SANITIZE_STRING);
$query = mysqli_query($conn, "update usuario set email = '$email', senha = '$senha', rg= '$rg', nome = '$nome', telefone= '$telefone', funcao= '$funcao' where cpf = '$cpf';" );
     if($query){
         header("Location: administrador.php");
     } else{
        die("Erro: ". mysqli_error($query));
     }



?>
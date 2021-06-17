<?php
header('Content-type: text/html; charset=UTF-8');
include('conexao.php');
session_start();

$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
$professor_orientador = filter_input(INPUT_POST, 'professor_orientador', FILTER_SANITIZE_STRING);
date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date('Y-m-d');
$busca = mysqli_query($conn, "SELECT * FROM declaracao WHERE nome_prof='$professor_orientador' and ano = '$ano';");// verificando se a declaração já foi gerada


if ($busca->num_rows == 0){ // gerando a declaração
$query = mysqli_query($conn, "INSERT INTO declaracao ( nome_prof,ano, data_atual) VALUES ('$professor_orientador','$ano','$dataAtual')");

if(mysqli_insert_id($conn)){
    header("Location: mpdf/index.php");
    $_SESSION['professor']= $professor_orientador;
    $_SESSION['ano']= $ano;
    
    
}
else {   header("Location: verifica_usuario.php");
    
} 
}else // exibindo a declaração caso ela já tenha sido gerada anteriormente.
{
    header("Location: mpdf/index.php");
    $_SESSION['professor']= $professor_orientador;
    $_SESSION['ano']= $ano;
}


   




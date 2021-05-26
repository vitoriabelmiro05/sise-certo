<?php
header ('Content-type: text/html; charset=UTF-8');
session_start();

include('conexao.php');



$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$funcao = filter_input(INPUT_POST, 'funcao', FILTER_SANITIZE_STRING);

$cpf = preg_replace("/[^0-9]/", "",  $cpf); //remover valores que n seja numerico
	$cpf = str_pad( $cpf, 11, '0', STR_PAD_LEFT);
	$rg = preg_replace("/[^0-9]/", "",  $rg);
	$rg = str_pad( $rg, 8, '0', STR_PAD_LEFT);
	$telefone = preg_replace("/[^0-9]/", "",  $telefone);
	$telefone = str_pad( $telefone, 11, '0', STR_PAD_LEFT); 

$query = mysqli_query($conn, "update usuario set email = '$email', rg= '$rg', nome = '$nome', telefone= '$telefone', funcao= '$funcao' where cpf = '$cpf';" );
     if($query){
         header("Location: administrador_incio.php");
     } else{
        die("Erro: ". mysqli_error($query));
     }


?>
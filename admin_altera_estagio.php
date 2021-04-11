<?php
session_start();

include('conexao.php');

$id= $_GET["idestagio"];
$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);
$nome_aluno = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_STRING);
$matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_STRING);
$nome_orientador = filter_input(INPUT_POST, 'nome_orientador', FILTER_SANITIZE_EMAIL);
$nome_empresa = filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING);
$inicio_estagio = filter_input(INPUT_POST, 'inicio_estagio', FILTER_SANITIZE_STRING);
$fim_estagio = filter_input(INPUT_POST, 'fim_estagio', FILTER_SANITIZE_STRING);
$carga_horaria = filter_input(INPUT_POST, 'carga_horaria', FILTER_SANITIZE_STRING);

$query = mysqli_query($conn, "update estagio set nome_aluno= '$nome_aluno', matricula = '$matricula', nome_orientador = '$nome_orientador', nome_empresa= '$nome_empresa', inicio_estagio = '$inicio_estagio', fim_estagio= '$fim_estagio', carga_horaria= '$carga_horaria' where idestagio = '$idestagio'" );

     if($query){
         header("Location: administrador.php");
     } else{
        die("Erro: ". mysqli_error($query));
     }



?>

<?php
session_start();
include_once("conexao.php");


$NOME = filter_input(INPUT_POST, 'NOME', FILTER_SANITIZE_STRING);
$NOMEP = filter_input(INPUT_POST, 'NOMEMP', FILTER_SANITIZE_EMAIL);
$DATAI = filter_input(INPUT_POST, 'DATAI', FILTER_SANITIZE_STRING);
$DATAF = filter_input(INPUT_POST, 'DATAF', FILTER_SANITIZE_STRING);
$NOMEO = filter_input(INPUT_POST, 'NOMEO', FILTER_SANITIZE_STRING);
$MATRICULA = filter_input(INPUT_POST, 'MATRICULA', FILTER_SANITIZE_STRING);
$CARGA = filter_input(INPUT_POST, 'CARGA', FILTER_SANITIZE_STRING);



             

$result_usuario = "INSERT INTO estagio (nome_aluno,nome_empresa,inicio_estagio,fim_estagio,matricula,nome_orientador,carga_horaria, aprovacao) VALUES ('$NOME','$NOMEP','$DATAI','$DATAF','$MATRICULA','Pendente','$CARGA', '0')";
$result_usuario = mysqli_query($conn, $result_usuario);




if(mysqli_insert_id($conn)){
	echo "<script> alert('estagio cadastrado com sucesso!');";
	echo "javascript:window.location='verifica_usuario.php';</script>";
	
}else{
	echo "<script> alert('estagio não foi cadastrado!');";
	echo "javascript:window.location='verifica_usuario.php';</script>";

	
}



?>
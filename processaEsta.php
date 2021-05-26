<?php
header ('Content-type: text/html; charset=UTF-8');
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




if(mysqli_insert_id($conn)){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	
<?php
	echo "<script type='text/javascript'> swal('Estágio cadastrado com sucesso!', '','success').then((value) => {
		javascript:window.location='verifica_usuario.php';
	  });;</script>";
	
	
}else{
	echo "<script type='text/javascript'> swal('Estágio não foi cadastrado!', '','error').then((value) => {
		javascript:window.location='verifica_usuario.php';
	  });;</script>";
	

	
}



?>
</body>
</html>
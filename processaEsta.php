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
$CURSO = filter_input(INPUT_POST, 'CURSO', FILTER_SANITIZE_STRING); 
$DEPARTAMENTO = filter_input(INPUT_POST, 'DEPARTAMENTO', FILTER_SANITIZE_STRING);
date_default_timezone_set('America/Sao_Paulo');
$dataSE= date('Y-m-d');





             

$result_usuario = "INSERT INTO estagio (nome_aluno,nome_empresa,inicio_estagio,fim_estagio,matricula,nome_orientador,carga_horaria, aprovacao, dataSE, curso, departamento, dataC, dataCD) VALUES ('$NOME','$NOMEP','$DATAI','$DATAF','$MATRICULA','Pendente','$CARGA', '0', '$dataSE', '$CURSO', '$DEPARTAMENTO','', '')";
$result_usuario = mysqli_query($conn, $result_usuario);




if(mysqli_insert_id($conn)){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>
<div class="container-login100" style="background-image: url('imagens/LOGO2.jpg')">
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
</div>
</body>
</html>
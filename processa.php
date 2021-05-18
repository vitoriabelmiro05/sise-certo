<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
	<body>
<?php
session_start();
include_once("conexao.php");

$CPF = filter_input(INPUT_POST, 'CPF', FILTER_SANITIZE_STRING);
$NOME = filter_input(INPUT_POST, 'NOME', FILTER_SANITIZE_STRING);
$EMAIL = filter_input(INPUT_POST, 'EMAIL', FILTER_SANITIZE_EMAIL);
$SENHA = filter_input(INPUT_POST, 'SENHA', FILTER_SANITIZE_STRING);
$RG = filter_input(INPUT_POST, 'RG', FILTER_SANITIZE_STRING);
$TELEFONE = filter_input(INPUT_POST, 'TELEFONE', FILTER_SANITIZE_STRING);
$FUNCAO = filter_input(INPUT_POST, 'FUNCAO', FILTER_SANITIZE_STRING);
$DEPARTAMENTO = filter_input(INPUT_POST, 'DEPARTAMENTO', FILTER_SANITIZE_STRING);

	$CPF = preg_replace("/[^0-9]/", "",  $CPF); //remover valores que n seja numerico
	$CPF = str_pad( $CPF, 11, '0', STR_PAD_LEFT);
	$RG = preg_replace("/[^0-9]/", "",  $RG);
	$RG = str_pad( $RG, 8, '0', STR_PAD_LEFT);
	$TELEFONE = preg_replace("/[^0-9]/", "",  $TELEFONE);
	$TELEFONE = str_pad( $TELEFONE, 11, '0', STR_PAD_LEFT);

	$consulta= "SELECT * from usuario where cpf = '$CPF';";
		$verfica = mysqli_query($conn, $consulta);
		$linha= mysqli_num_rows($verfica);

		if($linha == 1){
			echo "<script type='text/javascript'> swal('CPF JÁ EXISTE!', '','error').then((value) => {
				javascript:window.location='cadastro.php';
			  });;</script>";
			
		}

		 else{

			function isCPF($CPF){
				
				$digitoUm= 0;
				$digitoDois= 0;
				for($i=0, $x=10; $i<=8; $i++, $x--){
					$digitoUm += $CPF[$i] * $x;
				}
					for($i =0, $x= 11; $i <= 9; $i++, $x--) {
						if(str_repeat($i, 11)== $CPF){
							return false;
						}
						$digitoDois += $CPF[$i] * $x;

					}
					$calculoUm = (($digitoUm%11)<2)? 0 : 11 - ($digitoUm%11);
					$calculoDois = (($digitoDois%11)<2)? 0 : 11 - ($digitoDois%11);

					if($calculoUm <> $CPF[9] || $calculoDois <> $CPF[10]){
						return false;
					} 
					return true;
				}
				

			if(isCPF($CPF)){
		$result_usuario = "INSERT INTO usuario (cpf,nome,email,senha,rg,telefone,funcao,visibilidade, departamento) VALUES ('$CPF','$NOME','$EMAIL','$SENHA','$RG','$TELEFONE','$FUNCAO', '1', '$DEPARTAMENTO')";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		

		

					if(mysqli_insert_id($conn)){
						echo "<script type='text/javascript'> swal('Usuário não foi cadastrado!', 'erro de conexao.','error').then((value) => {
							javascript:window.location='cadastro.php';
						  });;</script>";

						
					}
					else{
						echo "<script type='text/javascript'> swal('Usuário cadastrado com  sucesso!', '','success').then((value) => {
							javascript:window.location='login.html';
						  });;</script>";
						
						
					}
									} 
					
				else{
					echo "<script type='text/javascript'> swal('Usuário não foi cadastrado!', 'CPF inválido','error').then((value) => {
						javascript:window.location='cadastro.php';
					  });;</script>";

				

			
						
					} 
				}

		?>
		</body>
		</html>
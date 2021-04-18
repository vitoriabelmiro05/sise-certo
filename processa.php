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


$RG = preg_replace("/[^0-9]/", "",  $RG);
	$RG = str_pad( $RG, 8, '0', STR_PAD_LEFT);
	$TELEFONE = preg_replace("/[^0-9]/", "",  $TELEFONE);
	$TELEFONE = str_pad( $TELEFONE, 11, '0', STR_PAD_LEFT);

			function isCPF($CPF){
				$CPF = preg_replace("/[^0-9]/", "",  $CPF); //remover valores que n seja numerico
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
$result_usuario = "INSERT INTO usuario (cpf,nome,email,senha,rg,telefone,funcao,visibilidade) VALUES ('$CPF','$NOME','$EMAIL','$SENHA','$RG','$TELEFONE','$FUNCAO', '1')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Usuário não foi cadastrado, erro de conexao. </div>";
	
	header("Location: cadastro.php");
}else{
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
	<h4 class='alert-heading'>Usuário cadastrado com  sucesso!</h4>
  </div>";

    //echo "javascript:window.location='index.php';</script>";
	header("Location: Login.html");
}
				} else{
					header("Location: cadastro.php");?>

					<script> alert("cpf invalido")
						</script>
						
					
					<?php
					
				}

?>
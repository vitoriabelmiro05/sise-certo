<?php
header('Content-type: text/html; charset=UTF-8');
session_start();
include_once("conexao.php");

$result_status = "SELECT visibilidade FROM usuario WHERE cpf = '$_SESSION[CPF]';";
$result_status = mysqli_query($conn, $result_status);
$row = mysqli_fetch_row($result_status);

if ($row[0] == '1') {
	header("Location: verifica_usuario.php");
} else if ($row[0] == '0') { ?>

	<!DOCTYPE html>
	<html lang="en">

	<head>

		<meta charset="UTF-8">
		<title>SISE- Sistema de estágio</title>
		<link rel="icon" type="image/x-icon" href="assets/img/favicon2.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/styless.css">
		<!--===============================================================================================-->

	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
			<div class="container">

				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					Menu
					<i class="fas fa-bars ml-1"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav text-uppercase  ">



						<li class="nav-item"><a class="nav-link js-scroll-trigger bg-primary" href="login.html" style="border-radius: 10px;">Voltar</a></li>


					</ul>
				</div>
			</div>
		</nav>


		<div class="limiter">
			<div class="container-login100" style="background-image: url('imagens/LOGO2.jpg');">
				<div class="wrap-login100 p-t-30 p-b-50">
					<span class="login100-form-title p-b-41">
						Deseja reativar sua conta?
					</span>



					<a class="login100-form-btn" href="ativa_status.php">SIM</a>









				</div>
			</div>
		</div>



	<?php }
	?>
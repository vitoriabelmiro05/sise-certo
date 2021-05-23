<?php

session_start();

include('conexao.php');

$id= $_GET["idestagio"];
$query4= "SELECT * FROM estagio WHERE idestagio = '$id'; ";
$con4= mysqli_query($conn, $query4);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SISE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>
  <script src="js/jquery-3.4.1.min.js" type="text/javascript" ></script>
        <script src="js/jquery.mask.min.js" type="text/javascript" ></script>
        <script src="js/bootstrap.min.js" type="text/javascript" ></script>
        <script src="js/bootstrap-notify.min.js" type="text/javascript" ></script>
 
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
                        
                        
                        
                        <li class="nav-item"><a class="nav-link js-scroll-trigger bg-primary" href="administrador_estagioscadastrados.php"style="border-radius: 10px;">Voltar</a></li>
                        
                        
                    </ul>
                </div>
            </div>
        </nav>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('imagens/LOGO2.jpg');">
			<div style="width: 900px;">
				<span class="login100-form-title p-b-41">
                Alterar dados de estágio
				</span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="POST" enctype="multipart/form-data" action="admin_altera_estagio.php">
    
            <?php while($dado = $con4 -> fetch_array() ){?>
                <input type="hidden" name= "idestagio" value="<?php echo $dado["idestagio"];?>"/> <br/>
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                          NOME: <input class="input100" type="text" name= "nome_aluno" value="<?php echo $dado["nome_aluno"];?>"/> </div><br/>
                          <div class="wrap-input100 validate-input" data-validate="Enter username">
                          MATRICULA:  <input class="input100" type="text" name= "matricula" value="<?php echo $dado["matricula"];?>"/></div> <br/>
                          <div class="wrap-input100 validate-input" data-validate="Enter username">
                           EMPRESA: <input class="input100"type="text" name= "nome_empresa" value="<?php echo $dado["nome_empresa"];?>"/> </div><br/>
                           <div class="wrap-input100 validate-input" data-validate="Enter username">
                           INICIO DO ESTÁGIO: <input class="input100" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Data" name="inicio_estagio" id="DATAF" value="<?php echo $dado["inicio_estagio"];?>"/></div> <br/>
                           <div class="wrap-input100 validate-input" data-validate="Enter username">
                           FIM DO ESTÁGIO: <input class="input100" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Data" name="fim_estagio" id="DATAF" value="<?php echo $dado["fim_estagio"];?>"/></div> <br/>
                           <div class="wrap-input100 validate-input" data-validate="Enter username">
                           CARGA HORÁRIA (SEMANAL):<input class="input100" type="time" class="form-control" id="exampleInputPassword1"  name="carga_horaria" id="CARGA" min="00:00" max="23:59" required value="<?php echo $dado["carga_horaria"];?>"/> </div><br/>
                           <div class="container-login100-form-btn m-t-32">
                        <input class="login100-form-btn" type="submit" value="ENVIAR" placeholder="ENVIAR">
                    </div>
                <?php  } ?>

            </form>
        </p>
    </div>
</body>


</html>

                         
            
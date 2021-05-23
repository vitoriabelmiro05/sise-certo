<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
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
  <script>
        function myFunction(){
            confirm("Confirmar o envio!");
        }
         $(document).ready(function(){
                
             $('#CPF').mask('000.000.000-00');
             $('#RG').mask('00.000.000');
             $('#TELEFONE').mask('(00) 00000-0000');
            
            
            }
           )
       

      </script>
</head>
<body>
       <?php
 if(isset($_SESSION["msg"])):
   print $_SESSION["msg"];
   unset($_SESSION["msg"]);
endif; 
?>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase  ">
                        
                        
                        
                        <li class="nav-item"><a class="nav-link js-scroll-trigger bg-primary" href="login.html"style="border-radius: 10px;">Voltar</a></li>
                        
                        
                    </ul>
                </div>
            </div>
        </nav>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('imagens/LOGO2.jpg');">
			<div style="width: 900px;">
				<span class="login100-form-title p-b-41">
					Digite suas informações
				</span>
                 <form class="login100-form validate-form p-b-33 p-t-5" method="POST" enctype="multipart/form-data" action="processa.php">
    <div class="wrap-input100 validate-input" data-validate = "Enter username">
    <input class="input100" type="text" id="NOME" name="NOME" placeholder="Nome Completo">
     </div>
                     <div class="wrap-input100 validate-input" data-validate = "Enter username">
   <input class="input100"type="email" id="EMAIL" name="EMAIL" placeholder="E-mail">
                     </div>
                         <div class="wrap-input100 validate-input" data-validate = "Enter username">
    <input class="input100"type="text" id="RG" name="RG" placeholder="RG" minlength="8" maxlength="8">
                     </div>
                     <div class="wrap-input100 validate-input" data-validate = "Enter username">
 <input class="input100"type="text" id="CPF" name="CPF" placeholder="CPF" minlength="11"  maxlength="11">
                     </div>
                         <div class="wrap-input100 validate-input" data-validate = "Enter username">
<input class="input100"type="text" id="TELEFONE" name="TELEFONE" placeholder="Telefone" minlength="11" maxlength="11">
                         </div>
 <div class="wrap-input100 validate-input" data-validate="Enter password">
    <input class="input100"type="password" id="SENHA" name="SENHA" placeholder="Senha"  minlength="5" maxlength="10" required>
                     </div>
                     <div style="" class="wrap-input100 validate-input" data-validate = "Enter username">
<span class="input100"> Função: </span><select style="border-radius: 13px;width: 600px;" class="input100" id="FUNCAO" name="FUNCAO">
      <option value="Professor(a)">Professor Orientador</option>
      <option value="Chefe de Departamento">Chefe do Departamento</option>
      <option value="Coordenador">Coordenador</option>
      <option value="Setor de Estagio">responsavel pelo setor de Estágio</option>
    </select>
                    </div>
                     <div class="wrap-input100 validate-input" data-validate = "Enter username">
  <span class="input100"> Departamento:  </span><select style="border-radius: 13px;width: 600px;" class="input100"id="DEPARTAMENTO" name="DEPARTAMENTO">
      <option value="eletrica">Elétrica</option>
      <option value="formacao geral">Formação Geral</option>
      <option value="computacao e mecanica">Computação e Mecânica</option>
    </select>
                     </div>
                     <div class="wrap-input100 validate-input" data-validate="Enter password">
                     <span class="input100">  Selecione uma Foto: </span>
    <input class="input100"type="file" id="arquivo" name="arquivo">
                     </div>
  <div class="container-login100-form-btn m-t-32">
    <input class="login100-form-btn"type="submit" value="ENVIAR" placeholder="ENVIAR">
                     </div>
  </form>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
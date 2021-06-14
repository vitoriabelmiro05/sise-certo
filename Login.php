<?php
session_start();
include('conexao.php'); 
if(empty($_POST['CPF'] || empty($_POST['SENHA']))){
    //  <script>echo 'alert'</script>     //Colocar um alert
     header('Location: login.html');
     exit();
 }
 
 $CPF = mysqli_real_escape_string($conn, $_POST['CPF']);
 $SENHA = mysqli_real_escape_string($conn, $_POST['SENHA']);


 if(isset( $CPF)){
	$CPF = preg_replace("/[^0-9]/", "",  $CPF);}

$sql= "SELECT * FROM usuario WHERE cpf = '{$CPF}' and senha= '{$SENHA}';";
 $result= mysqli_query($conn, $sql);
 


 $row= mysqli_num_rows($result);

 if($row==1){    
     header('Location: verfica_status.php');
     $_SESSION['CPF']= $CPF;
     exit();

 } else {?>
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
    echo "<script type='text/javascript'> swal('Usuário não encontrado', 'Verifique seu Login.','error').then((value) => {
     javascript:window.location='login.html';
   });;</script>";
     
 } 
?>
</div>
 </body>
</html>
<?php
header ('Content-type: text/html; charset=UTF-8');
session_start();

include('conexao.php');


//$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);
$id= $_GET["idestagio"];
date_default_timezone_set('America/Sao_Paulo');
$dataCD= date('Y-m-d');



    $query = mysqli_query($conn, "update estagio set aprovacao= '1', dataCD= '$dataCD' where idestagio = '$id=';");

     if($query){?>
     <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
     <?php echo "<script type='text/javascript'> swal('Aprovação enviada com  sucesso!', '','success').then((value) => {
         javascript:window.location='verifica_usuario.php';
       });;</script>";
        
   
     } else{
        die("Erro: ". mysqli_error($query));
     }

?>
</body>
</html>
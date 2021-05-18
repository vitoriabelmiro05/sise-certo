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
session_start();

include('conexao.php');


$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);
$nome_orientador = filter_input(INPUT_POST, 'NOMEO', FILTER_SANITIZE_STRING);



    $query = mysqli_query($conn, "update estagio set nome_orientador = '$nome_orientador', cpf_usuario = (select cpf from usuario where nome = '$nome_orientador') where idestagio = '$idestagio';");

     if($query){
      echo "<script type='text/javascript'> swal('Indicação enviada com  sucesso!', '','success').then((value) => {
         javascript:window.location='verifica_usuario.php';
       });;</script>";
   
     } else{
        die("Erro: ". mysqli_error($query));
     }






?>
</body>
</html>
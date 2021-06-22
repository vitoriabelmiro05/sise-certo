<?php
header('Content-type: text/html; charset=UTF-8');
session_start();

include('conexao.php');


$idestagio = filter_input(INPUT_POST, 'idestagio', FILTER_SANITIZE_STRING);
$nome_orientador = filter_input(INPUT_POST, 'NOMEO', FILTER_SANITIZE_STRING);




$query = mysqli_query($conn, "update estagio set nome_orientador = '$nome_orientador', cpf_usuario = (select cpf from usuario where nome = '$nome_orientador') where idestagio = '$idestagio';");

if ($query) { ?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
      <meta charset="UTF-8">
      <title>SISE- Sistema de estágio</title>
      <link rel="icon" type="image/x-icon" href="assets/img/favicon2.png" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/main.css" />
   </head>

   <body>
      <div class="container-login100" style="background-image: url('imagens/LOGO2.jpg')">
      <?php
      echo "<script type='text/javascript'> swal('Indicação enviada com  sucesso!', '','success').then((value) => {
         javascript:window.location='verifica_usuario.php';
       });;</script>";
   } else {
      die("Erro: " . mysqli_error($query));
   }

      ?>
      </div>
   </body>

   </html>
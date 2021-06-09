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
include('conexao.php');
$emails= $_POST['email'];
$consulta= mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$emails'");
$total = mysqli_num_rows($consulta);
$email= $conn->escape_string($_POST['email']);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<script type='text/javascript'> swal('E-mail inválido.', ' ','error').then((value) => {
            javascript:window.location='redefinir.html';
          });;</script>";
    exit();
    }
    if ($total == 0){
        echo "<script type='text/javascript'> swal('O E-mail informado não existe no sistema.', ' ','error').then((value) => {
            javascript:window.location='redefinir.html';
          });;</script>";
    exit();
    }
    else if( $total > 0){
    
    $novasenha= rand( 100000 , 1000000000 );//cria numero aleatorio de 6 a 10 digitos
  
   
     
    if(mail($email, "REDEFINIÇÃO DE SENHA", "Sua nova senha é: ".$novasenha)){
    $sql= "UPDATE usuario set senha= '$novasenha' WHERE email = '$email'";
    $query=  mysqli_query($conn, $sql);
    echo "<script type='text/javascript'> swal('Senha redefinida com sucesso!', 'a nova senha chegará em seu email.','success').then((value) => {
        javascript:window.location='login.html';
      });;</script>";
      exit();

}
}

     ?>
</body>
</html>

   
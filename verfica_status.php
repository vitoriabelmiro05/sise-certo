<!DOCTYPE html>
<html lang="pt-br">
<head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          
           <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
session_start();
include_once("conexao.php");

// = $_POST['CPF'];

$result_status = "SELECT visibilidade FROM usuario WHERE cpf = '$_SESSION[CPF]';";
$result_status = mysqli_query($conn, $result_status);
$row = mysqli_fetch_row($result_status);

//echo $row[0];
?>
<div class="container" >
    <div class="content" >
        <?php
if($row[0] == '1'){
    header("Location: painel.php");
    
}else if($row[0] == '0'){
    
    echo "Deseja reativar sua conta?";
}
?>
<a class="btn btn-primary" href="ativa_status.php" role="button">SIM</a>
<a class="btn btn-primary" href="Login.php" role="button">NÃO</a>
   </div>
</div>


</html>
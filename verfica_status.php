<!DOCTYPE html>
<html lang="pt-br">
<head>
           <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <meta charset="utf-8">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
          
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
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;
        background-color: #f18322;
        font-size: 2rem;
    }
    .caixa {
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.7);
        padding: 100px;
        border-radius: 8px;
        box-shadow: 5px 5px 5px gray;
    }
    a {
        margin: 5px;
    }
    
</style>
<div class="caixa">
        <?php
if($row[0] == '1'){
    header("Location: verifica_usuario.php");
    
}else if($row[0] == '0'){
    
    echo "Deseja reativar sua conta?";
}
?>
<a href="ativa_status.php"><button type="button" class="btn btn-outline-success">SIM</button></a>
<a href="Login.php"><button type="button" class="btn btn-outline-danger">NÃO</button></a>

</div>


</html>
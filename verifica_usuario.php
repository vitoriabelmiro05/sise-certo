<?php
header ('Content-type: text/html; charset=UTF-8');
session_start();
include_once("conexao.php");

// = $_POST['CPF'];

$result_status = "SELECT funcao FROM usuario WHERE cpf = '$_SESSION[CPF]';";
$result_status = mysqli_query($conn, $result_status);
$row = mysqli_fetch_row($result_status);


if($row[0] == 'Setor de Estagio'){
    header("Location: administrador_incio.php");
    
}else if($row[0] == 'Professor(a)'){
    header("Location: professor.php");
   
}else if($row[0] == 'Chefe de Departamento'){
    header("Location: chefe_inicio.php");
   
}else if($row[0] == 'Coordenador') {
    header("Location: coordenador_inicio.php");
}
else {
    echo "erro";
}

//echo $row[0];
?>
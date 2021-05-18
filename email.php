<?php 
include('conexao.php');
$emails= $_POST['email'];
$consulta= mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$emails'");
$total = mysqli_num_rows($consulta);
$email= $conn->escape_string($_POST['email']);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<script> alert('E-mail inválido.');";
    echo "javascript:window.location='redefinir.html';</script>";
    exit();
    }
    if ($total == 0){
        echo "<script> alert('O E-mail informado não existe no sistema.');";
    echo "javascript:window.location='redefinir.html';</script>";
    exit();
    }
    else if( $total > 0){
    
    $novasenha= substr(md5(time()), 0, 6);
    echo substr(md5(time()), 0, 6);
     
    if(mail($email, "REDEFINIÇÃO DE SENHA", "Suan nova senha é: ".$novasenha)){
    $sql= "UPDATE usuario set senha= ' $novasenha' WHERE email = '$email'";
    $query=  mysqli_query($conn, $sql);

}
}


     ?>
<?php 
include('conexao.php');
// $email = $_POST['email'];
// $message = $_POST['message'];
// $emailenviar = "vitorianapo9@gmail.com";
$destino = 'vitorianapo9@gmail.com';
$assunto = "Indicação de orientador";
     	$headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         $headers .= 'From: igorlamoia@hotmail.com';
         $enviaremail = mail($destino, $assunto, 'Direito');
    // mail('vitorianapo9@gmail.com', 'Sise', '$_POST[message]', $headers);
    if($enviaremail){
        $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
        echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
        } else {
        $mgm = "ERRO AO ENVIAR E-MAIL!";
        echo "";
        }
     ?>
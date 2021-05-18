<?php
//session_start();
if(!$_SESSION['CPF']){
    header('Location: login.html');
    exit;
}
?>
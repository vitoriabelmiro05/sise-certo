<?php
session_start();
session_destroy();//finalizando a sessao
header('Location: login.html');
exit(); 

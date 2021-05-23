<?php
session_start();
//passando os dados
 $id= filter_input(INPUT_GET, "id");
 $cpf= filter_input(INPUT_GET, "cpf");
 $nome= filter_input(INPUT_GET, "nome");
 $email= filter_input(INPUT_GET, "email");
 $senha= filter_input(INPUT_GET, "senha");
 $rg= filter_input(INPUT_GET, "rg");
 $telefone= filter_input(INPUT_GET, "telefone");

 $cpf = preg_replace("/[^0-9]/", "",  $cpf); //remover valores que n seja numerico
 $cpf = str_pad( $cpf, 11, '0', STR_PAD_LEFT);
 $rg = preg_replace("/[^0-9]/", "",  $rg);
 $rg = str_pad( $rg, 8, '0', STR_PAD_LEFT);
 $telefone = preg_replace("/[^0-9]/", "",  $telefone);
 $telefone = str_pad( $telefone, 11, '0', STR_PAD_LEFT);

//abrindo a conexao
 $link= mysqli_connect("108.179.253.195", "proje500_sise","#.Ju[H]Icwm+", "proje500_sise");

//testando a conexao
 if($link){
     //alterando os dados
     $query = mysqli_query($link, "UPDATE usuario set  email = '$email', senha = '$senha', rg= '$rg', nome = '$nome', telefone= '$telefone' where cpf = '$_SESSION[CPF]';" );
     if($query){
         header("Location: verifica_usuario.php");
         
     }else{
         die("Erro: ". mysqli_error($link));
             
    }


 }


<?php
session_start();
?> 
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap"
      rel="stylesheet"
    />     
<link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
  <!-- Estilos -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <!-- Scripts (jQuery não pode ser o slim que vem do Boostrap) -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>
  <script src="js/jquery-3.4.1.min.js" type="text/javascript" ></script>
        <script src="js/jquery.mask.min.js" type="text/javascript" ></script>
        <script src="js/bootstrap.min.js" type="text/javascript" ></script>
        <script src="js/bootstrap-notify.min.js" type="text/javascript" ></script>
  <script>
        function myFunction(){
            confirm("Confirmar o envio!");
        }
         $(document).ready(function(){
                
             $('#CPF').mask('000.000.000-00');
             $('#RG').mask('00.000.000');
             $('#TELEFONE').mask('(00) 00000-0000');
            
            
            }
           )
       

      </script>
    
    
   
    
    <title>Sistema de estágio</title>
    <link rel="stylesheet" href="cadastro.css">
<body>
  
    <?php
 if(isset($_SESSION["msg"])):
   print $_SESSION["msg"];
   unset($_SESSION["msg"]);
endif; 
?>

 <nav id="menu">
    <ul>    
        <li><a href="index.html">Página Inicial</a></li>
        <li><a href="Login.html">Login</a></li>    
    </ul>
</nav>

   
   
<div class="container" >
    <img src="imagens/LOGO.png" style="width: 300px;">

    
  <form method="POST" action="processa.php">
    <label style="font-size: 30px; color: white;">Cadastre-se</label>
    <input type="text" id="NOME" name="NOME" placeholder="Nome Completo">

   <input type="email" id="EMAIL" name="EMAIL" placeholder="E-mail">
    <input type="text" id="RG" name="RG" placeholder="RG" minlength="8" maxlength="8">
 <input type="text" id="CPF" name="CPF" placeholder="CPF" minlength="11"  maxlength="11">
<input type="text" id="TELEFONE" name="TELEFONE" placeholder="Telefone" minlength="11" maxlength="11">
 
    <input type="password" id="SENHA" name="SENHA" placeholder="Senha"  minlength="5" maxlength="10" required>
    
  <select id="FUNCAO" name="FUNCAO">
      <option value="professor">Professor Orientador</option>
      <option value="chefe">Chefe do Departamento</option>
      <option value="coordenador">Coordenador</option>
      <option value="setor de estagio">responsavel pelo setor de Estágio</option>
    </select>
  
  
    <input type="submit" value="ENVIAR" placeholder="ENVIAR">
  </form>
 
</div>

</body>
</html>


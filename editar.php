<!DOCTYPE html>
<html>
<heade>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    
    <link rel="stylesheet" href="edita.css" />

    <?php

session_start();

include('conexao.php');
$cpf= filter_input(INPUT_GET, "cpf");
$nome= filter_input(INPUT_GET, "nome");
$email= filter_input(INPUT_GET, "email");
$senha= filter_input(INPUT_GET, "senha");
$rg= filter_input(INPUT_GET, "rg");
$telefone= filter_input(INPUT_GET, "telefone");
$consulta= "SELECT * FROM usuario WHERE cpf = '$cpf'; ";
$con= mysqli_query($conn, $consulta);

    
?>
</heade>
<body>
    <div id= "conteudo">
        <h1>Alterar dados</h1>
        <p>
            <form action="alterar.php">
            <?php while($dado = $con -> fetch_array() ){?>
                
                Nome: <input type="text" name= "nome" value="<?php echo $dado["nome"];?>"/> <br/>
                CPF: <input type="text" name= "cpf" value="<?php echo $dado["cpf"];?>"/> <br/>
                RG: <input type="text" name= "rg" value="<?php echo $dado["rg"];?>"/> <br/>
                Email: <input type="text" name= "email" value="<?php echo $dado["email"];?>"/> <br/>
                Telefone: <input type="text" name= "telefone" value="<?php echo $dado["telefone"];?>"/> <br/>
                Senha: <input type="text" name= "senha" value="<?php echo $dado["senha"];?>"/> <br/>
                <input type= "submit" value= "Alterar"/> <a class="btn btn-primary" href="status.php" role="button">Excluir conta</a>
                <?php  } ?>

            </form>
        </p>
    </div>
</body>


</html>
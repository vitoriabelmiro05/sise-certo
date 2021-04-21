<!DOCTYPE html>
<html>
<heade>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">
 
    
    <link rel="stylesheet" href="edita.css" />

<?php

session_start();

include('conexao.php');

$id= $_GET["idestagio"];
$query4= "SELECT * FROM estagio WHERE idestagio = '$id'; ";
$con4= mysqli_query($conn, $query4);
$departamento = mysqli_query($conn, "SELECT departamento FROM usuario WHERE cpf = '$_SESSION[CPF]'; ");
$dep= mysqli_fetch_row($departamento);
$consul= "SELECT * FROM usuario where funcao = 'Professor(a)' and visibilidade = '1' and departamento= '$dep[0]'; ";
$cons=mysqli_query($conn, $consul);

?>
</heade>
<body>
    <div id= "conteudo">
        <h1>Indicar Orientador</h1>
        <p>
            <form action="incaPO2.php" method="POST">
            <?php while($dado = $con4 -> fetch_array() ){?>
                <input type="hidden" name= "APROVACAO" value="<?php echo $dado["aprovacao"];?>"/> <br/>
                <input type="hidden" name= "idestagio" value="<?php echo $dado["idestagio"];?>"/> <br/>
                Nome: <?php echo $dado["nome_aluno"];?> <br/>
                MATRICULA: <?php echo $dado["matricula"];?> <br/>
                
                EMPRESA: <?php echo $dado["nome_empresa"];?> <br/>
                INICIO: <?php echo $dado["inicio_estagio"];?> <br/>
                FIM:<?php echo $dado["fim_estagio"];?> <br/>
                CARGA_HORÁRIA: <?php echo $dado["carga_horaria"];?> <br/>
              <select id="NOMEO" name="NOMEO">?>
                                <?php if ($cons-> num_rows> 0 ) {
                                    while($dado = $cons -> fetch_array() ){?>
                                   <option  value="<?php echo $dado["nome"];?>"><?php echo "Professor (a) ".$dado["nome"];} } ?></option>
                                   
                            </select>
                <input type= "submit" value= "Enviar"/>
                <?php  } ?>

            </form>
        </p>
    </div>
</body>


</html>

                         
            
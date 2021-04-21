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

?>
</heade>
<body>
    <div id= "conteudo">
        <h1>Alterar dados</h1>
        <p>
            <form action="admin_altera_estagio.php" method="POST">
            <?php while($dado = $con4 -> fetch_array() ){?>
                <input type="hidden" name= "idestagio" value="<?php echo $dado["idestagio"];?>"/> <br/>
                Nome: <input type="text" name= "nome_aluno" value="<?php echo $dado["nome_aluno"];?>"/> <br/>
                MATRICULA: <input type="text" name= "matricula" value="<?php echo $dado["matricula"];?>"/> <br/>
                ORIENTADOR: <input type="text" name= "nome_orientador" value="<?php echo $dado["nome_orientador"];?>"/> <br/>
                EMPRESA: <input type="text" name= "nome_empresa" value="<?php echo $dado["nome_empresa"];?>"/> <br/>
                INICIO: <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Data" name="inicio_estagio" id="DATAF" value="<?php echo $dado["inicio_estagio"];?>"/> <br/>
                FIM: <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Data" name="fim_estagio" id="DATAF" value="<?php echo $dado["fim_estagio"];?>"/> <br/>
                CARGA_HORÁRIA: <input type="time" class="form-control" id="exampleInputPassword1"  name="carga_horaria" id="CARGA" min="00:00" max="23:59" required value="<?php echo $dado["carga_horaria"];?>"/> <br/>
                <input type= "submit" value= "Alterar"/> 
                <?php  } ?>

            </form>
        </p>
    </div>
</body>


</html>

                         
            
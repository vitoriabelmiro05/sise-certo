<?php
session_start();
//include('verifica_login.php');
include('conexao.php');

$consulta= "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]'; ";
$consultaeS= "SELECT * FROM usuario WHERE cpf != '$_SESSION[CPF]' and visibilidade = '1'; ";
$con= mysqli_query($conn, $consulta);
$con2= mysqli_query($conn, $consulta);
$con3= mysqli_query($conn, $consultaeS);
$query4= "SELECT * FROM estagio; ";
$con4= mysqli_query($conn, $query4);
$consul= "SELECT * FROM usuario where funcao = 'professor' and visibilidade = '1'; ";
$cons=mysqli_query($conn, $consul);
?>
<DOCTYPE HTLM>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">

           <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
           <link rel="shortcut icon" href="favicon_io (1)/favicon.ico" type="image/x-icon">

        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <link href="css/resume.min.css" rel="stylesheet">
        <script src="js/jquery-3.4.1.min.js" type="text/javascript" ></script>
        <script src="js/jquery.mask.min.js" type="text/javascript" ></script>
        <script src="js/bootstrap.min.js" type="text/javascript" ></script>
        <script src="js/bootstrap-notify.min.js" type="text/javascript" ></script>



        </head>
            <body  >

			<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <img src="imagens/LOGO.png" alt="log" class="imagem img-fluid mb-1"       />
				<P>

                <span class="d-none d-lg-block">

                   <img src="imagens/icon.jpg" alt="ICONE" class="imagem img-fluid img-profile rounded-circle mx-auto mb-1"

      />
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#perfil">Editar Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#estagio">Cadastrar Estágio</a>
                    </li>

					<li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#indica">Estágios Cadastrados</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="login.php">Sair</a>
                    </li>
                </ul>
            </div>

        </nav>
		  <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="about">

				<div class="w-100">
                	  <h3 class="mb-2 " >Bem vindo(a)
					  <ul class="list-group">

   <?php while($dado = $con -> fetch_array() ){?>
                     <?php echo $dado["nome"];?> </h3><p>
  <li class="list-group-item list-group-item-secondary">




                      <h4>  CPF:   <?php echo $dado["cpf"]; ?><br>
                        E-MAIL:   <?php echo $dado["email"];?><br>
                        TELEFONE:    <?php echo $dado["telefone"];?>

                        </h4>

                    <?php } ?>
					 </li>

</ul><br>

					 <h3>Usuarios Cadastrados </h3>
					<table class="table table-striped">
  <thead>
    <tr>

      <th scope="col">NOME</th>
      <th scope="col">EMAIL</th>
	  <th scope="col">SENHA</th>
	   <th scope="col">RG</th>
      <th scope="col">CPF</th>
	  <th scope="col">TELEFONE</th>
      <th scope="col">FUNÇÃO</th>
      

      <?php if ($con3-> num_rows> 0 ) {
     while($dado = $con3 -> fetch_array() ){

                         echo "<tr>";
                         echo "<td>" . $dado["nome"] . "</td>";
                         echo "<td>" . $dado["email"] . "</td>";
                         echo "<td>" . $dado["senha"] . "</td>";
                         echo "<td>" . $dado["rg"] . "</td>";
                         echo "<td>" . $dado["cpf"] . "</td>";
                          echo "<td>" . $dado["telefone"] . "</td>";
                           echo "<td>" . $dado["funcao"] . "</td>";
                            

                         ?>
                        <td><a href="editar.php?cpf=<?php echo $dado["cpf"];?>" class="btn btn-primary"role="button">EDITAR</a></td>;
                         
       
 <?php
            echo "</tr>";
  }
}

 ?>  

  </thead>

</table>
 <p>
 <p>
<br>
<br>
            <a class="btn btn-primary" href="geraDeclaracao.php" role="button">Gerar Declaração</a>
                

                 </div>







            </section>
			 <section class="resume-section p-3 p-lg-4 d-flex justify-content-left" id="perfil">
			  <div class="w-100">

				 <form action="alterar.php">
            <?php while($dado = $con2 -> fetch_array() ){?>
                 <div class="form-group">
                Nome:<input type="text" class="form-control"name= "nome" value="<?php echo $dado["nome"];?>"/> <br/>
				 </div>
				 <div class="form-group">
                CPF: <input type="text"class="form-control" name= "cpf" value="<?php echo $dado["cpf"];?>"/> <br/>
				 </div>
				 <div class="form-group">
                RG: <input type="text" class="form-control"name= "rg" value="<?php echo $dado["rg"];?>"/> <br/>
				 </div>
				 <div class="form-group">
                Email: <input type="text"class="form-control" name= "email" value="<?php echo $dado["email"];?>"/> <br/>
				 </div>
				 <div class="form-group">
                Telefone: <input type="text"class="form-control" name= "telefone" value="<?php echo $dado["telefone"];?>"/> <br/>
				 </div>
				 <div class="form-group">
                Senha: <input type="text" class="form-control"name= "senha" value="<?php echo $dado["senha"];?>"/> <br/>
				 </div>
                <input type= "submit" value= "Alterar"class="btn btn-primary"/>
                <a class="btn btn-primary" href="status.php" role="button">Excluir conta</a>
                <?php  } ?>

            </form>

</div>


            </section>
		   <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="estagio">
                <div class="w-100">
                    <h2 class="mb-5 " >Cadastrar novo estágio</h2>
                    <form action="processaEsta.php" method="post">
					 <div class="form-group">
                            <input type="text" class="form-control" id="NOME" name="NOME" aria-describedby="emailHelp" placeholder="Nome do Aluno" required>
                        </div>
						<div class="form-group">
                            <input type="text" class="form-control" id="NOMEMP" name="NOMEMP" aria-describedby="emailHelp" placeholder="Nome da Empresa" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="MATRICULA" name="MATRICULA" aria-describedby="emailHelp" placeholder="Matricula" required>
                        </div>
                        <div class="form-group">

                            <label for="exampleInputEmail1">Inicio do Estágio</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Data" name="DATAI" id="DATAI">

                        </div>
						<div class="form-group">

                            <label for="exampleInputEmail1">Fim do Estágio</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Data" name="DATAF" id="DATAF">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Carga horária</label>
                            <input type="time" class="form-control" id="exampleInputPassword1"  name="CARGA" id="CARGA" min="00:00" max="23:59" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                         <br>


                    </form>


                </div>

            </section>

		  <section class="resume-section p-3 p-lg-5 d-flex justify-content-left" id="indica">
                <div class="w-100">
                <h3>Estágios Cadastrados </h3>
					<table class="table table-striped">
  <thead>
    <tr>

      <th scope="col">Nome do Aluno</th>
      <th scope="col">Matricula</th>
	  <th scope="col">Professor Orientador</th>
	   <th scope="col">Nome Empresa</th>
      <th scope="col">Início Estágio</th>
	  <th scope="col">Fim Estágio</th>

	  <th scope="col">Carga horária</th>

			   <?php if ($con4-> num_rows> 0 ) {
     while($dado = $con4 -> fetch_array() ){

                         $id= $dado["idestagio"];


                            echo "<tr>";
                            echo "<td>" . $dado["nome_aluno"] . "</td>";
							echo "<td>" . $dado["matricula"] . "</td>";
                            echo "<td>" . $dado["nome_orientador"] . "</td>";
                            echo "<td>" . $dado["nome_empresa"] . "</td>";
                            echo "<td>" . $dado["inicio_estagio"] . "</td>";
							 echo "<td>" . $dado["fim_estagio"] . "</td>";
							  echo "<td>" . $dado["carga_horaria"] . "</td>";
                              ?>
                               <td><a href="edita_estagio.php?idestagio=<?php echo $dado["idestagio"];?>" class="btn btn-primary"role="button">EDITAR</a></td>;

<?php
                           echo "</tr>";
                        }



                    } 




                ?>

  </thead>

</table>
 
<br>
<br>
                 </div>
            </section>

            </body>
</html>
</DOCTYPE HTML>
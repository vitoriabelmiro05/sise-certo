<?php
session_start();
//include('verifica_login.php');
include('conexao.php');

$consulta= "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]'; ";
$consultaeS= "SELECT * FROM estagio WHERE cpf_usuario = '$_SESSION[CPF]'; ";
$con= mysqli_query($conn, $consulta);
$con2= mysqli_query($conn, $consulta);
$con3= mysqli_query($conn, $consultaeS);
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
                <img src="imagens/LOGO.png" alt="log" class="imagem img-fluid   "       />
				<P>
				
                <span class="d-none d-lg-block">
				 
                   <img src="imagens/icon.jpg" alt="ICONE" class="imagem img-fluid img-profile rounded-circle mx-auto mb-2"
        
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
                        <a class="nav-link js-scroll-trigger" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>
				
        </nav>
		  <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="about">

				<div class="w-100">
                	  <h2 class="mb-5 " >
					  <ul class="list-group">
  
   <?php while($dado = $con -> fetch_array() ){?>
                    
                        <?php echo $dado["nome"];?> </h2><p>
  <li class="list-group-item list-group-item-secondary">
 
                
  
						
                      <h4>  <?php echo $dado["funcao"];?><br>
                           CPF:   <?php echo $dado["cpf"];?><br>
                        E-MAIL:   <?php echo $dado["email"];?><br>
                        TELEFONE:    <?php echo $dado["telefone"];?> 
                        
                        </h4>
                    
                    <?php } ?>

					 </li>
 
</ul><br>

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

			   <?php if ($con3-> num_rows> 0 ) {
     while($dado = $con3 -> fetch_array() ){

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
</table>	
 
				
               
	
                 </div>
			
               
            </section>
			 <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="perfil">
			  <div class="w-100">
				 <form action="alterar.php">
            <?php while($dado = $con2 -> fetch_array() ){?>
                 <div class="form-group">
                Nome: <input type="text" class="form-control"name= "nome" value="<?php echo $dado["nome"];?>"/> <br/>
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
		  
            </body>
</html>
</DOCTYPE>
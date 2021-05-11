<?php
session_start();
//include('verifica_login.php');
include('conexao.php');

$consulta= "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]'; ";
$consultaeS= "SELECT * FROM estagio where nome_orientador = 'Pendente'; ";
$con= mysqli_query($conn, $consulta);
$con2= mysqli_query($conn, $consulta);
$con4= mysqli_query($conn, $consultaeS);
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

        <style>
       h7{
            color:springgreen;
        }
    </style>


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
                        <a class="nav-link js-scroll-trigger" href="coordenador_inicio.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="coordenador_editaperfil.php"><h7>Editar Perfil</h7></a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#estagio">Cadastrar Estágio</a>
                    </li> -->

					<!-- <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#indica">Indicar/Solicitar Professor Orientador</a>
                    </li> -->


                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>

        </nav>
        
			  <div class="w-100">

				 <form action="alterar.php">
            <?php while($dado = $con2 -> fetch_array() ){?>
                 <div class="form-group">
                Nome:<input type="text" class="form-control"name= "nome" value="<?php echo $dado["nome"];?>"/> <br/>
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
            </body>
    </html>
</DOCTYPE>
        
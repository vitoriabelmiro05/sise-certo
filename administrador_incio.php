<?php 
session_start();

include('conexao.php');  
$con= mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]';");
$departamento = mysqli_query($conn, "SELECT departamento FROM usuario WHERE cpf = '$_SESSION[CPF]'; ");
$dep= mysqli_fetch_row($departamento);
$con3= mysqli_query($conn,"SELECT * FROM usuario WHERE cpf != '$_SESSION[CPF]'and visibilidade = '1' and departamento = '$dep[0]'; ");
$foto= mysqli_query($conn,"SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]';");

?>

<DOCTYPE HTLM>
    <style>
        h7{
            color:#f18322;
        }
    </style>
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
                <?php while ($dado = $foto->fetch_array()) { ?>
                            <img src="fotoperfil/ <?php echo $dado['foto'];
                                                } ?>" style="border-radius: 50%; " width="200px" height="200px" alt="foto perfil" class="imagem img-fluid   " />
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_incio.php"><h7>Início</h7></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_editaperfil.php">Editar Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_cadastraestagio.php">Cadastrar Estágio</a>
                    </li>

					<li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_estagioscadastrados.php">Estágios Cadastrados</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>

        </nav>
        <div class="w-100">
                	  <h3 class="mb-2 " >
					  <ul class="list-group">

   <?php while($dado = $con -> fetch_array() ){
                      echo $dado["nome"];?> </h3>
  <li class="list-group-item list-group-item-secondary">

              


                      <h4> <?php echo $dado["funcao"];?><br>
                           CPF:   <?php echo $dado["cpf"]; ?><br>
                        E-MAIL:   <?php echo $dado["email"];?><br>
                        TELEFONE:    <?php echo $dado["telefone"];?><br>
                        Departamento: <?php echo $dado["departamento"]; ?>

                        </h4>

                    <?php } ?>
					 </li>

</ul><br>

					 <h3>Usuários Cadastrados </h3>
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
      <th scope="col">DEPARTAMENTO</th>
      

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
                           echo "<td>" . $dado["departamento"] . "</td>";
                            

                         ?>
                        <td><a href="editar.php?cpf=<?php echo $dado["cpf"];?>" class="btn btn-primary"role="button">EDITAR</a></td>
       
 <?php
            echo "</tr>";
  }
} else {
    echo "<tr>";
    echo "<td>-</td>";
    echo "<td>-</td>";
    echo "<td>-</td>";
    echo "<td>-</td>";
    echo "<td>-</td>";
    echo "<td>-</td>";
    echo "<td>-</td>";
    echo "<td>-</td>";
} ?>


  </thead>

</table>
 <p>
 <p>
<br>
<br>
            <a class="btn btn-primary" href="mpdf/index.php" role="button">Gerar Declaração</a>
                

                 </div>



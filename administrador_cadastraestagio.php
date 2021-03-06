<?php
header ('Content-type: text/html; charset=UTF-8');
session_start();

include('conexao.php');

$con2 = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]'; ");
$foto = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]';");

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
        <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="js/jquery.mask.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-notify.min.js" type="text/javascript"></script>

        <style>
  .botao {
      background-color: #028c8c !important;
      }
      .botao:hover {
        background-color: #f08324 !important;
      }
    
            h7 {
                color: #f18322;
            }
        </style>




    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger">
                <img src="imagens/LOGO.png" alt="log" class="imagem img-fluid mb-1" />
                <P>

                    <span class="d-none d-lg-block">

                        <?php while ($dado = $foto->fetch_array()) { ?>
                            <img src="fotoperfil/<?php echo $dado['foto'];
                                                } ?>" style="border-radius: 50%; " width="200px" height="200px" alt="foto perfil" class="imagem img-fluid   " />
                    </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_incio.php">In??cio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_editaperfil.php">Editar Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_cadastraestagio.php">
                            <h7>Cadastrar Est??gio</h7>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_estagioscadastrados.php">Est??gios Cadastrados</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>

        </nav>
        <div class="container">
        <div class="w-100">
            <h2 class="mb-5 ">Cadastrar novo est??gio</h2>
            <form action="processaEsta.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="NOME" name="NOME" aria-describedby="emailHelp" placeholder="Nome do Aluno" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="NOMEMP" name="NOMEMP" aria-describedby="emailHelp" placeholder="Nome da Empresa" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="MATRICULA" name="MATRICULA" aria-describedby="emailHelp" placeholder="Matricula" minlength="14" maxlength="14" required>
                </div>
                <div class="form-group">

                    <label for="exampleInputEmail1">Inicio do Est??gio</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Data" name="DATAI" id="DATAI">

                </div>
                <div class="form-group">

                    <label for="exampleInputEmail1">Fim do Est??gio</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Data" name="DATAF" id="DATAF">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Carga hor??ria</label>
                    <input type="time" class="form-control" id="exampleInputPassword1" name="CARGA" id="CARGA" min="00:00" max="23:59" required>
                </div>
                
                <button type="submit" class="btn btn-primary botao">Enviar</button>
                <br>


            </form>


        </div>
        </div>

    </body>

    </html>
</DOCTYPE>
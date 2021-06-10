<?php
 header ('Content-type: text/html; charset=UTF-8');
session_start();

include('conexao.php');
$departamento = mysqli_query($conn, "SELECT departamento FROM usuario WHERE cpf = '$_SESSION[CPF]'; ");
$dep = mysqli_fetch_row($departamento);
$con4 = mysqli_query($conn, "SELECT * FROM estagio where cpf_usuario in (select cpf from usuario where departamento = '$dep[0]');");
$foto = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]';");



?>

<DOCTYPE HTLM>
    <html lang="pt-br">

    <head>
    <meta  charset="utf-8">

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
 <!-- Links para o MODAL INICIO -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <!-- Links para o MODAL FIM -->
  <style>
      .fa-pen {
          color: #028c8c !important;
      }
      .fa-pen:hover {
        color: #f08324 !important;
      }
      .fa-search-plus {
          color: #028c8c !important;
      }
      .fa-search-plus:hover {
        color: #f08324 !important;
      }
     h7 {
                color: #f18322;
            }
            
            
        </style>

         <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
      <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
  <style>
      .fa-pen {
          color: #028c8c !important;
      }
      .fa-pen:hover {
        color: #f08324 !important;
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
                        <a class="nav-link js-scroll-trigger" href="administrador_incio.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_editaperfil.php">Editar Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_cadastraestagio.php">Cadastrar Estágio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_estagioscadastrados.php">
                            <h7>Estágios Cadastrados</h7>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>

        </nav>
        <div class="w-100">
            <div class="container">
            <h3>Estágios Cadastrados</h3>

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
                        <th scope="col">Editar</th>
                        <th scope="col">Mais</th>

                        <?php if ($con4->num_rows > 0) {
                            while ($dado = $con4->fetch_array()) {

                                $id = $dado["idestagio"];


                                echo "<tr>";
                                echo "<td>" . $dado["nome_aluno"] . "</td>";
                                echo "<td>" . $dado["matricula"] . "</td>";
                                echo "<td>" . $dado["nome_orientador"] . "</td>";
                                echo "<td>" . $dado["nome_empresa"] . "</td>";
                                echo "<td>" . $dado["inicio_estagio"] . "</td>";
                                echo "<td>" . $dado["fim_estagio"] . "</td>";
                                echo "<td>" . $dado["carga_horaria"] . "</td>";
                        ?>
                                <td><a href="edita_estagio.php?idestagio=<?php echo $dado["idestagio"]; ?>"><i class="fas fa-pen"></a></td>
                                <td style="align-items: center; justify-content: center;"><a href="<?php echo $dado["idestagio"]; ?>" data-toggle="modal" data-target="#lupaModal" data-id= class="mr-3"><i class="fas fa-search-plus"></i></a></td>

                        <?php
                                echo "</tr>";
                            }
                        }else {
                            echo "<tr>";
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

            <br>
            <br>
            </div>
        </div>
    </body>
      <!-- MODAL LUPA -->
  <div class="modal fade" id="lupaModal" tabindex="-1" role="dialog" aria-labelledby="lupaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="lupaModalLabel">Mais informações</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <h1>
             <table class="table table-striped">
                <tr>
             <th scope="col">Informação</th>
            <th scope="col">Data</th>
            </tr>
                 <tr>
                     <th>
                     oi
                     </th>
                     <td>xx</td>
                     </tr>
                     <tr>
                     <th>
                     oi
                     </th>
                     <td>xx</td>
                     </tr>
                     <tr>
                     <th>
                     oi
                     </th>
                     <td>xx</td>
                     </tr>
                     
                 
                     
                     
                 
                 
             </table>

         </h1>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Fechar
          </button>
        </div>
      </div>
    </div>
  </div>

    </html>
</DOCTYPE>
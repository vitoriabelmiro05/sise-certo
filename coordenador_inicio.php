<?php
session_start();
//include('verifica_login.php');
include('conexao.php');

$consulta = "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]'; ";
$consultaeS = "SELECT * FROM estagio where nome_orientador = 'Pendente'; ";
$con = mysqli_query($conn, $consulta);
$con2 = mysqli_query($conn, $consulta);
$con4 = mysqli_query($conn, $consultaeS);
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
            h7 {
                color: #f18322;
            }
        </style>


    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <img src="imagens/LOGO.png" alt="log" class="imagem img-fluid mb-1" />
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
                        <a class="nav-link js-scroll-trigger" href="coordenador_inicio.php">
                            <h7>Início</h7>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="coordenador_editaperfil.php">Editar Perfil</a>
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
            <h3 class="mb-2 ">
                <ul class="list-group">

                    <?php while ($dado = $con->fetch_array()) { ?>
                        <?php echo $dado["nome"]; ?>
            </h3>
            <p>
                <li class="list-group-item list-group-item-secondary">




                    <h4> <?php echo $dado["funcao"]; ?><br>
                        CPF: <?php echo $dado["cpf"]; ?><br>
                        E-MAIL: <?php echo $dado["email"]; ?><br>
                        TELEFONE: <?php echo $dado["telefone"]; ?>

                    </h4>

                <?php } ?>
                </li>

                </ul><br>


            <h3>Aguardando indicação de orientador </h3>
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
                                <td><a href="indicaPO.php?idestagio=<?php echo $dado["idestagio"]; ?>" class="btn btn-primary" role="button">Indicar</a></td>

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
    </body>

    </html>
</DOCTYPE>
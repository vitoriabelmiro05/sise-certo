<?php
header('Content-type: text/html; charset=UTF-8');
session_start();

include('conexao.php');

//consultas do modal
date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date('d/m/Y');
$datacortada = explode('/', $dataAtual);
$anoAtual = $datacortada[2];
$departamento = mysqli_query($conn, "SELECT departamento FROM usuario WHERE cpf = '$_SESSION[CPF]'; ");
$dep = mysqli_fetch_row($departamento);
$declaracao = mysqli_query($conn, "SELECT * FROM usuario where funcao = 'Professor(a)' and visibilidade = '1' and departamento= '$dep[0]'; ");

$consulta = "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]'; ";
$consultaeS = "SELECT * FROM estagio where  aprovacao = '0' and nome_orientador != 'Pendente'; ";
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
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">

        <!-- Links para o MODAL INICIO -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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

            .fa-pen {
                color: #028c8c !important;
            }

            .fa-pen:hover {
                color: #f08324 !important;
            }

            .fa-check {
                color: #028c8c !important;

            }

            .fa-check:hover {
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
            <h4 style="color:white;"><?php while ($dado = $con->fetch_array()) { ?>
                    <?php echo $dado["nome"]; ?></h4>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="chefe_inicio.php">
                            <h7>Início</h7>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="chefe_editaperfil.php">Editar Perfil</a>
                    </li>




                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="logout.php">Sair</a>
                    </li>
                </ul>
            </div>

        </nav>
        <div class="w-100">
            <ul class="list-group">



                <li class="list-group-item list-group-item-secondary">




                    <h4> <?php echo $dado["funcao"]; ?><br>
                        CPF: <?php echo $dado["cpf"]; ?><br>
                        E-MAIL: <?php echo $dado["email"]; ?><br>
                        TELEFONE: <?php echo $dado["telefone"]; ?>

                    </h4>

                <?php } ?>
                </li>

            </ul><br>
            <div class="container">


                <h3>Aguardando aprovação de orientador </h3>
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
                            <th scope="col">Editar orientador</th>
                            <th scope="col">Aprovar orientador</th>
                            <?php if ($con4->num_rows > 0) {

                                while ($dado = $con4->fetch_array()) {

                                    $id = $dado["idestagio"];
                                    $aprovacao = $dado["aprovacao"];


                                    echo "<tr>";
                                    echo "<td>" . $dado["nome_aluno"] . "</td>";
                                    echo "<td>" . $dado["matricula"] . "</td>";
                                    echo "<td>" . $dado["nome_orientador"] . "</td>";
                                    echo "<td>" . $dado["nome_empresa"] . "</td>";
                                    echo "<td>" . $dado["inicio_estagio"] . "</td>";
                                    echo "<td>" . $dado["fim_estagio"] . "</td>";
                                    echo "<td>" . $dado["carga_horaria"] . "</td>";
                            ?>

                                    <td><a href="aprovaPO.php?idestagio=<?php echo $dado["idestagio"]; ?>"><i class="fas fa-pen"></a></td>

                                    <td><a href="aprova_direto.php?idestagio=<?php echo $dado["idestagio"]; ?>"><i class="fa fa-check"></a></td>

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
                            } ?>

                    </thead>

                </table>
                <p>
                <p>
                    <br>
                    <br>
                    <a class="btn btn-success botao" role="button" data-toggle="modal" data-target="#lupaModal" class="mr-3">
                        <h8 style="color: white;">Consultar Declaração</h8>
                    </a>
            </div>


        </div>
            </div>

            <br>
            <br>
        </div>
    </body>
    <!-- MODAL GERA DECLARAÇÃO -->
    <div class="modal fade" id="lupaModal" tabindex="-1" role="dialog" aria-labelledby="lupaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lupaModalLabel">Consultar declaração de estágio:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="geraDeclaracao.php">
                        PROFESSOR ORIENTADOR: <select id="professor_orientador" name="professor_orientador">?>
                            <?php if ($declaracao->num_rows > 0) {
                                while ($dado = $declaracao->fetch_array()) { ?>
                                    <option value="<?php echo $dado["nome"]; ?>"><?php echo "Professor (a) " . $dado["nome"];
                                                                                }
                                                                            } ?></option>

                        </select>
                        <br>
                        <input type="hidden" name="ano" value="<?php echo $anoAtual;?>">
                        <div class="modal-footer">
                            <input class="btn btn-success botao" type="submit" value="ENVIAR" placeholder="ENVIAR">

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    </html>
</DOCTYPE>
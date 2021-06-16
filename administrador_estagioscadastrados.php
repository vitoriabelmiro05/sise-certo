<?php
header('Content-type: text/html; charset=UTF-8');
session_start();

include('conexao.php');
$departamento = mysqli_query($conn, "SELECT departamento FROM usuario WHERE cpf = '$_SESSION[CPF]'; ");
$dep = mysqli_fetch_row($departamento);
$con4 = mysqli_query($conn, "SELECT * FROM estagio where cpf_usuario in (select cpf from usuario where departamento = '$dep[0]');");
$foto = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]';");



?>

<!DOCTYPE HTLM>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>SISE- Sistema de estágio</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon2.png" />

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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


    <script>
        var dadosModal = [];

        function dataModal(linha) {
            const dataSE = dadosModal[linha][1].split('-');
            const diaSE = dataSE[2];
            const mesSE = dataSE[1];
            const anoSE = dataSE[0];
            const dataC = dadosModal[linha][2].split('-');
            const diaC = dataC[2];
            const mesC = dataC[1];
            const anoC = dataC[0];
            const dataCD = dadosModal[linha][3].split('-');
            const diaCD = dataCD[2];
            const mesCD = dataCD[1];
            const anoCD = dataCD[0];

            document.getElementById("dataSE").innerHTML = "Setor de estágio cadastrou o estágio no dia: " +
                diaSE + "/" + mesSE + "/" + anoSE;
            document.getElementById("dataC").innerHTML = "Coordenador indicou o orientador no dia: " +
                diaC + "/" + mesC + "/" + anoC;
            document.getElementById("dataCD").innerHTML = "Chefe de departamento aprovou o orientador no dia: " +
                diaCD + "/" + mesCD + "/" + anoCD;
        }
    </script>

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
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="administrador_cadastraestagio.php">Cadastrar Estágio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="administrador_estagioscadastrados.php">
                        <h7>Estágios Cadastrados</h7>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="administrador_orientacoespendentes.php">
                        Orientações Pendentes
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
                        <th scope="col">Curso</th>
                        <th scope="col">Professor Orientador</th>
                        <th scope="col">Nome Empresa</th>
                        <th scope="col">Início Estágio</th>
                        <th scope="col">Fim Estágio</th>

                        <th scope="col">Carga horária</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Mais</th>

                        <?php
                        $linha = 0;
                        if ($con4->num_rows > 0) {
                            while ($dado = $con4->fetch_array()) {

                                $id = $dado["idestagio"];
                        ?>
                                <script>
                                    dadosModal.push(["<?php echo $id; ?>", "<?php echo $dado["dataSE"]; ?>", "<?php echo $dado["dataC"]; ?>", "<?php echo $dado["dataCD"]; ?>"]);
                                </script>
                                <?php
                                $inicioEstagio = explode('-', $dado["inicio_estagio"]);
                                $diaI = $inicioEstagio[2];
                                $mesI = $inicioEstagio[1];
                                $anoI = $inicioEstagio[0];
                                $fimEstagio = explode('-', $dado["fim_estagio"]);
                                $diaF = $fimEstagio[2];
                                $mesF = $fimEstagio[1];
                                $anoF = $fimEstagio[0];

                                echo "<tr>";
                                echo "<td>" . $dado["nome_aluno"] . "</td>";
                                echo "<td>" . $dado["matricula"] . "</td>";
                                echo "<td>" . $dado["curso"] . "</td>";
                                echo "<td>" . $dado["nome_orientador"] . "</td>";
                                echo "<td>" . $dado["nome_empresa"] . "</td>";
                                echo "<td>" . $diaI . "/" . $mesI . "/" . $anoI . "</td>";
                                echo "<td>" . $diaF . "/" . $mesF . "/" . $anoF . "</td>";
                                echo "<td>" . $dado["carga_horaria"] . "</td>";
                                ?>
                                <td><a href="edita_estagio.php?idestagio=<?php echo $dado["idestagio"]; ?>"><i class="fas fa-pen"></a></td>
                                <td onclick="dataModal(<?php echo $linha ?>)" style="align-items: center; justify-content: center;"><a href="<?php echo $dado["idestagio"]; ?>" data-toggle="modal" data-target="#lupaModal" class="mr-3"><i class="fas fa-search-plus"></i></a></td>

                        <?php
                                $linha += 1;
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
                        <script>
                            console.log(dadosModal)
                        </script>

                </thead>

            </table>

            <br>
            <br>
        </div>
    </div>
</body>
<!-- MODAL LUPA -->
<div class="modal fade" id="lupaModal" tabindex="-1" role="dialog" aria-labelledby="lupaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lupaModalLabel">Rastreio do estágio:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="dataSE">
                <p>
                <p id="dataC">
                <p>
                <p id="dataCD">
                <p>
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
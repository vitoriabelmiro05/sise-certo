<?php
header('Content-type: text/html; charset=UTF-8');
session_start();
include('conexao.php');
date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date('d/m/Y');
$datacortada = explode('/', $dataAtual);
$anoAtual = $datacortada[2];
$con = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]';");
$departamento = mysqli_query($conn, "SELECT departamento FROM usuario WHERE cpf = '$_SESSION[CPF]'; ");
$dep = mysqli_fetch_row($departamento);
$declaracao = mysqli_query($conn, "SELECT * FROM usuario where funcao = 'Professor(a)' and visibilidade = '1' and departamento= '$dep[0]'; ");
$con3 = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf != '$_SESSION[CPF]'and visibilidade = '1' and departamento = '$dep[0]'; ");
$foto = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]';");
include("Helpers/funcoes.php");
?>

<!DOCTYPE HTLM>
    
    <html lang="pt-br">

    <head>
    <title>SISE- Sistema de estágio</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
    <link rel="icon" type="image/x-icon" href="assets/img/favicon2.png" />

        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

        <link href="css/resume.min.css" rel="stylesheet">
        <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="js/jquery.mask.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-notify.min.js" type="text/javascript"></script>
        <script>
            function myFunction() {
                confirm("Confirmar o envio!");
            }
            $(document).ready(function() {

                $('$cpf').mask('000.000.000-00');
                $('#RG').mask('00.000.000');
                $('#TELEFONE').mask('(00) 00000-0000');


            })
        </script>
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
        <!-- Links para o MODAL INICIO -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <style>
             h7 {
            color: #f18322;
        }
        
            .botao {
                background-color: #028c8c !important;
            }

            .botao:hover {
                background-color: #f08324 !important;
            }

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
            #professor_orientador {
                border-radius: 5px 0px 0px 5px;
                width: 200px;
                outline: none;
            }
            #professor_orientador:hover, #ano:hover {
                outline: none;
                border: 1px solid #028c8c;
            }
            #ano {
                border-radius: 5px 0px 0px 5px;
                width: 100px;
                outline: none;
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
           <h4 style="color:white;"> <?php while ($dado = $con->fetch_array()) {
                       ?><?php echo $dado["nome"]; ?></h4>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="zoom: 0.9;" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_incio.php">
                            <h7>Início</h7>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_editaperfil.php">Editar Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="administrador_cadastraestagio.php">Estágios</a>
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
                    CPF: <?php echo mask($dado["cpf"], '###.###.###-##') ; ?><br>
                    E-MAIL: <?php echo $dado["email"]; ?><br>
                    TELEFONE: <?php echo mask($dado["telefone"], '(##) #####-####') ; ?><br>
                    Departamento: <?php echo $dado["departamento"]; ?>
                </h4>

            <?php } ?>
            </li>

            </ul><br>

            <div class="container">
                <h3>Usuários Cadastrados </h3>
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <th scope="col">NOME</th>
                            <th scope="col">EMAIL</th>

                            <th scope="col">RG</th>
                            <th scope="col">CPF</th>
                            <th scope="col">TELEFONE</th>
                            <th scope="col">FUNÇÃO</th>
                            <th scope="col">DEPARTAMENTO</th>
                            <th scope="col">EDITAR</th>
           </tr>

                            <?php if ($con3->num_rows > 0) {
                                while ($dado = $con3->fetch_array()) {

                                    echo "<tr>";
                                    echo "<td>" . $dado["nome"] . "</td>";
                                    echo "<td>" . $dado["email"] . "</td>";
                                    echo "<td>" . mask( $dado["rg"], '##.###.###') . "</td>";
                                    echo "<td>" . mask( $dado["cpf"], '###.###.###-##') . "</td>";
                                    echo "<td>" . mask( $dado["telefone"], '(##) #####-####') . "</td>";
                                    echo "<td>" . $dado["funcao"] . "</td>";
                                    echo "<td>" . $dado["departamento"] . "</td>";


                            ?>
                                    <td style="display: flex; align-items: center; justify-content: center;"><a href="editar.php?cpf=<?php echo $dado["cpf"]; ?>"><i class="fas fa-pen"></i></a></td>


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
                        <h8 style="color: white;">Gerar Declaração</h8>
                    </a>


            </div>
        </div>

    </body>
    <!-- MODAL GERA DECLARAÇÃO -->
    <div class="modal fade" id="lupaModal" tabindex="-1" role="dialog" aria-labelledby="lupaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lupaModalLabel">Gerar declaração de estágio:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="geraDeclaracao.php" target="_blank">
                        Professor Orientador: <select class="input100" id="professor_orientador" name="professor_orientador">?>
                            <?php if ($declaracao->num_rows > 0) {
                                while ($dado = $declaracao->fetch_array()) { ?>
                                    <option value="<?php echo $dado["nome"]; ?>"><?php echo "Professor (a) " . $dado["nome"];
                                                                                }
                                                                            } ?></option>

                        </select>
                        <br>
                        Ano: <select class="input100" id="ano" name="ano">?>
                            <?php
                            $ano = $anoAtual - 10;

                            while ($ano <= $anoAtual) { ?>
                                <option value="<?php echo $ano; ?>"><?php echo " $ano";  ?></option>
                            <?php $ano += 1;
                            } ?>

                        </select>
                        <div class="modal-footer">
                            <input class="btn btn-success botao"  type="submit" value="ENVIAR" placeholder="ENVIAR">

                        </div>

                    </form>

                </div>
            </div>
        </div>

    </html>
</DOCTYPE>
<?php
header('Content-type: text/html; charset=UTF-8');
session_start();
//include('verifica_login.php');
include('conexao.php');

$declaracao = mysqli_query($conn, "select * FROM declaracao WHERE nome_prof = (SELECT nome FROM usuario where cpf = '$_SESSION[CPF]');");

$consulta = "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]'; ";
$consultaeS = "SELECT * FROM estagio WHERE cpf_usuario = '$_SESSION[CPF]'; ";
$foto = mysqli_query($conn, "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]';");
$con = mysqli_query($conn, $consulta);
$con2 = mysqli_query($conn, $consulta);
$con3 = mysqli_query($conn, $consultaeS);
?>
<DOCTYPE HTLM>
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
        <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="js/jquery.mask.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-notify.min.js" type="text/javascript"></script>

        <!-- Links para o MODAL INICIO -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="sideNav">


            <a class="navbar-brand js-scroll-trigger">
                <img src="imagens/LOGO.png" alt="log" class="imagem img-fluid   " />
                <P>

                    <span class="d-none d-lg-block">

                        <?php while ($dado = $foto->fetch_array()) { ?>
                            <img src="fotoperfil/<?php echo $dado['foto'];
                                                } ?>" style="border-radius: 50%; " width="200px" height="200px" alt="foto perfil" class="imagem img-fluid   " />


                    </span>

            </a>
            <h4 style="color:white;"> <?php while ($dado = $con->fetch_array()) { ?>

                    <?php echo $dado["nome"]; ?></h4>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="professor.php">
                            <h7>Início</h7>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="professor_editaperfil.php">Editar Perfil</a>
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

                            <?php if ($con3->num_rows > 0) {
                                while ($dado = $con3->fetch_array()) {

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
                    <a class="btn btn-success botao" role="button" data-toggle="modal" data-target="#lupaModal" class="mr-3">
                        <h8 style="color: white;">Consultar Declaração</h8>
                    </a>




        </div>


    </body>
      <!-- MODAL GERA DECLARAÇÃO -->
      <div class="modal fade" id="lupaModal" tabindex="-1" role="dialog" aria-labelledby="lupaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lupaModalLabel">Declarações disponíveis:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="geraDeclaracao.php">
                     
                            <?php
                            
                            if ($declaracao->num_rows > 0){
                            while ($dado = $declaracao->fetch_array()){ ?>
                            <input type="hidden" name="professor_orientador" value="<?php echo $dado["nome_prof"]; ?>">
                               ANO: <select id="ano" name="ano">?>
                                <option value="<?php echo $dado["ano"]; ?>"><?php echo $dado["ano"];}  ?></option>
                                
                                </select>
                                <div class="modal-footer">
                            <input class="btn btn-success botao"  type="submit" value="ENVIAR" placeholder="ENVIAR" >
                            

                        </div>
                           <?php 
                           } else {
                               echo "Nenhuma declaração disponível.";
                           }



?>

                      
                        

                    </form>

                </div>
            </div>
        </div>

    </html>
</DOCTYPE>
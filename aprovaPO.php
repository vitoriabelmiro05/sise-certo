<?php
header('Content-type: text/html; charset=UTF-8');
session_start();

include('conexao.php');
include('Helpers/funcoes.php');

$id = $_GET["idestagio"];
$query4 = "SELECT * FROM estagio WHERE idestagio = '$id'; ";
$con4 = mysqli_query($conn, $query4);
$departamento = mysqli_query($conn, "SELECT departamento FROM usuario WHERE cpf = '$_SESSION[CPF]'; ");
$dep = mysqli_fetch_row($departamento);
$consul = "SELECT * FROM usuario where funcao = 'Professor(a)' and visibilidade = '1' and departamento= '$dep[0]' order by nome asc; ";
$cons = mysqli_query($conn, $consul);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>SISE- Sistema de estágio</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon2.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon2.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/styless.css">
    <!--===============================================================================================-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.mask.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-notify.min.js" type="text/javascript"></script>
   
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase  ">



                    <li class="nav-item"><a class="nav-link js-scroll-trigger bg-primary" href="verifica_usuario.php" style="border-radius: 10px;">Voltar</a></li>


                </ul>
            </div>
        </div>
    </nav>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('imagens/LOGO2.jpg');">
            <div style="width: 900px;">
                <span class="login100-form-title p-b-41">
                    Indicar Orientador
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="POST" enctype="multipart/form-data" action="aprovaPO2.php">
                <div style="padding: 40px;">
                    <style type="text/css">
                        #NOMEO {
                            border-radius: 13px 0px 0px 13px;
                            width: 400px;
                            outline: none;
                        }
                        #NOMEO:hover {
                            outline: none;
                            border: 1px solid #f08324;
                        }
                        .botao {
                            background-color: #f08324;
                            padding: 3px;
                            width: 150px;
                            height: 40px;
                            border-radius: 50px;
                            color: white;
                            font-family: Serif;
                            transition: all 0.3s ease;
                        }
                        .botao:hover {
                            background-color: #028c8c;
                            transition: all 0.3s ease;
                        }
                        </style>


                    <?php while ($dado = $con4->fetch_array()) { ?>

                        <input type="hidden" name="APROVACAO" value="<?php echo $dado["aprovacao"]; ?>" /> <br />
                        <input type="hidden" name="idestagio" value="<?php echo $dado["idestagio"]; ?>" /> <br />
                        <div class="wrap-input100 validate-input" data-validate="Enter username">
                        Nome do Aluno: <?php echo $dado["nome_aluno"]; ?> <br />

                        Matricula do Aluno: <?php echo $dado["matricula"]; ?> <br />

                        Curso do Aluno: <?php echo $dado["curso"]; ?> <br />

                           Nome Empresa: <?php echo $dado["nome_empresa"]; ?> <br />

                           Início do Estágio: <?php echo mostraData($dado["inicio_estagio"]); ?> <br />

                           Fim do Estágio: <?php echo mostraData($dado["fim_estagio"]); ?> <br />

                           Carga Horária (Semanal): <?php echo $dado["carga_horaria"]; ?></div><br />

                        Selecione o Professor Orientador: <select class="input100" id="NOMEO" name="NOMEO" required>?>
                        <option disabled selected style="display: none;" value="">Selecione...</option>
                            <?php if ($cons->num_rows > 0) {
                                while ($dado = $cons->fetch_array()) { ?>
                                    <option value="<?php echo $dado["nome"]; ?>"><?php echo "Professor (a) " . $dado["nome"];
                                                                            }
                                                                        } ?></option>

                        </select>
                        <div class="container-login100-form-btn m-t-32">
                            <button class="botao" type="submit">ENVIAR</button>
                        </div>
                    <?php  } ?>

                </form>
                </p>
            </div>
</body>


</html>
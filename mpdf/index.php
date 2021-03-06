<?php
use Mpdf\Mpdf;
require_once __DIR__.'/vendor/autoload.php';

$mpdf = new Mpdf();

$css = file_get_contents('estilo.css');
// include('conexao.php');
// session_start();
// $consulta= "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]'";
// $consultaeS= "SELECT * FROM estagio WHERE cpf_usuario = '$_SESSION[CPF]'; ";
// $con= mysqli_query($conn, $consulta);
// $con2= mysqli_query($conn, $consulta);
// $con3= mysqli_query($conn, $consultaeS);

setlocale(LC_ALL, 'pt_BR');  
date_default_timezone_set('America/Sao_Paulo');
$dia = date("d");
$mes = date("m");
$ano = date("Y");
$mes = mesPortugues($mes);
$data = "$dia de $mes de $ano";

// $data = strftime('%d de %B de %Y', strtotime('today'));

// $dado = $con3 -> fetch_array();

// $html = file_get_contents('declaracao.html');

// include('conexao.php');
// session_start();
// include('conexao.php');
// $consulta= "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]'";
// $consultaeS= "SELECT * FROM estagio WHERE cpf_usuario = '$_SESSION[CPF]'; ";
// $con= mysqli_query($conn, $consulta);
// $con2= mysqli_query($conn, $consulta);
// $con3= mysqli_query($conn, $consultaeS);

// $dado = $con3 -> fetch_array();

// $pdf->SetFont('Arial', '', 8);
// //Aqui entra o while
// while($dado = $con3 -> fetch_array() ){

// $id= $dado['idestagio'];
// . $dado['nome_aluno'] .'', 'TLR', 0, 'L', 0);
// . $dado['matricula'] .'', 'TLR', 0, 'L', 0);
// . $dado['nome_orientador'] .'', 'TLR', 0, 'L', 0);
// . $dado['nome_empresa'] .'', 'TLR', 0, 'L', 0);
// .$dado['inicio_estagio'] . ' a '. $dado['fim_estagio'], 'TLR', 0, 'L', 0);
// . $dado['carga_horaria'] .'', 'TLR', 1, 'L', 0);   


//******** Anterior *********
$nome = "igor Lamoia";
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML("<header>
<img
  src='../imagens/brasao.png'
  alt='Brasão da república federativa'
  width='100px'
  height='100px'
/>
<h1>SERVIÇO PÚBLICO FEDERAL</h1>
<h1>MINISTÉRIO DA EDUCAÇÃO</h1>
<h1>CENTRO FEDERAL DE EDUCAÇÃO TECNOLÓGICA DE MINAS GERAIS</h1>
<h1>CAMPUS LEOPOLDINA</h1>
<h1>COORDEÇÃO DE PROGRAMAS DE ESTÁGIO</h1>
</header>
<div class='corpo'>
<h1 style='font-size: 2rem'>DECLARAÇÃO Nº 25/2020</h1>
<p>
  Declaramos para os devidos fins que o(a) aluno(a) participou dos
  respectivos estágios:
</p>

<table>
  <thead>
    <tr>
      <th>NOME</th>
      <th>EMPRESA</th>
      <th>PERÍODO DO ESTÁGIO</th>
      <th>CH TOTAL CUMPRIDA NO ESTÁGIO</th>
      <th>CURSO</th>
      <th>SEMINÁRIO</th>
    </tr>
  </thead>
  <tbody>
");
$count = 1;
while ($count <5 ) {
  $mpdf->WriteHTML("
  <tr>
    <td class='nome'>$nome</td>
    <td class='empresa'>CEFET-MG</td>
    <td>TEXTO</td>
    <td>TEXTO</td>
    <td class='curso'>TEXTO</td>
    <td>TEXTO</td>
  </tr>
  ");
  $count = $count + 1;
}
$mpdf->WriteHTML("
</tbody>
</table>
</div>
<p>
* Estágio em andamento e/ou com pendências na entrega da documentação;<br />
** Ainda não participou do Seminário de Conclusão.
</p>
<div class='local-data'><p>LEOPOLDINA, $data</p></div>
<div class='responsavel'>
Sueli de Oliveira ***<br />
Coordenação de programas de Estágio<br />
CEFET-MG Campos Leopoldina
</div>
<div class='informacoes'>
<h4>CENTRO FEDERAL DE EDUCAÇÃO TECNOLÓGICA DE MINAS GERAIS</h4>
<h4>CAMPOS LEOPOLDINA</h4>
<p>CNPJ: 999999</p>
<p>Diretor do Campus Leopoldina - Prof. Douglas Martins</p>
<p>Rua José Peres, 558 - Centro - Leopoldina/MG - CEP: 36773-578</p>
<p>Telefone: (32) 3449-2308 - email aqui***</p>
</div>
");
$mpdf->Output();

function mesPortugues($mes){

  switch ($mes){
    case '01':
      $mes = 'Janeiro';
    break;
    case '02':
      $mes = 'Fevereiro';
    break;
    case '03':
      $mes = 'Março';
    break;
    case '04':
      $mes = 'Abril';
    break;
    case '05':
      $mes = 'Maio';
    break;
    case '06':
      $mes = 'Junho';
    break;
    case '07':
      $mes = 'Julho';
    break;
    case '08':
      $mes = 'Agosto';
    break;
    case '09':
      $mes = 'Setembro';
    break;
    case '10':
      $mes = 'Outubro';
    break;
    case '11':
      $mes = 'Novembro';
    break;
    case '12':
      $mes = 'Dezembro';
    break;
    default:
      $mes = 'Janeiro';
    break;
  }
  return $mes;
}
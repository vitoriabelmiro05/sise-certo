<?php
require_once __DIR__.'/../conexao.php';
use Mpdf\Mpdf;
require_once __DIR__.'/vendor/autoload.php';

$mpdf = new Mpdf();

$css = file_get_contents('estilo.css');

 session_start();
$declaracao= mysqli_query($conn,"SELECT * FROM declaracao WHERE nome_prof = '$_SESSION[professor]' and ano = '$_SESSION[ano]' ;" );

 $estagio= mysqli_query($conn,"SELECT * FROM estagio WHERE nome_orientador = '$_SESSION[professor]' and date_format(inicio_estagio, '%Y') = '$_SESSION[ano]' and aprovacao = '1' ; ");


while ($dado = $declaracao->fetch_array() ) {
$data = $dado['data_atual'];
setlocale(LC_ALL, 'pt_BR');  
date_default_timezone_set('America/Sao_Paulo');
$dia = date("d");
$mes = date("m");
$ano = date("Y");
$mes = mesPortugues($mes);
$data = "$dia de $mes de $ano";
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
<h1 style='font-size: 2rem'>DECLARAÇÃO Nº $dado[numero]/$dado[ano]</h1>
<p>
  Declaramos para os devidos fins que o(a) professor(a) $dado[nome_prof] orientou os
  respectivos estágios:
</p>

<table>
  <thead>
    <tr>
      <th>NOME</th>
      <th>EMPRESA</th>
      <th>PERÍODO DO ESTÁGIO</th>
      <th>CH SEMANAL CUMPRIDA NO ESTÁGIO</th>
      <th>CURSO</th>
      
    </tr>
  </thead>
  <tbody>
");
}


while ($dado = $estagio->fetch_array() ) {
  $data_inicio = $dado['inicio_estagio'];
  $data_fim= $dado['fim_estagio'];
$dia = date("d");
$mes = date("m");
$ano = date("Y");
$data_inicio = "$dia/$mes/$ano";
$data_fim = "$dia/$mes/$ano";
$mpdf->WriteHTML($css, 1);
  $mpdf->WriteHTML("
  <tr>
    <td class='nome'>$dado[nome_aluno]</td>
    <td class='empresa'>$dado[nome_empresa]</td>
    <td>$data_inicio a $data_fim</td>
    <td>$dado[carga_horaria]</td>
    <td class='curso'>$dado[curso]</td>
    
  </tr>
  ");
  
}


$mpdf->WriteHTML("
</tbody>
</table>
</div>

<div class='local-data'><p>LEOPOLDINA, $data </p></div>
<div class='responsavel'> _________________________________________
<br />
Coordenação de programas de Estágio<br />
CEFET-MG Campos Leopoldina
</div>
<div class='informacoes'>
<h4>CENTRO FEDERAL DE EDUCAÇÃO TECNOLÓGICA DE MINAS GERAIS</h4>
<h4>CAMPOS LEOPOLDINA</h4>
<p>CNPJ: 17.220.203/0001-96</p>
<p>Diretor do Campus Leopoldina - Prof. Douglas Martins Vieira da Silva</p>
<p>Rua José Peres, 558 - Centro - Leopoldina/MG - CEP: 36700-000</p>
<p>Telefone: (32) 3449-2308 - sree@leopoldina.cefetmg.br***</p>
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
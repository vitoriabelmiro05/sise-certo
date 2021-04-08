<?php
include('fpdf/fpdf.php');
include('conexao.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_erros', 1);
// error_reporting(E_ALL); 

// require_once("config.php");

session_start();
//include('verifica_login.php');
include('conexao.php');

$consulta= "SELECT * FROM usuario WHERE cpf = '$_SESSION[CPF]'; ";
$consultaeS= "SELECT * FROM estagio; ";
$con= mysqli_query($conn, $consulta);
$con2= mysqli_query($conn, $consulta);
$con3= mysqli_query($conn, $consultaeS);

$dado = $con3 -> fetch_array();


class MYPDF extends FPDF
{

}
$pdf = new MYPDF('P'); //Colocaï¿½ï¿½o da pï¿½gina. P => normal e L => paisagem
$pdf->AddPage();

//x, y, largura, altura
$pdf->Image('imagens/brasao.png', 95, 10 , 20, 20, 'PNG');

$pdf->SetY(35);
$pdf->SetX(30);
$pdf->SetFont('Arial', 'B', 10);
$w = array(90);
$pdf->Cell(0, 5, 'SERVIÇO PÚBLICO FEDERAL', 0, 1, 'C', 0);
$pdf->Cell(0, 5, 'MINISTÉRIO DA EDUCAÇÃO', 0, 1, 'C', 0);
$pdf->Cell(0, 5, 'CENTRO FEDERAL DE EDUCAÇÃO TECNOLÓGICA DE MINAS GERAIS', 0, 1, 'C', 0);
$pdf->Cell(0, 5, 'CAMPUS LEOPOLDINA', 0, 1, 'C', 0);
$pdf->Cell(0, 5, 'COORDENAÇÃO DE PROGRAMAS DE ESTÁGIO', 0, 1, 'C', 0);

$pdf->SetFont('Arial', 'B', 16);
$pdf->SetX(30);
$w = array(90);
$pdf->ln();
$pdf->ln();
$pdf->Cell(0, 5, 'DECLACAÇÃO Nº 25/2020', 0, 1, 'C', 0);
$pdf->SetFont('Arial', '', 12);
$pdf->ln();
$pdf->SetX(30);
$pdf->MultiCell(150, 5, 'Declaramos para os devidos fins que o professor(a) ' . $dado["nome_orientador"] . ' orientou os alunos abaixo relacionados em seus respectivos estágios:', 0, 'J', 0);

$pdf->ln();
$pdf->ln();
$pdf->ln();

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(192,192,192);

$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(192,192,192);

$tamanho = 190/6;
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($tamanho, 5, 'NOME:', 'TLR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'EMPRESA:', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'PERÍODO ESTÁGIO:', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'CH TOTAL CUMPRIDA NO ESTÁGIO', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'CURSO', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'SEMINÁRIO', 'TR', 1, 'L', 0);

$pdf->SetFont('Arial', '', 8);
//Aqui entra o while
$pdf->Cell($tamanho, 5, 'ALUNA X', 'TLR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'EMPRESA Y', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'De 20/20 a 19/03', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, '*', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'ENGENHARIA DE COMPUTACAO', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, '***', 'TR', 1, 'L', 0);

$pdf->Cell(190, 5, '', 'T', 1, 'L', 0);

$pdf->Ln();
// $pdf->MultiCell(190, 5, 'lorem aoijdjadiosjidsaijdsajiadjijadijasdijdsaidsajidsjaisadjisajiasdjisajdiasjdidasjdiasjdasdasijdaisjdiasjsadidsjaidsajiojidasjdasSe eu quebro linha aqui, quebra linha no pdf Primeiro Largura, depois altura (no MultiCell tanto faz depois o que tem q escrever, se vai colocar bora,texto alinhado L esquerda, C centralizado, J justificado, e no fim bota 0 pra n ter cor', 1, 'C', 0);


$pdf->Output('fichaCadastral' . '.pdf', 'I'); //I exibe na prï¿½pria aba e 'D', forï¿½a um download

?>
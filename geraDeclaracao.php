<?php
header ('Content-type: text/html; charset=UTF-8');
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
$consultaeS= "SELECT * FROM estagio WHERE cpf_usuario = '$_SESSION[CPF]'; ";
$con= mysqli_query($conn, $consulta);
$con2= mysqli_query($conn, $consulta);
$con3= mysqli_query($conn, $consultaeS);

$dado = $con3 -> fetch_array();


class MYPDF extends FPDF
{

}
$pdf = new MYPDF('P'); //Coloca��o da p�gina. P => normal e L => paisagem
$pdf->AddPage();

//x, y, largura, altura
$pdf->Image('imagens/brasao.png', 95, 10 , 20, 20, 'PNG');

$pdf->SetY(35);
$pdf->SetX(30);
$pdf->SetFont('Arial', 'B', 10);
$w = array(90);
$pdf->Cell(0, 5, 'SERVI�O P�BLICO FEDERAL', 0, 1, 'C', 0);
$pdf->Cell(0, 5, 'MINIST�RIO DA EDUCA��O', 0, 1, 'C', 0);
$pdf->Cell(0, 5, 'CENTRO FEDERAL DE EDUCA��O TECNOL�GICA DE MINAS GERAIS', 0, 1, 'C', 0);
$pdf->Cell(0, 5, 'CAMPUS LEOPOLDINA', 0, 1, 'C', 0);
$pdf->Cell(0, 5, 'COORDENA��O DE PROGRAMAS DE EST�GIO', 0, 1, 'C', 0);

$pdf->SetFont('Arial', 'B', 16);
$pdf->SetX(30);
$w = array(90);
$pdf->ln();
$pdf->ln();
$pdf->Cell(0, 5, 'DECLACA��O N� 25/2020', 0, 1, 'C', 0);
$pdf->SetFont('Arial', '', 12);
$pdf->ln();
$pdf->SetX(30);
$pdf->MultiCell(150, 5, 'Declaramos para os devidos fins que o(a) aluno(a) ' . $dado["nome_aluno"] . ' participou dos respectivos est�gios:', 0, 'J', 0);

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
$pdf->Cell($tamanho, 5, 'PER�ODO EST�GIO:', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'CH TOTAL CUMPRIDA NO EST�GIO', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'CURSO', 'TR', 0, 'L', 0);
$pdf->Cell($tamanho, 5, 'SEMIN�RIO', 'TR', 1, 'L', 0);

$pdf->SetFont('Arial', '', 8);
//Aqui entra o while
while($dado = $con3 -> fetch_array() ){

    $id= $dado["idestagio"];


    $pdf->Cell($tamanho, 5, ''. $dado["nome_aluno"] .'', 'TLR', 0, 'L', 0);
    $pdf->Cell($tamanho, 5, ' '. $dado["matricula"] .'', 'TLR', 0, 'L', 0);
    $pdf->Cell($tamanho, 5, ' '. $dado["nome_orientador"] .'', 'TLR', 0, 'L', 0);
    $pdf->Cell($tamanho, 5, ''. $dado["nome_empresa"] .'', 'TLR', 0, 'L', 0);
    $pdf->Cell($tamanho, 5, '' .$dado["inicio_estagio"] . ' a '. $dado["fim_estagio"], 'TLR', 0, 'L', 0);
    $pdf->Cell($tamanho, 5, '' . $dado["carga_horaria"] .'', 'TLR', 1, 'L', 0);   
    
   }

$pdf->Cell(190, 5, '', 'T', 1, 'L', 0);

$pdf->Ln();
// $pdf->MultiCell(190, 5, 'lorem aoijdjadiosjidsaijdsajiadjijadijasdijdsaidsajidsjaisadjisajiasdjisajdiasjdidasjdiasjdasdasijdaisjdiasjsadidsjaidsajiojidasjdasSe eu quebro linha aqui, quebra linha no pdf Primeiro Largura, depois altura (no MultiCell tanto faz depois o que tem q escrever, se vai colocar bora,texto alinhado L esquerda, C centralizado, J justificado, e no fim bota 0 pra n ter cor', 1, 'C', 0);


$pdf->Output('fichaCadastral' . '.pdf', 'I'); //I exibe na pr�pria aba e 'D', for�a um download

?>
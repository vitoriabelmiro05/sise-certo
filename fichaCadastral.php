<?php
include('fpdf/fpdf.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_erros', 1);
// error_reporting(E_ALL); 

// require_once("config.php");

class MYPDF extends FPDF
{

}
$pdf = new MYPDF('P'); //Coloca��o da p�gina. P => normal e L => paisagem



$pdf->AddPage();

$pdf->Image('imagens/LOGO.png', 10, 5, 35, 20, 'PNG');

$pdf->SetY(25);
$pdf->SetX(10);
$pdf->SetFont('Times', '', 14);
$w = array(90);
$pdf->Cell(0, 2, 'FICHA CADASTRAL', 0, 1, 'L', 0);
$pdf->ln();
$pdf->ln();
$pdf->SetFont('Times', 'B', 16);
$pdf->SetX(10);
$w = array(90);
$pdf->Cell(0, 2, 'PESSOA F�SICA', 0, 1, 'L', 0);
$pdf->ln();
$pdf->ln();

$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->ln();
$pdf->ln();

$pdf->SetFont('Times', 'B', 12);
$pdf->SetFillColor(192,192,192);
$w = array(37, 58, 58, 37);
$pdf->Cell($w[0], 5, 'Uso exclusivo ', 'TLR', 0, 'C', 1);
$pdf->Cell($w[1], 5, '', 'LTR', 0, 'L', 1);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[2], 5, 'Tipo de Cliente ', 'TLR', 0, 'R', 1);
$pdf->Cell($w[3], 5, 'C�digo do Cliente', 'LTR', 1, 'R', 1);

$pdf->SetFont('Times', '', 10);
$pdf->SetFillColor(192,192,192);
$w = array(37,5,5,17,5,26,5,5,17,5,26,37);
$pdf->Cell($w[0], 5, '', 'LR', 0, 'C', 1);
$pdf->SetFont('Times', '', 9);
$pdf->Cell($w[1], 5, '', 'L', 0, 'L', 1);
$pdf->Cell($w[2], 5, '', 1, 0, 'L', 1); //CHECKOUT
$pdf->Cell($w[3], 5, '  Abertura   ', 0, 0, 'L',1);
$pdf->Cell($w[4], 5, '', 1, 0, 'L', 1);  //CHECKOUT
$pdf->Cell($w[5], 5, '  Atualiza��o   ', 0, 0, 'L', 1);
$pdf->Cell($w[6], 5, '', 'L', 0, 'L', 1);
$pdf->Cell($w[7], 5, '', 1, 0, 'L', 1); //CHECKOUT
$pdf->Cell($w[8], 5, '  Tomador      ', 0, 0, 'L', 1);
$pdf->Cell($w[9], 5, '', 1, 0, 'L', 1); //CHECKOUT
$pdf->Cell($w[10], 5, '  Avalista   ', 0, 0, 'L', 1);
$pdf->Cell($w[11], 5, '', 'LR', 1, 'C', 1);

$pdf->SetFont('Times', '', 10);
$pdf->SetFillColor(192,192,192);
$w = array(37, 58, 58, 37);
$pdf->Cell($w[0], 3, '', 'BLR', 0, 'L', 1);
$pdf->Cell($w[1], 3, '', 'LBR', 0, 'L', 1);
$pdf->Cell($w[2], 3, '', 'LBR', 0, 'L', 1);
$pdf->Cell($w[3], 3, '', 'LBR', 1, 'L', 1);
$pdf->Ln();
$pdf->Ln();
//$pdf->ln();
//$pdf->ln();
//$pdf->ln();

$pdf->SetFont('Times', 'B', 11);
$w = array(190);
$pdf->Cell($w[0], 5, utf8_encode('DADOS PESSOAIS '), 0, 1, 'L', 0);
$w = array(140,50);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[0], 5, 'Nome Completo:', 'TLR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'CPF:', 'TR', 1, 'L', 0);

$w = array(95,95);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[0], 5, 'Nome do pai:', 'TLR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Nome do m�e:', 'TR', 1, 'L', 0);

$w = array(45,50,95);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[0], 5, 'Data de Nascimento:', 'TLR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Nacionalidade:', 'TR', 0, 'L', 0);
$pdf->Cell($w[2], 5, 'Naturalidade: (munic�pio)', 'TR', 1, 'L', 0);

$w = array(45,50,95);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[0], 5, 'Sexo:', 'TLR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Estado Civil:', 'TR', 0, 'L', 0);
$pdf->Cell($w[2], 5, 'Nome do c�njuge ou companheiro(a): Avalista', 'TR', 1, 'L', 0);

$w = array(45,50,95);
$pdf->Cell($w[0], 2, '', 'LR', 0, 'L', 0);
$pdf->Cell($w[1], 2, '', 'R', 0, 'L', 0);
$pdf->Cell($w[2], 2, '', 'R', 1, 'L', 0);

$w = array(3,5,16,5,16,50,95);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[0], 5, '','L', 0, 'L', 0);
$pdf->SetFont('Times', '', 15);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[2], 5,  ' Masculino', 0, 0, 'L', 0);
$pdf->SetFont('Times', '', 15);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[4], 5,  ' Feminino', 0, 0, 'L', 0);

$pdf->Ln();
$pdf->MultiCell(190, 5, 'lorem aoijdjadiosjidsaijdsajiadjijadijasdijdsaidsajidsjaisadjisajiasdjisajdiasjdidasjdiasjdasdasijdaisjdiasjsadidsjaidsajiojidasjdasSe eu quebro linha aqui, quebra linha no pdf Primeiro Largura, depois altura (no MultiCell tanto faz depois o que tem q escrever, se vai colocar bora,texto alinhado L esquerda, C centralizado, J justificado, e no fim bota 0 pra n ter cor', 1, 'C', 0);

$pdf->Output('fichaCadastral' . '.pdf', 'I'); //I exibe na pr�pria aba e 'D', for�a um download

?>
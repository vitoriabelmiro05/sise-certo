<?php
include('fpdf/fpdf.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_erros', 1);
// error_reporting(E_ALL); 

// require_once("config.php");

//$cod = $_GET["cod"];
class MYPDF extends FPDF
{
   //Cabe�alho com a logo
   public function Header()
   {

      if($this->PageNo() >= 2 And $this->PageNo() <= 6)
      {
         $this->SetFont('Times', 'B', 11);
         $this->SetY(3);
      }

      if($this->PageNo() == 1)
      {
         $this->SetFont('Times', 'B', 12);
         $this->SetY(5);

         $this->ln(3);

      }

      if($this->PageNo() == 2 Or $this->PageNo() == 3 Or $this->PageNo() == 4)
      {
      }

      if($this->PageNo() == 2 Or $this->PageNo() == 5)
      {
         $this->ln(1);

      }
      if($this->PageNo() == 4 Or $this->PageNo() == 7)
      {
         $this->ln(1);
         $this->SetFont('Times', 'B', 12);

         $this->ln(1);
      }

   }


}
$pdf = new MYPDF('P'); //Coloca��o da p�gina. P => normal e L => paisagem



$pdf->AddPage();

/*$pdf->Image('img/logoLiberty_.png', 10, 5, 35, 20, 'PNG'); */
$pdf->SetY(12);
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
$pdf->Cell($w[0], 5, utf8_encode('Uso exclusivo '), 'TLR', 0, 'C', 1);
$pdf->Cell($w[1], 5, utf8_encode(''), 'LTR', 0, 'L', 1);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[2], 5, 'Tipo de Cliente ', 'TLR', 0, 'R', 1);
$pdf->Cell($w[3], 5, 'C�digo do Cliente', 'LTR', 1, 'R', 1);

$pdf->SetFont('Times', '', 10);
$pdf->SetFillColor(192,192,192);
$w = array(37,5,5,17,5,26,5,5,17,5,26,37);
$pdf->Cell($w[0], 5, utf8_encode(''), 'LR', 0, 'C', 1);
$pdf->SetFont('Times', '', 9);
$pdf->Cell($w[1], 5, utf8_encode(''), 'L', 0, 'L', 1);
$pdf->Cell($w[2], 5, utf8_encode(''), 1, 0, 'L', 1); //CHECKOUT
$pdf->Cell($w[3], 5, utf8_encode('  Abertura   '), 0, 0, 'L',1);
$pdf->Cell($w[4], 5, utf8_encode(''), 1, 0, 'L', 1);  //CHECKOUT
$pdf->Cell($w[5], 5, '  Atualiza��o   ', 0, 0, 'L', 1);
$pdf->Cell($w[6], 5, utf8_encode(''), 'L', 0, 'L', 1);
$pdf->Cell($w[7], 5, utf8_encode(''), 1, 0, 'L', 1); //CHECKOUT
$pdf->Cell($w[8], 5, utf8_encode('  Tomador      '), 0, 0, 'L', 1);
$pdf->Cell($w[9], 5, utf8_encode(''), 1, 0, 'L', 1); //CHECKOUT
$pdf->Cell($w[10], 5, utf8_encode('  Avalista   '), 0, 0, 'L', 1);
$pdf->Cell($w[11], 5, utf8_encode(''), 'LR', 1, 'C', 1);

$pdf->SetFont('Times', '', 10);
$pdf->SetFillColor(192,192,192);
$w = array(37, 58, 58, 37);
$pdf->Cell($w[0], 3, utf8_encode(''), 'BLR', 0, 'L', 1);
$pdf->Cell($w[1], 3, utf8_encode(''), 'LBR', 0, 'L', 1);
$pdf->Cell($w[2], 3, utf8_encode(''), 'LBR', 0, 'L', 1);
$pdf->Cell($w[3], 3, utf8_encode(''), 'LBR', 1, 'L', 1);
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



$w = array(45,50,95);
$pdf->Cell($w[0], 5, '', 'LBR', 0, 'L', 0);
$pdf->Cell($w[1], 5, '', 'BR', 0, 'L', 0);
$pdf->Cell($w[2], 5, '', 'BR', 1, 'L', 0);

$w = array(80,40,25,20,25);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[0], 5, 'Tipo de Documento: (RG, CNH, entidade de classe)', 'LTR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'N� de registro:', 'TR', 0, 'L', 0);
$pdf->Cell($w[2], 5, '�rg�o emissor:', 'TR', 0, 'L', 0);
$pdf->Cell($w[3], 5, 'UF:', 'TR', 0, 'L', 0);
$pdf->Cell($w[4], 5, 'Data de emiss�o:', 'TR', 1, 'L', 0);
//$pdf->Footer();

$pdf->Output('fichaCadastral' . '.pdf', 'I'); //I exibe na pr�pria aba e 'D', for�a um download

?>
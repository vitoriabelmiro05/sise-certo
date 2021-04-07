<?php

error_reporting(E_ERROR);
ini_set('display_errors', 1);

function mostraData($data)
{
   if($data != '')
   {return (substr($data, 8, 2) . '/' . substr($data, 5, 2) . '/' . substr($data, 0, 4));}
}

// Adicionado 20/07/2020 - afim de reemetir vias de seguro geradas com informa��o errada.

include_once("conexao.php");
include_once('fpdf.php');
//include_once('tcpdf/tcpdf_include.php');
require_once("config.php");
global $DbName;

//$cod = $_GET["cod"];
class MYPDF extends FPDF
{
   public $assinatura;




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
         $this->Image('img/logoempresa.png', 155, 8, 45, 15, 'PNG');
         $this->SetY(5);

         $this->ln(3);

      }

      if($this->PageNo() == 2 Or $this->PageNo() == 3 Or $this->PageNo() == 4)
      {
         $this->Image('img/logoempresa.png', 155, 8, 45, 15, 'PNG');
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

//$diretorio = "../webagenteA/propostas/" . $cod . "/" . 'assinaturaCorrigida.png';

$pdf->assinatura = $diretorio;







$cod = $_GET["cod"];
$cod = $_GET["cod"];
$sql = "Select Concat('R$ ', format(pc.TOT_LIQUIDO, 2, 'de_DE')) AS TOT_LIQUIDO,r.* from " . $DbName . ".rup r
Inner join " . $DbName . ".propostas p On r.CPFCNPJ = p.CPFCNPJ
INNER JOIN " . $DbName . ".propostaconsignado pc ON pc.CODPROPOSTA = p.CODPROPOSTA
Where p.CODPROPOSTA = $cod";

$qrrup = mysql_query($sql);
$campos = mysql_fetch_array($qrrup);

$sql = "Select VL_SALARIO from " . $DbName . ".propostaconsignado Where CODPROPOSTA = $cod";

$qr = mysql_query($sql);
$sal = mysql_fetch_array($qr);

/*echo $cod.'<br>'.$campos['CPFCNPJ'].'<br>'.$sql;
exit();*/

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
$pdf->Cell($w[0], 5, $campos["NOME"], 'LR', 0, 'L', 0);
$pdf->Cell($w[1], 5, $campos["CPFCNPJ"], 'R', 1, 'L', 0);

$w = array(95,95);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[0], 5, 'Nome do pai:', 'TLR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Nome do m�e:', 'TR', 1, 'L', 0);
$pdf->Cell($w[0], 5, $campos["PAI"], 'LR', 0, 'L', 0);
$pdf->Cell($w[1], 5, $campos["MAE"], 'R', 1, 'L', 0);

$w = array(45,50,95);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[0], 5, 'Data de Nascimento:', 'TLR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Nacionalidade:', 'TR', 0, 'L', 0);
$pdf->Cell($w[2], 5, 'Naturalidade: (munic�pio)', 'TR', 1, 'L', 0);
$pdf->Cell($w[0], 5, mostraData($campos["NASCIMENTO"]), 'LR', 0, 'L', 0);
$pdf->Cell($w[1], 5, $campos["NACIONALIDADE"], 'R', 0, 'L', 0);
$pdf->Cell($w[2], 5, $campos["NATURALIDADE"], 'R', 1, 'L', 0);

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
$pdf->Cell($w[1], 5, ($campos['SEXO'] == 'M'? 'X': ' '), 1, 0, 'C', 0);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[2], 5,  ' Masculino', 0, 0, 'L', 0);
$pdf->SetFont('Times', '', 15);
$pdf->Cell($w[3], 5, ($campos['SEXO'] == 'F'? 'X': ' ') , 1, 0, 'C', 0);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[4], 5,  ' Feminino', 0, 0, 'L', 0);


$pdf->Cell($w[5], 5, $campos["ESTADO_CIVIL"], 'LR', 0, 'L', 0);
$pdf->Cell($w[6], 5, $campos["NOMECONJUGE"], 'R', 1, 'L', 0);

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

$w = array(80,40,25,20,25);
$pdf->Cell($w[0], 5, $campos["RG"]==''?'':'RG', 'LBR', 0, 'L', 0);
$pdf->Cell($w[1], 5, $campos["RG"], 'BR', 0, 'L', 0);
$pdf->Cell($w[2], 5, $campos["ORGAORG"], 'BR', 0, 'L', 0);
$pdf->Cell($w[3], 5, $campos["UF"], 'BR', 0, 'L', 0);
$pdf->Cell($w[4], 5, $campos["DATA_EXPRG"], 'BR', 1, 'L', 0);

$w = array(40,38,112);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[0], 5, 'Telefone: (DDD+N�)', 'LR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Celular: (DDD+N�)', 'R', 0, 'L', 0);
$pdf->Cell($w[2], 5, 'E-mail:', 'R', 1, 'L', 0);

$w = array(40,38,112);
$pdf->SetFont('Times', '', 8);
$pdf->Cell($w[0], 5, '('.$campos["DDDFONERES"].') '.$campos["FONERES"], 'LBR', 0, 'L', 0);
$pdf->Cell($w[1], 5, '('.$campos["DDDCELULAR"].') '.$campos["FONECEL"] , 'BR', 0, 'L', 0);
$pdf->Cell($w[2], 5, $campos[EMAIL], 'BR', 1, 'L', 0);

$pdf->Ln();
//$pdf->Ln();

$pdf->SetFont('Times', 'B', 11);
$w = array(190);
$pdf->Cell($w[0], 5, 'DADOS DE ENDERE�O PARA CORRESPOND�NCIA ', 0, 1, 'L', 0);
$pdf->SetFont('Times', '', 9);
$pdf->SetTextColor(128,128,128);
$pdf->Cell($w[0], 5,'Dever� ser apresentado o comprovante para o respectivo endere�o ', 0, 1, 'L', 0);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times', '', 8);
$w = array(100,40,50);
$pdf->Cell($w[0], 5, utf8_encode('Logradouro: (rua, avenida)  '), 'LTR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'N�mero:  ', 'TR', 0, 'L', 0);
$pdf->Cell($w[2], 5, utf8_encode('Complemento:  '), 'TR', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(100,40,50);
$pdf->Cell($w[0], 5, $campos["ENDERECO"], 'LR',0, 'L', 0);
$pdf->Cell($w[1], 5, $campos["NUMENDERECO"], 'R',0, 0);
$pdf->Cell($w[2], 5, $campos["COMPLEMENTO"], 'R', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(50,50,40,50);
$pdf->Cell($w[0], 5, utf8_encode('Bairro:  '), 'LTR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Cidade:  ', 'TR', 0, 'L', 0);
$pdf->Cell($w[2], 5, utf8_encode('UF:  '), 'TR', 0, 'L', 0);
$pdf->Cell($w[3], 5, utf8_encode('CEP:  '), 'TR', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(50,50,40,50);
$pdf->Cell($w[0], 5, $campos["BAIRRO"], 'LBR', 0, 'L', 0);
$pdf->Cell($w[1], 5, $campos["CIDADE"], 'BR', 0, 'L', 0);
$pdf->Cell($w[2], 5, $campos["UF"], 'BR', 0, 'L', 0);
$pdf->Cell($w[3], 5, $campos["CEP"], 'BR', 1, 'L', 0);

$pdf->Ln();
//$pdf->Ln();

$pdf->SetFont('Times', 'B', 11);
$w = array(190);
$pdf->Cell($w[0], 5, 'DADOS DE ENDERE�O COMERCIAL ', 0, 1, 'L', 0);
$pdf->SetFont('Times', '', 9);
$pdf->SetTextColor(128,128,128);
$pdf->Cell($w[0], 5,'Dever� ser apresentado o comprovante para o respectivo endere�o ', 0, 1, 'L', 0);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times', '', 8);
$w = array(100,40,50);
$pdf->Cell($w[0], 5, utf8_encode('Logradouro: (rua, avenida)  '), 'LTR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'N�mero:  ', 'TR', 0, 'L', 0);
$pdf->Cell($w[2], 5, utf8_encode('Complemento:  '), 'TR', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(100,40,50);
$pdf->Cell($w[0], 5, '', 'LR',0, 'L', 0);
$pdf->Cell($w[1], 5, '', 'R',0, 'L', 0);
$pdf->Cell($w[2], 5, '', 'R', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(50,50,40,50);
$pdf->Cell($w[0], 5, utf8_encode('Bairro:  '), 'LTR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Cidade:  ', 'TR', 0, 'L', 0);
$pdf->Cell($w[2], 5, utf8_encode('UF:  '), 'TR', 0, 'L', 0);
$pdf->Cell($w[3], 5, utf8_encode('CEP:  '), 'TR', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(50,50,40,50);
$pdf->Cell($w[0], 5, '', 'LBR', 0, 'L', 0);
$pdf->Cell($w[1], 5, '', 'BR', 0, 'L', 0);
$pdf->Cell($w[2], 5, '', 'BR', 0, 'L', 0);
$pdf->Cell($w[3], 5, '', 'BR', 1, 'L', 0);

$pdf->Ln();
//$pdf->Ln();

$pdf->SetFont('Times', 'B', 11);
$w = array(190);
$pdf->Cell($w[0], 5,'DADOS PROFISSIONAIS ', 0, 1, 'L', 0);
$pdf->SetFont('Times', '', 8);
$w = array(95,95);
$pdf->Cell($w[0], 5, 'Forma��o: (advogado, engenheiro, m�dico, etc.) ', 'LRT', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Ocupa��o: (gerente, analista, assistente auxiliar, aut�nomo, estudante, etc.) ', 'TR', 1, 'L', 0);

$w = array(95,95);
$pdf->Cell($w[0], 5,  $campos["PROFISSAO"], 'RL', 0, 'L', 0);
$pdf->Cell($w[1], 5, $campos["OCUPACAO"], 'R', 1, 'L', 0);


$w = array(190);
$pdf->Cell($w[0], 5, 'Entidade para qual trabalha:', 'TRL', 1, 'L', 0);
$w = array(190);
$pdf->Cell($w[0], 5,  $campos["EMPRESATRABALHA"], 'BRL', 1, 'L', 0);

$pdf->Ln();
//$pdf->Ln();

$pdf->SetFont('Times', 'B', 11);
$w = array(190);
$pdf->Cell($w[0], 5,'SITUA��O FINANCEIRA PATRIMONIAL ', 0, 1, 'L', 0);
$pdf->SetFont('Times', '', 8);
$w = array(140,50);
$pdf->Cell($w[0], 7, 'Renda mensal (sal�rio, pr�-labore, etc.) ', 'LRT', 0, 'L', 0);
$pdf->Cell($w[1], 7, 'R$ ' .$sal["VL_SALARIO"], 'TR', 1, 'L', 0);

$w = array(140,50);
$pdf->Cell($w[0], 7, 'Bens m�veis (carro, moto, lancha, etc.) ', 'LRT', 0, 'L', 0);
$pdf->Cell($w[1], 7, 'R$', 'TR', 1, 'L', 0);

$w = array(140,50);
$pdf->Cell($w[0], 7, 'Bens im�veis (casa, terreno, apartamento, etc.) ', 'LRT', 0, 'L', 0);
$pdf->Cell($w[1], 7, 'R$ ', 'TR', 1, 'L', 0);

$w = array(140,50);
$pdf->Cell($w[0], 7, 'Aplica��es financeiras / Conta corrente (montante em conta corrente, a��es, t�tulos de renda fixa, fundos,etc.)', 'LRT', 0, 'L', 0);
$pdf->Cell($w[1], 7, 'R$ ', 'TR', 1, 'L', 0);

$w = array(140,50);
$pdf->Cell($w[0], 7, 'Outros rendimentos (aluguel, mesada, pens�o, aposentadoria, etc.) ', 'LRTB', 0, 'L', 0);
$pdf->Cell($w[1], 7, 'R$', 'TRB', 1, 'L', 0);


$pdf->AddPage();

/*$pdf->Image('img/logoLiberty_.png', 10, 5, 35, 20, 'PNG');  */
$pdf->SetY(12);
$pdf->SetX(50);
$pdf->SetFont('Times', '', 14);
//$pdf->Cell(0, 2, utf8_encode('Aviso para Concess�o de Benef�cio'), 0, 0, 'L');
$pdf->ln();
$pdf->SetFont('Times', '', 10);
$pdf->SetX(50);
//$pdf->Cell(0, 2, 'MA - Morte Acidental', 0, 0, 'L');
$pdf->ln();
//$pdf->ln();

$pdf->SetFont('Times', 'B', 11);
$w = array(190);
$pdf->Cell($w[0], 5,'DADOS BANC�RIOS ', 0, 1, 'L', 0);
$pdf->SetFont('Times', '', 9);
$pdf->SetTextColor(128,128,128);
$w = array(190);
$pdf->Cell($w[0], 5,'Indique as contas banc�rias para as suas movimenta��es financeiras na FID�CIA SCMEPP. Apenas uma conta poder� ser marcada como principal ', 0, 1, 'L', 0);

$pdf->SetTextColor(0,0,0);

$pdf->SetFont('Times', '', 8);
$w = array(25,25,25,25,25,65);
$pdf->Cell($w[0], 5, 'Conta Principal', 'LRTB', 0, 'C', 0);
$pdf->Cell($w[1], 5, 'C�d/Banco ', 'RTB', 0, 'C', 0);
$pdf->Cell($w[2], 5, 'Ag�ncia ', 'RTB', 0, 'C', 0);
$pdf->Cell($w[3], 5, 'N� Conta ', 'RTB', 0, 'C', 0);
$pdf->Cell($w[4], 5, 'Conta Conjunta ', 'RTB', 0, 'C', 0);
$pdf->Cell($w[5], 5, 'Nome do co-titular ', 'RTB', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(25,25,25,25,25,65);
$pdf->Cell($w[0], 2, '', 'LR', 0, 'C', 0);
$pdf->Cell($w[1], 2, ' ', 'R', 0, 'C', 0);
$pdf->Cell($w[2], 2, '', 'R', 0, 'C', 0);
$pdf->Cell($w[3], 2, ' ', 'R', 0, 'C', 0);
$pdf->Cell($w[4], 2, ' ', 'R', 0, 'C', 0);
$pdf->Cell($w[5], 2, ' ', 'R', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(9,7,9,25,25,25,9,7,9,65);
$pdf->Cell($w[0], 5, '', 'L', 0, 'C', 0);
$pdf->Cell($w[1], 5, ' ', 1, 0, 'C', 0);   //CHECKOUT
$pdf->Cell($w[2], 5, '', 'R', 0, 'C', 0);
$pdf->Cell($w[3], 5, $campos["CODBANCO"], 'R', 0, 'C', 0); -
$pdf->Cell($w[4], 5, $campos["NUM_AGENCIA"], 'R', 0, 'C', 0); -
$pdf->Cell($w[5], 5, $campos["NUM_CONTA"], 'R', 0, 'C', 0); -
$pdf->Cell($w[6], 5, ' ', 0, 0, 'C', 0);
$pdf->Cell($w[7], 5, ' ', 1, 0, 'C', 0);   //CHECKOUT
$pdf->Cell($w[8], 5, ' ', 'R', 0, 'C', 0);
$pdf->Cell($w[9], 5, ' ', 'R', 1, 'L', 0);


$pdf->SetFont('Times', '', 8);
$w = array(25,25,25,25,25,65);
$pdf->Cell($w[0], 2, '', 'LRB', 0, 'C', 0);
$pdf->Cell($w[1], 2, ' ', 'RB', 0, 'C', 0);
$pdf->Cell($w[2], 2, '', 'RB', 0, 'C', 0);
$pdf->Cell($w[3], 2, ' ', 'RB', 0, 'C', 0);
$pdf->Cell($w[4], 2, ' ', 'RB', 0, 'C', 0);
$pdf->Cell($w[5], 2, ' ', 'RB', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(25,25,25,25,25,65);
$pdf->Cell($w[0], 2, '', 'LR', 0, 'C', 0);
$pdf->Cell($w[1], 2, ' ', 'R', 0, 'C', 0);
$pdf->Cell($w[2], 2, '', 'R', 0, 'C', 0);
$pdf->Cell($w[3], 2, ' ', 'R', 0, 'C', 0);
$pdf->Cell($w[4], 2, ' ', 'R', 0, 'C', 0);
$pdf->Cell($w[5], 2, ' ', 'R', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(9,7,9,25,25,25,9,7,9,65);
$pdf->Cell($w[0], 5, '', 'L', 0, 'C', 0);
$pdf->Cell($w[1], 5, ' ', 1, 0, 'C', 0);   //CHECKOUT
$pdf->Cell($w[2], 5, '', 'R', 0, 'C', 0);
$pdf->Cell($w[3], 5, ' ', 'R', 0, 'C', 0); -
$pdf->Cell($w[4], 5, ' ', 'R', 0, 'C', 0); -
$pdf->Cell($w[5], 5, ' ', 'R', 0, 'C', 0); -
$pdf->Cell($w[6], 5, ' ', 0, 0, 'C', 0);
$pdf->Cell($w[7], 5, ' ', 1, 0, 'C', 0);   //CHECKOUT
$pdf->Cell($w[8], 5, ' ', 'R', 0, 'C', 0);
$pdf->Cell($w[9], 5, ' ', 'R', 1, 'L', 0);


$pdf->SetFont('Times', '', 8);
$w = array(25,25,25,25,25,65);
$pdf->Cell($w[0], 2, '', 'LRB', 0, 'C', 0);
$pdf->Cell($w[1], 2, ' ', 'RB', 0, 'C', 0);
$pdf->Cell($w[2], 2, '', 'RB', 0, 'C', 0);
$pdf->Cell($w[3], 2, ' ', 'RB', 0, 'C', 0);
$pdf->Cell($w[4], 2, ' ', 'RB', 0, 'C', 0);
$pdf->Cell($w[5], 2, ' ', 'RB', 1, 'L', 0);

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times', 'B', 11);
$w = array(190);
$pdf->Cell($w[0], 5,'DADOS DE IDENTIFICA��O DO REPRESENTANTE/ PROCURADOR (SE HOUVER) ', 0, 1, 'L', 0);
$pdf->Cell($w[0], 5,' ', 0, 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(100,45,45);
$pdf->Cell($w[0], 5,'Nome completo: ', 'LTR', 0, 'L', 0);
$pdf->Cell($w[1], 5,'N� do documento de identifica��o: ', 'RT', 0, 'L', 0);
$pdf->Cell($w[2], 5,'CPF: ', 'RT', 1, 'L', 0);

$w = array(100,45,45);
$pdf->Cell($w[0], 5,'','RLB', 0, 'L', 0);
$pdf->Cell($w[1], 5,' ', 'RB', 0, 'L', 0);
$pdf->Cell($w[2], 5,' ', 'RB', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(190);
$pdf->Cell($w[0], 5,'E-mail: ', 'LR', 1, 'L', 0);
$pdf->Cell($w[0], 5,'', 'LRB', 1, 'L', 0);

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times', 'B', 11);
$w = array(190);
$pdf->Cell($w[0], 5,'DECLARA��O DO CLIENTE ', 0, 1, 'L', 0);
$pdf->Cell($w[0], 5,' ', 0, 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(190);
$pdf->Multicell($w[0], 5,"Autorizo a verifica��o de meu nome no quadro de pessoa politicamente exposta (Conforme previs�o na Circular 3.978/2020, do BANCO CENTRAL DO BRASIL). \n\nAutorizo a pesquisa dos cr�ditos registrado em meu nome no SCR � consoante ao previsto na Resolu��o 4.571, do BANCO CENTRAL DO BRASIL � e em demais bureaus de cr�dito. \n\nAutorizo o compartilhamento de meus dados com todos os part�cipes na opera��o, que ora contrato com a FID�CIA SCMEPP. \n\nDeclaro serem verdadeiras as informa��es prestadas e aut�nticos os documentos apresentados, responsabilizando-me na forma da lei (Artigo 299 do C�digo Penal). Estou ciente de que os dados cadastrais por mim fornecidos servir�o de base para a confec��o de meu cadastro e desde j�, autorizo a fazer o uso de todas as informa��es nele contidas para eventual cobran�a, atrav�s de terceiros pela Fid�cia contratados. \n\nAsseguro que os recursos decorrentes do empr�stimo ou financiamento por mim tomado n�o ser� destinado a finalidades que possam causar danos socioambientais e/ou projetos em desacordo com as Pol�ticas Nacionais Socioambientais previstas em Lei e normativos do BANCO CENTRAL DO BRASIL, que n�o utilizarei, de forma direta ou indireta, os recursos disponibilizados para a pr�tica de ato que atente contra o patrim�nio p�blico nacional ou estrangeiro, contra princ�pios da administra��o p�blica ou contra os compromissos internacionais assumidos pelo Brasil. Que n�o destinarei esse recurso para o financiamento de pr�ticas il�citas, mas sim, que em sua totalidade, esse cr�dito por mim tomado ser� utilizado de forma produtiva, buscando retornos tang�veis e intang�veis. \n\nDeclara��o de Ci�ncia do CET: Declaro receber nessa oportunidade todas as informa��es acerca do Custo Efetivo Total-CET, porcentagem anual a ser paga na contrata��o de uma opera��o de cr�dito e engloba todos os encargos e despesas incidentes nas opera��es de cr�dito, juros remunerat�rios, tarifas, seguro, IOF e registro." , 1, 'J', 0);

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times', '', 8);
$w = array(50,140);
$pdf->Cell($w[0], 5,'Local e Data: ', 'LTR', 0, 'L', 0);
$pdf->Cell($w[1], 5,'Assinatura do Cliente: ', 'TR', 1, 'L', 0);
$pdf->Cell($w[0], 5,'', 'LRB', 0, 'L', 0);
$pdf->Cell($w[1], 5,'', 'RB', 1, 'L', 0);

$pdf->Ln();
$pdf->Ln(0.5);

$pdf->SetFont('Times', 'B', 8);
$w = array(190);
$pdf->Cell($w[0], 5,'DECLARA��O DO RESPONS�VEL PELO CADASTRAMENTO (USO EXCLUSIVO DA FID�CIA SCMEPP) ', 0, 1, 'L', 0);
$pdf->Cell($w[0], 5,' ', 0, 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(190);
$pdf->Multicell($w[0], 5,'Responsabilizo-me pela confer�ncia e exatid�o das informa��es constantes na ficha, bem como pelos elementos de identifica��o e das demais informa��es apresentadas. ', 'LTR', 'L', 0);
//$pdf->Ln(1);
$pdf->Cell($w[0], 5,' ', 'LBR', 1, 'L', 0);

$pdf->SetFont('Times', '', 8);
$w = array(50,140);
$pdf->Cell($w[0], 5,'Local e Data: ', 'LTR', 0, 'L', 0);
$pdf->Cell($w[1], 5,'Departamento de Normas FID�CIA SCMEPP ', 'TR', 1, 'L', 0);
$pdf->Cell($w[0], 5,'', 'LRB', 0, 'L', 0);
$pdf->Cell($w[1], 5,'', 'RB', 1, 'L', 0);

//$pdf->Footer();




$pdf->Output('fichaCadastral' . '.pdf', 'I'); //I exibe na pr�pria aba e 'D', for�a um download



?>
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
$consultaeS= "SELECT * FROM estagio WHERE cpf_usuario = '$_SESSION[CPF]'; ";
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
$pdf->MultiCell(150, 5, 'Declaramos para os devidos fins que o(a) aluno(a) ' . $dado["nome_aluno"] . ' participou dos respectivos estágios:', 0, 'J', 0);

$pdf->ln();
$pdf->ln();
$pdf->ln();

while($dado = $con3 -> fetch_array() ){

    $id= $dado["idestagio"];


    $pdf->Cell($w[0], 5, ''. $dado["nome_aluno"] .'', 'TLR', 0, 'L', 0);
    $pdf->Cell($w[0], 5, ' '. $dado["matricula"] .'', 'TLR', 0, 'L', 0);
    $pdf->Cell($w[0], 5, ' '. $dado["nome_orientador"] .'', 'TLR', 0, 'L', 0);
    $pdf->Cell($w[0], 5, ''. $dado["nome_empresa"] .'', 'TLR', 0, 'L', 0);
    $pdf->Cell($w[0], 5, '' .$dado["inicio_estagio"] .'', 'TLR', 0, 'L', 0);
    $pdf->Cell($w[0], 5, '' . $dado["fim_estagio"] .'', 'TLR', 0, 'L', 0);
    $pdf->Cell($w[0], 5, '' . $dado["carga_horaria"] .'', 'TLR', 0, 'L', 0);   
    
   }


$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(192,192,192);
$w = array(37, 58, 58, 37);
$pdf->Cell($w[0], 5, 'Uso exclusivo ', 'TLR', 0, 'C', 1);
$pdf->Cell($w[1], 5, '', 'LTR', 0, 'L', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($w[2], 5, 'Tipo de Cliente ', 'TLR', 0, 'R', 1);
$pdf->Cell($w[3], 5, 'Cï¿½digo do Cliente', 'LTR', 1, 'R', 1);

$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(192,192,192);
$w = array(37, 58, 58, 37);
$pdf->Cell($w[0], 3, '', 'BLR', 0, 'L', 1);
$pdf->Cell($w[1], 3, '', 'LBR', 0, 'L', 1);
$pdf->Cell($w[2], 3, '', 'LBR', 0, 'L', 1);
$pdf->Cell($w[3], 3, '', 'LBR', 1, 'L', 1);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 11);
$w = array(190);
$pdf->Cell($w[0], 5, utf8_encode('DADOS PESSOAIS '), 0, 1, 'L', 0);
$w = array(140,50);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($w[0], 5, 'Nome Completo:', 'TLR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'CPF:', 'TR', 1, 'L', 0);

$w = array(95,95);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($w[0], 5, 'Nome do pai:', 'TLR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Nome do mï¿½e:', 'TR', 1, 'L', 0);

$w = array(45,50,95);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($w[0], 5, 'Data de Nascimento:', 'TLR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Nacionalidade:', 'TR', 0, 'L', 0);
$pdf->Cell($w[2], 5, 'Naturalidade: (municï¿½pio)', 'TR', 1, 'L', 0);

$w = array(45,50,95);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($w[0], 5, 'Sexo:', 'TLR', 0, 'L', 0);
$pdf->Cell($w[1], 5, 'Estado Civil:', 'TR', 0, 'L', 0);
$pdf->Cell($w[2], 5, 'Nome do cï¿½njuge ou companheiro(a): Avalista', 'TR', 1, 'L', 0);

$w = array(45,50,95);
$pdf->Cell($w[0], 2, '', 'LR', 0, 'L', 0);
$pdf->Cell($w[1], 2, '', 'R', 0, 'L', 0);
$pdf->Cell($w[2], 2, '', 'R', 1, 'L', 0);

$w = array(3,5,16,5,16,50,95);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($w[0], 5, '','L', 0, 'L', 0);
$pdf->SetFont('Arial', '', 15);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($w[2], 5,  ' Masculino', 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', 15);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($w[4], 5,  ' Feminino', 0, 0, 'L', 0);

$pdf->Ln();
$pdf->MultiCell(190, 5, 'lorem aoijdjadiosjidsaijdsajiadjijadijasdijdsaidsajidsjaisadjisajiasdjisajdiasjdidasjdiasjdasdasijdaisjdiasjsadidsjaidsajiojidasjdasSe eu quebro linha aqui, quebra linha no pdf Primeiro Largura, depois altura (no MultiCell tanto faz depois o que tem q escrever, se vai colocar bora,texto alinhado L esquerda, C centralizado, J justificado, e no fim bota 0 pra n ter cor', 1, 'C', 0);


$pdf->Output('fichaCadastral' . '.pdf', 'I'); //I exibe na prï¿½pria aba e 'D', forï¿½a um download

?>
<?php

require("fpdf.php");
//include('dbh.inc.php');

$dsn = 'mysql:dbname=id18236500_proiectdaw;host=localhost';
$user = 'id18236500_robert123';
$password = 'rH@uz2uYH|dYIc|O';

$conn = new PDO($dsn, $user, $password);

class myPDF extends FPDF
{
	function header()
	{
		
		$this->SetFont('Arial','B',14);
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(276,10,'Lista angajati' ,0,0,'C');
		$this->Ln(20);
}
function footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','',8);
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function headerTable()
{
	$this->SetFont('Times','B',12);
	$this->Cell(20,10,'ID',1,0,'C');
	$this->Cell(25,10,'ID Contract',1,0,'C');
	$this->Cell(55,10,'Nume',1,0,'C');
	$this->Cell(55,10,'Prenume',1,0,'C');
	$this->Cell(45,10,'Numar telefon',1,0,'C');
	$this->Cell(45,10,'CNP',1,0,'C');
	$this->Ln();
}
function viewTable($conn)
{
	$this->SetFont('Times','',12);
	$stmt=$conn->query('select * from angajat');
	while($data = $stmt->fetch(PDO::FETCH_OBJ))
{
	$this->Cell(20,10,$data->id_angajat,1,0,'C');
	$this->Cell(25,10,$data->id_contract,1,0,'C');
	$this->Cell(55,10,$data->nume,1,0,'C');
	$this->Cell(55,10,$data->prenume,1,0,'C');
	$this->Cell(45,10,$data->numar_telefon,1,0,'C');
	$this->Cell(45,10,$data->CNP,1,0,'C');
	$this->Ln();
		

}
}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($conn);
$pdf->Output();



?>
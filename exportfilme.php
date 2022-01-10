<?php

require("fpdf.php");
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
		$this->Cell(276,10,'Lista filme' ,0,0,'C');
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
	$this->Cell(40,10,'Denumire',1,'C');
	$this->Cell(40,10,'Categorie',1,'C');
	$this->Cell(200,10,'Descriere',1,'C');
	$this->Ln();
}
function viewTable($conn)
{
	$this->SetFont('Times','',12);
	$stmt=$conn->query('select * from film');
	while($data = $stmt->fetch(PDO::FETCH_OBJ))
{
	$this->Cell(40,20,$data->denumire,1,'L');
	$this->Cell(40,20,$data->categorie,1,'L');
	$this->MultiCell(200,10,$data->descriere,1,'L');
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
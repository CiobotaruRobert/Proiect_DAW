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
		$this->Cell(276,10,'Lista conturi utilizatori' ,0,0,'C');
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
	$this->Cell(40,10,'Nume si prenume',1,0,'C');
	$this->Cell(60,10,'E-mail',1,0,'C');
	$this->Cell(60,10,'Username',1,0,'C');
	$this->Cell(36,10,'Tip user',1,0,'C');
	$this->Ln();
}
function viewTable($conn)
{
	$this->SetFont('Times','',12);
	$stmt=$conn->query('select * from users');
	while($data = $stmt->fetch(PDO::FETCH_OBJ))
{
	$this->Cell(20,10,$data->usersId,1,0,'C');
	$this->Cell(40,10,$data->usersName,1,0,'L');
	$this->Cell(60,10,$data->usersEmail,1,0,'L');
	$this->Cell(60,10,$data->usersUid,1,0,'L');
	$this->Cell(36,10,$data->tip_user,1,0,'L');
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
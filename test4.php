<?php
require('fpdf.php');
var_dump($_POST);
//$f_name = $_POST['num'];
echo "hello";









$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Name: ');
$pdf->Cell(40,10,'test',1,1);
$pdf->Output('F','filename1.pdf');
?>

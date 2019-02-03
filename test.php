<?php
require('fpdf.php');
$first="first";
$last="last";
$department="department";
$date="date";
$address="address";
$po="PO";
$de="description";
$se="serial";


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(29,10,'Name: ',0,0);
$pdf->Cell(40,10,$first." ".$last,0,1);

$pdf->Cell(29,10,'Department: ',0,0);
$pdf->Cell(40,10,$department,0,1);

$pdf->Cell(29,10,'Address: ',0,0);
$pdf->Cell(40,10,$address,0,1);

$pdf->Cell(29,10,'Date: ',0,0);
$pdf->Cell(40,10,$date,0,1);
$pdf->Output('F','filename1.pdf');
?>

<?php
require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();

// Centered text in a framed 20*10 mm cell and line break
$pdf->Image('logo1.png',5,10,-300);
$pdf->Image('emblem.png',95,10,-300);
// Set font
$pdf->SetFont('Arial','B',16);
// Move to 8 cm to the right
$pdf->Cell(145);
$pdf->Cell(60,5,'Serial No.',0,'C');
$pdf->SetFont('Arial','',16);
$pdf->Ln();
$pdf->Cell(135);
$pdf->Cell(60,5,'|____serial_no____|',0,'C');
$pdf->MultiCell(190,50,'',0,'L');
$pdf->Cell(65);
$pdf->Cell(75,15,'Senior Citizen Certificate',1,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',16);
$pdf->MultiCell(190,10,'This is to certify Mr/Ms/Mrs. |____name____| who is above 60 years of age, is the resident of |____city____|, the birth date for him/her is |____birth_date____| is recognised as the senior citizen of Governmenet of Gujarat.',0,'L');
$pdf->Ln();
$pdf->MultiCell(190,10,'It is according to given proofs',0,'L');
$pdf->SetFont('Arial','',16);
$pdf->MultiCell(190,10,'1.True Copy of School Leaving Certificate',0,'L');
$pdf->MultiCell(190,10,'2.Ration Card',0,'L');
$pdf->MultiCell(190,10,'3.True Copy of Birth Certificate',0,'L');
$pdf->MultiCell(190,10,'4.Affidavit',0,'L');
$pdf->MultiCell(190,10,'5.Certificate given by Talati',0,'L');
$pdf->SetFont('Arial','U',16);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(175,8,'    Signature    ',0,'L');
$pdf->Image('logo1.png',12,255,-300);
$pdf->Output();
?>
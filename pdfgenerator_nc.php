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
$pdf->Cell(75,15,'Non-Cremy Layer Certificate',1,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(190,9,'This is to certify Mr/Ms/Mrs. |____name____| who is the Son/Daughter of |____father name____| nad lives in the city of|____city____|. He/She according to Government of Gujarat Labour, Society Development and other caste developement section law dated 1/4/1978 resolution  No. 1078/13734/h, and all of the updadte of Socially and Economicaly Backward Class, having the caste as |____caste____|',0,'L');
$pdf->MultiCell(190,9,'Mr. |____father_name____| or their family members of Gujarat state, |___city____| city, so here by it is also proved according to Government of Gujarat Society Development Section dated 1/11/1995 and Resolution No. 1194/109/A and other acceptable updates, he/she does not belong to other developed division(Cremy Layer)',0,'L');
$pdf->MultiCell(190,9,'It is according to given proofs',0,'L');
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(190,9,'1.True Copy of School Leaving Certificate',0,'L');
$pdf->MultiCell(190,9,'2.Ration Card',0,'L');
$pdf->MultiCell(190,9,'3.Affidavit',0,'L');
$pdf->MultiCell(190,9,'4.Electricity Bill',0,'L');
$pdf->MultiCell(190,9,'5.Income Certificate',0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','U',12);
$pdf->MultiCell(175,8,'    Signature    ',0,'L');
$pdf->Image('logo1.png',7,250,-300);
$pdf->Output();
?>
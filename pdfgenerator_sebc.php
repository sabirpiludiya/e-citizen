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
$pdf->Cell(60,15,'SEBC Certificate',1,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(190,9,'This is to certify Mr/Ms/Mrs. |____name____| who is the Son/Daughter of ____father name____, lives in the city of |____birth place____| belongs to the |____caste____| which is recoanised as a Other Backward Class under the Government of India, Ministry of Social Justict and Empowerments Resolution No. 12011/68/93-BCC Dt 10/09/1993,12011/44/96-BCC dt 06/12/1996, Dated 06/12/1996 |____father_name/hsband_name____| and his family ordinarily Resides in the |____city____| District of the Gujarat state.',0,'L');
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
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
$pdf->Cell(75,15,'SC/ST Certificate',1,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(190,7,'This is to certify Mr/Ms/Mrs. |____name____| who is the Son/Daughter of |____father name____| living in the city of |____city____| of Gujarat state belongs to caste of |____caste____| which is recognised as a SC/ST',0,'L');
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(190,5,'Under: The Constitution (Scheduled Caste)Order, 1950; The Constitution (Scheduled Tribes)Order, 1950;',0,'L');
$pdf->MultiCell(190,5,'The Constitution (Scheduled Caste)(Union Territories)Order, 1951; The Constitution (Scheduled Tribes)(Union Territories)Order, 1951;',0,'L');
$pdf->MultiCell(190,5,'[As amended by the Scheduled Caste and Scheduled Tribes Lists(Modification) Order,1956, the Bombay Reorganisation Act,1960,the Punjab Reorganisation Act,1966, the State of Himachal Pradesh Act,1970, the North Eastern Areas (Reorganisation Act,1971) and the Scheduled Caste and Scheduled Tribes orders(Amendment) Act, 1976]',0,'L');
$pdf->Cell(60,5,'The Constitution (Jammu and Kashmir) Scheduled Castes order, 1956;',0,'C');
$pdf->Ln();
$pdf->Cell(60,5,'The Constitution (Andaman and Nicobar Islands) Scheduled Castes order, 1962;',0,'C');
$pdf->Ln();
$pdf->Cell(60,5,'The Constitution (Dadra and Nagar Haveli) Scheduled Castes order, 1962;',0,'C');
$pdf->Ln();
$pdf->Cell(60,5,'The Constitution (Dadra and Nagar Haveli) Scheduled Tribes order, 1962;',0,'C');
$pdf->Ln();
$pdf->Cell(60,5,'The Constitution (Pondicheryy) Scheduled Castes order, 1964;',0,'C');
$pdf->Ln();
$pdf->Cell(60,5,'The Constitution (Uttar Pradesh) Scheduled Tribes order, 1967;',0,'C');
$pdf->Ln();
$pdf->Cell(60,5,'The Constitution (Goa,Daman and Diu) Scheduled Castes order, 1968;',0,'C');
$pdf->Ln();
$pdf->Cell(60,5,'The Constitution (Goa,Daman and Diu) Scheduled Tribes order, 1968;',0,'C');
$pdf->Ln();
$pdf->MultiCell(190,5,'|____name____| and his father |____father_name____| lives in the city of |____city____| of the State Union Territory.',0,'L');
$pdf->MultiCell(190,5,'It is according to given proofs',0,'L');
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(190,5,'1.True Copy of School Leaving Certificate',0,'L');
$pdf->MultiCell(190,5,'2.Ration Card',0,'L');
$pdf->MultiCell(190,5,'3.True Copy of School Leaving Certificate of Father',0,'L');
$pdf->SetFont('Arial','U',12);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(175,8,'    Signature    ',0,'L');
$pdf->Image('logo1.png',7,250,-300);
$pdf->Output();
?>
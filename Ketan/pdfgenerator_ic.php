<?php
require('fpdf/fpdf.php');
include "connection.php";
$pdf = new FPDF();
$pdf->AddPage();
// code for number to word

try{
    $stmt=$con->prepare("SELECT tbl_aadhar.name as name, tbl_income_cert.ic_birth_place as birth_place, tbl_income_cert.ic_id as serial_no, tbl_income_cert.ic_member_earn_family as other_income, tbl_income_cert.ic_total_income as total_income  FROM tbl_aadhar, tbl_income_cert WHERE tbl_aadhar.aadhar_id=tbl_income_cert.ic_aadhar_id");
    $stmt->execute();
    while($rows=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        $name=$rows['name'];
        $birth_place=$rows['birth_place'];
        $other_income=$rows['other_income'];
        $total_income=$rows['total_income'];
        $serial_no=$rows['serial_no'];
    }

}
catch(PDOException $e)
{
    echo $e;
}
function convertToIndianCurrency($total_income) {
    $no = round($total_income);
    $decimal = round($total_income - ($no = floor($total_income)), 2) * 100;    
    $digits_length = strlen($no);    
    $i = 0;
    $str = array();
    $words = array(
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $total_income = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($total_income) {
            $plural = (($counter = count($str)) && $total_income > 9) ? 's' : null;            
            $str [] = ($total_income < 21) ? $words[$total_income] . ' ' . $digits[$counter] . $plural : $words[floor($total_income / 10) * 10] . ' ' . $words[$total_income % 10] . ' ' . $digits[$counter] . $plural;
        } else {
            $str [] = null;
        }  
    }
    
    $Rupees = implode(' ', array_reverse($str));
    $paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
    return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}

//echo "56721351.61 = " . convertToIndianCurrency(56721351.61);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Image('images/yourimg.jpg',5,10,-300);
$pdf->Image('images/emblem.png',95,10,-300);
// Set font
$pdf->SetFont('Arial','B',16);
// Move to 8 cm to the right
$pdf->Cell(145);
$pdf->Cell(60,5,'Serial No.',0,'C');
$pdf->SetFont('Arial','',16);
$pdf->Ln();
$pdf->Cell(135);
$pdf->Cell(6,3,'           '.$serial_no,0,'C');
$pdf->MultiCell(190,50,'',0,'L');
$pdf->Cell(65);
$pdf->Cell(60,15,'Income Certificate',1,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(190,7,'This is to certify Mr/Ms/Mrs.'.($name).' who lives in the city of '.$birth_place.' has the annual income of Rs. '.($total_income+$other_income).'/- (in numbers) '.convertToIndianCurrency($total_income+$other_income).'(in words)). The details for which are as follow: -',0,'L');
$pdf->MultiCell(190,7,'1.Applier Income '.$total_income,0,'L');
$pdf->MultiCell(190,7,'2.Family Income '.$other_income ,0,'L');
$pdf->MultiCell(190,7,'3.Total Income '.($total_income+$other_income),0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Ln();
$pdf->MultiCell(190,9,'It is according to given proofs',0,'L');
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(190,7,'1.Ration Card',0,'L');
$pdf->MultiCell(190,7,'2.Electricity Bill',0,'L');
$pdf->MultiCell(190,7,'3.Affidavit',0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Ln();
$pdf->MultiCell(190,7,'Terms and Conditions',0,'L');
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(190,7,'1.This certificate is only valid till three years.',0,'L');
$pdf->MultiCell(190,7,'2.If any update in family income it is to be done by applier.',0,'L');
$pdf->MultiCell(190,7,'',0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','U',12);
$pdf->MultiCell(175,8,'    Signature    ',0,'L');
$pdf->Image('images/logo1.png',10,250,-300);
//$pdf->Output();



$filename='Ketan/test.pdf';
$pdf->Output($filename,'F');;


?>
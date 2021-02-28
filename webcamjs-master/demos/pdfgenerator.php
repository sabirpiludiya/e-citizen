<?php
require('fpdf/fpdf.php');



const TEMPIMGLOC = 'tempimg.jpeg';

	$dataURI    = 
	$dataPieces = explode(',',$dataURI);
	$encodedImg = $dataPieces[1];
	$decodedImg = base64_decode($encodedImg);

	//  Check if image was properly decoded
	if( $decodedImg!==false )
	{
		//  Save image to a temporary location
		file_put_contents(TEMPIMGLOC,$decodedImg);
		/*if( file_put_contents(TEMPIMGLOC,$decodedImg)!==false )
		{
			//  Open new PDF document and print image
			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->Image(TEMPIMGLOC);
			$pdf->Output();

			//  Delete image from server
			
		}*/
	}
?>
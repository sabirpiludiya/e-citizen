<?php

include "connection.php";


session_start();

if(!($_SESSION['citizen_aadhar']))
{
			header("location: citizen_login.php");
}								
						

if($_SESSION['citizen_status'] == 0)
{
			header("location: citizen_login.php");
}								


$s = $_SESSION['citizen_aadhar'];
$TEMPIMGLOC = "images/user/income/".$s.".jpeg";
//'mysql:dbname='.$config['db_name'].';host='.$config['db_host']

?>
	<script>
		alert(<?php echo $_SESSION['myStat']; ?>);
	</script>
	<?php

				$stmt = $con->prepare("UPDATE `tbl_income_cert` SET `ic_photo` = :photo where  ic_id = $_SESSION[ic_id]");
				$stmt->bindParam(':photo', $TEMPIMGLOC);
				$stmt->execute();

				$_SESSION['myStat'] = 1;
				

	$dataURI    = $_POST['hid'];
	$dataPieces = explode(',',$dataURI);
	$encodedImg = $dataPieces[1];
	$decodedImg = base64_decode($encodedImg);

	//  Check if image was properly decoded
	if( $decodedImg!==false )
	{
		//  Save image to a temporary location
		file_put_contents($TEMPIMGLOC,$decodedImg);

		header("location:citizen_income_show_docs.php");
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
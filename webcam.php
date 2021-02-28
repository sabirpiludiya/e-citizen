<?php


session_start();

if(!($_SESSION['citizen_aadhar']))
{
			header("location: citizen_login.php");
}								
						

if($_SESSION['citizen_status'] == 0)
{
			header("location: citizen_login.php");
}								



?>

<!doctype html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>WebcamJS Test Page</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    
	<style>
			
		@media only screen and (max-width: 600px) {
		  #myHead {
			background-color: white;
		  }
		}
	</style>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
	  <link rel="stylesheet" href="assets/css/forms.css">
	  <link rel="stylesheet" href="assets/css/validation_notice_add.css">
	<style type="text/css">
		body { font-family: Helvetica, sans-serif; }
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form > input { margin-right: 15px; }
		#results { float:right; margin:20px; padding:20px; border:1px solid; background:#ccc; }
	</style>
</head>
<body>
	<?php	
			include("header.php");
		?>
	<div id="results">Your captured image will appear here...</div>
	<br/>
	<b>Your face should be clearly visible and straight view.</b>
	<h1><b>Have a Smile..!</b></h1>
	
	<?php
	session_start();
	 
	?>
		
	<div id="my_camera"></div>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="webcamjs-master/webcam.min.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
		
		</script>
	
	<!-- A button for taking snaps -->
	<form>
		<input type=button value="Take Snapshot" onClick="take_snapshot()">
	</form>
	
	<?php
		include "footer.php";
	?>
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				$xyz=data_uri;
				document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+data_uri+'"/>' +
					'<form action="imagecon.php" method="post"><input type="submit"/>'+
					'<input type="hidden" name="hid" value="'+$xyz+'">'
					'</form>';
					
					//document.cookie='imageof='+$xyz+'';
					//alert($xyz);
			} );
		}
	</script>
	
</body>
</html>

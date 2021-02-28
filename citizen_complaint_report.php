<?php
error_reporting(0);


$count=="";

if(isset($_POST['btn_submit']))
{	
	$pid = $_POST['txt_pid'];
	if($pid=="")
	{
		$err_pid = "Please Enter Problem ID";
		$count++;
	}
}
	


if(isset($_POST['btn_submit']) && $count==0)
{			
	header("location: citizen_complaint_status.php");			
}
?>




<!DOCTYPE HTML>

<html>
	<head>
		<title>Complaint Report || E Citizen</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
	  <link rel="stylesheet" href="assets/css/forms.css">
	  <link rel="stylesheet" href="assets/css/header.css">
	  <link rel="stylesheet" href="assets/css/validation_notice_add.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="index">
		<div id="page-wrapper">

			<!-- Header -->
		<?php	
			include("header.php");
		?>
		
			<!-- Banner -->
				<section id="banner">
				
					<!--
						".inner" is set up as an inline-block so it automatically expands
						in both directions to fit whatever's inside it. This means it won't
						automatically wrap lines, so be sure to use line breaks where
						appropriate (<br />).
					-->
					<div class="inner" >

						<header>
							<h2>Complaint Report</h2>
						</header>
						
			
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" action="citizen_complaint_status.php" name="registerform" enctype="multipart/form-data" class="content">
							
							<div class="form-group">
							<label><b>Provide the Problem ID</b></label><br/>
											<div><input type="text" class="form-control" maxlength="10" minlength="10" name="txt_pid" required></div>
									<div class="notice_add" align="left"><?php echo "Please Enter Problem ID"; ?></div>
							</div><br/>

								<div class="form-group" align="center">
									<input type="submit" name="btn_submit" style="height:80%;font-size:12px" value="Check Status" >
								</div><br/>
					</form>



</div>
					</div>

				</section>



			<!-- Footer -->
			<?php	
				include("footer.php");
			?>
		
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>

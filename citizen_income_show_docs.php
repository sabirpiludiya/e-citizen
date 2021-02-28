<?php
 error_reporting(0);

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


$count ="";

if(isset($_POST['btn_submit']))
{	
	if($_SESSION['myStat'] == 0)
	{
		$err_photo = "Please Click Your photo first.";
		$count++;
	}
}

if(isset($_POST['btn_submit']) && $_SESSION['myStat']==1 && $count ==0)
{
				$stmt = $con->prepare("UPDATE `tbl_income_cert` SET ic_status = 1 WHERE `ic_aadhar_id`= $_SESSION[citizen_aadhar] ");
				$stmt->execute();
				
		   	setcookie("msg", "Your request for Income certificate is sent to officer, please check later.", time()+3600, "/","", 0);

			header("location: index.php");	
}

		$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $con->prepare("SELECT * FROM `Tbl_income_cert` where `ic_id`= $_SESSION[ic_id]");
		$stmt->execute();
		
		while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
				$income = $rows['ic_income_proof'];
				$ration = $rows['ic_ration_card'];
				$elec = $rows['ic_elec_bill'];
				$aff = $rows['ic_affidavit'];
				$cat = $rows['ic_income_proof_cat'];
		}
	

?>



<!DOCTYPE HTML>

<html>
	<head>
		<title>Apply for Certificate || E Citizen</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
		<link rel="stylesheet" href="home.css">
    <script src="https://www.google.com/recaptcha/api.js?render=YOUR_RECAPTCHA_SITE_KEY"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="ASSETS/CSS/bootstrap.css">
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/docscheck.css" />
	  <link rel="stylesheet" href="assets/css/forms.css">
	  <link rel="stylesheet" href="assets/css/showcert.css">
	  <link rel="stylesheet" href="assets/css/validation_notice_add.css">
	  <link rel="stylesheet" href="assets/css/header.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
<style>
	#banner , #banner .inner
	{
	color:#000000
	}
	
	h2{
		color:#FFFFFF
	}
</style>

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
			

							<h2>Check your documents</h2>	
<br>
					<div class="inner" >

<div class="row">
  

  <div class="leftcolumn" style="font-weight:bold; font-size:24px">
    
  <a href="webcam.php">
  <div class="card" style="width:20%; float:right">		
  						<div class="notice_add" align="left" ><?php echo $err_photo; ?></div>
	<?php				
	if($_SESSION['myStat'] == 1)
	{
		echo "Photo is clicked.";
	} ?>
	<div> <b style="float:right">Click Photo</b><img src="images/icon/webcam.png" height="100px" width="100px" style="float:right" /><br>
	</div>
	<!-- The Modal -->
	   </div>
	   </a>
  </div>
  

  <div class="leftcolumn">
    <div class="card">
	<div><b>Income Proof ( <?php echo $cat; ?> )</b><br>

	<a href="<?php echo $income; ?>" target="new">
    	<img  alt="Snow" style="margin-left:75px;;width:100px;max-width:100px;" id="myImg" src="<?php echo $income; ?>">
	</a>
	</div>
	<!-- The Modal -->
	   </div>
  </div>

  <div class="leftcolumn">
    <div class="card">
	<div><b>Ration Card</b><br>
	
	<a href="<?php echo $ration; ?>" target="new">
    	<img  alt="Snow" style="margin-left:75px;;width:100px;max-width:100px;" id="myImg" src="<?php echo $ration; ?>">
	</a>
	</div>
	<!-- The Modal -->
	   </div>
  </div>
  
  <div class="leftcolumn">
    <div class="card">
	<div><b> Electricity Bill (True Copy)</b><br>
	
	<a href="<?php echo $elec; ?>" target="new">
    	<img  alt="Snow" style="margin-left:75px;;width:100px;max-width:100px;" id="myImg" src="<?php echo $elec; ?>">
	</a>
	</div>
	<!-- The Modal -->
	   </div>
  </div>
  
  <div class="leftcolumn">
    <div class="card">
	<div><b> Affidavit</b><br>
	<a href="<?php echo $aff; ?>" target="new">
    	<img  alt="Snow" style="margin-left:75px;;width:100px;max-width:100px;" id="myImg" src="<?php echo $aff; ?>">
	</a>
	</div>
	<!-- The Modal -->
	   </div>
  </div>
  
  
  <div class="leftcolumn">
    <div >
	
						<form method="post">
									<div class="form-group" align="center"><br/>
									<input type="submit" name="btn_submit" style="height:80%;font-size:12px;color:#FFFFFF" value="Proceed">
								</div><br/>
		
						</form>
  	</div>
  </div>
	
  
  
  
</div>

<!-- end login -->

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







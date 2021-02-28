<?php
error_reporting(0);


session_start();

if(!($_SESSION['citizen_aadhar']))
{
			header("location: citizen_login.php");
}								
						

if($_SESSION['citizen_status'] == 0)
{
			header("location: citizen_login.php");
}								

$count=="";

if(isset($_POST['btn_submit']))
{	
	$fname = $_POST['txt_fname'];
	if($fname=="")
	{
		$err_fname = "Please Enter First Name";
		$count++;
	}
	
	$lname = $_POST['txt_lname'];
	if($lname=="")
	{
		$err_lname = "Please Enter Last Name";
		$count++;
	}
	
	if($mail=="")
	{
		$err_mail = "Please Enter Mail";
		$count++;
	}
	
	
	$mobile = $_POST['txt_mobile'];
	
	if($mobile=="")
	{
		$err_mobile = "Please Enter Mobile";
		$count++;
	}
	else if($ct1 > 0)
	{
		$err_mobile = "Given Mobile Number is Already Registered";
		$count++;
	}
	
	$address = $_POST['txt_address'];
	if($address=="")
	{
		$err_address= "Please Enter Address";
		$count++;
	}
	
	$pincode = $_POST['txt_pincode'];
	if($pincode=="")
	{
		$err_pincode= "Please Enter Pincode";
		$count++;
	}
	
	
	$photo = $_FILES['file_photo']['name'];
	if($photo=="")
	{
		$err_photo= "Please Upload your Photo";
		$count++;
	}	
	
	$city= $_POST['ddl_city'];
	if($city=="--Select City--")
	{
		$err_city= "Please Select City";
		$count++;
	}
	
	$pwd = $_POST['txt_pwd'];
	if($pwd=="")
	{
		$err_pwd = "Please Enter Password";
		$count++;
	}
	
	$c_pwd = $_POST['txt_c_pwd'];
	if($c_pwd=="")
	{
		$err_c_pwd = "Please Re-Enter Password";
		$count++;
	}
	else if($c_pwd != $pwd)
	{
		$err_c_pwd = "Please Correct Password";
		$count++;
	}
}
	


if(isset($_POST['btn_submit']) && $count==0)
{
			$file = $_FILES['file_photo']['name'];
			$dest = "images/$file";
			$src = $_FILES['file_photo']['tmp_name'];
			move_uploaded_file($src, $dest);			
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
	<script>
        grecaptcha.ready(function () {
            grecaptcha.execute('YOUR_RECAPTCHA_SITE_KEY', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
				<link rel="stylesheet" href="ASSETS/CSS/bootstrap.css">
	<link rel="stylesheet" href="assets/css/main.css" />
	  <link rel="stylesheet" href="assets/css/forms.css">
	  <link rel="stylesheet" href="assets/css/showcert.css">
	  <link rel="stylesheet" href="assets/css/validation_notice_add.css">
	  <link rel="stylesheet" href="assets/css/header.css">
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
							<h2>Apply for the Certificate</h2>
						</header>						


<div class="row">

  <div class="leftcolumn">
    <div class="card">
	  <table class="table-striped">
	  	<tr>
		<td class="rs"> <br><a href="citizen_income_application.php"><div class="rt" class="fakeimg" style="height:50px;width:50px"><img src="images/icon/income.png" width="100%" height="100%"></div>Income Certificate</a> <br><br></td>
		</tr>
		<tr>
		<td class="rs"><br> <a href="citizen_non_creamylayer_application.php"><div class="rt" class="fakeimg" style="height:50px;width:50px"><img src="images/icon/ncl.png" width="100%" height="100%"></div>Non Creamylayer Certificate</a> <br><br></td>
		</tr>
		<tr>
		<td class="rs"><br> <a href="citizen_scst_application.php"><div class="rt" class="fakeimg" style="height:50px;width:50px"><img src="images/icon/scst.png" width="100%" height="100%"></div>SC / ST Certificate</a> <br><br></td>
		</tr>
		<td class="rs"><br> <a href="citizen_sebc_application.php"><div class="rt" class="fakeimg" style="height:50px;width:50px"><img src="images/icon/sebc.png" width="100%" height="100%"></div>SEBC Certificate</a> <br><br></td>
		</tr>
		<td class="rs"><br> <a href="citizen_senior_citizen_application.php"><div class="rt" class="fakeimg" style="height:50px;width:50px"><img src="images/icon/people.png" width="100%" height="100%"></div>Senior Citizen Certificate</a> <br><br></td>
		</tr>
	  </table>
	  
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
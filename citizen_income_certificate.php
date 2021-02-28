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


$count="";

if(isset($_POST['btn_submit']))
{	
	$selected_file = $_POST['txt_selected_file'];
	/*if($fname=="")
	{
		$err_income_proof = "Please Enter First Name";
		$count++;
	}*/
	
	$income_proof = $_FILES['file_income_proof']['name'];
	
	$ration_card = $_FILES['file_ration_card']['name'];
	/*if($lname=="")
	{
		$err_ration_card = "Please Enter Last Name";
		$count++;
	}*/
	
	/*if($mail=="")
	{
		$err_mail = "Please Enter Mail";
		$count++;
	}*/
	
	
	$electricity_bill = $_FILES['file_electricity_bill']['name'];
	
	$affidavit = $_FILES['file_affidavit']['name'];
	
	/*if($mobile=="")
	{
		$err_mobile = "Please Enter Mobile";
		$count++;
	}
	else if($ct1 > 0)
	{
		$err_mobile = "Given Mobile Number is Already Registered";
		$count++;
	}*/
	
	/*$address = $_POST['txt_address'];
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
	}*/
}
	


if(isset($_POST['btn_submit']) )
{
			if(($_FILES["file_income_proof"]["type"]=="image/jpeg" || $_FILES["file_income_proof"]["type"]=="image/jpg" || $_FILES["file_income_proof"]["type"]=="image/png" && $_FILES["file_income_proof"]["size"] < 500000  ) && ($_FILES["file_ration_card"]["type"]=="image/jpeg" || $_FILES["file_ration_card"]["type"]=="image/jpg" || $_FILES["file_ration_card"]["type"]=="image/png" && $_FILES["file_ration_card"]["size"] < 500000  ) && ($_FILES["file_electricity_bill"]["type"]=="image/jpeg" || $_FILES["file_electricity_bill"]["type"]=="image/jpg" || $_FILES["file_electricity_bill"]["type"]=="image/png" && $_FILES["file_electricity_bill"]["size"] < 500000  ) && ($_FILES["file_affidavit"]["type"]=="image/jpeg" || $_FILES["file_affidavit"]["type"]=="image/jpg" || $_FILES["file_affidavit"]["type"]=="image/png" && $_FILES["file_affidavit"]["size"] < 500000  ))
	{
			$file1 = $_FILES['file_income_proof']['name'];
			$dest1 = "images/$file1";
			$src1 = $_FILES['file_income_proof']['tmp_name'];
			move_uploaded_file($src1, $dest1);
			$file2 = $_FILES['file_ration_card']['name'];
			$dest2 = "images/$file2";
			$src2 = $_FILES['file_ration_card']['tmp_name'];
			move_uploaded_file($src2, $dest2);
			$file3 = $_FILES['file_electricity_bill']['name'];
			$dest3 = "images/$file3";
			$src3 = $_FILES['file_electricity_bill']['tmp_name'];
			move_uploaded_file($src3, $dest3);
			$file4 = $_FILES['file_affidavit']['name'];
			$dest4 = "images/$file4";
			$src4 = $_FILES['file_affidavit']['tmp_name'];
			move_uploaded_file($src4, $dest4);						

			try{
				$stmt = $con->prepare("UPDATE `tbl_income_cert` SET `ic_income_proof_cat`='$selected_file',`ic_income_proof`='$dest1',`ic_ration_card`='$dest2',`ic_elec_bill`='$dest3',`ic_affidavit`='$dest4' WHERE ic_id = $_SESSION[ic_id]");
												
			
				$stmt->execute();

				
			?>
			<script>
					alert("Data is Successsfully Saved.");
					window.location.href="citizen_income_show_docs.php";
			</script>
			<?php
			   }
			catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
	}
	else if($_FILES["file_photo"]["size"] > 500000)
	{
			$err_photo= "Please Upload image less than of 500kB size.";
			$count++;
	}
	else 
	{
			$err_photo= "Please Select JPG, PNG or JPEG Files.";
			$count++;
	}			
}
?>




<!DOCTYPE HTML>

<html>
	<head>
		<title>Income || E Citizen</title>
		
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
							<h2>Income Certificate</h2>
						</header>
						
			
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content" >
						
								<div class="form-group">
									<label><b>Income Proof(Select Any One)</b></label><br/>
									<select name="txt_selected_file" required id="select" >
										<option><label><b>--Select Income Proof--</b></label></option>
										<option><label><b>Employer Certificate</b></label></option>
										<option><label><b>Income Tax Return</b></label></option>
										<option"><label><b>Declaration before Talati</b></label></option>
									</select>
								</div>
							<br/>
									
									
								<div class="form-group">
									<label><b>Upload Selected Income proof</b></label><br/>
									<input type="file" class="form-control" name="file_income_proof" required><br/>
									<div class="notice_add" align="left"><?php echo $err_income_proof; ?></div>
								</div><br/>
								
		
								<div class="form-group">
									<label><b>Ration Card</b></label><br/>
									<input type="file" class="form-control" name="file_ration_card" required><br/>
								<div class="notice_add" align="left"><?php echo $err_ration_card; ?></div>
								</div>
								<br>							
						
								<div class="form-group">
									<label><b>Electricity Bill(True Copy)</b></label><br/>
									<input type="file" class="form-control" name="file_electricity_bill" required><br/>
								<div class="notice_add" align="left"><?php echo $err_electricity_bill; ?></div>
								</div>
								<br>							
								
								<div class="form-group">
									<label><b>Affidavit</b></label><br/>
									<input type="file" class="form-control" name="file_affidavit" required><br/>
								<div class="notice_add" align="left"><?php echo $err_affidavit; ?></div>
								</div><br>
	
								
		
						<div class="g-recaptcha" style="margin-left:-10px!important;"  data-sitekey="6LeakY0UAAAAAJyFRLvd7sifNG-QrpJs35hMO0je"></div>
	

<?php
/*include("db.php");
session_start();

$msg='';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$recaptcha=$_POST['g-recaptcha-response'];
if(!empty($recaptcha))
{
	include("getCurlData.php");
	$google_url="https://www.google.com/recaptcha/api/siteverify";
	$secret='6LeakY0UAAAAAAb6biu8QocfkDWz5HuD_LQ1DMcT';
	$ip=$_SERVER['REMOTE_ADDR'];
	$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
	$res=getCurlData($url);
	$res= json_decode($res, true);
	echo "ljflje;jfljfkljasdfkjlkdddddaaaaajjjjjjjjjjjjjjjjjjjjjj";	
	if($res['success'])
	{
	/*******
		if(!empty($username) && !empty($password))
		{
			$result=mysqli_query($db,"SELECT id FROM users WHERE username='$username' and passcode='$password'");
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			if(mysqli_num_rows($result)==1)
			{
			$_SESSION['login_user']=$username;
			header("location: home.php");
			}
			else
			{
			$msg="Please give valid Username or Password.";
			}
		
		}
		else
		{
			$msg="Please give valid Username or Password.";
		}
	/*******
	}
	else
	{
	$msg="Please re-enter your reCAPTCHA1.";
	}
	
}
else
{
	$msg="Please re-enter your reCAPTCHA2.";
}

}*/
?>

<!--<span class='msg'><?php //echo $msg; ?></span>-->

<br/>
<br/>
								<div class="form-group" align="center">
									<input type="submit" name="btn_submit" style=";height:80%;font-size:12px" value="Upload">
								</div><br/>
</form>



</div>
<script>
function callback(){
    console.log("The user has already solved the captcha, now you can submit your form.");
}
</script>
<?php /*
if(grecaptcha.getResponse().length !== 0){
   echo("The captcha has been already solved");
}
if($_POST["g-recaptcha-response"] != ''){
    // The user solved the recaptcha, now verify it if is a robot using the API.
	echo "solved";
}*/
?>
						
					</form>
                </div><!-- end login -->

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
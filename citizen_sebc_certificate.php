<?php
error_reporting(0);
session_start();

include "connection.php";

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
	$file_income_proof = $_POST['file_income_proof'];
	if($fname=="")
	{
		$err_income_proof = "Please Enter First Name";
		$count++;
	}
	
	$file_ration_card = $_POST['file_ration_card'];
	if($lname=="")
	{
		$err_ration_card = "Please Enter Last Name";
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
		<title>SEBC || E Citizen</title>
		
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
							<h2>SEBC Certificate</h2>
						</header>
						
			
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content">
						
						<div class="form-group">						
								<label><b>Caste Proof(Select Any One)</b></label><br/>
									<select>
										<option><label><b>School Leaving Certificate(True Copy)</b></label></option>
										<option><label><b>Mortage Registered with Bank(Copy)</b></label></option>
										<option><label><b>Father's School Leaving Certificate(True Copy)</b></label></option>
									</select></div>
							<br/>
							
							<div class="form-group">
							<label><b>***Upload Message to display*****</b></label><br/>
											<div><input type="file" class="form-control" name="file_caste_proof"><br/></div>
									<div class="notice_add" align="left"><?php echo $err_caste_proof; ?></div>
							</div><br/>
								
							<div class="form-group">
									<label><b>Migration Certificate from other State</b></label><br/>
									<div><input type="file" class="form-control" name="file_migration_certificate"><br/></div>
									<div class="notice_add" align="left"><?php echo $err_migration_certificate; ?></div>
							</div><br/>
	
								
		
						<div class="g-recaptcha" style="margin-left:-10px!important;"  data-sitekey="6LeakY0UAAAAAJyFRLvd7sifNG-QrpJs35hMO0je"></div>
	

<?php
include("db.php");
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
	/********/
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
	/********/
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

}
?>

<span class='msg'><?php echo $msg; ?></span>

<br/>
<br/>
								<div class="form-group" align="center">
									<input type="submit" class="button" name="btn_submit" style=";height:80%;font-size:12px" value="Upload">
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
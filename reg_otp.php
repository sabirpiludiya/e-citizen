<?php
error_reporting(0);

$count=="";


// Function to generate OTP 
function generateNumericOTP($n) { 
	
	// Take a generator string which consist of 
	// all numeric digits 
	$generator = "1357902468"; 

	// Iterate for n-times and pick a single character 
	// from generator and append it to $result 
	
	// Login for generating a random character from generator 
	//	 ---generate a random number 
	//	 ---take modulus of same with length of generator (say i) 
	//	 ---append the character at place (i) from generator to result 
	
	$result = ""; 

	for ($i = 1; $i <= $n; $i++) { 
		$result .= substr($generator, (rand()%(strlen($generator))), 1); 
	} 
	
	// Return result 
	return $result; 
} 

// Main program 
$n = 6; 
//print_r(generateNumericOTP($n)); 
$otp=generateNumericOTP($n);

// the message
echo $msg = "Your OTP is ".$otp.", Please do not share your OTP with others.";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
//echo $msg;
// send email
$r_mail = $_COOKIE['mail'];
mail($r_mail,"E-Citizen OTP",$msg);




if(isset($_POST['btn_otp']) && $_POST['txt_otp']='$otp')
{
setcookie("aadhar_id", $_COOKIE['aadhar_id'], time() + (86400 * 30), "/");
setcookie("dob", $_COOKIE['dob'], time() + (86400 * 30), "/");
setcookie("mail", $_COOKIE['mail'], time() + (86400 * 30), "/");
setcookie("mobile", $_COOKIE['mobile'], time() + (86400 * 30), "/");
setcookie("pwd", $_COOKIE['pwd'], time() + (86400 * 30), "/");
		
	//if(____OTP RIGHT____)
	{
		header("location:insert_user.php");
	}
	
}
?>




<!DOCTYPE HTML>

<html>
	<head>
		<title>OTP Verification || E Citizen</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=YOUR_RECAPTCHA_SITE_KEY"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

	  <link rel="stylesheet" href="assets/css/header.css">
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


							<h1>Please Verify your Account</h1>						
			<hr>
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content">
					
					
							<div>
						
								<div class="form-group">
									<label><b>OTP</b></label>
									<input type="text" class="form-control" name="txt_otp" placeholder="Please Enter OTP Here">
								<div class="notice_add" align="left"><?php echo $err_aadharid; ?></div>
					<?php	//		</div> <br/> <?php echo $otp; echo $_COOKIE['dob']     ?><br/>
								<div class="form-group" align="center">
									<input type="submit" class="button" name="btn_otp" style="height:80%;font-size:12px" value="Verify">
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
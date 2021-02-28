<?php
error_reporting(0);


$count=="";

if(isset($_POST['btn_submit']))
{	
	
	$aadharid= $_POST['txt_aadharid'];
	if($aadharid=="")
	{
		$err_aadharid = "Please Enter Aadhar ID";
		$count++;
	}
	
	$email= $_POST['txt_email'];
	if($email=="")
	{
		$err_email = "Please Enter Mail";
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
		<title>Register || E Citizen</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=YOUR_RECAPTCHA_SITE_KEY"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<script>
        grecaptcha.ready(function () {
            grecaptcha.execute('YOUR_RECAPTCHA_SITE_KEY', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });

		function isNumber(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
			}
			return true;
		}
    </script>
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

						<h1>Application for Income Certificate</h1><hr>
			
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content" onSubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
					
					
							<div style=";background-color:rgba(255,255,255, 0.1);padding:10%;border-radius:10px 55px ">

								<div class="form-group">
									<label><b>Birth Place</b></label>
									<input type="text" class="form-control" name="txt_birthplace" value="<?php echo $birthplace; ?>" placeholder="Enter Your Birth Place" >
								<div class="notice_add" align="left"><?php echo $err_occupation; ?></div>
								</div><br/>

								<div class="form-group">
									<label><b>Occupation</b></label>
									<input type="text" class="form-control" name="txt_occupation" value="<?php echo $occupation; ?>" placeholder="Enter Your Occupation" >
								<div class="notice_add" align="left"><?php echo $err_occupation; ?></div>
								</div><br/>


								<div class="form-group">
									<label><b>Occupation Details</b></label>
									<input type="text" class="form-control" name="txt_occupation_details" value="<?php echo $occupation_details; ?>" placeholder="Enter Occupation Details" >
								<div class="notice_add" align="left"><?php echo $err_occupation_details; ?></div>
								</div><br/>
								
								<div class="form-group">
									<label><b>Occupation Address</b></label>
									<textarea class="form-control" name="txt_occupation_address" placeholder="Enter Occupation Address" ><?php echo $occupation_address; ?></textarea>
								<div class="notice_add" align="left"><?php echo $err_occupation_details; ?></div>
								</div><br/>


								<div class="form-group">
									<label><b>How many members in your Family?</b></label>
									<input type="text" class="form-control" name="txt_family_members" maxlength="2" onKeyPress="return isNumber(event)" value="<?php echo $family_members; ?>" placeholder="Enter Family Members" >
								<div class="notice_add" align="left"><?php echo $err_family_members; ?></div>
								</div><br/>


								<div class="form-group">
									<label><b>How many members earn in your Family ?</b></label>
									<input type="text" class="form-control" name="txt_earning_members" maxlength="2" onKeyPress="return isNumber(event)" value="<?php echo $earning_members; ?>" placeholder="Enter Earning Members" >
								<div class="notice_add" align="left"><?php echo $err_earning_members; ?></div>
								</div><br/>



								<div class="form-group">
									<label><b>Total Annual Income from your Family ?</b></label>
									<input type="text" class="form-control" name="txt_total_income" onKeyPress="return isNumber(event)" maxlength="8" value="<?php echo $total_income; ?>" placeholder="Enter Total Annual Income" >
								<div class="notice_add" align="left"><?php echo $err_total_income; ?></div>
								</div><br/>


								<div class="form-group">
									<label><b>Average Annual Electricity Bill</b></label>
									<input type="text" class="form-control" name="txt_elec_bill" onKeyPress="return isNumber(event)" maxlength="8" value="<?php echo $elec_bill; ?>" placeholder="Enter Avg Electricity Bill" >
								<div class="notice_add" align="left"><?php echo $err_elec_bill; ?></div>
								</div><br/>

								
								<div class="form-group">
									<label><b>Why do you need of this certificate?</b></label>
									<textarea cols="10" class="form-control" name="txt_cert_need" placeholder="Please write need here" ><?php echo $occupation_cert_need; ?></textarea>
								<div class="notice_add" align="left"><?php echo $err_cert_need; ?></div>
								</div><br/>



								<div class="form-group">
									<input type="checkbox" name="agree" value="check" id="agree" checked="checked" /> I have read and agree to the Terms and Conditions and Privacy Policy.
									<div class="notice_add" align="left"><?php echo $err_agree; ?></div>
								</div><br/>


								<div class="form-group" align="center">
									<input class="form-control" type="submit" class="button" name="btn_submit" style=";height:80%;font-size:12px" value="Apply"/>
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
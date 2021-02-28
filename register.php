<?php

error_reporting(0);

include "connection.php";


if(isset($_POST['btn_check']))
{

	$aadharid= $_POST['txt_aadharid'];

	try { 
		$db="db_ecitizen";
		$host="localhost";
		$uname="root";
		$pass="";
		
		$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $con->prepare("SELECT name, dob FROM `Tbl_aadhar` where `aadhar_id` = '$_POST[txt_aadharid]'");
		$stmt->execute();
		
		while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
			$name = $rows ['name'];
			$aadhar_dob = $rows ['dob'];
		}
		if($_POST['txt_aadharid'] == '')
		{
			$name = "Please enter ID";
		}
		else if($name == '')
		{
			$name = "Please enter correct ID";
			$st = 0;
		}
		
	}
	catch(Exception $e) 
	{
		echo "Error: " . $e->getMessage();
	}
	$con = null;
}



session_start();

	if($_SESSION['citizen_aadhar'])
	{
		header("location:index.php");
	}
	else if($_SESSION['officer_id'])
	{
		header("location:index.php");	
	}
	else if($_SESSION['maamalatdar_id'])
	{
		header("location:index.php");	
	}



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

		$db="db_ecitizen";
		$host="localhost";
		$uname="root";
		$pass="";
		
		$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $con->prepare("SELECT dob FROM `Tbl_aadhar` where `aadhar_id` = '$_POST[txt_aadharid]'");
		$stmt->execute();
		
		while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
			$ad = $rows ['dob'];
		}
	

		header("location:reg_otp.php");
		setcookie("aadhar_id", $_POST['txt_aadharid'], time() + (86400 * 30), "/");
		setcookie("dob", $ad, time() + (86400 * 30), "/");
		setcookie("mobile", $_POST['txt_mobile'], time() + (86400 * 30), "/");
		setcookie("mail", $_POST['txt_email'], time() + (86400 * 30), "/");
		setcookie("pwd", $_POST['txt_pwd'], time() + (86400 * 30), "/");

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

						<header>
							<h2>Register</h2>
						</header>
						
			
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post"  name="registerform" enctype="multipart/form-data" class="content">
		
							<div>
						
								<div class="form-group">
									<label><b>Aadhar ID</b></label>
									<input type="text" minlength="12" class="form-control" id="aadharid" maxlength="12" name="txt_aadharid" value="<?php echo $aadharid; ?>" placeholder="Enter Your Aadhar ID" onKeyPress="return isNumber(event)" onKeyPress="return  hide(event)"/>
								<div class="notice_add" align="left" id="aadharid_show_hide"><?php echo $err_aadharid; ?></div>
								</div>

								<div class="form-group" align="right" style="height:40px;right:0px;">
									<input type="submit" name="btn_check" style="height:80%;font-size:12px" value="Check Name"> <?php echo $v;  ?>
								<br/><label style="color:<?php if($name == 'Please enter correct ID' || $name == 'Please enter ID'){echo 'red';}else{ echo 'green';} ?>;padding:0px; background:#FFFFFF"><?php echo $name;?></label>
								</div><br/>
								
								<div class="form-group">
									<label><b>Email ID</b></label>
									<input type="email" class="form-control" maxlength="30" name="txt_email" value="<?php echo $email; ?>" placeholder="Enter Your Email ID">
								<div class="notice_add" align="left"><?php echo $err_email; ?></div>
								</div>
								<br>							
						
								<div class="form-group">
									<label><b>Mobile Number</b></label>
									<input type="text" class="form-control" id="mobile" name="txt_mobile"  maxlength="10" value="<?php echo $mobile; ?>" placeholder="Enter Your Mobile No." onKeyPress="return isNumber(event)">
								<div class="notice_add"  id="mobile_show_hide" align="left"><?php echo $err_mobile; ?></div>
								</div>
								<br>							
								
								<div class="form-group">
									<label><b>Password</b></label>
									<input type="password" class="form-control" maxlength="15" id="txtPassword" name="txt_pwd" value="<?php echo $pwd; ?>" placeholder="Enter Your Password"> <span id="password_strength"></span>
								<div class="notice_add" align="left"><?php echo $err_pwd; ?> 
								</div>
								</div><br>
			<?php echo $aadhar_dob;
					?>			
								<div class="form-group">
									<label><b>Confirm Password</b></label>
									<input type="password" class="form-control" maxlength="15" name="txt_c_pwd" placeholder="Re-enter Your password">
								<div class="notice_add" align="left"><?php echo $err_c_pwd; ?></div>
								</div><br>
	
					<?php echo $aadhar_dob1;
					?>				
		
	
								
		
						<div align="center" class="g-recaptcha" style="margin-left:-10px!important;" data-callback="enableBtn"  data-sitekey="6LeakY0UAAAAAJyFRLvd7sifNG-QrpJs35hMO0je"></div>
							<br/>


								<div class="form-group" align="center">
									<input class="form-control"   type="submit" class="button" id="btn_register" name="btn_submit" style="height:80%;font-size:12px" value="Register an account"/>
								</div><br/>
							

<?php

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
			<script>
				$(document).ready(function(){
					$("#btn_register").prop("disabled",true);
					$("#btn_register").css("background-color","rgba(0,0,0,0)");
				});
				function enableBtn(){
					$("#btn_register").prop("disabled",false);
				}
				
				
				
	
  
  $('#aadharid').keyup(function() {
  
  // If value is not empty
  if ($(this).val().length >= 12) {
    // Hide the element
    $('#aadharid_show_hide').hide();
  } else {
    // Otherwise show it
    $('#aadharid_show_hide').show();
  }
}).keyup();





	
  $('#mobile').keyup(function() {
  
  // If value is not empty
  if ($(this).val().length >= 10) {
    // Hide the element
    $('#mobile_show_hide').hide();
  } else {
    // Otherwise show it
    $('#mobile_show_hide').show();
  }
}).keyup();







$(function () {
        $("#txtPassword").bind("keyup", function () {
            //TextBox left blank.
            if ($(this).val().length == 0) {
                $("#password_strength").html("");
                return;
            }
 
            //Regular Expressions.
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&]"); //Special Character.
 
            var passed = 0;
 
            //Validate for each Regular Expression.
            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test($(this).val())) {
                    passed++;
                }
            }
 
 
            //Validate for length of Password.
            if (passed > 2 && $(this).val().length > 8) {
                passed++;
            }
 
            //Display status.
            var color = "";
            var strength = "";
            switch (passed) {
                case 0:
                case 1:
                    strength = "Weak";
                    color = "red";
                    break;
                case 2:
                    strength = "Good";
                    color = "darkorange";
                    break;
                case 3:
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
                case 5:
                    strength = "Very Strong";
                    color = "darkgreen";
                    break;
            }
            $("#password_strength").html(strength);
            $("#password_strength").css("color", color);
        });
    });



			</script>
	</body>
</html>
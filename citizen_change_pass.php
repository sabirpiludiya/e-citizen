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


$encryption_key_256bit = base64_encode(openssl_random_pseudo_bytes(32));

//$key is our base64 encoded 256bit key that we created earlier. You will probably store and define this key in a config file.
$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';

function my_decrypt($data, $key) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}


include "connection.php";
		

$count=="";

if(isset($_POST['btn_submit']))
{	

		$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $con->prepare("SELECT * FROM `Tbl_user` where `u_aadhar_id` = $_POST[txt_aadharid]");
		$stmt->execute();
		
		while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
			$pwd = $rows ['u_pwd'];
			$idr = $rows['u_aadhar_id'];
			$statr = $rows['u_status'];

			// sabir007
		} 		
		$plain = my_decrypt($pwd, $key);
		
	$aadharid = $_POST['txt_aadharid'];
	if($aadharid=="")
	{
		$err_aadharid = "Please Enter Aadhar Id";
		$count++;
	}
	
	$pwd = $_POST['txt_pwd'];
	if($pwd=="")
	{
		$err_pwd = "Please Enter Password";
		$count++;
	}
	else if($pwd != $plain)
	{
		$err_pwd = "Aadhar ID or Password is Incorrect.";
		$count++;	
	}

}



if(isset($_POST['btn_submit']) && $count==0)
{
		
	if ($plain == $_POST['txt_pwd'] && $idr == $_POST['txt_aadharid'] && $statr == 1)
	{
	   	setcookie("msg", "You are Logged in", time()+3600, "/","", 0);
		$_SESSION['citizen_aadhar'] = $id;
		header("location:index.php");
		echo "You are logged in";
	}else {
	}
}

?>



<!DOCTYPE HTML>

<html>
	<head>
		<title>Citizen Login|| E Citizen</title>
		
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
    </script>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
	  <link rel="stylesheet" href="assets/css/forms.css">
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
							<h2>Citizen Login</h2>
						</header>						
			
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content">
					
					
							<div>
						
							<div class="form-group">
									<label><b>Aadhar ID</b></label>
									<input type="text" class="form-control" maxlength="12" minlength="12" onKeyPress="return isNumber(event)" onKeyPress="return hide(event)" name="txt_aadharid" value="<?php echo $aadharid; ?>" placeholder="Enter Your Aadhar ID">
								<div class="notice_add"  id="aadharid_show_hide" align="left"><?php echo $err_aadharid; ?></div>
								</div><br/>					
								
								<div class="form-group">
									<label><b>Password</b></label>
									<input type="password" class="form-control" name="txt_pwd" maxlength="15" placeholder="Enter Your Password">
								<div class="notice_add" align="left"><?php echo $err_pwd; ?>
								</div>
								</div><br>
								
								
								
								
								
								
						<div align="center" class="g-recaptcha" style="margin-left:-10px!important;"  data-callback="enableBtn"  data-sitekey="6LeakY0UAAAAAJyFRLvd7sifNG-QrpJs35hMO0je"></div>
							<br/>

								
								<div class="form-group" align="center">
									<input class="form-control" type="submit" class="button" id="btn_login"  name="btn_submit" style="height:80%;font-size:12px" value="Login"/>
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
					$("#btn_login").prop("disabled",true);
					$("#btn_login").css("background-color","rgba(0,0,0,0)");
				});
				function enableBtn(){
					$("#btn_login").prop("disabled",false);
				}
				
<?php
if(isset($_POST['btn_submit']))
{	
				if($count != 0)
				{ ?>	$(document).ready(function(){
					$("#btn_login").prop("disabled",true);
					$("#btn_login").css("background-color","rgba(0,0,0,0)");
				});
				<?php
				}
}

?>
				function isNumber(evt) {
					evt = (evt) ? evt : window.event;
					var charCode = (evt.which) ? evt.which : evt.keyCode;
					if (charCode > 31 && (charCode < 48 || charCode > 57)) {
						return false;
					}
					return true;
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




			</script>
	</body>
</html>
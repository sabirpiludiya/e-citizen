<?php
error_reporting(0);

include "connection.php";


$count=="";

if(isset($_POST['btn_submit']))
{	
	$cat = $_POST['ddl_cat'];
	if($cat=="-- Select Category --")
	{
		$err_cat = "Please Select Category";	
		$count++;
	}
	
	$title = $_POST['txt_title'];
	if($title=="")
	{
		$err_title = "Please Enter Title";
		$count++;
	}
	
	$description = $_POST['txt_description'];
	if($description=="")
	{
		$err_description = "Please Enter Description";
		$count++;
	}
}
	

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

if(isset($_POST['btn_submit']) && $count==0)
{
	if($_FILES["file_photo"]["type"]=="image/jpeg" || $_FILES["file_photo"]["type"]=="image/jpg" || $_FILES["file_photo"]["type"]=="image/png" || $_FILES["file_photo"]["size"] <= 500000 )
	{
			$file = $_FILES['file_photo']['name'];
			$dest = "images/$file";
			$src = $_FILES['file_photo']['tmp_name'];
			move_uploaded_file($src, $dest);			
 
 			if($dest == "images/")
			{
				$dest = "";
			}

			$email = $_POST['txt_email'];
			
			$pid = "P".generateNumericOTP(9);
			
			if($_SESSION['citizen_aadhar'])
			{
				$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("SELECT * FROM `Tbl_user` where `u_aadhar_id` = '$_SESSION[citizen_aadhar]'");
				$stmt->execute();
				
				while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
				{
					echo $email= $rows['u_mail'];
				} 		
			}
				
			try{
				$stmt = $con->prepare("INSERT INTO `tbl_complaint`(problem_id, com_category, com_title, com_desc, com_img, com_email, com_status, com_date_time) VALUES(:pid,:cat,:title,:desc,:img,:email, 0, (select now()))");
				$stmt->bindParam(':cat', $cat);
				$stmt->bindParam(':title', $title);
				$stmt->bindParam(':img', $dest);
				$stmt->bindParam(':desc', $description);
				$stmt->bindParam(':email', $email);			
				$stmt->bindParam(':pid', $pid);
				
				$stmt->execute();

			   }
			catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
	}
	else if($_FILES["file_photo"]["size"] > 500000)
	{
			$err_photo= "Please Upload image less than of 5MB size.";
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
		<title>Complaint || E Citizen</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
	  <link rel="stylesheet" href="assets/css/forms.css">
	  <link rel="stylesheet" href="assets/css/header.css">
	  <link rel="stylesheet" href="assets/css/validation_notice_add.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	 <script src="https://www.google.com/recaptcha/api.js?render=YOUR_RECAPTCHA_SITE_KEY"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<script>

				function addbox() {
					if (document.getElementById('myCheck').checked) {
						document.getElementById('area').style.display = 'none';
						document.getElementById('mail').value = "";
					} else {
						document.getElementById('area').style.display = 'block';
					}
				}
				

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
						<?php
						
						if(isset($_POST['btn_submit']) && $count==0)
						{
						?>
						
							<div class="alert alert-info alert-dismissible fade show">
								<strong><?php echo $pid ; ?> is your Problem ID. </strong> Please, Note it down to check status later.!!!
						  	</div> <br/>
					<?php } ?>

						<header>
							<h2>Complaint</h2>
						</header>
							
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content">
						
							<div class="form-group">						
								<label><b>Select Category for Problem</b></label><br/>
									<select name="ddl_cat" value="<?php echo $cat; ?>" >
										<option><label><b>-- Select Category --</b></label></option>
										<option><label><b>Electric Department</b></label></option>
										<option><label><b>Water Supply Department</b></label></option>
										<option><label><b>Roads Department</b></label></option>
										<option><label><b>Drainage Department</b></label></option>
										<option><label><b>Certificate Department</b></label></option>
									</select>
									<div class="notice_add" align="left"><?php echo $err_cat; ?></div>
									
									</div>
							<br/>
							
							
							<div class="form-group">
							<label><b>Enter Subject</b></label><br/>
											<div><input type="text" class="form-control" name="txt_title" value="<?php echo $title; ?>" placeholder="Enter the Subject"></div>
									<div class="notice_add" align="left"><?php echo $err_title; ?></div>
							</div> <br/>
	
	
							<div class="form-group">
							<label><b>Upload Image for the Problem (Optional)</b></label><br/>
											<div><input type="file" class="" name="file_photo"><br/></div>
							</div><br/>
			<?php
			
			if(!$_SESSION['citizen_aadhar'])
			{	?>			
							<div class="form-group" id="area">
							<label><b>Provide E-mail</b></label><br/>
											<div><input type="email" id="mail" value="<?php echo $email; ?>"  class="form-control"  placeholder="Please Enter Your Email"  name="txt_email"><br/></div>
							</div>	
							<div class="form-group">
											<div><input type="checkbox" id="myCheck" class="" onClick="addbox();" name="user_anonymous"> <label><b>  Complain as Anonymous</b></label><br/></div>
							</div><br/>
							
	<?php  } ?>
								<div class="form-group">
									<label><b>Description</b></label>
									<textarea class="form-control" name="txt_description" placeholder="Please Describe Issue" ><?php echo $description; ?></textarea>
								<div class="notice_add" align="left"><?php echo $err_description; ?></div>
								</div><br/>

		
						<div align="center" class="g-recaptcha"  data-callback="enableBtn"  style="margin-left:-10px!important;"  data-sitekey="6LeakY0UAAAAAJyFRLvd7sifNG-QrpJs35hMO0je"></div>
						<span class='msg'><?php echo $msg; ?></span>

	<br/>
	<br/>
								<div class="form-group" align="center">
									<input type="submit" class="" class="button" name="btn_submit" id="btn_report" style="height:20%;font-size:12px" value="Report Now">
								</div><br/>
								

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
					$("#btn_report").prop("disabled",true);
					$("#btn_report").css("background-color","rgba(0,0,0,0)");
				});
				function enableBtn(){
					$("#btn_report").prop("disabled",false);
				}
				
			</script>
	</body>
</html>

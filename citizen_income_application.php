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

include "connection.php";

$count="";
		
				$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $con->prepare("SELECT * FROM `Tbl_income_cert` where `ic_aadhar_id` = $_SESSION[citizen_aadhar]");
				$stmt->execute();
				
				while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
				{
						$statusCheck = $rows['ic_status'];
				}
		if($statusCheck == 1)
		{
			
		   	setcookie("msg", "Your request for Income certificate is Already sent to officer and its under verification, please check later.", time()+3600, "/","", 0);

			header("location: index.php");	
		}
		else if($statusCheck == 2)
		{
			
		   	setcookie("msg", "Your Documents for Income certificate is Verified by officer and its under verification by Naayab Maamalatdar, please check later.", time()+3600, "/","", 0);

			header("location: index.php");	
		}
		else if($statusCheck == 3)
		{
//			header("location: pdfgenerator_ic.php");	
	
				 header("location: myIncomeCertificate.php");	
				 
		}
		else
		{
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$count=$con->prepare("DELETE FROM `Tbl_income_cert` where `ic_aadhar_id` = :id and `ic_status` = 0");
			$count->bindParam(":id",$_SESSION['citizen_aadhar']);
			$count->execute();
		}							
	
if(isset($_POST['btn_submit']))
{	
	
	$birthplace= $_POST['txt_birthplace'];
	
	
	$occupation= $_POST['txt_occupation'];
	
	
	$occupation_details = $_POST['txt_occupation_details'];
	
	
	
	
	$occupation_address = $_POST['txt_occupation_address'];
	
	
	$family_members = $_POST['txt_family_members'];
	/*if($pincode=="")
	{
		$err_pincode= "Please Enter Pincode";
		$count++;
	}*/
		
	//$photo = $_FILES['file_photo']['name'];
	/*if($photo=="")
	{
		$err_photo= "Please Upload your Photo";
		$count++;
	}*/	
	
	//$earning_members= $_POST['ddl_city'];
	/*if($city=="--Select City--")
	{
		$err_city= "Please Select City";
		$count++;
	}*/
	
	$earning_members = $_POST['txt_earning_members'];
	/*if($pwd=="")
	{
		$err_pwd = "Please Enter Password";
		$count++;
	}*/
	
	$total_income = $_POST['txt_total_income'];
	/*if($c_pwd=="")
	{
		$err_c_pwd = "Please Re-Enter Password";
		$count++;
	}
	else if($c_pwd != $pwd)
	{
		$err_c_pwd = "Please Correct Password";
		$count++;
	}*/
	
	$elec_bill= $_POST['txt_elec_bill'];
	
	$cert_need=$_POST['txt_cert_need'];
	
	
}
if(isset($_POST['btn_submit']))
{
	try{
				$stmt = $con->prepare("INSERT INTO `tbl_income_cert`(ic_aadhar_id, ic_birth_place, ic_occupation, ic_occupation_details,ic_occupation_address, ic_member_in_family, ic_member_earn_family, ic_total_income, ic_avg_electric_bill, ic_why_certificate) VALUES ($_SESSION[citizen_aadhar], :place,:occ,:occ_det,:occ_add,:fam_mem,:earn_mem,:tot_inc,:elec_bill,:cert_need)");
				$stmt->bindParam(':place', $birthplace);
				$stmt->bindParam(':occ', $occupation);
				$stmt->bindParam(':occ_det', $occupation_details);
				$stmt->bindParam(':occ_add', $occupation_address);
				$stmt->bindParam(':fam_mem', $family_members);
				$stmt->bindParam(':earn_mem', $earning_members);
				$stmt->bindParam(':tot_inc', $total_income);
				$stmt->bindParam(':elec_bill', $elec_bill);				
				$stmt->bindParam(':cert_need', $cert_need);
			
				$stmt->execute();
				
				$stmt=$con->prepare("SELECT ic_id FROM tbl_income_cert WHERE ic_occupation='$occupation'");
				
				$stmt->execute();
			
				while($rows=$stmt->fetch(PDO::FETCH_ASSOC))
				{
					$_SESSION['ic_id']=$rows['ic_id'];
				}
			?>
			<script>
					alert("Data is Successsfully Saved.");
					window.location.href="citizen_income_certificate.php";
			</script>
			<?php
			   }
			catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
				
}
	


/*if(isset($_POST['btn_submit']) && $count==0)
{
			$file = $_FILES['file_photo']['name'];
			$dest = "images/$file";
			$src = $_FILES['file_photo']['tmp_name'];
			move_uploaded_file($src, $dest);			
}*/
?>




<!DOCTYPE HTML>

<html>
	<head>
		<title>Income Certificate|| E Citizen</title>
		
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
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content" onSubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }" >
					
					
							<div style=";background-color:rgba(255,255,255, 0.1);padding:10%;border-radius:10px 55px ">

								<div class="form-group">
									<label><b>Birth Place</b></label>
									<input type="text" class="form-control" name="txt_birthplace" value="<?php echo $birthplace; ?>" placeholder="Enter Your Birth Place" required>
								<div class="notice_add" align="left" ><?php echo $err_birthplace; ?></div>
								</div><br/>

								<div class="form-group">
									<label><b>Occupation</b></label>
									<input type="text" class="form-control" name="txt_occupation" value="<?php echo $occupation; ?>" placeholder="Enter Your Occupation" required>
								<div class="notice_add" align="left" ><?php echo $err_occupation; ?></div>
								</div><br/>


								<div class="form-group">
									<label><b>Occupation Details</b></label>
									<input type="text" class="form-control" name="txt_occupation_details" value="<?php echo $occupation_details; ?>" placeholder="Enter Occupation Details" required>
								<div class="notice_add" align="left"><?php echo $err_occupation_details; ?></div>
								</div><br/>
								
								<div class="form-group">
									<label><b>Occupation Address</b></label>
									<textarea class="form-control" name="txt_occupation_address" placeholder="Enter Occupation Address" required><?php echo $occupation_address; ?></textarea>
								<div class="notice_add" align="left"><?php echo $err_occupation_details; ?></div>
								</div><br/>


								<div class="form-group">
									<label><b>How many members in your Family?</b></label>
									<input type="text" class="form-control" name="txt_family_members" maxlength="2" onKeyPress="return isNumber(event)" value="<?php echo $family_members; ?>" placeholder="Enter Family Members" required>
								<div class="notice_add" align="left"><?php echo $err_family_members; ?></div>
								</div><br/>


								<div class="form-group">
									<label><b>How many members earn in your Family ?</b></label>
									<input type="text" class="form-control" name="txt_earning_members" maxlength="2" onKeyPress="return isNumber(event)" value="<?php echo $earning_members; ?>" placeholder="Enter Earning Members" required>
								<div class="notice_add" align="left"><?php echo $err_earning_members; ?></div>
								</div><br/>



								<div class="form-group">
									<label><b>Total Annual Income from your Family ?</b></label>
									<input type="text" class="form-control" name="txt_total_income" onKeyPress="return isNumber(event)" maxlength="8" value="<?php echo $total_income; ?>" placeholder="Enter Total Annual Income" required>
								<div class="notice_add" align="left"><?php echo $err_total_income; ?></div>
								</div><br/>


								<div class="form-group">
									<label><b>Average Annual Electricity Bill</b></label>
									<input type="text" class="form-control" name="txt_elec_bill" onKeyPress="return isNumber(event)" maxlength="8" value="<?php echo $elec_bill; ?>" placeholder="Enter Avg Electricity Bill" required>
								<div class="notice_add" align="left"><?php echo $err_elec_bill; ?></div>
								</div><br/>

								
								<div class="form-group">
									<label><b>Why do you need of this certificate?</b></label>
									<textarea cols="10" class="form-control" name="txt_cert_need" placeholder="Please write need here" required><?php echo $cert_need; ?></textarea>
								<div class="notice_add" align="left"><?php echo $err_cert_need; ?></div>
								</div><br/>



								<div class="form-group">
									<input type="checkbox" name="agree" value="check" id="agree" checked="checked" required/> All the details are correct as best of my knowledge.
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
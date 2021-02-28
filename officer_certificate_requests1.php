<?php
error_reporting(0);


session_start();


if(!($_SESSION['officer_mail']))
{
			header("location: officer_login.php");
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
		<title>Officer_View || E Citizen</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
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
							<h2>Certificate Requests</h2>
						</header>
				
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">

                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content">
					<div class="table-responsive">
						<table class="table table-striped table-hover" style="border: #ED7E03 3px solid;">
						  <thead class="thead-dark">
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">Aadhar ID</th>
							  <th scope="col">Certificate</th>
							  <th scope="col">View</th>
							  <th scope="col">Approve Registration</th>
							</tr>
						  </thead>
						  <tr>
						  <td colspan="4"><hr/></td>
						  </tr>
						  <tbody>
<?php
		$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $con->prepare("SELECT * FROM `Tbl_user` a, `Tbl_aadhar` b where `u_aadhar_id` = `aadhar_id` and `u_status` = 0");
		$stmt->execute();
		$c = 1;						
		while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
?>
					
							<tr>
							  <th scope="row"><?php echo $c++; ?></th>
							  <td>
			<?php echo $pwd = $rows ['u_aadhar_id']; ?></td>
							  <td>
<!-- Trigger/Open The Modal -->
<a id="myBtn<?php echo $c; ?>">View Information</a>

<!-- The Modal -->
 	<div id="myModal<?php echo $c; ?>" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content" style="color:#000000">
			<span class="close<?php echo $c; ?>">&times;</span><br/>
			<p align="right"><img src="<?php echo $rows['photo'] ; ?>" height="10%" width="10%"/></p>
			<p align="right">Aadhar ID : <?php echo $rows['u_aadhar_id'] ; ?></p>
			<p align="left">Name : <span style="color:#0000FF"><?php echo $rows['name'] ; ?></span></p>
			<p align="left">Date of Birth : <span style="color:#0000FF"><?php echo $rows['dob'] ; ?></span></p>
			<p align="left">Gender : <span style="color:#0000FF"><?php echo $rows['gender'] ; ?></span></p>
			<p align="left">Mobile : <span style="color:#0000FF"><?php echo $rows['u_mobile'] ; ?></span></p>
			<p align="left">Mail : <span style="color:#0000FF"><?php echo $rows['u_mail'] ; ?></span></p>
			
		  </div>

	</div>
	
<script>
// Get the modal
var modal<?php echo $c; ?> = document.getElementById('myModal<?php echo $c; ?>');

// Get the button that opens the modal
var btn = document.getElementById("myBtn<?php echo $c; ?>");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close<?php echo $c; ?>")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal<?php echo $c; ?>.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal<?php echo $c; ?>.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal<?php echo $c; ?>.style.display = "none";
  }
}
</script>		   

							  <td>
							  	<a href="officer_certificate_requests.php?approve=<?php echo $rows['u_id'];?>"><img src="images/icon/approve.png" height="100px" width="100px"/></a>  
							  	<a href="officer_certificate_requests.php?reject=<?php echo $rows['u_id'];?>"><img src="images/icon/reject.png" height="50px" width="50px"/></a>  
							  </td>
							</tr>
<?php
		} 		

if($c == 1)
{
?>						
<tr>
<td colspan="4">Sorry!!! No Registrarion Requests..!</td>
</tr>						
<?php
}
?>						
						  </tbody>
						</table>
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
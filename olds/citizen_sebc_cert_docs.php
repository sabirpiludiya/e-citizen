<?php
error_reporting(0);



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
	
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="ASSETS/CSS/bootstrap.css">
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/docscheck.css" />
	  <link rel="stylesheet" href="assets/css/forms.css">
	  <link rel="stylesheet" href="assets/css/showcert.css">
	  <link rel="stylesheet" href="assets/css/validation_notice_add.css">
	  <link rel="stylesheet" href="assets/css/header.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
<style>
	#banner , #banner .inner
	{
	color:#000000
	}
	
	h2{
		color:#FFFFFF
	}
	
</style>


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

							<h2>Check your documents</h2>	
<br>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
	<form method="post" enctype="multipart/form-data">
	<div><b>*********NAME***********</b><br><img id="myImg" src="IMAGES/BANNER cl.jpg" alt="Snow" style="margin-left:75px;;width:100px;max-width:100px;"><br><input type="file"> <input type="submit" class="btns"  value="Upload Again" ></div>
	<!-- The Modal -->
	   </div>
  </div>

  <div class="leftcolumn">
    <div class="card">
	<form method="post" enctype="multipart/form-data">
	<div><b>Migration Certificate from other State</b><br><img id="myImg" src="IMAGES/BANNER cl.jpg" alt="Snow" style="margin-left:75px;;width:100px;max-width:100px;"><br><input type="file"> <input type="submit" class="btns"  value="Upload Again" ></div>
	<!-- The Modal -->
	   </div>
  </div>
    
						<form>
  								<div class="form-group" align="center">
									<input type="submit" style="color:#FFFFFF" class="button" name="btn_submit" class="btns"  style=";height:80%;font-size:12px" value="Proceed">
								</div><br/>
						</form>

  
  
  
</div>


<!-- end login -->

					</div>

				</section>
	<div id="myModal" class="modal">
	  <img class="modal-content" id="img01">
	  <div id="caption"></div>
	  <span class="close">&times;</span>
	</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>


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







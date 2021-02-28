<?php
  error_reporting(0);

session_start();
 
include "connection.php";

if(!($_SESSION['officer_mail']))
{
			header("location: officer_login.php");
}								

$count="";

if(isset($_POST['btn_submit'])  )
{
	if($_FILES["file_photo"]["type"]=="image/jpeg" || $_FILES["file_photo"]["type"]=="image/jpg" || $_FILES["file_photo"]["type"]=="image/png" || $_FILES["file_photo"]["size"] < 500000000)
	{
			$_FILES["file_photo"]["size"];
			$file = $_FILES['file_photo']['name'];
			$dest = "images/$file";
			$src = $_FILES['file_photo']['tmp_name'];
			move_uploaded_file($src, $dest);			

			try{
									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
									$stmt=$con->prepare("update `Tbl_post` SET pst_title = :title, pst_desc = :desc, pst_img = :image, pst_date = (select now()) where pst_id = $_GET[edit]");
									$stmt->bindValue(":title", $_POST['txt_post_title']);
									$stmt->bindValue(":image",$dest);
									$stmt->bindValue(":desc",$_POST['txt_post_desc']);
				//					$stmt->bindValue(":date",'2019-10-10');
									$stmt->execute();
			?>
			<script>
					alert("Post is Successsfully Posted.");
					window.location.href="citizen_post.php";
			</script>
			<?php
			   }
			catch(PDOException $e)
			{
				echo "Error: " . $e->getMessage();
			}
	}
	else if($_FILES["file_photo"]["size"] > 500000000)
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
/*


									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
									$stmt=$con->prepare("update `Tbl_post` SET pst_title = :id where pst_id = 41");
									$stmt->bindValue(":id",'oopoopoop');
									$stmt->execute();
						
?>
<script>
	alert("In...");
</script>

<?php
		// header('location:citizen_post.php');
							
	}
	else if($_FILES["file_photo"]["size"] > 500000000)
	{
			$err_photo= "Please Upload image less than of 5MB size.";
			$count++;
	}
	else 
	{
			$err_photo= "Please Select JPG, PNG or JPEG Files.";
			$count++;
	}

	*/	
?>




<!DOCTYPE HTML>

<html>
	<head>
		<title>Post Upload || E Citizen</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
	  <link rel="stylesheet" href="assets/css/header.css">
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
							<h2>Upload Post</h2>
						</header>
						
			
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content">
		<?php					
		$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $con->prepare("SELECT * FROM `Tbl_post` where pst_id=$_GET[edit]");
		$stmt->execute();
		
	while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{	?>					
							<div class="form-group">
									<label><b>Post Title</b></label>
									<input type="text" class="form-control" name="txt_post_title" value="<?php echo $rows['pst_title']; ?>"
									 placeholder="Enter Post Title" required>
								</div><br/>
								
							<?php 
									if($rows['pst_img'] != "")
							{ ?>
							<div class="form-group">
									<label><b>Old Image</b></label><br/>
									
									 <img src="<?php echo $rows['pst_img']; ?>" width="100px" height="200px"><br/>
							</div>
							<?php	} ?>
							
							<div class="form-group">
									<label><b>Upload New Image</b></label><br/>
									<div><input type="file" class="form-control" name="file_photo" ><br/></div>
							</div><br/>
							
							<div class="form-group">
							<label><b>Description</b></label><br/>
											<div><textarea class="form-control" name="txt_post_desc" required><?php echo $rows['pst_desc']; ?></textarea><br/></div>
							</div>
							
								<div class="form-group" align="center">
									<input type="submit" name="btn_submit" style="height:80%;font-size:12px" value="Upload">
								</div><br/>
</form>
<?php
	}	?>


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
<?php
error_reporting(0);

include "connection.php";
		

								if(isset($_POST['btn_delete']))
								{
									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
									$count=$con->prepare("delete from `Tbl_post` where pst_id = :id");
									$count->bindParam(":id",$_POST['pst_id'],PDO::PARAM_INT);
									$count->execute();
									
									header('location:citizen_post.php?msg=Post is deleted.');
								}



								if(isset($_POST['btn_edit']))
								{
									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
							
									header('location:officer_edit_post.php?edit='.$_POST['pst_id']);
								}


								


$count=="";
?>




<!DOCTYPE HTML>

<html>
	<head>
		<title>Post || E Citizen</title>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    
	<style>
			
	</style>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
			<link rel="stylesheet" href="assets/css/main.css" />
	  <link rel="stylesheet" href="assets/css/forms.css">
	  <link rel="stylesheet" href="assets/css/validation_notice_add.css">
	  <link rel="stylesheet" href="assets/css/header.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
			<style>
	
/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>

	<body class="index">
		<div id="page-wrapper">

			<!-- Header -->
		<?php	
			include("header.php");
		?>
		
			<!-- Banner -->
				<section id="banner">

							<?php if(isset($_GET['msg']))
							{ ?>
								<div align="center" style="width:50%;text-align:center;font-weight:bold;font-size:24px;margin-left:25%;background-color:#c8e6c9;color:#000000">
								  <?php echo $_GET['msg']; ?>
								</div>	<br/>
							<?php } ?>					<!--
						".inner" is set up as an inline-block so it automatically expands
						in both directions to fit whatever's inside it. This means it won't
						automatically wrap lines, so be sure to use line breaks where
						appropriate (<br />).
					-->
					<div class="inner" >
								
						<header>
							<h2>Posts</h2>
						</header>
						  <!---a href="#il13">Lession.2</a> <br /--->
			
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content">
			


							<div class="row" >

<?php

		$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $con->prepare("SELECT * FROM `Tbl_post` order by pst_date DESC");
		$stmt->execute();
		
		while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
		
?>		
						  	<div  style="width:100%">
							<div style="color:black; border-radius:9px 9px 7px 7px" class="card">
							
							<form method="post">		
							<?php 
							if($_SESSION['officer_mail']!="")
							{
							?>
								<input type="hidden" value="<?php echo $rows['pst_id']; ?>" name="pst_id">
								<input type="submit" value="Delete" name="btn_delete" style="height:70%;font-size:10px">
								<input type="submit" value="Edit" name="btn_edit" style="height:70%;font-size:10px">
							<?php
							}
							?>
							<br/>
							
							  <h2 style="color:BLUE; font-weight:bold"><?php echo $rows['pst_title']; ?></h2>
							  <p style="">Updated on : <?php echo date("d M Y", strtotime($rows['pst_date'])); ?></p>
							  <div><img src="<?php echo $rows['pst_img']; ?>" width="100%"/></div>
							  <p><pre style="white-space: pre-wrap;;word-wrap: break-word;"><?php echo $rows ['pst_desc']; ?></pre></p>
							</div>
							<br/>
							</div>
		</form>
	<?php
		}
	?>
	</div>
	
	
	<br/>

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

	</body>
</html>


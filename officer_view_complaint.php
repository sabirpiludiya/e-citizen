<?php
error_reporting(0);

include "connection.php";
 
session_start();

if(!($_SESSION['officer_mail']))
{
			header("location: officer_login.php");
}								

		
/*
								if(isset($_POST['btn_delete']))
								{
									$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
									$count=$con->prepare("delete from `Tbl_post` where pst_id = :id");
									$count->bindParam(":id",$_POST['pst_id'],PDO::PARAM_INT);
									$count->execute();
									?>
									<script>
										alert("Post has been successfully deleted.");
									</script>
									 <?php
								}
								*/
								
$count=="";
?>




<!DOCTYPE HTML>

<html>
	<head>
		<title>View Complaints || E Citizen</title>
		
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
				
					<!--
						".inner" is set up as an inline-block so it automatically expands
						in both directions to fit whatever's inside it. This means it won't
						automatically wrap lines, so be sure to use line breaks where
						appropriate (<br />).
					-->
					<div class="inner" >

						<header>
							<h2>View Complaints</h2>
						</header>
						  <!---a href="#il13">Lession.2</a> <br /--->
			
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content">
			


							<div class="row" >

<?php
		$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $con->prepare("SELECT * FROM `Tbl_complaint` where `com_category` = '$_SESSION[officer_type]' order by com_date_time DESC");
		$stmt->execute();
		
		while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
		
?>		
						  	<div style="width:100%">
							<div style="color:black; border-radius:9px 9px 7px 7px" class="card">
							
							<form method="post">		
						<?php echo  $_SESSION[officer_type]; ?>
							  <p style="color:BLUE;text-align:left;text-transform:capitalize;font-size:18px; font-weight:bold"><?php echo $rows['com_title']; ?></p>
							  <div align="left" style="text-align:left"><a href="officer_update_complaint.php?id=<?php echo $rows['problem_id']; ?>"><img src="images/icon/view.png" height="40px" width="40px"/>  <br/>View</a> </div>
							</div>
							</div>
		</form>
	<?php
		}
	?>
	</div>
	
	
	<br/>
<span class='msg'><?php echo $msg; ?></span>

<br/>
<br/>
								
</form>



</div>					
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


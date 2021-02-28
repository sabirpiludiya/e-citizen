<?php

error_reporting(0);
include "connection.php";

?>

		

<!DOCTYPE HTML>

<html>
	<head>
		<title>Complaint Status || E Citizen</title>
		
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
		<style>
	

/* Header/Blog Title */
ul.gallery{    
margin-left: 3vw;     
margin-right:3vw;  
}    

.zoom {      
-webkit-transition: all 0.35s ease-in-out;    
-moz-transition: all 0.35s ease-in-out;    
transition: all 0.35s ease-in-out;     
cursor: -webkit-zoom-in;      
cursor: -moz-zoom-in;      
cursor: zoom-in;  
}     

.zoom:hover,  
.zoom:active,   
.zoom:focus {
/**adjust scale to desired size, 
add browser prefixes**/
-ms-transform: scale(7.5);    
-moz-transform: scale(7.5);  
-webkit-transform: scale(7.5);  
-o-transform: scale(7.5);  
transform: scale(7.5);    
position:relative;      
margin-left:40%;
z-index:100;  
}

/**To keep upscaled images visible on mobile, 
increase left & right margins a bit**/  
@media only screen and (max-width: 768px) {   
ul.gallery {      
margin-left: 15vw;       
margin-right: 15vw;
}

/**TIP: Easy escape for touch screens,
give gallery's parent container a cursor: pointer.**/
.DivName {cursor: pointer}
}


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
							<h2>Complaint Status</h2>
						</header>
						
			
				<div style="padding:5%;margin:0 auto;width:100%;text-align:left" align="center">
               
			   
                	<form id="registerform" method="post" name="registerform" enctype="multipart/form-data" class="content">
					
							<div class="row" >

<?php

		$con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $con->prepare("SELECT * FROM `Tbl_complaint` where problem_id='$_POST[txt_pid]'");
		$stmt->execute();
		
		$stmt2 = $con->prepare("Select count(*) from `tbl_probsoln` where soln_status = 1 and p_id='$_POST[txt_pid]'");
		$stmt2->execute();
		$count = $stmt2->fetch(PDO::FETCH_NUM); 
		$ct = reset($count);
				
		while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) 
		{
		
?>		
						  	<div style="width:100%">
							<div style="color:black; border-radius:9px 9px 7px 7px" class="card">
							
							<form method="post">		
						
							  <p style="color:BLUE;text-align:left;text-transform:capitalize;font-size:24px; font-weight:bold"><?php echo $rows['com_title']; ?></p><hr/>
							<?php 
								if($rows['com_img'] != ''){ ?>
							   <div align="left" style="text-align:left"><img  class="thumbnail zoom" src="<?php echo $rows['com_img']; ?>" height="80px" width="80px"/>  </div>
							 <?php }
							 ?> 
							  <p style="text-transform:capitalize;text-align:right">Report Date : <?php echo date("d M Y, h:i A", strtotime($rows['com_date_time'])); ?></p><hr/> <pre style="text-align:left;font-size:18px; font-weight:bold;white-space:pre-wrap;"><?php echo $rows['com_desc']; ?><br/></pre><hr/> 	
							  </hr>
							 <?php
							 	if($ct > 0)
								{
								?><hr/>
								<div class="alert alert-success" role="alert">
								  Problem is Solved  !
								</div>	
						<?php
								}
								else
								{ ?>
						
								<div class="alert alert-warning" role="alert">
								  Problem is in Pending  !
								</div>	
								
							<?php
								}
							 ?>
								<div class="form-group"><hr/>
									<h3 style="color:#6600CC"><b>Status Update History</b></h3>

<?php
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt1 = $con->prepare("SELECT * FROM `Tbl_probsoln` where p_id='$_POST[txt_pid]' order by dates DESC");
		$stmt1->execute();
		
		$c = 1;
		while($rows1 = $stmt1->fetch(PDO::FETCH_ASSOC)) 
		{ ?>
							<div><?php echo $c++; ?>)
							<h3 style="text-transform:capitalize">
							<?php echo $rows1['description']; ?>
							</h3>
							</div>
							<div>
							Status updated on : <?php echo date("d M Y, h:i A", strtotime($rows1['dates'])); ?>
							</div>
							<br/>
							<br/>

			<?php
		}		
?>

								</div><br/>
	
							</div>
							</div>
							
  </div>
<br/>
								
							
		</form>
	<?php
		}
	?>
	</div>
	
	
	<br/>

<br/>
<br/>
								
	
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

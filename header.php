			
			<!-- Header -->
				<header id="header" class="alt">
				
					<h1 id="logo"><a href="index.html"></a></h1>
					<nav id="nav" style="float:right">
						<ul>
							<li class="current"><a href="index.php">Welcome</a></li>
							<?php
							if($_SESSION['citizen_aadhar']!="")
							{ ?>
							<li><a href="citizen_complaint.php">Report Problems</a></li>
							<li><a href="citizen_apply_for_certificate.php">Certificates</a></li>
							<li><a href="citizen_complaint_report.php">Complaiin Status</a></li>
							<li><a href="citizen_post.php">Schemes</a></li>
							<li><a href="logout.php">LogOut</a></li>
							<?php 
							} 
							 else if($_SESSION['officer_mail'] !="")
							{
						?>
							<li><a href="officer_post_upload.php">Add Schemes</a></li>
							<li><a href="officer_register_requests.php">Register Requests</a></li>
							<li><a href="officer_certificate_requests.php">Certificate Requests</a></li>
							<li><a href="officer_view_complaint.php">View Complaint </a></li>
							<li><a href="logout.php">LogOut</a></li>
							<?php
							}
							//	else if(!$_SESSION['officer_mail'] && !$_SESSION['citizen_aadhar'])
						//		
							else{
							?>
							
							<li><a href="citizen_complaint.php">Report Problems</a></li>
							<li><a href="citizen_apply_for_certificate.php">Certificates</a></li>
							<li><a href="citizen_complaint_report.php">Complaiin Status</a></li>
							<li><a href="citizen_post.php">Schemes</a></li>
								<li><a href="citizen_login.php">Schemes</a></li>
							<?php
							}
							?>
						</ul>
					</nav>
				</header>
				<div style="width:100%;background-color:rgba(0,0,0,1);"><img id="myHead" class="logo"  src="IMAGES/logo1.png" style=";margin-top:5px;;width:60px;align:left;"/></div>

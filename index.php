    <?php 
	session_start();
	error_reporting(0);
	?>

<!DOCTYPE html>
<html>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
<link rel="stylesheet" href="assets/css/main.css" />
 
 <link rel="stylesheet" href="assets/css/header.css">
	
<link rel="stylesheet" href="assets/css/forms.css">
<link rel="stylesheet" href="assets/css/validation_notice_add.css">
<link rel="stylesheet" href="assets/css/header.css">
<link rel="stylesheet" href="assets/css/index.css">
<link rel="stylesheet" href="assets/css/med.css">
<body class="index">
    <div id="page-wrapper">
    <?php include("header.php");?>
    <div id="im">
        <a href="https://digilocker.gov.in/">
           <img src="IMAGES/ban1.jpg" class="mySlides" alt="boat" style="width:100%;height:500px;"> 
        </a>
        <img src="IMAGES/mukhyamantri-nidan-yojana.jpg" class="mySlides" alt="boat" style="width:100%;height:500px;">
        <a href="https://jioprime.org/namo-e-tablet-yojana-gujarat-booking/">
            <img src="IMAGES/Namo-E-TAB.png" class="mySlides" alt="boat" style="width:100%;height:500px;">
        </a>
    </div>
    <div class="w3-container w3-padding-64 w3-center" id="certi">
        <h2>Certificates</h2>
        <p>Apply for Certificates:</p>
        <div> <br>
            <div class="w3-row" align="center">
                <div class="w3-quarter" style="width: 190px;margin-left: 80px">
                    <a href="citizen_income_application.php">
                        <div class="ksize">
                            <img src="IMAGES/icon/income.png" alt="Boss" style="height:70px;" class="w3-hover-opacity">
                        </div>
                        <h3>Income Certificate</h3>
                    </a>
                </div>
                <div class="w3-quarter" style="width: 190px;margin-left: 80px">
                    <a href="citizen_scst_application.php">
                        <div class="ksize">
                            <img src="IMAGES/icon/scst.png" alt="Boss"  class="w3-hover-opacity ">
                        </div>
                        <h3>Cast Certificate</h3>
                    </a>
                </div>
                <div class="w3-quarter" style="width: 190px;margin-left: 80px">
                    <a href="citizen_non_creamylayer_application.php">
                        <div class="ksize">
                            <img src="IMAGES/icon/ncl.png"  alt="Boss"  class="w3-hover-opacity ">
                        </div>
                        <h3>NonCreamylayer Certificate</h3>
                    </a>
                </div>
                <div class="w3-quarter" style="width: 190px;margin-left: 80px">
                    <a href="citizen_sebc_application.php">
                        <div class="ksize">
                            <img src="IMAGES/icon/sebc.png"  alt="Boss"  class=" w3-hover-opacity ">
                        </div>
                        <h3>SEBC Certificate</h3> 
                    </a>
                </div>

                <div class="w3-quarter" style="width: 100px;margin-left: 80px">
                    <a href="citizen_senior_citizen_application.php">
                        <div class="ksize">
                        <img src="IMAGES/icon/senior_citizen.png" style="height:80px" class="w3-hover-opacity " >
                        </div>
                        <h3>Sr.Citizen Certificate</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

<div class="w3-quarter" id="schemes">
<h2><a href="citizen_post.php">Schemes</a></h2>
<p>Lorem ipsum dolor sit amet, concitizen_apply_for_certificate.phpsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&nbsp;&nbsp;&nbsp;<a href=""> more</a></p>




    
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
    <h4 align="center" style=><strong>E-Mamta Scheme</strong></h4>
  <img src="IMAGES/e-Mamta-Yojana.jpg" alt="Snow" style="width:100%">
  <div class="w3-container">
  <p>The Health and Family Welfare Department of the Government of Gujarat has introduced a ‘Mother & Child’ name based tracking Information management system called “E-Mamta”. This system starts by registering the name of the mother and the child of 0- 6 years and then providing them with the knowledge, basic facilities, Body checkup and regular medication with the specialized doctor.</p>
  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
    <h4 align="center" style=><strong>NFBS</strong></h4>
  <img src="IMAGES/nf.jpg" alt="Lights" style="width:100%">
  <div class="w3-container">
    <p>
        National Family Benefit Scheme (NFBS) is a social sector scheme and forms part of the National Social Assistance Programme (NSAP) which came into effect from 15th August, 1995. This scheme provides social assistance and benefits to the eligible families.The number of beneficiaries reported under NFBS was 85209 in 2002-03. The number of beneficiaries reported under NFBS was 209456 in 2003-04.
    </p>
  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
    <h4 align="center" style=><strong>Kailash Dham Yojana</strong></h4>
  <img src="IMAGES/kailash.jpg" alt="Mountains" style="width:100%">
  <div class="w3-container">
  <p>
        Urban Development and Urban Housing Department has implemented this scheme vide resolution No. VSBH/112006/4058/r, dt.5/01/2007 to provide grant-in-aid for construction of more and more crematorium in Municipalities area to minimize the consumption of wood and to save the environment damage by&nbsp;ss smoke.<br><br>

  </p>
  </div>
  </div>
</div>

</div>
<?php include("footer.php");?>
</div>
</body>

<!--slide...-->
<script type="text/javascript">
    var myIndex = 0;
    imgChange();
    function imgChange() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++)
    {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(imgChange, 4000); // Change image every 2 seconds
}
</script>
</html>
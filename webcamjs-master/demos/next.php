<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script type="text/javascript">
	document.cookie("imageof");

</script>
<body>
	<?php
	 $img= $_POST['hid'];
	 //echo ($img);
	 ?>
	 <img src="<?php echo $img; ?>">
</body>
</html>
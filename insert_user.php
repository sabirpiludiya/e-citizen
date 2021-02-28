<?php



$encryption_key_256bit = base64_encode(openssl_random_pseudo_bytes(32));

//$key is our base64 encoded 256bit key that we created earlier. You will probably store and define this key in a config file.
$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';

function my_encrypt($data, $key) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // Generate an initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
    return base64_encode($encrypted . '::' . $iv);
}

include "connection.php";


try{

$aadhar_id = $_COOKIE['aadhar_id']; 

$dob =  $_COOKIE['dob']; 

$mobile = $_COOKIE['mobile']; 

$mail = $_COOKIE['mail']; 

$pwd = $_COOKIE['pwd']; 

  $stmt = $con->prepare("INSERT INTO `tbl_user` (u_aadhar_id,u_dob,u_mobile,u_mail,u_pwd,u_status) VALUES (:u_aadhar_id,:u_dob,:u_mobile,:u_mail,:u_pwd, 0)");
    $stmt->bindParam(':u_aadhar_id', $aadhar_id );
    $stmt->bindParam(':u_dob', $dob);
    $stmt->bindParam(':u_mobile', $mobile);
	$stmt->bindParam(':u_mail', $mail);
	echo $en = my_encrypt($pwd, $key);
	$stmt->bindParam(':u_pwd', $en);

    $stmt->execute();
    echo "New records created successfully";
	?>
	
	<script>
		alert("You are Registered..");	
	</script>
	
	
	<?php	
	header("location:index.php");

    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }


 	setcookie("msg", "Your request for registration is done", time()+3600, "/","", 0);
		


?>

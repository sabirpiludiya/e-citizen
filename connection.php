<?php

//	$con = mysql_connect('localhost','root','') or die("Connection Error");
/*
	$con = mysqli_connect('localhost', "root", "", "db_ecitizen");

	if (!$con) 
	{	
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
*/


	$db="db_ecitizen";
	$host="localhost";
	$uname="root";
	$pass="";
		
    try
    {
        $con = new PDO("mysql:host=$host;dbname=$db", $uname, $pass);
        //echo "Connection successfull";
    }
    catch (Exception $e)
    {
        echo "connection failed:-".$e->getMessage();
    }
?>
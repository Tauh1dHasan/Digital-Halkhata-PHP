<?php 
$con = mysqli_connect('localhost', 'root', '', 'small_bms');
if (!$con) {
	echo "Database connection failed: ";
	mysqli_connect_errno($con);
	die();
	echo "<script> location = 'login.php' </script>";
}


?>
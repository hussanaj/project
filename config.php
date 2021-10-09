<?php
	 $servername = "128.199.103.49";
	 $username 	= "kkken";
	 $password 	= "ken220641";
     $dbname 	= "projectfeed";
    

	// // 1. Create connection
	 $conn = new mysqli($servername, $username, $password, $dbname);

	// // 1.1 Check connection
	 if ($conn->connect_error) {
	 	die("Connection failed: " . $conn->connect_error);
 }

	 mysqli_set_charset( $conn, 'utf8');

	

?>


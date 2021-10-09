<?php
	 $servername = "localhost";
	 $username 	= "kkken";
	 $password 	= "ken220641";
     $dbname 	= "projectfeed";
    $image = $_FILES['file']['name'];
    $target = "img/".basename($image);

	// // 1. Create connection
	 $conn = new mysqli($servername, $username, $password, $dbname);

	// // 1.1 Check connection
	 if ($conn->connect_error) {
	 	die("Connection failed: " . $conn->connect_error);
 }

	 mysqli_set_charset( $conn, 'utf8');

	$sql = "INSERT INTO photo (photo_name,photo_path) VALUES ('$image','$target')";
	
  	// execute query
	  $result = mysqli_query($conn, $sql);
	  if($result == true){
		print_r($_FILES);
		move_uploaded_file($_FILES['file']['tmp_name'],"$target");
	  }


?>

<?php 
	session_start();

    include("config.php");

	$fish_pond = $_GET['fish_pond'];
	$sql1= "DELETE FROM `aquatic_animals` WHERE fish_pond = $fish_pond";

	if($conn->query($sql1) === true){
		$sql2= "DELETE FROM `couple` WHERE fish_pond = $fish_pond";
	}

	if($conn->query($sql2) === true){
		$sql3= "DELETE FROM `operator` WHERE fish_pond = $fish_pond";
	}
	if($conn->query($sql3) === true){
		$sql4= "DELETE FROM `ratio_food` WHERE fish_pond = $fish_pond";
	}
	if($conn->query($sql4) === true){
		$sql5= "DELETE FROM `sensor_standard` WHERE fish_pond = $fish_pond";
	}
	if($conn->query($sql5) === true){
		$sql6= "DELETE FROM `time_food` WHERE fish_pond = $fish_pond";
	}



	if($conn->query($sql6) === true){
		header("Location: main.php");
	}else{
		echo "Error: " .$sql . "<br>" . $conn->error;
	}
 ?>
 

 
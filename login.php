<?php 
session_start();
	require_once("config.php");

	$username = $_POST['username'];
	$passwords =$_POST['pswd'];

    $sql = "SELECT * FROM `logins` WHERE username='$username' AND passwords='$passwords' ";  
    
	$result = $conn->query($sql);
	if ($result) { 
		echo "OK";
        $row = $result->fetch_assoc();/*  Edit*/
        
		$_SESSION["username"] 	= $row['username'];
		$_SESSION["level"]		= $row['level']; /*Edit*/
        $lv = $row['level'];
        echo $lv;
        echo "johugii";
		
		/*////////////////Edit//////////////////////////////////*/
		if ($row['level'] =='1') {   
			header('location:main.php');
		
		}else{
			header('location:main.php');
		}
		//////////////////////////////////////////////////////////
	}else{
		echo "NOT";
		header('location:index.php');
	}

 ?>
<?php
	require_once('include/connection.php');//include databse connection

	session_start();
	if(isset($_SESSION['user_name'])){
		// remove  session variables
		session_unset($_SESSION['user_name']);
		session_unset($_SESSION['type']);
		session_unset($_SESSION['id']);
		$user_name = $_SESSION['user_name'];
		header("Location: login.php");
		$update_msg = mysqli_query($db,"UPDATE employee SET log_in = 'offline' WHERE user_name = '$user_name'");
		exit();
	}
?>
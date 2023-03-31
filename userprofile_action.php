<?php 
	include "./connect2.php";

	$useremail = $_POST['user_email'];
	$password = $_POST['user_password'];

	$sql = "SELECT * FROM user WHERE user_email = '$useremail'";
	$result = mysqli_query($link,$sql);
	$count = mysqli_num_rows($result);

?>
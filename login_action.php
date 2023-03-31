<?php 
	include "./connect2.php";

	$useremail = $_POST['user_email'];
	$password = $_POST['user_password'];

	$sql = "SELECT * FROM user WHERE user_email = '$useremail' AND user_password = '$password'";
	$result = mysqli_query($link,$sql);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		echo json_encode("Success");
	}else{
		echo json_encode("Error");
	}

?>
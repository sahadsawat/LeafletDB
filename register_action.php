<?php
	include "./connect2.php";
	if (!$link) {
		echo "Database connection faild";
	}
    mysqli_set_charset($link, "utf8");

	$useremail = $_POST['user_email'];
	$password = $_POST['user_password'];
    $firstname = $_POST['first_name'];
	$lastname = $_POST['last_name'];
    $usertel = $_POST['user_tel'];
    $userlineid = $_POST['user_lineid'];
    $majorid = $_POST['major_id'];



	$sql = "SELECT user_email FROM user WHERE user_email = '$useremail'";

	$result = mysqli_query($link,$sql);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		echo json_encode("Error");
	}else{
		$insert = "INSERT INTO user(user_email,user_password,first_name,last_name,user_tel,user_lineid,major_id)VALUES('$useremail','$password','$firstname','$lastname','$usertel','$userlineid','$majorid')";
		$query = mysqli_query($link,$insert);
		if ($query) {
			echo json_encode("Success");
		}
	}

?>
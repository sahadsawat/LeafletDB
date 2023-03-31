<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
include "./connect2.php";

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
			
		$userid = $_GET['user_id'];		
		$textuseremail = $_GET['user_email'];
		$textpassword = $_GET['user_password'];
		$textfirstname = $_GET['first_name'];
		$textlastname = $_GET['last_name'];
		$textusertel = $_GET['user_tel'];
		$textuserlineid = $_GET['user_lineid'];
        $_selectedmajorName = $_GET['major_id'];

		
		
							
		$sql = "UPDATE user SET user_email = '$textuseremail', user_password = '$textpassword', first_name = '$textfirstname', last_name = '$textlastname', user_tel = '$textusertel', user_lineid = '$textuserlineid',major_id='$_selectedmajorName' WHERE user_id = '$userid'";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome Master UNG";
   
}

	mysqli_close($link);
?>
<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
$link = mysqli_connect('localhost', 'root', '', "db_app_leaflet");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}

if (!$link->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $link->error);
    exit();
	}


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
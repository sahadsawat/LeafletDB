<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
include "./connect2.php";

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
				
		$User_email = $_GET['user_email'];

		$result = mysqli_query($link, "SELECT * FROM user WHERE user_email = '$User_email'");

		if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;

			}	// while

			echo json_encode($output);

		} //if

	} else echo "Welcome Master UNG";	// if2
   
}	// if1


?>
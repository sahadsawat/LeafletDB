<?php 
	$db = mysqli_connect('localhost','root','','db_app_leaflet');

	$useremail = $_POST['user_email'];
	$password = $_POST['user_password'];

	$sql = "SELECT * FROM user WHERE user_email = '$useremail'";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

?>
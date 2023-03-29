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

		$result = mysqli_query($link, "SELECT t1.*,t2.locat_name,t3.cate_name,t4.user_email
		FROM db_app_leaflet.seeobj t1
		LEFT JOIN db_app_leaflet.location t2 ON t2.locat_id = t1.locat_id
		LEFT JOIN db_app_leaflet.category t3 ON t3.cate_id = t1.cate_id
		LEFT JOIN db_app_leaflet.user t4 ON t4.user_id = t1.user_id
		WHERE t1.user_id = '$userid'");

		if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;

			}	// while

			echo json_encode($output);

		} //if

	} else echo "Welcome Master UNG";	// if2
   
}	// if1


	mysqli_close($link);
?>
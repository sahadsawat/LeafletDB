<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

include "./connect2.php";

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
				
		$reportobj_status = $_GET['reportobj_status'];

		$result = mysqli_query($link, "SELECT t1.*,t2.locat_name,t3.cate_name,t4.user_email
		FROM db_app_leaflet.reportobj t1
		LEFT JOIN db_app_leaflet.location t2 ON t2.locat_id = t1.locat_id
		LEFT JOIN db_app_leaflet.category t3 ON t3.cate_id = t1.cate_id
		LEFT JOIN db_app_leaflet.user t4 ON t4.user_id = t1.user_id
		WHERE t1.reportobj_status = '$reportobj_status'");

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
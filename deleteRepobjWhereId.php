<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
include "./connect2.php";

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
				
		$Repobj_id = $_GET['reportobj_id'];	
							
		$sql = "DELETE FROM reportobj WHERE reportobj_id = '$Repobj_id'";

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
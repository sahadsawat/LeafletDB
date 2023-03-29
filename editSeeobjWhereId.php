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
			
		$seeobjid = $_GET['seeobj_id'];
		$seeobjname = $_GET['seeobj_name'];
		$urlPathImage = $_GET['seeobj_photo'];
		$seeobjstatus = $_GET['seeobj_status'];
		$seeobjdetail = $_GET['seeobj_detail'];
		$seeobjdate = $_GET['seeobj_date'];
        $_selectedcateName = $_GET['cate_id'];
        $_selectedlocatName = $_GET['locat_id'];
        $userid = $_GET['user_id'];
		
							
		$sql = "UPDATE seeobj SET seeobj_name ='$seeobjname',
        seeobj_photo='$urlPathImage',
        seeobj_status='$seeobjstatus',
        seeobj_detail='$seeobjdetail',
        seeobj_date='$seeobjdate',
        cate_id='$_selectedcateName',
        locat_id='$_selectedlocatName',
        user_id='$userid'WHERE seeobj_id = '$seeobjid'";

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
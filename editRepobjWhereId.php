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
			
		$repobjid = $_GET['reportobj_id'];
		$repobjname = $_GET['reportobj_name'];
		$urlPathImage = $_GET['reportobj_photo'];
		$repobjstatus = $_GET['reportobj_status'];
		$repobjdetail = $_GET['reportobj_detail'];
		$repobjdate = $_GET['reportobj_date'];
        $_selectedcateName = $_GET['cate_id'];
        $_selectedlocatName = $_GET['locat_id'];
        $userid = $_GET['user_id'];
		
							
		$sql = "UPDATE reportobj SET reportobj_name ='$repobjname',
        reportobj_photo='$urlPathImage',
        reportobj_status='$repobjstatus',
        reportobj_detail='$repobjdetail',
        reportobj_date='$repobjdate',
        cate_id='$_selectedcateName',
        locat_id='$_selectedlocatName',
        user_id='$userid'WHERE reportobj_id = '$repobjid'";

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
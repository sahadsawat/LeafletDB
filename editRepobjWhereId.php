<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
include "./connect2.php";

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
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_app_leaflet";
$table = "seeobj";
$table2 = "location";

$action = isset($_POST['action']) ? $_POST['action'] : '';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if('GET_ALL' == $action){
    $dbdata = array();
    $sql = "SELECT t1.seeobj_id ,t1.seeobj_name,t1.seeobj_photo,t1.seeobj_status,t1.seeobj_detail,t1.seeobj_date,t1.cate_id,t1.locat_id,t1.user_id,t2.locat_name,t3.user_email FROM $table t1 INNER JOIN $table2 t2 ON t1.locat_id = t2.locat_id INNER JOIN user t3 ON t3.user_id = t1.user_id ORDER BY seeobj_id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $dbdata[]=$row;
        }
        echo json_encode($dbdata);
    } else {
        echo "error";
    }
    $conn->close();
    return;
}
if('GET_ALL2' == $action){
    $dbdata = array();
    $sql = "SELECT *
            FROM $table2";
    $result = mysqli_query($conn,$sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        while($row = $result->fetch_object()) {
            $dbdata[]=$row;
        }
        echo json_encode($dbdata);
    } else {
        echo "error1";
    }
    $conn->close();
    return;
}


if('ADD_SEEOBJ' == $action){
    
    $seeobjname = $_POST['seeobj_name'];
    $urlPathImage = $_POST['seeobj_photo'];
    // $repobjstatus = $_POST['seeobj_status'];
	$seeobjdetail = $_POST['seeobj_detail'];
    $seeobjdate = $_POST['seeobj_date'];
    $cateid = $_POST['cate_id'];
    $locatid = $_POST['locat_id'];
    $userid = $_POST['user_id'];
    // $userunknown = $_POST['user_unknown'];

    
    $sql = "INSERT INTO seeobj(seeobj_name,seeobj_photo,seeobj_detail,seeobj_date,cate_id,locat_id,user_id)VALUES('$seeobjname','$urlPathImage','$seeobjdetail','$seeobjdate','$cateid','$locatid','$userid')";
    $result = $conn->query($sql);
    echo 'success';
    return;
}

if('UPDATE_SEEOBJ' == $action){
	$seeobjid = $_POST['seeobj_id'];
	$seeobjname = $_POST['seeobj_name'];
    $seeobjphoto = $_POST['seeobj_photo'];
    $seeobjstatus = $_POST['seeobj_status'];
	$seeobjdetail = $_POST['seeobj_detail'];
    $seeobjdate = $_POST['seeobj_date'];
    $cateid = $_POST['cate_id'];
    $locatid = $_POST['locat_id'];
    $userid = $_POST['user_id'];
    $sql = "UPDATE $table SET seeobj_name = '$seeobjname',
							seeobj_photo = '$seeobjphoto',
							seeobj_status = '$seeobjstatus',
							seeobj_detail = '$seeobjdetail',
							seeobj_date = '$seeobjdate',
							cat_id = '$cateid',
							locat_id = '$locatid',
							user_id = '$userid'
							WHERE seeobj_id = $seeobjid";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
    $conn->close();
    return;
}
if('UPDATE_SEEOBJ2' == $action){
	$seeobjid = $_POST['seeobj_id'];
	$seeobjname = $_POST['seeobj_name'];
    // $repobjphoto = $_POST['reportobj_photo'];
    $seeobjstatus = $_POST['seeobj_status'];
	// $repobjdetail = $_POST['reportobj_detail'];
    // $repobjdate = $_POST['reportobj_date'];
    // $cateid = $_POST['cate_id'];
    // $locatid = $_POST['locat_id'];
    // $userid = $_POST['user_id'];
    $sql = "UPDATE $table SET seeobj_name = '$seeobjname',
							seeobj_status = '$seeobjstatus'
							WHERE seeobj_id = $seeobjid";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
    $conn->close();
    return;
}

if('DELETE_SEEOBJ' == $action){
	$seeobjid = $_POST['seeobj_id'];
    $sql = "DELETE FROM $table WHERE seeobj_id = $seeobjid";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
    $conn->close();
    return;
}

	// $db = mysqli_connect('localhost','root','','db_app_leaflet');
	// if (!$db) {
	// 	echo "Database connection faild";
	// }
    // mysqli_set_charset($db, "utf8");
    
    // // $repobjid = $_POST['reportobj_id'];
	// $repobjname = $_POST['reportobj_name'];
	// $urlPathImage = $_POST['reportobj_photo'];
    // // $repobjstatus = $_POST['reportobj_status'];
	// $repobjdetail = $_POST['reportobj_detail'];
    // $repobjdate = $_POST['reportobj_date'];
    // $_selectedcateName = $_POST['cate_id'];
    // $_selectedlocatName = $_POST['locat_id'];
    // // $userid = $_POST['user_id'];


	// $sql = "SELECT reportobj_name FROM reportobj WHERE reportobj_name = '$repobjname'";

	// $result = mysqli_query($db,$sql);
	// $count = mysqli_num_rows($result);

	// if ($count == 1) {
	// 	echo json_encode("Error");
	// }else{
	// 	$insert = "INSERT INTO reportobj(reportobj_name,reportobj_photo,reportobj_detail,reportobj_date,cat_id,locat_id)VALUES('$repobjname','$urlPathImage','$repobjdetail','$repobjdate','$_selectedcateName','$_selectedlocatName')";
	// 	// $insert = "INSERT INTO reportobj(reportobj_name,reportobj_detail,cate_id,locat_id)VALUES('$repobjname','$repobjdetail','$cate_id','$locatid')";
	// 	$query = mysqli_query($db,$insert);
	// 	if ($query) {
	// 		echo json_encode("Success");
	// 	}
	// }

?>
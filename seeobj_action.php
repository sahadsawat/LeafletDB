<?php
include "./connect.php";
$table = "seeobj";
$table2 = "location";
$action = isset($_POST['action']) ? $_POST['action'] : '';
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
?>
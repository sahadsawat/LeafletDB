<?php
include "./connect.php";
$table = "user";

$action = isset($_POST['action']) ? $_POST['action'] : '';

if('GET_ALL' == $action){
    $dbdata = array();
    $sql = "SELECT user_id,user_email,user_password,first_name,last_name,user_tel,user_lineid,major_id FROM $table ORDER BY user_id DESC";
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

// if('ADD_USER' == $action){
//     $user_id = $_POST['user_id'];
//     $user_email = $_POST['user_email'];
//     $user_password = $_POST['user_password'];
//     $first_name = $_POST['first_name'];
//     $last_name = $_POST['last_name'];
//     $user_tel = $_POST['user_tel'];
//     $user_lineid = $_POST['user_lineid'];
//     $major_id = $_POST['major_id'];
//     $sql = "INSERT INTO $table (user_id,user_email,user_password,first_name,last_name,user_tel,user_lineid,major_id) VALUES('$user_id','$user_email','$user_password','$first_name','$last_name','$user_tel','$user_lineid','$major_id')";
//     $result = $conn->query($sql);
//     echo 'success';
//     return;
// }

if('UPDATE_USER' == $action){
    $user_id = $_POST['user_id'];
    $user_email = $_POST['user_email'];
    $user_tel = $_POST['user_tel'];
    $user_password = $_POST['user_password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_tel = $_POST['user_tel'];
    $user_lineid = $_POST['user_lineid'];
    $major_id = $_POST['major_id'];
    $sql = "UPDATE $table SET user_id = '$user_id',user_email = '$user_email',user_password = '$user_password',first_name = '$first_name',last_name = '$last_name',user_tel = '$user_tel',user_lineid = '$user_lineid',major_id = '$major_id', WHERE user_email = $user_email";
    // $sql = "UPDATE $table SET user_email = '$user_email',user_tel = '$user_tel' WHERE user_id = $user_id";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
    $conn->close();
    return;
}

if('DELETE_USER' == $action){
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM $table WHERE user_id = $user_id";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
    $conn->close();
    return;
}


?>
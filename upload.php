<?php
header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
include "./connect2.php";

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
				
		// $idShop = $_GET['idShop'];		
		// $NameFood = $_GET['NameFood'];
		// $PathImage = $_GET['PathImage'];
		// $Price = $_GET['Price'];
		// $Detail = $_GET['Detail'];
		
        $repobjname = $_GET['reportobj_name'];
        $urlPathImage = $_GET['reportobj_photo'];
		// $repobjstatus = $_GET['reportobj_status'];
	    $repobjdetail = $_GET['reportobj_detail'];
        $repobjdate = $_GET['reportobj_date'];
        $_selectedcateName = $_GET['cate_id'];
        $_selectedlocatName = $_GET['locat_id'];
        // $userid = $_GET['user_id'];					
		
        
        $sql = "INSERT INTO reportobj(reportobj_name,reportobj_photo,reportobj_detail,reportobj_date,cate_id,locat_id) VALUES ('$repobjname','$urlPathImage','$repobjdetail','$repobjdate','$_selectedcateName','$_selectedlocatName')";

		$result = mysqli_query($link, $sql);

		if ($result) {
			echo "true";
		} else {
			echo "false";
		}

	} else echo "Welcome Master UNG";
   
}
	mysqli_close($link);

// error_reporting(E_ERROR | E_PARSE);

// // Response object structure
// $response = new stdClass;
// $response->status = null;
// $response->message = null;

// // Uploading file
// $destination_dir = "reportimage/";
// $base_filename = basename($_FILES["file"]["name"]);
// $target_file = $destination_dir . $base_filename;

// if(!$_FILES["file"]["error"])
// {
//     if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {        
//         $response->status = true;
//         $response->message = "File uploaded successfully";

//     } else {

//         $response->status = false;
//         $response->message = "File uploading failed";
//     }    
// } 
// else
// {
//     $response->status = false;
//     $response->message = "File uploading failed";
// }

// header('Content-Type: application/json');
// echo json_encode($response);

    // $db = mysqli_connect('localhost','root','','db_app_leaflet');
    // if (!$db) {
    //     echo "Database connection faild";
    // }

    // $image = $_FILES['image']['name'];
    // $name = $_POST['name'];

    // $imagePath = 'reportimage/'.$image;
    // $tmp_name = $_FILES['image']['tmp_name'];

    // move_uploaded_file($tmp_name,$imagePath);

    // $db->query("");
?>


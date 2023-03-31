<?php
include "./connect2.php";
mysqli_set_charset($link, "utf8");

if (!$link) {
    echo "database connect faild";
}

$person = $link->query("SELECT * FROM faculty");
$list = array();

while ($rowdata = $person->fetch_assoc()) {
    $list[] = $rowdata;
}

echo json_encode($list);
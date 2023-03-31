<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_app_leaflet";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
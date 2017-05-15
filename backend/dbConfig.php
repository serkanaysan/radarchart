<?php
$servername = "localhost";
$username = "mahallem_root";
$password = "uHy96t";
$dbname = "mahallem_istanbul";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn,"utf8");

?>
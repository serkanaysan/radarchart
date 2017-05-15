<?php

include("../backend/dbConfig.php");

if(isset($_GET["id"])){
    $query = "SELECT id, ilce, demografikyapi, egitimaltyapisi, sosyalyasam, saglik, ekonomikkapasite, ticarihayatgirisimcilik, finansalyapi, turizm, altyapi, ulasim, rekabet, aciklama  FROM radarchart WHERE id=".$_GET["id"];
}
else{
    $query = "SELECT id, ilce FROM radarchart";
}

//execute query
$result = mysqli_query($conn, $query);

//create an array
$emparray = array();
while($row =mysqli_fetch_assoc($result))
{
    $emparray[] = $row;
}

header("Content-Type: application/json; charset=utf-8;");
echo json_encode($emparray, JSON_PRETTY_PRINT);

//close the db connection
mysqli_close($conn);

?>
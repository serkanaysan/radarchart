<?php

include("../backend/dbConfig.php");

if(isset($_GET["id"])){
    $query = "SELECT id, ilce, round(demografikyapi, 2) as demografikyapi, round(egitimaltyapisi, 2) as egitimaltyapisi, round(sosyalyasam, 2) as sosyalyasam, round(saglik, 2) as saglik, round(ekonomikkapasite, 2) as ekonomikkapasite, round(ticarihayatgirisimcilik, 2) as ticarihayatgirisimcilik, round(finansalyapi, 2) as finansalyapi, round(turizm, 2) as turizm, round(altyapi, 2) as altyapi, round(ulasim, 2) as ulasim, round(rekabet, 2) as rekabet, aciklama  FROM radarchart WHERE id=".$_GET["id"];
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
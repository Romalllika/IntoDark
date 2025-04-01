<?php
include 'db.php';

// $count_all = range(1, 10);

// shuffle($count_all);

// $count = array_slice($count_all, 0, 5);
session_start();
$id = $_SESSION['loc_id'];

$query_m = "SELECT `power`,`health`,`monster_image` FROM `monsters` WHERE `id_monster` = $id";
try{
    $result_m = mysqli_query($link,$query_m);

}catch(Exception $err){
    echo'Ошибка запроса  '.$err;
}

$stats_m = [];
while($sts = mysqli_fetch_assoc($result_m)){
    $stats_m[] = $sts;
}

echo json_encode($stats_m);
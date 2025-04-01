<?php
session_start();
include 'db.php';

$selected_hero = (int)$_SESSION['hero'];

// $query_m = "SELECT `power`,`health`,`monster_image` FROM `monsters`";
$query_h = "SELECT `name_hero`, `power`, `dexterity`, `health`, `armor`, `weapon`, `picture` FROM `heroes`, `heroes_images` WHERE heroes.hero_image = heroes_images.id AND `id_hero` = $selected_hero";
try{
    // $result_m = mysqli_query($link,$query_m);
    $result_h = mysqli_query($link, $query_h);
}catch(Exception $err){
    echo'Ошибка запроса  '.$err;
}

$stats_h = [];
while($sts = mysqli_fetch_assoc($result_h)){
    $stats_h[] = $sts;
}

// $stats_m = [];
// while($sts = mysqli_fetch_assoc($result_m)){
//     $stats_m[] = $sts;
// }

if(mysqli_num_rows($result_h) != 0){
    echo json_encode($stats_h);
}else{
    echo'Данные не получены';
}
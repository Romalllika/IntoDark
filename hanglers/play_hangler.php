<?php

include 'db.php';

session_start();
$selected_hero = (int) $_SESSION['hero'];

$query = "SELECT `id_monster` FROM `monsters`";
try{
    $result = mysqli_query($link, $query);
}catch(Exception $err){
    echo 'Ошибка вывода'.$err;
}

$query_hero = "SELECT `name_hero`, `power`,`health`,`armor`,`weapon`, `alt_img` FROM `heroes` WHERE `id_hero` = $selected_hero";
try{
    $result_hero = mysqli_query($link, $query_hero);
}catch(Exception $err){
    echo 'Ошибка вывода: '.$err;
}

$id = $_SESSION['loc_id'];
// foreach($total_arr as $i){
$query_unit = "SELECT * FROM `monsters` WHERE `id_monster` = $id";
try{
    $result_unit = mysqli_query($link, $query_unit);
}catch(Exception $err){
    echo 'Ошибка вывода: '.$err;
}
// }

$units = [];
while($unit = mysqli_fetch_assoc($result_unit)){
    $units[] = $unit;
}

$hero_stats = [];
while($hero = mysqli_fetch_assoc($result_hero)){
    $hero_stats[] = $hero;
}


$query_l = "SELECT `image` FROM `location` WHERE `id_cell` = $id";
try{
    $result_l = mysqli_query($link, $query_l);

}catch(Exception $err){
    echo'Ошибка вывода';
}

$img = mysqli_fetch_assoc($result_l);
$image = $img['image'];
// var_dump($hero_stats);
// var_dump($selected_hero);
// var_dump($units);
// var_dump($rand_arr);
// var_dump($total_arr);

include '../views/play.php';

mysqli_close($link);
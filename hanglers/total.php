<?php

include 'db.php';
session_start();
$hero = (int)$_SESSION['hero'];

//обновение количества проведенных вылазок героем
$query_f = "SELECT `battles` FROM `heroes` WHERE `id_hero` = $hero";
try{
    $result = mysqli_query($link, $query_f);
}catch(Exception $err){
    echo $err;
}

$battles = mysqli_fetch_assoc($result);
$total_battles = $battles['battles'] + 1;


$query_up = "UPDATE `heroes` SET `battles` = '$total_battles' WHERE `heroes`.`id_hero` = $hero";
try{
    $result = mysqli_query($link, $query_up);
}catch(Exception $err){
    echo $err.'<br><br>'.$query_up;
}

// обновление уровня пользователя
// проработать логический набор опыта (новый уровень за 100 поинтов и тп)
$location_id = (int)$_SESSION['id_cell_for_exp'];
$query_l = "SELECT `experience` FROM `location` WHERE `id_cell` = $location_id";
try{
    $result = mysqli_query($link, $query_l);
}catch(Exception $err){
    echo $err.'<br><br>'.$query_l;
}

$exp = mysqli_fetch_assoc($result);
$total_exp = $exp['experience'];

$_SESSION['user_exp'] += $total_exp;
echo $_SESSION['user_exp'], $_SESSION['login'];

//проверка уровня аккаунта
$username = $_SESSION['login'];
$query_user_lvl = "SELECT `level` FROM `progress` WHERE `username` = '$username'";
try{
    $result_lvl = mysqli_query($link, $query_user_lvl);
}catch(Exception $err){
    echo $err.'<br><br>'.$query_user_lvl;
}
$level = mysqli_fetch_assoc($result_lvl);

//обновление уровня
if($_SESSION['user_exp'] >= 100){
    $_SESSION['user_exp'] = 0;
    $new_lvl = $level['level'] + 1;

    $query_new_lvl = "UPDATE `progress` SET `level` = $new_lvl WHERE `progress`.`username` = '$username'";
    try{
        $result = mysqli_query($link, $query_new_lvl);
    }catch(Exception $err){
        echo $err.'<br><br>'.$query_new_lvl;
    }
}

header('location: ../views/game.php');
exit;
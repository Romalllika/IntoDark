<?php

session_start();
include 'db.php';
$user = $_SESSION['login'];

$query = "SELECT `username`,`level`,`name_hero`,`battles`,`picture` FROM `progress`,`heroes`, `heroes_images` WHERE heroes.hero_image = heroes_images.id AND `battles` = (SELECT MAX(`battles`) FROM `heroes`) AND `username` = '$user'";
try{
    $result = mysqli_query($link, $query);
}catch (Exception $err){
    echo $err;
}

$user = [];
while($u = mysqli_fetch_assoc($result)){
    $user[] = $u;
}
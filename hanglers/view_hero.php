<?php

include 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = "SELECT `id_hero`, `name_hero`, `power`, `dexterity`, `health`, `armor`, `level_hero`, `battles`, `picture`, `weapon_name` FROM `heroes`, `heroes_images`, `weapons` WHERE heroes.hero_image = heroes_images.id AND heroes.weapon = weapons.id_weapon AND `id_hero` = $id";
try{
    $result = mysqli_query($link, $query);
}catch(Exception $err){
    echo'Ошибка вывода';
}

$hero = [];
while($h = mysqli_fetch_assoc($result)){
    $hero[] = $h;
}

include '../views/hero.php';
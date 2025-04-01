<?php

include 'db.php';

$query = "SELECT `id_hero`, `name_hero`, `power`, `dexterity`, `health`, `armor`, `weapon`, `level_hero`, `battles`, `picture` FROM `heroes`, `heroes_images` WHERE heroes.hero_image = heroes_images.id";
try{
    $result = mysqli_query($link, $query);
}catch(Exception $err){
    echo'Ошиба вывода';
}

$heroes = [];
while($hero = mysqli_fetch_assoc($result)){
    $heroes[] = $hero;
}

include '../views/heroes_catalog.php';

mysqli_close($link);
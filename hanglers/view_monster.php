<?php

include 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = "SELECT * FROM `monsters` WHERE `id_monster` = $id";

try{
    $result = mysqli_query($link, $query);

}catch(Exception $err){
    echo'Ошибка отображения данных '.$err;
}

$monster = [];
while($m = mysqli_fetch_assoc($result)){
    $monster[] = $m;
}

include '../views/monster.php';
mysqli_close($link);

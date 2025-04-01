<?php

include 'db.php';

$query = "SELECT * FROM `monsters`";
try{
    $result = mysqli_query($link, $query);
}catch(Exception $err){
    echo'Ошибка вывода';
}

$monsters = [];
while($monster = mysqli_fetch_assoc($result)){
    $monsters[] = $monster;
}

include '../views/monsters_catalog.php';

mysqli_close($link);
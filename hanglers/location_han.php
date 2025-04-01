<?php

//Код написан для простой визуализации Нужен обработчик по передаваемой локации для отображения ее одной а не всех подряд

include 'db.php';

// Создаем массив с числами в заданном диапазоне
$numbers = range(1, 20);
    
// Перемешиваем массив
shuffle($numbers);

// Выбираем первые $count чисел из перемешанного массива
$count = array_slice($numbers, 0, 9);

$location_items = [];

for($i = 0; $i<count($count); $i++){
    $query_loot = "SELECT * FROM `items` WHERE `id` = $count[$i]";
    try{
        $result_loot = mysqli_query($link, $query_loot);
        
        while($location_item = mysqli_fetch_assoc($result_loot)){
            $location_items[] = $location_item;
        }
    }catch(Exception $err){
        echo 'Ошибка: <br> '.$err;
    }
}

// var_dump($numbers);
// echo'<br><br>';
// var_dump($count);
// echo'<br><br>';
// var_dump($location_items);

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = "SELECT * FROM `location` WHERE `id_cell` = $id";
try{
    $result = mysqli_query($link, $query);

}catch(Exception $err){
    echo'Ошибка вывода';
}

$locations = [];
while($loc = mysqli_fetch_assoc($result)){
    $locations[] = $loc;
}

mysqli_close($link);

include '../views/location.php';
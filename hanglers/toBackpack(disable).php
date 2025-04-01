<?php

include 'db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);
$item = $data['item'];

$query = "INSERT INTO `backpack` (`id_field`, `item_name`) VALUES (NULL, $item)";
try{
    $result = mysqli_query($link, $query);
}catch(Exception $err){
    echo $err;
}

if($result){
    echo $item;
}
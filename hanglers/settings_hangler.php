<?php

include 'db.php';
session_start();
$user = $_SESSION['login'];

if(isset($_GET['change_name'])){
    $new_name = $_GET['new_name'];
    $query = "UPDATE `users` SET `username` = '$new_name' WHERE `users`.`username` = '$user'";
    try{
        $result = mysqli_query($link, $query);
        if($result){
            unset($_SESSION['login']);
            $_SESSION['login'] = $new_name;
        }
    }catch(Exception $err){
        echo $err.'<br>'.$query;
    }
    if($result){
        header('location: ../views/settings.php?error=succes_change');
        exit;
    }else{
        header('location: ../views/settings.php?error=error_change');
        exit;
    }
}else if(isset($_GET['exitAcc'])){
    header('location: ../hanglers/existAcc.php');
    exit;
}else if(isset($_GET['deleteAcc'])){
    $query = "DELETE FROM `users` WHERE `username` = '$user'";
    $query2 = "DELETE FROM `progress` WHERE `username` = '$user'";
    try{
        $result = mysqli_query($link, $query);
        $result2 = mysqli_query($link, $query2);
    }catch (Exception $err){
        echo 'Ошибка';
    }
    if($result && $result2){
        header('location: ../start.php');
        die;
    }
}else if(isset($_GET['reports'])){
    $complaint = $_GET['complaint'];
    $query = "INSERT INTO `reports` (`id_rep`, `complaint`, `user`)VALUES (NULL, '$complaint', '$user')";
    try{
        $result = mysqli_query($link, $query);
    }catch(Exception $err){
        echo $err.'<br>'.$query;
    }
    header('location: ../views/settings.php?error=report_commit');
    exit;
}
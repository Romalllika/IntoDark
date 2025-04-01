<?php

include 'db.php';

$login = $_POST['unicLog'];
$pass = $_POST['wordCode'];

if(isset($_POST['enterNext'])){
    if(strlen($login) < 5 && strlen($pass) < 10){
    header('location: ../start.php?error=incorrectLenght');
    exit;
    }
    $query = "SELECT * FROM `users` WHERE `username` = '$login' AND `password` = '$pass'";
        
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result) != 0){
        session_start();
        $_SESSION['login'] = $login;

        header('location: ../views/game.php');
        die;
    }else{
        header('location: ../start.php?error=incorrectUser');
        die;
    }
}else if(isset($_POST['registration'])){
    header('location: ../views/registration.php');
    exit;
}

mysqli_close($link);
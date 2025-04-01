<?php

include 'db.php';

$login = $_POST['username'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if(strlen($login) < 5 && strlen($email) < 5 && strlen($pass1) < 5 && strlen($pass2) < 5){
    header('location: ../views/registration.php?error=incorrectValues');
    exit;
}else if(strlen($login) < 5 || strlen($pass1) < 10){
    header('location: ../views/registration.php?error=incorrectLenght');
    exit;
}else if($pass1 != $pass2){
    header('location: ../views/registration.php?error=incorrectPass');
    exit;
}else if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', $email)){
    header('location: ../views/registration.php?error=incorrectEmail');
    exit;
}else{
    $query = "INSERT INTO `users`(`id`, `username`, `email`, `password`) VALUES (NULL, '$login', '$email', '$pass1')";
    $query_2 = "INSERT INTO `progress` (`user_id`, `username`, `level`) VALUES (NULL, '$login', '1')";
    try{
        $result = mysqli_query($link, $query);
        $result_2 = mysqli_query($link, $query_2);

        session_start();
        $_SESSION['login'] = $login;
        header('location: ../views/registration.php?error=super');
        die;
    }catch(Exception $err){
        header('location: ../views/registration.php?error=incorrectUser');
        die;
    }
}

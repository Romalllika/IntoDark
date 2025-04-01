<?php
session_start();
$selected_hero = $_GET['select'];

$_SESSION['hero'] = $selected_hero;

header('location: ../views/game.php');
die;
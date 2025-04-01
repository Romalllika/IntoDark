<?php

session_start();
unset($_SESSION['login']);
// unset($_SESSION['hero']);
header('location: ../start.php');
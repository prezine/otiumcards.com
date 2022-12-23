<?php
    session_start();
    include_once '../connect.php';
    include_once '../controller/Otium.php';
    include_once '../controller/Database.php';
    include_once '../controller/Auth.php';
    include_once '../controller/Hash.php';
    include_once '../controller/OtiumErrors.php';
    $otium = new Otium();
    $hash = new Encryption();
    $auth = new Auth($conn);
    $errno = new Errno($conn);
    // Logout
    unset($_SESSION['userID']);
    $errorHtml = $errno->error('success', 'stay, looking forward to have you back :)');
    $otium->setSession('errorMessage', $errorHtml);
    header("Location: ". APP_URL . "login");
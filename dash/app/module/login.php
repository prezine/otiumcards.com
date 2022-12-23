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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = (isset($_POST['email'])) ? trim($_POST['email']) : null;
        $password = (isset($_POST['password'])) ? hash('haval160,5', $_POST['password']) : null;
        // login
        $login = $auth->login($email, $password);
        if ($login !== null) {
            $otium->setSession('userID', $login['userID']);
            header("Location: ". APP_URL . 'index');
        } else {
            $errorHtml = $errno->error('danger', 'Incorrect login datail :(');
            $otium->setSession('errorMessage', $errorHtml);
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
    }
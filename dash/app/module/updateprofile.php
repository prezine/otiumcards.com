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
        $userData = array(
            'userID' => (isset($_POST['userID'])) ? trim($_POST['userID']) : null,
            'name' => (isset($_POST['fullname'])) ? trim($_POST['fullname']) : null,
            'email' => (isset($_POST['email'])) ? trim($_POST['email']) : null,
            'phone' => (isset($_POST['phone'])) ? trim($_POST['phone']) : null,
            'gender' => (isset($_POST['gender'])) ? trim($_POST['gender']) : null,
            'dob' => (isset($_POST['dob'])) ? trim($_POST['dob']) : null,
            'nick' => (isset($_POST['nick'])) ? trim($_POST['nick']) : null
        );
        $updateResponse = $auth->updateProfile($userData);
        if ($updateResponse == 200) {
            $errorHtml = $errno->error('success', 'Sweeeeet, your account information has been updated 🎉');
            $otium->setSession('errorMessage', $errorHtml);
            header("Location: ". $_SERVER['HTTP_REFERER']);
        } else {
            $errorHtml = $errno->error('danger', $updateResponse . 'Unable to update your otium user information :(');
            $otium->setSession('errorMessage', $errorHtml);
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
    }
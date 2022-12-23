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
        $token = (isset($_POST['token'])) ? trim($_POST['token']) : null;
        if ($auth->validateToken($token) !== null) {
            $activateData = array(
                'name' => (isset($_POST['name'])) ? trim($_POST['name']) : null,
                'email' => (isset($_POST['email'])) ? trim($_POST['email']) : null,
                'password' => (isset($_POST['password'])) ? hash('haval160,5', $_POST['password']) : null,
                'gender' => (isset($_POST['gender'])) ? trim($_POST['gender']) : null,
                'phone' => (isset($_POST['phone'])) ? trim($_POST['phone']) : null,
                'dob' => null,
                'country' => null,
                'state' => null,
                'token' => $token,
                'is_paid' => 0,
                'is_deleted' => 0,
                'dateJoined' => GLOBAL_DATE									
            );
            $activate = $auth->activateCard($activateData);
            if ($activate == 200) {
                header("Location: ". APP_URL . 'index');
            } else {
                $errorHtml = $errno->error('danger', 'Unable to activate your card, try again later');
                $otium->setSession('errorMessage', $errorHtml);
                header("Location: ". $_SERVER['HTTP_REFERER']);
            }
        } else {
            $errorHtml = $errno->error('danger', 'Invalid token, please contact sales to verify');
            $otium->setSession('errorMessage', $errorHtml);
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
    }
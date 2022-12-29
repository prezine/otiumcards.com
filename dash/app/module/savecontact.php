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
        $contactData = array(
            'contactName' => (isset($_POST['fullname'])) ? trim($_POST['fullname']) : null,
            'contactEmail' => (isset($_POST['email'])) ? trim($_POST['email']) : null,
            'contactPhone' => (isset($_POST['phone'])) ? trim($_POST['phone']) : null,
            'contactGender' => (isset($_POST['gender'])) ? trim($_POST['gender']) : null,
            'contactRole' => (isset($_POST['role'])) ? trim($_POST['role']) : null,
            'contactCompany' => (isset($_POST['company'])) ? trim($_POST['company']) : null,
            'contactNote' => (isset($_POST['note'])) ? trim($_POST['note']) : null,
            'is_favorite' => 0,
            'is_deleted' => 0,
            'groupID' => 0,
            'token' => (isset($_POST['token'])) ? trim($_POST['token']) : null,
            'dateAdded' => GLOBAL_DATE									
        );
        $contacts = $auth->saveContact($contactData);
        if ($contacts == 200) {
            $errorHtml = $errno->error('success', 'Great Job, your contact information has been saved successfully');
            $otium->setSession('errorMessage', $errorHtml);
            header("Location: ". $_SERVER['HTTP_REFERER']);
        } else {
            $errorHtml = $errno->error('danger', 'Unable to save your contact information, try again soon');
            $otium->setSession('errorMessage', $errorHtml);
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
    }
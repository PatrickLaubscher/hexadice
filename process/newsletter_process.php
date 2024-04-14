<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();

$db = Database::getInstance();


if(isset($_POST)) {

    if(empty($_POST)) {
        $_SESSION['error'] = 6;
        Controller::redirect('../index.php');
    }
    
    [
        'email' => $email,
    ] = $_POST;

    $newEmail = new Email($email);
    
    if($newEmail->isEmpty()) {
        $_SESSION['error'] = 5;
        Controller::redirect('../index.php');
    }

    if($newEmail->isEmail() === false) {
        $_SESSION['error'] = 4;
        Controller::redirect('../index.php');
    }

    if($newEmail->isSpam()) {
        $_SESSION['error'] = 2;
        Controller::redirect('../index.php');
    }

    if($newEmail->isDuplicateMailingList($db)) {
        $_SESSION['error'] = 3;
        Controller::redirect('../index.php');
    } else {
        $newEmail->addEmail($db);
        $_SESSION['validation'] = 5;
        Controller::redirect('../index.php');
    }

} else {
    Controller::redirect('../index.php');
}





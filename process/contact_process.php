<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();
$db = Database::getInstance();


if(isset($_POST)) {

    if(empty($_POST)) {
        $_SESSION['error'] = 6;
        Controller::redirect('../contact.php');
    }
    
    [
        'firstname' => $firstname,
        'lastname'  => $lastname,
        'email'     => $email,
        'object'    => $object,
        'message'   => $message
    ] = $_POST;

    $email = new Email($email);
    $message = new Message($db);


    if(empty($firstname) || empty($lastname) || empty($email) || empty($message)) {
        $_SESSION['error'] = 7;
        Controller::redirect('../contact.php');
    }

    if($email->isEmail() === false) {
        $_SESSION['error'] = 4;
        Controller::redirect('../index.php');
    }

    if($email->isSpam()) {
        $_SESSION['error'] = 2;
        Controller::redirect('../index.php');
    }

    else {

        if($message->customerNewMessage($firstname, $lastname, strval($email), $object, strval($message))) {
            $_SESSION['validation'] = 7;
            Controller::redirect('../index.php');
        } else {
            $_SESSION['error'] = 13;
            Controller::redirect('../contact.php');
        }

    }
    
} else {
    Controller::redirect('../index.php');
}
<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();
$db = Database::getInstance();

var_dump($_POST);

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
        'message'   => $text
    ] = $_POST;

    $emailCheck = new Email($email);
    $message = new Message($db);


    if(empty($firstname) || empty($lastname) || empty($email) || empty($text) || $text === 'Ecrire votre message') {
        $_SESSION['error'] = 7;
        Controller::redirect('../contact.php');
    }

    if($emailCheck->isEmail() === false) {
        $_SESSION['error'] = 4;
        Controller::redirect('../index.php');
    }

    if($emailCheck->isSpam()) {
        $_SESSION['error'] = 2;
        Controller::redirect('../index.php');
    }

    else {

        if($message->customerNewMessage($firstname, $lastname, $email, $object, $text)) {
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
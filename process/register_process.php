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

    foreach($_POST as $data) {
        if(empty($data)) {
            $_SESSION['error'] = 7;
            Controller::redirect('../index.php');
        }
    }


    [
        'lastname' => $lastname,
        'firstname' => $firstname,
        'email' => $email,
        'password' => $pass
    ] = $_POST;


    $newCustomer = new Customer($db);
    $validation = $newCustomer->addNewUser($firstname, $lastname, $email, $pass);

    if ($validation) {
        $_SESSION['validation'] = 4;
        Controller::redirect('../index.php');
    } else {
        $_SESSION['error'] = 12;
        Controller::redirect('../index.php');
    }

} else {
    Controller::redirect('../index.php');
}


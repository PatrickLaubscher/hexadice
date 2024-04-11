<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();
session_start();

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    Controller::redirect('../index.php?error=' . CONNEXION_BBD);
}

$isVerify = false;

if(isset($_POST) && !empty($_POST)) {

    if (empty($_POST['email']) || empty($_POST['password'])) {
        Controller::redirect('../index.php?error=' . INPUT_MISSING);
    }

    [
        'email'    => $email,
        'password' => $password
    ] = $_POST;

    $login = new Login($db);
    $customerFound = $login->findCustomer($email); 

    if(empty($customerFound)) {
        Controller::redirect('../login_customer.php?error=' . ERROR_LOGIN);
    }

    if ($customerFound && password_verify($password, $customerFound['customer_pwd'])) {
        $isVerify = true;
    } else {
        Controller::redirect('../login_customer.php?error=' . ERROR_PASSWORD);
    }

    if ($isVerify === true) {

        extract($customerFound);
        $_SESSION['customer_nb'] = $customer_id;
        $_SESSION['firstname'] = $customer_firstname;
        $_SESSION['lastname']  = $customer_lastname;
        $_SESSION['email']     = $email;
        $_SESSION['customer']  = true;
        $_SESSION['employee']  = false;
        Controller::redirect("../page_customer.php");
    } 

    } else {
    Controller::redirect('../index.php');
}
<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();

$db = Database::getInstance();

$isVerify = false;

if(isset($_POST)) {

    if(empty($_POST)) {
        $_SESSION['error'] = 6;
        Controller::redirect('../login_costumer.php');
    }

    if (empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['error'] = 7;
        Controller::redirect('../login_customer.php');
    }

    [
        'email'    => $email,
        'password' => $password
    ] = $_POST;

    $login = new Login($db);
    $customerFound = $login->findCustomer($email); 

    if(empty($customerFound)) {
        $_SESSION['error'] = 9;
        Controller::redirect('../login_customer.php');
    }

    if ($customerFound && password_verify($password, $customerFound['customer_pwd'])) {
        $isVerify = true;
    } else {
        $_SESSION['error'] = 8;
        Controller::redirect('../login_customer.php');
    }

    if ($isVerify === true) {

        extract($customerFound);
        $_SESSION['customer_nb'] = $customer_id;
        $_SESSION['firstname']   = $customer_firstname;
        $_SESSION['lastname']    = $customer_lastname;
        $_SESSION['email']       = $email;
        $_SESSION['customer']    = true;
        $_SESSION['employee']    = false;
        Controller::redirect("../page_customer.php");
    } 

    } else {
    Controller::redirect('../index.php');
}
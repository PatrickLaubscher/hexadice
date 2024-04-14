<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();

$db = Database::getInstance();

$isVerify = false;

if(isset($_POST)) {

    if(empty($_POST)) {
        $_SESSION['error'] = 6;
        Controller::redirect('../login_admin.php');
    }

    if (empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['error'] = 7;
        Controller::redirect('../login_admin.php');
    }

    [
        'email'    => $email,
        'password' => $password
    ] = $_POST;

    $login = new Login($db);
    $employeeFound = $login->findEmployee($email);

    if(empty($employeeFound)) {
        $_SESSION['error'] = 9;
        Controller::redirect('../login_admin.php');
    }

    
    if ($employeeFound && password_verify($password, $employeeFound['employee_pwd'])) {
        $isVerify = true;
    } else {
        $_SESSION['error'] = 8;
        Controller::redirect('../login_admin.php');
    }

    if ($isVerify === true) {
        $_SESSION['login']    = $email;
        $_SESSION['customer'] = false;
        $_SESSION['employee'] = true;
        Controller::redirect("../admin/admin.php");
    } 

} else {
    Controller::redirect('../index.php');
}

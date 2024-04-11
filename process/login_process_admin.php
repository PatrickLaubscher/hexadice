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
    $employeeFound = $login->findEmployee($email);

    if(empty($employeeFound)) {
        Controller::redirect('../login_admin.php?error=' . ERROR_LOGIN);
    }

    
    if ($employeeFound && password_verify($password, $employeeFound['employee_pwd'])) {
        $isVerify = true;
    } else {
        Controller::redirect('../login_admin.php?error=' . ERROR_PASSWORD);
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

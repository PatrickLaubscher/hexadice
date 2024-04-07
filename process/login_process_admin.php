<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/general.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();
session_start();


if(isset($_POST) && !empty($_POST)) {

    if (empty($_POST['email']) || empty($_POST['password'])) {
        redirect('../login_customer.php?error=' . INPUT_MISSING);
    }

    [
        'email' => $email,
        'password' => $password
    ] = $_POST;


    try {
        $db = Database::getInstance();
    } catch (PDOException $e) {
        redirect('../index.php?error=' . CONNEXION_BBD);
    }

    $query = 'SELECT * FROM employee WHERE employee_email=:email';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(empty($row)) {
        redirect('../login_admin.php?error=' . ERROR_LOGIN);
    }

    
    if ($row && password_verify($password, $row['employee_pwd'])) {
        $isVerify = true;
    } else {
        redirect('../login_admin.php?error=' . ERROR_PASSWORD);
    }

    if ($isVerify) {
        $_SESSION['login'] = $email;
        $_SESSION['customer'] = false;
        $_SESSION['employee'] = true;
        redirect("../admin/admin.php");
    } 

} else {
    redirect('../index.php');
}

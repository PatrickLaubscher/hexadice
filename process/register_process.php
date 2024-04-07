<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/general.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();


if(empty($_POST)) {
    redirect('../new_customer.php?error=' . FORM_EMPTY);
}

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    redirect('../index.php?error=' . CONNEXION_BBD);
    exit;
}


[
    'lastname' => $lastname,
    'firstname' => $firstname,
    'email' => $email,
    'password' => $pass
] = $_POST;

$hashedPassword = password_hash($pass, PASSWORD_BCRYPT);

$query = 'INSERT INTO customer (customer_firstname, customer_lastname, customer_email, customer_pwd) 
VALUES (:customer_firstname, :customer_lastname, :customer_email, :customer_pwd)';
$stmt = $db->prepare($query);
$stmt->bindValue(':customer_firstname', $firstname, PDO::PARAM_STR);
$stmt->bindValue(':customer_lastname', $lastname, PDO::PARAM_STR);
$stmt->bindValue(':customer_email', $email, PDO::PARAM_STR);
$stmt->bindValue(':customer_pwd', $hashedPassword, PDO::PARAM_STR);

$validation = $stmt->execute();

if ($validation) {
    redirect('../new_customer.php?validation=' . NEWCUSTOMER_REGISTER);
}

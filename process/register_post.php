<?php

require_once __DIR__ . '/../functions/general.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';


try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    redirect('../index.php?error=' . CONNEXION_BBD);
    exit;
} 


if(isset($_POST) && !empty($_POST)) {

    [
        'lastname' => $lastname,
        'firstname' => $firstname,
        'email' => $email,
        'password' => $pass
    ] = $_POST;

    $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);

    $query = 'INSERT INTO customer (customer_name, customer_email, customer_pass) VALUES (:customer_name, :customer_email, :customer_pass)';
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':customer_name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':customer_email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':customer_pass', $hashedPassword, PDO::PARAM_STR);
    $stmt->execute();

    if(isset($_POST)) {
        redirect('index.php');
    }

}
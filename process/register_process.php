<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();


if(empty($_POST)) {
    Controller::redirect('../new_customer.php?error=' . FORM_EMPTY);
}

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    Controller::redirect('../index.php?error=' . CONNEXION_BBD);
    exit;
}


foreach($_POST as $data) {
    if(empty($data)) {
        Controller::redirect('../admin/admin.php?error=' . INPUT_MISSING);
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
    Controller::redirect('../new_customer.php?validation=' . NEWCUSTOMER_REGISTER);
}

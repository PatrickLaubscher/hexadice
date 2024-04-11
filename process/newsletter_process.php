<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    Controller::redirect('../index.php?error=' . CONNEXION_BBD);
    exit;
}


if(isset($_POST) && !empty($_POST)) {
    
    [
        'email' => $email,
    ] = $_POST;

    $newEmail = new Email($email);
    
    if($newEmail->isEmpty()) {
        Controller::redirect('../index.php?error=' . EMAIL_REQUIRED);
    }

    if($newEmail->isEmail() === false) {
        Controller::redirect('../index.php?error=' . EMAIL_INVALIDE);
    }

    if($newEmail->isSpam()) {
        Controller::redirect('../index.php?error=' . EMAIL_SPAM);
    }

    if($newEmail->isDuplicateMailingList($db)) {
        Controller::redirect('../index.php?error=' . EMAIL_DUPLICATE);
    } else {
        $newEmail->addEmail($db);
        Controller::redirect('../index.php?success=' . SUBSCRIPTION_NEWSLETTER);
    }

} else {
    Controller::redirect('../index.php');
}





<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/common.php';
require_once __DIR__ . '/../functions/error.php';
require_once __DIR__ . '/../functions/validation.php';
Autoload::register();


if(isset($_POST) && !empty($_POST)) {

    [
        'email' => $email,
    ] = $_POST;

    $newEmail = new newsletterRegister($email);
    
    if($newEmail->isEmpty()) {
        redirect('../index.php?error=' . EMAIL_REQUIRED);
    }

    if($newEmail->isEmail() === false) {
        redirect('../index.php?error=' . EMAIL_INVALIDE);
    }

    if($newEmail->isSpam()) {
        redirect('../index.php?error=' . EMAIL_SPAM);
    }

    if($newEmail->isDuplicate()) {
        redirect('../index.php?error=' . EMAIL_DUPLICATE);
    } else {
        $newEmail->addEmail($email);
        redirect('../index.php?success=' . SUBSCRIPTION_NEWSLETTER);
    }

} else {
    redirect('../index.php');
}





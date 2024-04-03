<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/common.php';
require_once __DIR__ . '/../functions/error.php';
require_once __DIR__ . '/../functions/validation.php';
Autoload::register();


if(isset($_POST) && !empty($_POST)) {

    [
        'feature' => $feature,
        'table' => $tableTitle
    ] = $_POST;

    
    $column = $tableTitle . '_name';
    $db = Database::getInstance();
    $query = "INSERT INTO $tableTitle ($column) VALUES (:feature)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':feature', $feature, PDO::PARAM_STR);
    $stmt->execute();

    
/*     if($newEmail->isEmpty()) {
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
    } */

    redirect('../admin.php');
} 

<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    $_SESSION['error'] = 1;
    Controller::redirect('../index.php');
}


if(!empty($_POST)) {

    [
        'feature' => $feature,
        'table' => $tableTitle
    ] = $_POST;
    
    $newFeature = new Feature($db);
    
    try {
        $newFeature->createNewFeature($tableTitle, $feature);
    } catch (PDOException $e) {
        $_SESSION['error'] = 12;
        Controller::redirect('../admin/admin.php');
    }

    $_SESSION['validation'] = 3;
    Controller::redirect('../admin/admin.php');

} else {
    Controller::redirect('../admin/admin.php');

}
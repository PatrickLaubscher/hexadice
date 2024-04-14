<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();
$db = Database::getInstance();



if(isset($_POST)) {

    if(empty($_POST)) {
        $_SESSION['error'] = 6;
        Controller::redirect('../admin/admin.php');
    }

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
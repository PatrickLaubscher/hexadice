<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();


if(!empty($_POST)) {

    [
        'feature' => $feature,
        'table' => $tableTitle
    ] = $_POST;
    
    
    $column = $tableTitle . '_name';
    $db = Database::getInstance();
    $query = "INSERT INTO $tableTitle ($column) VALUES (:feature)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':feature', $feature, PDO::PARAM_STR);
        
    $validation = $stmt->execute();
    
    if ($validation) {
        Controller::redirect('../admin/admin.php?validation=' . FEATURE_ADDED);
    }
} else {
    Controller::redirect('../admin/admin.php');

}
<?php
require_once __DIR__ . '/layout/header.php';

if(empty($_SESSION) || $_SESSION['customer'] === false) 
{
    header('Location: index.php');
    exit;
}

$user = new Customer;


?>

<h1>Customer page</h1>

<a href="process/session_stop.php">Log out</a>
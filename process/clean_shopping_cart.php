<?php 
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();


unset($_SESSION['cart']);

Controller::redirect('../shopping_cart.php');
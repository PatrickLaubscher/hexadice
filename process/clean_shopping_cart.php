<?php 
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();
session_start();

unset($_SESSION['cart']);

Controller::redirect('../shopping_cart.php');
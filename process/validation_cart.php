<?php 
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();
session_start();

unset($_SESSION['cart']);

Controller::redirect('../index.php?validation=' . ORDER_CONFIRM);


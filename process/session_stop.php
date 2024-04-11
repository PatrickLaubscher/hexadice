<?php 
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();
session_start();

session_unset();
session_destroy();

Controller::redirect('../index.php');
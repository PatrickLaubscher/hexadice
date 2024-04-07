<?php 
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/general.php';
Autoload::register();
session_start();

session_unset();
session_destroy();

redirect('../index.php');
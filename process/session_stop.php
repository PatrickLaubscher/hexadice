<?php 
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/general.php';
Autoload::register();
session_start();


session_start ();
session_destroy();
$_SESSION = [];

redirect('../index.php');
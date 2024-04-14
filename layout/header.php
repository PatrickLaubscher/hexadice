<?php
    session_start();
    require_once __DIR__ . '/../classes/Autoload.php';
    Autoload::register();
     
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="assets/css/aos.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js" defer></script>
    <title>HexaDice | <?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon_hexadice.svg">
</head>

<body>

<header>

<?php 
    require_once __DIR__ . '/nav.php';

    if (!empty($_SESSION['error'])) {
        $errorMsg = ErrorRegister::getErrorMsg(intval($_SESSION['error']));
        require_once __DIR__ . '/../templates/error_prompt.php';
    }

    if (!empty($_SESSION['validation'])) {
        $validationMsg = ValidationRegister::getValidationMsg(intval($_SESSION['validation']));
        require_once __DIR__ . '/../templates/validation_prompt.php';
    }

    $_SESSION['error'] = [];
    $_SESSION['validation'] = [];

    try {
        $db = Database::getInstance();
    } catch (PDOException $e) {
        $_SESSION['error'] = 1;
        exit;
    }



?>

</header>





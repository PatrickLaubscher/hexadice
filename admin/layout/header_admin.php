<?php
    session_start();
    require_once __DIR__ . '/../../classes/Autoload.php';
    Autoload::register();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="../assets/css/aos.css" rel="stylesheet">
    <link href="../assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/css/owl.theme.default.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/s9pzcl46kxodsbikcm97knhvgzrae7wfa4she8q65kk5cmg1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> 
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>       
    <script src="../assets/js/aos.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/main.js" defer></script>
    <title>HexaDice | <?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon_hexadice.svg">
</head>

<body>

<header>

<?php 

    require_once __DIR__ . '/nav_admin.php';

    if (!empty($_SESSION['error'])) {
        $errorMsg = ErrorRegister::getErrorMsg(intval($_SESSION['error']));
        require_once __DIR__ . '/../../templates/error_prompt.php';
    }

    if (!empty($_SESSION['error_upload'])) {
        $errorMsg = ErrorRegister::getErrorUploadMsg(intval($_SESSION['error_upload']));
        require_once __DIR__ . '/../../templates/error_prompt.php';
    }

    if (!empty($_SESSION['validation'])) {
        $validationMsg = ValidationRegister::getValidationMsg(intval($_SESSION['validation']));
        require_once __DIR__ . '/../../templates/validation_prompt.php';
    }

    if (!empty($_SESSION['validation_upload']) && !empty($_SESSION['files_upload'])) {
        $validationMsg = ValidationRegister::getValidationUploadMsg(intval($_SESSION['validation_upload']), intval($_SESSION['files_upload']));
        require_once __DIR__ . '/../../templates/validation_prompt.php';
    }

    $_SESSION['error'] = [];
    $_SESSION['validation'] = [];
    $_SESSION['validation_upload'] = [];
    $_SESSION['files_upload'] = [];

    try {
        $db = Database::getInstance();
    } catch (PDOException $e) {
        $_SESSION['error'] = 1;
        exit;
    }


?>

</header>





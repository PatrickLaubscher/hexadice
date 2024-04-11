<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();
session_start();


if(!empty($_POST)) {

    [ 
        'game_id' => $game_id

    ] = $_POST;

    foreach($_SESSION['cart'] as $key => $item) {

        if($game_id === $item['game_id']) {

            array_splice($_SESSION['cart'], $key, 1);
            break;
        } 
    };

    Controller::redirect('../shopping_cart?validation=' . DELETE_PRODUCT);


} else {
    Controller::redirect('../index.php');
}
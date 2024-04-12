<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();


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

    $_SESSION['validation'] = 10;
    Controller::redirect('../shopping_cart.php');


} else {
    Controller::redirect('../index.php');
}
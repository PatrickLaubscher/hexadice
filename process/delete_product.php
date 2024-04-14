<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();



if(isset($_POST)) {

    if(empty($_POST)) {
        $_SESSION['error'] = 6;
        Controller::redirect('../shopping_cart.php');
    }

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
<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();



if(isset($_POST)) {

    if(empty($_POST)) {
        $_SESSION['error'] = 6;
        Controller::redirect('../index.php');
    }

    [ 
        'game_id' => $game_id

    ] = $_POST;

    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $newProduct = true;

    foreach($_SESSION['cart'] as $key => $item) {

        if($game_id === $item['game_id']) {

            $_SESSION['cart'][$key]['qty'] += 1;
            $newProduct = false;
            break;
        } 
    };

    if($newProduct === true) {
        $_SESSION['cart'][] = ['game_id' => $game_id, 'qty' => 1];
    }

    $_SESSION['validation'] = 8;
    Controller::redirect('../index.php');


} else {
    Controller::redirect('../index.php');
}
<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();


if(!empty($_POST)) {

    [ 
        'game_id' => $game_id

    ] = $_POST;

    if(isset($_SESSION['cart'])){

        foreach($_SESSION['cart'] as $key => $item) {

            if($game_id === $item['game_id']) {
    
                $_SESSION['cart'][$key]['qty'] += 1;
                break;
            } 
        };

    }

    Controller::redirect('../shopping_cart.php');


} else {
    Controller::redirect('../index.php');
}
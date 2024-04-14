<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();

$db = Database::getInstance();


if(isset($_POST)) {

    if(empty($_POST)) {
        $_SESSION['error'] = 6;
        Controller::redirect('../admin/admin.php');
    }

    $gameId = $_POST['game_id'];

    $category = new Category($db);
    try {
        $category->deleteCategoryGame($gameId);
    } catch (PDOException $e) {
        $_SESSION['error'] = 12;
        Controller::redirect('../admin/admin.php');
    }

    $author = new Author($db);
    try {
        $author->deleteAuthorGame($gameId);
    } catch (PDOException $e) {
        $_SESSION['error'] = 12;
        Controller::redirect('../admin/admin.php');
    }

    $illustrator = new Illustrator($db);
    try {
        $illustrator->deleteIllustratorGame($gameId);
    } catch (PDOException $e) {
        $_SESSION['error'] = 12;
        Controller::redirect('../admin/admin.php');
    }

    $game = new GameContent($db);
    $illustrator = new Illustrator($db);
    try {
        $game->deleteGame($gameId);
    } catch (PDOException $e) {
        $_SESSION['error'] = 12;
        Controller::redirect('../admin/admin.php');
    }

    $_SESSION['validation'] =
    Controller::redirect('../admin/admin.php');

} else {
    Controller::redirect('../admin/admin.php');
}



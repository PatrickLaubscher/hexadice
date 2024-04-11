<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$gameId = $_POST['game_id'];


$category = new Category($db);
try {
    $category->deleteCategoryGame($gameId);
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution";
    exit;
}

$author = new Author($db);
try {
    $author->deleteAuthorGame($gameId);
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution";
    exit;
}

$illustrator = new Illustrator($db);
try {
    $illustrator->deleteIllustratorGame($gameId);
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution";
    exit;
}

$game = new GameContent($db);
$illustrator = new Illustrator($db);
try {
    $game->deleteGame($gameId);
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution";
    exit;
}



Controller::redirect('../admin/admin.php?validation=' . DELETE_GAME);

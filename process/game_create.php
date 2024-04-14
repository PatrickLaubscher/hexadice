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
 
    foreach($_POST as $data) {
        if(empty($data)) {
            $_SESSION['error'] = 7;
            Controller::redirect('../admin/admin.php');
        }
    }

    $newGame = new GameContent($db);
    
    [
        'game_name'        => $name,
        'game_description' => $description,
        'game_short'       => $short,
        'game_price'       => $price,
        'game_stock'       => $stock,
        'game_age_mini'    => $age,
        'game_duration'    => $duration,
        'game_player'      => $player,
        'game_language'    => $language,
        'game_editor'      => $editor,
        'game_category'    => $categoryIdList,
        'game_author'      => $authorIdList,
        'game_illustrator' => $illustratorIdList
    
    ] = $_POST;
    
    
    try {
        $newGame->createNewGame($name, $description, $short, $price, $stock, $age, $duration, $player, $language, $editor);
    } catch (PDOException $e) {
        $_SESSION['error'] = 12;
        Controller::redirect('../admin/admin.php');
    }
    
    
    $idNewGame = $db->getLastId();
    
    $category = new Category($db);
    try {
        foreach ($categoryIdList as $idCategory) {
            $category->addGameCategoryList($idNewGame, $idCategory);
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 12;
        Controller::redirect('../admin/admin.php');
    }
    
    $author = new Author($db);
    try {
        foreach ($authorIdList as $idAuthor) {
            $author->addGameAuthorList($idNewGame, $idAuthor);
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 12;
        Controller::redirect('../admin/admin.php');
    }
    
    $illustrator = new Illustrator($db);
    try {
        foreach ($illustratorIdList as $idIllustrator) {
            $illustrator->addGameIllustratorList($idNewGame, $idIllustrator);
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 12;
        Controller::redirect('../admin/admin.php');
    }

    $_SESSION['validation'] = 1;
    Controller::redirect('../admin/admin.php');

}

  else {
    Controller::redirect('../admin/admin.php');
}




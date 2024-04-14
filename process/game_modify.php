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

    if(empty($_POST['game_name'])) {
        $_SESSION['error'] = 14;
        Controller::redirect('../admin/admin.php');
    }

    $isModified = false;

    $game = new GameContent($db);

    [
        'game_name'        => $name,
        'game_description' => $description,
        'game_short'       => $short,
        'game_price'       => $price,
        'game_age_mini'    => $age,
        'game_duration'    => $duration,
        'game_player'      => $player,
        'game_language'    => $language,
        'game_editor'      => $editor,
        'game_category'    => $categoryIdList,
        'game_author'      => $authorIdList,
        'game_illustrator' => $illustratorIdList

    ] = $_POST;
    
    $gameId = $game->getIdByName($name);


    if(!empty($description)) {
    
        try {
            $game->updateGameContentById($gameId, 'game_description', $description);
        } catch (PDOException $e) {
            $_SESSION['error'] = 12;
            Controller::redirect('../admin/admin.php');
        }

        $isModified = true;
    
    } 

    if(!empty($short)) {
    
        try {
            $game->updateGameContentById($gameId, 'game_short', $short);
        } catch (PDOException $e) {
            $_SESSION['error'] = 12;
            Controller::redirect('../admin/admin.php');
        }
    
        $isModified = true;
    } 

    if(!empty($price)) {
    
        try {
            $game->updateGameContentById($gameId, 'game_price', $price);
        } catch (PDOException $e) {
            $_SESSION['error'] = 12;
            Controller::redirect('../admin/admin.php');
        }
    
        $isModified = true;
    } 

    if(!empty($age)) {

        try {
            $game->updateGameContentById($gameId, 'id_age_mini', $age);
        } catch (PDOException $e) {
            $_SESSION['error'] = 12;
            Controller::redirect('../admin/admin.php');
        }

        $isModified = true;
    } 

    if(!empty($language)) {

        try {
            $game->updateGameContentById($gameId, 'id_languages', $language);
        } catch (PDOException $e) {
            $_SESSION['error'] = 12;
            Controller::redirect('../admin/admin.php');
        }
    
        $isModified = true;
    } 

    if(!empty($duration)) {

        try {
            $game->updateGameContentById($gameId, 'id_duration', $duration);
        } catch (PDOException $e) {
            $_SESSION['error'] = 12;
            Controller::redirect('../admin/admin.php');
        }
    
        $isModified = true;
    }

    if(!empty($player)) {

        try {
            $game->updateGameContentById($gameId, 'id_player_nb', $player);
        } catch (PDOException $e) {
            $_SESSION['error'] = 12;
            Controller::redirect('../admin/admin.php');
        }
    
        $isModified = true;
    }

    if(!empty($editor)) {

        try {
            $game->updateGameContentById($gameId, 'id_editor', $editor);
        } catch (PDOException $e) {
            $_SESSION['error'] = 12;
            Controller::redirect('../admin/admin.php');
        }
    
        $isModified = true;
    } 


    if(!empty($categoryIdList[0])) {

        $category = new Category($db);

        foreach ($categoryIdList as $idCategory) {

                try {
                    $category->updateGameCategoryList($gameId, $idCategory);
                    } catch (PDOException $e) {
                        $_SESSION['error'] = 12;
                        Controller::redirect('../admin/admin.php');
                }
            } 

        $isModified = true;
    } 

    if(!empty($authorIdList[0])) {

        $author = new Author($db);

        foreach ($authorIdList as $idAuthor) {

            try {
                $author->updateGameAuthorList($gameId, $idAuthor);
                } catch (PDOException $e) {
                    $_SESSION['error'] = 12;
                    Controller::redirect('../admin/admin.php');
                }
        
        }
    
        $isModified = true;
    } 

    if(!empty($illustratorIdList[0])) {

        $illustrator = new Illustrator($db);

        foreach ($illustratorIdList as $idIllustrator) {

            try {
                $illustrator->updateGameIllustratorList($gameId, $idIllustrator);
                } catch (PDOException $e) {
                    $_SESSION['error'] = 12;
                    Controller::redirect('../admin/admin.php');
                }
        
        }
    
        
    } 


    if($isModified == true) {
        $_SESSION['validation'] = 2;
        Controller::redirect('../admin/admin.php');
    } else {
        $_SESSION['error'] = 15;
        Controller::redirect('../admin/admin.php');
    }
    

} else {
    Controller::redirect('../admin/admin.php');
}
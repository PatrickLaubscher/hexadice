<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();

if(empty($_POST)) {
    Controller::redirect('../admin/admin.php?error=' . FORM_EMPTY);
}

foreach($_POST as $data) {
    if(empty($data)) {
        Controller::redirect('../admin/admin.php?error=' . INPUT_MISSING);
    }
}

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$game = new GameContent($db);


if (isset($_POST['game_name']) && !empty($_POST['game_name'])) {

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
    
        $query= "UPDATE game SET game_description = :game_description WHERE game_id = '$gameId'";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':game_description', $description, PDO::PARAM_STR);
        $stmt->execute();
    
    } 

    if(!empty($short)) {
    
        $query= "UPDATE game SET game_short = :game_short WHERE game_id = '$gameId'";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':game_short', $short, PDO::PARAM_STR);
        $stmt->execute();
    
    } 

    if(!empty($price)) {
    
        $query= "UPDATE game SET game_price = :game_price WHERE game_id = '$gameId'";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':game_price', $price, PDO::PARAM_STR);
        $stmt->execute();
    
    } 

    if(!empty($age)) {

        $query= "UPDATE game SET id_age_mini = :id_age_mini WHERE game_id = '$gameId'";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_age_mini', intval($age), PDO::PARAM_INT);
        $stmt->execute();
    
    } 

    if(!empty($language)) {

        $query= "UPDATE game SET id_languages = :id_languages WHERE game_id = '$gameId'";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_languages', intval($language), PDO::PARAM_INT);
        $stmt->execute();
    
    } 

    if(!empty($duration)) {

        $query= "UPDATE game SET id_duration = :id_duration WHERE game_id = '$gameId'";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_duration', intval($duration), PDO::PARAM_INT);
        $stmt->execute();
    
    }

    if(!empty($player)) {

        $query= "UPDATE game SET id_player_nb = :id_player_nb WHERE game_id = '$gameId'";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_player_nb', intval($player), PDO::PARAM_INT);
        $stmt->execute();
    
    }

    if(!empty($editor)) {

        $query= "UPDATE game SET id_editor = :id_editor WHERE game_id = '$gameId'";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_editor', intval($editor), PDO::PARAM_INT);
        $stmt->execute();
    
    } 


    if(!empty($categoryIdList[0])) {

        foreach ($categoryIdList as $idCategory) {

            $query = "UPDATE game_category_list SET id_category = :id_category WHERE id_game = :id_game";  
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id_game', $gameId, PDO::PARAM_INT);
            $stmt->bindValue(':id_category', intval($idCategory), PDO::PARAM_INT);
            $stmt->execute();
        
        }
    
    } 

    if(!empty($authorIdList[0])) {

        foreach ($authorIdList as $idAuthor) {

            $query = "UPDATE game_author_list SET id_author = :id_author WHERE id_game = :id_game";  
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id_game', $gameId, PDO::PARAM_INT);
            $stmt->bindValue(':id_author', intval($idAuthor), PDO::PARAM_INT);
            $stmt->execute();
        
        }
    
    } 

    if(!empty($illustratorIdList[0])) {

        foreach ($illustratorIdList as $idIllustrator) {

            $query = "UPDATE game_illustrator_list SET id_illustrator = :id_illustrator WHERE id_game = :id_game";  
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id_game', $gameId, PDO::PARAM_INT);
            $stmt->bindValue(':id_illustrator', intval($idIllustrator), PDO::PARAM_INT);
            $stmt->execute();
        
        }
    
    } 


        
    Controller::redirect('../admin/admin.php?validation=' . GAME_MODIFIED);

}  

else {
    Controller::redirect('../admin/admin.php?error=' . FORM_EMPTY);
}
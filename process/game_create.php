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
    $db = Database::getInstance();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$query = "INSERT INTO game (
    game_name, game_description, game_short, game_price, game_quantity, id_age_mini, id_duration, id_player_nb, id_languages, id_editor) 
    VALUES (:game_name, :game_description, :game_short, :game_price, :game_quantity, :id_age_mini, :id_duration, :id_player_nb, :id_languages, :id_editor)";
    
$stmt = $db->prepare($query);
$stmt->bindValue(':game_name', $name, PDO::PARAM_STR);
$stmt->bindValue(':game_description', $description, PDO::PARAM_STR);
$stmt->bindValue(':game_short', $short, PDO::PARAM_STR);
$stmt->bindValue(':game_price', $price, PDO::PARAM_STR);
$stmt->bindValue(':game_quantity', $stock, PDO::PARAM_INT);
$stmt->bindValue(':id_age_mini', intval($age), PDO::PARAM_INT);
$stmt->bindValue(':id_duration', intval($duration), PDO::PARAM_INT);
$stmt->bindValue(':id_player_nb', intval($player), PDO::PARAM_INT);
$stmt->bindValue(':id_languages', intval($language), PDO::PARAM_INT);
$stmt->bindValue(':id_editor', intval($editor), PDO::PARAM_INT);
$stmt->execute();


$idNewGame = $db->getLastId();


foreach ($categoryIdList as $idCategory) {

    $query = "INSERT INTO game_category_list (id_game, id_category) VALUES (:id_game, :id_category)";  
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id_game', $idNewGame, PDO::PARAM_INT);
    $stmt->bindValue(':id_category', intval($idCategory), PDO::PARAM_INT);
    $stmt->execute();

}

foreach ($authorIdList as $idAuthor) {

    $query = "INSERT INTO game_author_list (id_game, id_author) VALUES (:id_game, :id_author)";  
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id_game', $idNewGame, PDO::PARAM_INT);
    $stmt->bindValue(':id_author', intval($idAuthor), PDO::PARAM_INT);
    $stmt->execute();

}

foreach ($illustratorIdList as $idIllustrator) {

    $query = "INSERT INTO game_illustrator_list (id_game, id_illustrator) VALUES (:id_game, :id_illustrator)";  
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id_game', $idNewGame, PDO::PARAM_INT);
    $stmt->bindValue(':id_illustrator', intval($idIllustrator), PDO::PARAM_INT);
    $stmt->execute();

}


Controller::redirect('../admin/admin.php?validation=' . GAME_ADDED);

   




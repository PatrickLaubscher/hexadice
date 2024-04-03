<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/common.php';
require_once __DIR__ . '/../functions/error.php';
require_once __DIR__ . '/../functions/validation.php';
Autoload::register();



if(isset($_POST) && !empty($_POST)) {

    [
        'game_name' => $name,
        'game_description' => $description,
        'game_price' => $price,
        'game_stock' => $stock,
        'game_age_mini' => $age,
        'game_duration' => $duration,
        'game_player' => $player,
        'game_language' => $language,
        'game_category' => $categoryIdList,
        'game_author' => $authorIdList,
        'game_illustrator' => $illustratorIdList
    ] = $_POST;


    try {
        $db = Database::getInstance();
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion à la base de données";
        exit;
    }

    $query = "INSERT INTO product (
        product_name, product_description, product_price, product_quantity, id_age_mini, id_player_nb) 
        VALUES (:game_name, :game_description, :game_price, :game_quantity, :id_age_mini, :id_duration, :id_player_nb)";
        
    $stmt = $db->prepare($query);
    $stmt->bindValue(':game_name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':game_description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':game_price', $price, PDO::PARAM_INT);
    $stmt->bindValue(':game_quantity', $stock, PDO::PARAM_INT);
    $stmt->bindValue(':id_age_mini', intval($age), PDO::PARAM_INT);
    $stmt->bindValue(':id_duration', intval($duration), PDO::PARAM_INT);
    $stmt->bindValue(':id_player_nb', intval($player), PDO::PARAM_INT);
    $stmt->execute();

    
    $idNewProduct = $db->getLastId();
    
   
    foreach ($categoryIdList as $idCategory ) {

        $query = "INSERT INTO product_category_list (id_product, id_category) VALUES (:id_product, :id_category)";  
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_product', $idNewProduct, PDO::PARAM_INT);
        $stmt->bindValue(':id_category', intval($idCategory), PDO::PARAM_INT);
        $stmt->execute();

    }

    foreach ($authorIdList as $idAuthor ) {

        $query = "INSERT INTO product_author_list (id_product, id_author) VALUES (:id_product, :id_author)";  
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_product', $idNewProduct, PDO::PARAM_INT);
        $stmt->bindValue(':id_author', intval($idAuthor), PDO::PARAM_INT);
        $stmt->execute();

    }

    foreach ($illustratorIdList as $idIllustrator ) {

        $query = "INSERT INTO product_illustrator_list (id_product, id_illustrator) VALUES (:id_product, :id_illustrator)";  
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_product', $idNewProduct, PDO::PARAM_INT);
        $stmt->bindValue(':id_illustrator', intval($idIllustrator), PDO::PARAM_INT);
        $stmt->execute();

    }


    redirect('../admin.php');
}


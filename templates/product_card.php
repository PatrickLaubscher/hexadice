<?php 

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$idGame = $game['game_id'];
$categoryList = $contentPage->getFeatureContentById($db, $idGame, 'category');
asort($categoryList);

?>

<div class="mb-4 card py-0 d-flex flex-column align-items-center">
    <div class="card-img mt-3 d-flex justify-content-center">
        <img src="uploads/products/<?php echo $game['game_sticker']?>" class="img-fluid" height="120" alt="<?php echo $game['game_name'] ?>">
    </div>
    <div class="card-body">
        <header>
            <h3 class="card-title fs-5"><?php echo $game['game_name'] ?></h3>
        </header>
        <p class="card-text"><?php echo substr($game['game_description'],0,60) . '...' ?></p>
        <ul class="list-unstyled">
            <?php foreach($categoryList as $category) { ?>
                <li>
                <?php echo $category['category_name'] ?>
                </li>
            <?php } ?>
        </ul>
        <p>Prix de vente TTC <?php echo $game['game_price'] ?> €</p>
        <div class="d-flex justify-content-between">
            <a href="page_game.php?id=<?php echo $game['game_id'] ?>" class="btn btn-primary">Fiche</a>
            <a href="#" class="btn btn-primary">Panier</a>
        </div>
    </div>
</div>

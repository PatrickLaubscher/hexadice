<?php 

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$idGame = intval($game['game_id']);
$categoryList = $contentPage->getFeatureContentById($idGame, 'category');
asort($categoryList);

?>

<div class="mb-4 card py-0 d-flex flex-column align-items-center">
    <div class="card-img mt-3 d-flex justify-content-center">
        <a href="page_game.php?id=<?php echo $game['game_id'] ?>">
            <img src="uploads/products/<?php echo $game['game_sticker']?>" class="img-fluid" width="250" height="200" alt="<?php echo $game['game_name'] ?>">
        </a>
    </div>
    <div class="card-body">
        <header class="h-10">
            <h3 class="card-title fs-5"><?php echo $game['game_name'] ?></h3>
        </header>
        <div class="card-text">
            <p class=""><?php echo $game['game_short'] ?></p>
        </div>
        <ul class="list-unstyled">
            <?php foreach($categoryList as $category) { ?>
                <li>
                <?php echo $category['category_name'] ?>
                </li>
            <?php } ?>
        </ul>
        <div>
            <p>Prix de vente TTC <?php echo $game['game_price'] ?> €</p>

        </div>
        <div class="d-flex justify-content-between">
            <a href="page_game.php?id=<?php echo $game['game_id'] ?>" class="btn btn-1 d-flex align-items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dice-6" viewBox="0 0 16 16">
                <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3z"/>
                <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-8 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                </svg>
                <span>Voir la fiche</span>
            </a>
            <form method="post" action="process/add_product.php">
                <input type="text" name="game_id" class="d-none" value="<?php echo $game['game_id'] ?>">
                <input type="submit"  class="btn btn-1" value="Ajouter au panier">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                </svg> 
            </form>
        </div>
    </div>
</div>

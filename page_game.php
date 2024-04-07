<?php

$title = "Fiche article";
require_once __DIR__ . '/layout/header.php';


if (!isset($_GET['id'])) {
    echo "ID obligatoire";
    exit;
} elseif (intval($_GET['id']) == 0) {
    echo 'Merci de renseigner un id valide';
    exit;

} else {
    $id = $_GET['id'];
}

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$gamePage = new GameContent();
$contentPage = $gamePage->getAllContentById($db, $id);  

?>

<main>
    <div class="container">

        <div class="row mt-5 d-flex">
            <section class="col-6">
                <div class="mb-4 d-flex justify-content-center">
                    <img id="main-img"  src="uploads/products/<?php echo $contentPage['game_picture1']?>" class="img-fluid" width="250" height="250" alt="<?php echo $contentPage['game_name'] ?>">
                </div>
                <div class="gallery owl-carousel owl-theme">
                    <div class="item"><img src="uploads/products/<?php echo $contentPage['game_picture1']?>" class="img-fluid" width="250" height="250" alt="<?php $contentPage['game_name'] ?>"></div>
                    <div class="item"><img src="uploads/products//<?php echo $contentPage['game_picture2']?>" class="img-fluid" width="250" height="250" alt="<?php $contentPage['game_name'] ?>"></div>
                    <div class="item"><img src="uploads/products/<?php echo $contentPage['game_picture3']?>" class="img-fluid" width="250" height="250" alt="<?php $contentPage['game_name'] ?>"></div>
                    <?php if($contentPage['game_picture4']) { ?>
                        <div class="item"><img src="uploads/products/<?php echo $contentPage['game_picture4']?>" class="img-fluid" width="250" height="250" alt="<?php $contentPage['game_name'] ?>"></div>
                    <?php } ?>
                    <?php if($contentPage['game_picture5']) { ?>
                        <div class="item"><img src="uploads/products/<?php echo $contentPage['game_picture5']?>" class="img-fluid" width="250" height="250" alt="<?php $contentPage['game_name'] ?>"></div>
                    <?php } ?>
                </div>
            </section>

            <section class="col-6">
                <header>
                    <article class="mb-4">
                        <h1><?php echo $contentPage['game_name'] ?></h1>
                        <hr>
                        <h3>Prix du jeu</h3>
                        <p><?php echo $contentPage['game_description'] ?></p>
                    </article>
                </header>
            </section>

        </div>

    </div>
</main>

<?php require_once __DIR__ . '/layout/footer.php'; ?>
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

$gamePage = new GameContent($db);
$contentPage = $gamePage->getAllContentById($id);  
$categoryList = $gamePage->getFeatureContentById($id, 'category');
$authorList = $gamePage->getFeatureContentById($id, 'author');
$illustratorList = $gamePage->getFeatureContentById($id, 'illustrator');

?>

<main>
    <section>
        <div class="container">
            <div class="row mt-5">
                <a href="index.php" class="nothing-serious-h3">
                    <- Retourner à la liste des jeux
                    <img src="assets/svg/hexadice-logo-mark.svg" class="ms-2 btn-rotate" alt="Logo Hexadice" width="40" alt="Hexadice logo">
                </a>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row mt-5 d-flex">
            <section class="col-6">
                <div class="mb-4 d-flex justify-content-center h-70">
                    <img id="main-img" data-bs-toggle="modal" data-bs-target="#modal" class="pointer" src="uploads/products/<?php echo $contentPage['game_picture1']?>" width="350" height="350" alt="<?php echo $contentPage['game_name'] ?>">
                    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body d-flex justify-content-center">
                                    <img id="modal-img" src="uploads/products/<?php echo $contentPage['game_picture1']?>" width="350" height="350" alt="<?php echo $contentPage['game_name'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery owl-carousel owl-theme h-30">
                    <div class="item"><img src="uploads/products/<?php echo $contentPage['game_picture1']?>" class="img-fluid" width="150" height="150" alt="<?php $contentPage['game_name'] ?>"></div>
                    <div class="item"><img src="uploads/products//<?php echo $contentPage['game_picture2']?>" class="img-fluid" width="150" height="150" alt="<?php $contentPage['game_name'] ?>"></div>
                    <div class="item"><img src="uploads/products/<?php echo $contentPage['game_picture3']?>" class="img-fluid" width="150" height="150" alt="<?php $contentPage['game_name'] ?>"></div>
                    <?php if($contentPage['game_picture4']) { ?>
                        <div class="item"><img src="uploads/products/<?php echo $contentPage['game_picture4']?>" class="img-fluid" width="150" height="150" alt="<?php $contentPage['game_name'] ?>"></div>
                    <?php } ?>
                    <?php if($contentPage['game_picture5']) { ?>
                        <div class="item"><img src="uploads/products/<?php echo $contentPage['game_picture5']?>" class="img-fluid" width="150" height="150" alt="<?php $contentPage['game_name'] ?>"></div>
                    <?php } ?>
                </div>
                <div class="container">
                    <div class="row my-3">
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="col ps-4 d-inline-flex gap-3 align-items-center">
                                <h2 class="nothing-serious-h2">Prix du jeu -</h2>
                                <p class="nothing-serious-h2 fs-2"><?php echo $contentPage['game_price']?> €</p>
                            </div>
                            <form method="post" action="process/add_product.php" class="btn btn1 d-flex align-items-center justify-content-center gap-1">
                                <input type="text" name="game_id" class="d-none" value="<?php echo $contentPage['game_id'] ?>">
                                <input type="submit" value="Ajouter au panier" class="nothing-serious-p btn btn-style-reset p-0"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                </svg>
                            </form>
                        </div>

                        <hr>
                    </div>
                    <div class="row my-1">
                        <div class="col ps-4 d-inline-flex gap-3 align-items-center">
                            <h2 class="nothing-serious-h2">Nombre de joueurs -</h2>
                            <p class="fs-4"><?php echo $contentPage['player_nb_name']?></p>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col ps-4 d-inline-flex gap-3 align-items-center">
                            <h2 class="nothing-serious-h2">Durée des parties -</h2>
                            <p class="fs-4"><?php echo $contentPage['duration_name']?></p>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col ps-4 d-inline-flex gap-3 align-items-center">
                            <h2 class="nothing-serious-h2">Âge Minimum -</h2>
                            <p class="fs-4"><?php echo $contentPage['age_mini_name']?> ans</p>
                        </div>
                    </div>

                    <div class="row my-1">
                        <div class="col ps-4 d-inline-flex gap-3 align-items-center">
                            <h2 class="nothing-serious-h2">Editeur -</h2>
                            <p class="fs-4"><?php echo $contentPage['editor_name']?></p>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col ps-4 d-inline-flex gap-3 align-items-center">
                            <h2 class="nothing-serious-h2">Auteur(s) -</h2>
                            <?php foreach($authorList as $author) { ?>
                                <p class="fs-4"><?php echo $author['author_name'] ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col ps-4 d-inline-flex gap-3 align-items-center">
                            <h2 class="nothing-serious-h2">Illustrateur(s) -</h2>
                            <?php foreach($illustratorList as $illustrator) { ?>
                                <p class="fs-4"><?php echo $illustrator['illustrator_name'] ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col ps-4 d-inline-flex gap-3 align-items-center">
                            <h2 class="nothing-serious-h2">Langue -</h2>
                            <p class="fs-4"><?php echo $contentPage['languages_name']?></p>
                        </div>
                    </div>

                </div>
            </section>


            <section class="col-6">
                <header>
                    <article class="mb-4">
                        <div>
                            <h1 class="my-4"><?php echo $contentPage['game_name'] ?></h1>
                            <div class="card-notation d-flex align-items-center gap-3 py-2 px-3">
                                <div>
                                    <?php
                                        for($i=0; $i < 5; $i++){
                                        if (($contentPage['game_notation'] - ($i)) < 1 && ($contentPage['game_notation'] - ($i)) > 0) { ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                            <path d="M5.354 5.119 7.538.792A.52.52 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.54.54 0 0 1 16 6.32a.55.55 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.5.5 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.6.6 0 0 1 .085-.302.51.51 0 0 1 .37-.245zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.56.56 0 0 1 .162-.505l2.907-2.77-4.052-.576a.53.53 0 0 1-.393-.288L8.001 2.223 8 2.226z"/>
                                            </svg>
                                        <?php } elseif ($i<$contentPage['game_name']) { ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        <?php } else { ?> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                            </svg>

                                        <?php }       
                                    }?>

                                </div>
                                <a class="m-0 nothing-serious-p fs-4">Voir les Avis des joueurs</a> 
                            </div>
                        </div>

                        <hr>

                        <ul class="list-unstyled">
                            <?php foreach($categoryList as $category) { ?>
                                <li class="px-2 nothing-serious-p card-category">
                                <?php echo $category['category_name'] ?>
                                </li>
                            <?php } ?>
                        </ul>
                        <h2 class="nothing-serious-h2 mt-4">Description</h2>
                        <p class="mt-2"><?php echo $contentPage['game_description'] ?></p>
                    </article>
                </header>
            </section>

        </div>

    </div>
</main>

<?php require_once __DIR__ . '/layout/footer.php'; ?>
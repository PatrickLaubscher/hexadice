<?php

require_once __DIR__ . '/layout/header.php';
require __DIR__ . '/data/products.php';
$title = "Fiche jeu";
$gamePage = new PageProduct($products);
$contentPage = $gamePage->getContent();  


?>

<main>
    <div class="container">

        <div class="row mt-5 d-flex">
            <section class="col-6">
                <div class="mb-4 d-flex justify-content-center">
                    <img id="main-img"  src="<?php echo $contentPage['image1']?>" class="img-fluid" width="350" height="350" alt="<?php echo $contentPage['name'] ?>">
                </div>
                <div class="gallery owl-carousel owl-theme">
                    <div class="item"><img src="<?php echo $contentPage['image1']?>" class="img-fluid" width="100" height="100" alt="<?php echo $contentPage['name'] ?>"></div>
                    <div class="item"><img src="<?php echo $contentPage['image2']?>" class="img-fluid" width="100" height="100" alt="<?php echo $contentPage['name'] ?>"></div>
                    <div class="item"><img src="<?php echo $contentPage['image3']?>" class="img-fluid" width="100" height="100" alt="<?php echo $contentPage['name'] ?>"></div>
                    <div class="item"><h4>4</h4></div>
                    <div class="item"><h4>5</h4></div>
                </div>
            </section>

            <section class="col-6">
                <header>
                    <article class="mb-4">
                        <h1><?php echo $contentPage['name'] ?></h1>
                        <hr>
                        <h3>Prix du jeu</h3>
                        <p>Description du jeu</p>
                    </article>
                </header>
            </section>

        </div>

    </div>
</main>

<?php require_once __DIR__ . '/layout/footer.php'; ?>
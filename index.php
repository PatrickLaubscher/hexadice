<?php
$title = "Accueil";
require_once __DIR__ . '/layout/header.php';
require __DIR__ . '/data/products.php';
$pagination = new Pagination(6, $products);

?>

<main>

    <header class="section my-5">
        <div class="container">        
            <div class="row py-2 d-flex flex-md-row align-items-start">
                <h1 class="mb-1">Bienvenue chez les passionnés de jeux de sociétés !</h1>   
            </div>
        </div>
    </header>

    <section class="section my-5">
        <div class="container">        
            <div class="row">
            <a href="new_customer.php"><h2 class="fs-4">Vous souhaitez vous inscrire? </h2></a>
            </div>
        </div>
    </section>

    <section class="section my-5">
        <div class="container">        
            <div class="row gap-1 d-flex flex-md-row align-items-start justify-content-around">

                <?php 
                    foreach ($pagination->getArrayPage() as $product){
                        require __DIR__ . '/templates/product_card.php'; 
                    }
                ?>

            
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6 d-flex justify-content-around mb-4">
                    <a href="index.php?page=<?php echo $pagination->prevPage() ?>" class="col-2 d-flex justify-content-center align-items-center gap-2 btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                        </svg>
                    </a>

                    <?php $i = 1; while ($i <= $pagination->getTotalPage()) { ?>
                        <?php if($i == $pagination->getPageNb()) {?>
                            <p class="fw-bold"><?php echo $i?></p>
                        <?php } else { ?>
                        <a href="index.php?page=<?php echo $i?>"><?php echo $i?></a>
                        <?php } ?>
                    <?php $i++; } ?>

                    <a href="index.php?page=<?php echo $pagination->nextPage() ?>" class="col-2 d-flex justify-content-center align-items-center gap-2 btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>













<?php require_once __DIR__ . '/layout/footer.php'; ?>
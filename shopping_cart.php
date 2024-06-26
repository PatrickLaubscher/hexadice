<?php
$title = "Panier";
require_once __DIR__ . '/layout/header.php';

if(!empty($_SESSION['cart'])) {

    $game = new GameContent($db);
}

?>

<main>
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-3 nothing-serious-h1">Votre panier</h3>
                    </div>
                    <hr>
                    <?php if(empty($_SESSION) || empty($_SESSION['cart'])) { ?>
                    <p>Votre panier est vide</p>
                    <?php } ?>

                    <?php if(!empty($_SESSION['cart']))
                            foreach($_SESSION['cart'] as $item) {{

                                [
                                    'game_id' => $id,
                                    'qty'     => $qty
                                ] = $item;

                        $article = $game->getAllContentById($id);?>

                        <div class="rounded-3 my-2">
                            <div class="p-2">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2 d-flex justify-content-center">
                                        <img src="uploads/products/<?php echo $article['game_sticker'];?>"
                                        class="img-fluid rounded-3" alt="<?php echo $article['game_name'];?>">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3 my-2 d-flex justify-content-center">
                                        <p class="lead fw-normal mb-2"><?php echo $article['game_name'];?></p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex justify-content-end mb-2">
                                        <input min="1" name="game_qty" value="<?php echo $qty; ?>" size="2">
                                        <form method="post" action="process/add_qty.php">
                                            <input type="text" name="game_id" class="d-none" value="<?php echo $id; ?>">
                                            <input type="submit" value="+">
                                        </form>
                                        <form method="post" action="process/reduce_qty.php">
                                            <input type="text" name="game_id" class="d-none" value="<?php echo $id; ?>">
                                            <input type="submit" value="-">
                                        </form>
                                        <form class="ms-2" method="post" action="process/delete_product.php">
                                            <input type="text" name="game_id" class="d-none" value="<?php echo $id; ?>">
                                            <input type="submit" value="x">
                                        </form>
                                    </div>
                
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1 d-flex justify-content-end">
                                        <h5 class="mb-0"><?php echo $article['game_price'];?> €</h5>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 d-flex justify-content-end">
                                            ss-Total
                                            <?php echo $ssTotal = $article['game_price'] * $qty; ?> €
                                    </div>
        
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
                    <div class="col mb-4">
                        <div class="p-4 d-flex flex-column gap-1">
                            <div class="form-outline col-7 col-md-5 col-lg-4">
                                <label class="form-label">Code promo</label>
                                <input type="text" class="form-control">
                            </div>
                            <button type="button" class="btn btn-outline-warning btn-lg col-7 col-md-4 col-lg-3">Appliquer le code</button>
                        </div>
                    </div>
                    <div>
                        <a href="index.php" class="nothing-serious-h3">
                            -> Voulez-vous rajouter d'autres jeux? Let's play !
                            <img src="assets/svg/hexadice-logo-mark.svg" class="ms-2 btn-rotate" alt="Logo Hexadice" width="40" alt="Hexadice logo">
                        </a>
                    </div>
                    <div class="card-body d-flex justify-content-end">
                        <form method="post" action="process/validation_cart.php">
                        <input type="submit" class="btn btn-warning btn-block btn-lg btn1 my-3" value="Valider le panier">
                        </form>
                    </div>
                    <div>
                        <a href="process/clean_shopping_cart.php" class="btn btn-secondary">Vider le panier</a>
                    </div>

                </div>
            </div>
        </div>
        

    </section>

</main>




<?php require_once __DIR__ . '/layout/footer.php'; ?>
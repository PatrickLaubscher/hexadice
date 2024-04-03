

<div class="mb-4 card py-0 d-flex flex-column align-items-center">
    <div class="col-12">
        <img src="<?php echo $product['image1'] ?>" class="card-img-top img-fluid" width="80px" height="80px" alt="<?php echo $product['name'] ?>">
    </div>
    <div class="card-body">
        <header>
            <h2 class="card-title fs-5"><?php echo $product['name'] ?></h2>
        </header>
        <p class="card-text">Some quick example text to build...</p>
        <h4 class="category"><?php echo $product['category'] ?></h4>
        <p>Prix de vente TTC <?php echo $product['price'] ?> €</p>
        <div class="d-flex justify-content-between">
            <a href="product.php?id=<?php echo $product['id'] ?>" class="btn btn-primary">Fiche</a>
            <a href="#" class="btn btn-primary">Panier</a>
        </div>
    </div>
</div>
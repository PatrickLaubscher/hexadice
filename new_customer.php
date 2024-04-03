<?php
$title = "Accueil";
require_once __DIR__ . '/layout/header.php';
require __DIR__ . '/data/products.php';

?>


<section class="section mt-5">
    <div class="container">        
        <div class="row d-flex justify-content-center">
            <div class="col-8 mb-4 border p-5 d-flex flex-column justify-content-center">
                <header><h2 class="fs-5 mb-5">Formulaire d'enregistrement</h2></header>
                <form class="d-flex flex-column px-5" method="post" action="process/register_post.php">
                    <div class="mb-4 form-group">
                        <label for="lastname">Votre nom :</label>
                        <input type="text" class="form-control" id="lastname" name="lastname">
                    </div>
                    <div class="mb-4 form-group">
                        <label for="firstname">Votre prénom :</label>
                        <input type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="mb-4 form-group">
                        <label for="email">Votre email :</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-4 form-group">
                        <label for="pass">Votre mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-4 mt-3">
                        <input class="btn btn-primary" type="submit" value="Valider votre inscription">
                    </div> 
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$title="Login";
require_once __DIR__ . '/layout/header.php';

?>

<main>

    <section>
        <div class="container">
            <header><h1 class="mt-5 fs-5">Connectez-vous à votre compte client</h1></header>
            <div class="row my-5 d-flex justify-content-center">
                <div class="col-lg-5">
                    <form method="post" action="process/login_process_customer.php">
                        <div class="form-group mb-2">
                            <label for="email">Adresse mail</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Saisissez votre email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Saisissez votre mot de passe" required>
                            <small id="emailHelp" class="form-text text-muted">Vous avez oublié votre mot de passe?</small>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Connexion">
                    </form>
                </div>
            </div>
        </div>
    </section>


</main>



















<?php require_once __DIR__ . '/layout/footer.php'; ?>
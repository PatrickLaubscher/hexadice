<?php
$title = "Espace client";
require_once __DIR__ . '/layout/header.php';

if(empty($_SESSION) || $_SESSION['customer'] === false) 
{
    header('Location: index.php');
    exit;
}

$user = new Customer($db);
$contentPage = $user->getContentById($_SESSION['customer_nb']);

?>



<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="my-4 nothing-serious-h1">Votre espace client</h1>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row d-flex flex-column">
                <div class="col-8 mb-5 p-3 align-self-center border1">
                    <div class="col-6 border1">
                        Votre photo de profil
                    </div>
                    <h2 class="my-4 nothing-serious-h2">Vos informations personnelles</h2>
                    <h4>Votre nom: <?php echo $contentPage['customer_lastname']; ?></h4>
                    <h4>Votre prénom: <?php echo $contentPage['customer_firstname']; ?></h4>
                    <h4>Votre email: <?php echo $contentPage['customer_email']; ?></h4>
                    <h4>Votre adresse: <?php echo $contentPage['customer_email']; ?></h4>
                    <h4>Votre téléphone: <?php echo $contentPage['customer_email']; ?></h4>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row d-flex flex-column">
                <div class="col-8 mb-5 p-3 align-self-center border1">
                    <h2 class="my-4 nothing-serious-h2">Historique de vos commandes</h2>

                </div>
            </div>
        </div>
    </section>



</main>




<?php require_once __DIR__ . '/layout/footer.php'; ?>
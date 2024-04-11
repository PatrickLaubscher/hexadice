<?php
$title = "Contact";
require_once __DIR__ . '/layout/header.php';


?>




<main>
    <section>
        <div class="container">
            <div class="row mt-5 d-flex flex-column">
                <div class="col mb-2">
                    <h1 class="fs-3">Nous contacter</h1>
                </div>
                <div class="col-8 align-self-center d-flex flex-column mb-2 border">
                    <form class="d-flex p-5 flex-column gap-3 contact-form" method="post" action="process/contact_process.php">
                        <div>
                            <label for="firstname">Prénom: </label><br>
                            <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Prénom" 
                            <?php if(isset($_SESSION['firstname'])) { ?>
                             value="<?php echo $_SESSION['firstname'] ;?>"
                            <?php } ?> >
                        </div>
                        <div>
                            <label for="lastname">Nom: </label><br>
                            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Nom"
                            <?php if(isset($_SESSION['lastname'])) { ?>
                             value="<?php echo $_SESSION['lastname'] ;?>"
                            <?php } ?> >
                        </div>
                        <div>
                            <label for="email">Email: </label><br>
                            <input class="form-control" type="text" name="email" id="email" placeholder="Email"
                            <?php if(isset($_SESSION['email'])) { ?>
                             value="<?php echo $_SESSION['email'] ;?>"
                            <?php } ?> >                       
                        </div>
                        <div>
                            <label for="object">Choisir un objet: </label><br>
                            <select class="form-control" id="object" name="object">
                                <option value="1">Demande d'information</option>
                                <option value="2">SAV</option>
                                <option value="3">Devis d'entreprise</option>
                            </select>
                        </div>
                        <div>
                            <textarea class="form-control" name="message">Ecrire votre message</textarea>
                        </div>
                        <div class="align-self-center">
                            <input class="btn btn-primary" type="submit" value="Envoyer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>






<?php require_once __DIR__ . '/layout/footer.php'; ?>
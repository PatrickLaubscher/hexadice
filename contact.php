<?php
$title = "Contact";
require_once __DIR__ . '/layout/header.php';


?>




<main data-aos="fade-in">
    <section>
        <div class="container">
            <div class="row mt-5 d-flex flex-column mx-2">
                <div class="col mb-2">
                    <h1 class="nothing-serious-h1">Nous contacter</h1>
                </div>
                <div class="col col-md-8 align-self-center d-flex flex-column mb-2 border1">
                    <form class="d-flex p-2 p-md-5 flex-column gap-3 contact-form" method="post" action="process/contact_process.php">
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
                            <textarea class="form-control" name="message" rows="8">Ecrire votre message</textarea>
                        </div>
                        <div class="align-self-center">
                            <input class="btn btn-primary btn1" type="submit" value="Envoyer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>






<?php require_once __DIR__ . '/layout/footer.php'; ?>
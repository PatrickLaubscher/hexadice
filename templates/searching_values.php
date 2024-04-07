<div class="row">
            <div class="col mb-4">
                <?php
                    if(isset($_GET) && !empty($_GET)) { ?>

                        <p>Résultats de la recherche pour :</p>

                        <?php if(!empty($_GET['name_search'])) {?>
                            <p>
                                Nom de jeu contenant : 
                                "<?php echo $_GET['name_search']; ?>"
                            </p>
                        <?php } ?>

                        <?php if(isset($_GET['category'])) {?>
                            <p>
                                Catégorie :
                                "<?php echo $_GET['category']; ?>"
                            </p>
                        <?php } ?>

                   <?php } ?>
            </div>
        </div>
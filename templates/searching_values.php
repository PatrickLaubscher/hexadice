<div class="row">
    <div class="col mb-4">
        <?php
            if(isset($searchParams)) { ?>

                <p class="nothing-serious-p">Résultats de la recherche pour :</p>
                
                <div class="d-flex gap-3">
                <?php foreach($searchParams as $key => $value) {?>

                    <?php if($key == 'game_name') { ?>
                        <p>
                        <span class="nothing-serious-p">Nom du jeu :</span>
                        "<?php echo $value; ?>"
                        </p>
                    <?php } ?>

                    <?php if($key == 'category') { ?>
                        <p>
                        <span class="nothing-serious-p">Catégorie :</span>
                        "<?php echo $value; ?>"
                        </p>
                    <?php } ?>

                    <?php if($key == 'player_nb') { ?>
                        <p>
                        <span class="nothing-serious-p">Nombre de joueurs :</span>
                        "<?php echo $value; ?>"
                        </p>
                    <?php } ?>

                    <?php if($key == 'age_mini') { ?>
                        <p>
                        <span class="nothing-serious-p">Âge minimum :</span>
                        "<?php echo $value; ?>"
                        </p>
                    <?php } ?>

                    <?php } ?>

                </div>
                
            <?php } ?>
            
    </div>
</div>

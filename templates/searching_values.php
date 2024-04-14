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
                <div class="col mt-4">
                    <button id="btn-display-search" class="btn btn-secondary btn1 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                        Lancer une nouvelle recherche
                    </button>
                </div>
                
            <?php } ?>
            
    </div>
</div>

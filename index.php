<?php 
$title = "Accueil";
require_once __DIR__ . '/layout/header.php';
$contentPage = new GameContent($db);
$featureList = new Feature($db);
$gameList = $contentPage->getAllContent();
$categoryList = $featureList->getAllContentFeature('category');
$playerNbList = $featureList->getAllContentFeature('player_nb');
$ageMiniList = $featureList->getAllContentFeature('age_mini');

$gameListResult=[];
$isGameFound = true;

if(isset($_GET) && !empty($_GET)) {

    $searchParams = $_GET;
    $gameListResult = $contentPage->findGamesGlobalSearch($searchParams);

    if($gameListResult == false) {
        $isGameFound == false;
    }
}



$itemPerPage = 6;

if(!empty($gameListResult)){
    $pagination = new Pagination($itemPerPage, $gameListResult);
} else {
    $pagination = new Pagination($itemPerPage, $gameList);
}   

?>

<main>

    <section class="section">
        <div class="container">        
            <div class="row">
                <div class="col mt-4">
                    <button id="btn-display-search" class="btn btn-secondary btn1 d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div id="search-field" class="row d-none">
                <div class="col ps-5 mt-2">
                    <form class="border1 p-3">
                        <div class="form-group mb-2">
                            <label for="name_search" class="nothing-serious-p m-0 p-0">Nom du jeu: </label>
                            <input type="text" id="name_search" name="game_name">
                        </div>
                        <div>
                            <p class="nothing-serious-p m-0 p-0">Catégories</p>
                            <div class="form-group col-7 ps-2 mb-2 d-inline-flex flex-wrap gap-2">
                                <?php foreach($categoryList as $category) { ?> 
                                <div class="d-inline-flex justify-content-between align-items-center ps-1 gap-1">
                                    <label for="category"><?php echo $category['category_name'] ?></label>
                                    <input type="radio" id="category" name="category" value="<?php echo $category['category_name'] ?>">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div>
                            <p class="nothing-serious-p m-0 p-0">Nombre de joueur</p>
                            <div class="form-group col-7 ps-2 mb-2 d-inline-flex flex-wrap gap-3">
                                <?php foreach($playerNbList as $playerNb) { ?> 
                                <div class="d-inline-flex justify-content-between align-items-center gap-1">
                                    <label for="player_nb"><?php echo $playerNb['player_nb_name'] ?></label>
                                    <input type="radio" id="player_nb" name="player_nb" value="<?php echo $playerNb['player_nb_name'] ?>">
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div>
                            <p class="nothing-serious-p m-0 p-0">Âge minimum</p>
                            <div class="form-group col-7 ps-2 mb-2 d-inline-flex flex-wrap gap-3">
                                <?php foreach($ageMiniList as $ageMini) { ?> 
                                <div class="d-inline-flex justify-content-between align-items-center gap-1">
                                    <label for="age_mini"><?php echo $ageMini['age_mini_name'] ?> ans</label>
                                    <input type="radio" id="age_mini" name="age_mini" value="<?php echo $ageMini['age_mini_name'] ?>">
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center gap-2 search">
                            <input type="submit" value="Lancer la recherche" class="nothing-serious-p btn1">
                            <img alt="Hexadice" class="my-2 btn-rotate" src="assets/img/hexadice_recherche.png" width="50">
                        </div> 
                    </form>

                    <button id="btn-remove-field" class="mb-3 mt-4 btn btn-secondary btn1">^</button>
                </div>
            </div>
        </div>
    </section>

    <?php if(!isset($searchParams)) { ?>
    <header class="section my-5">
        <div class="container">        
            <div class="row py-2 d-flex flex-md-row align-items-start">
                <h1 class="mb-1 nothing-serious-h1">Bienvenue chez les passionnés de jeux de société !</h1>
                <div class="">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate laboriosam, odio dolore excepturi minus at quidem, quae impedit accusantium, doloremque sit. Sequi obcaecati odit atque, fugiat ex dolor consequatur culpa.
                    </p>
                </div>
            </div>
        </div>
    </header>
    <?php } ?>

    <section class="section my-5">
        <div class="container">        
            <div class="row">
            <h2>
                <a href="new_customer.php" class="nothing-serious-h2">
                    Rejoignez-nous en créant un compte client
                    <img src="assets/svg/hexadice-logo-mark.svg" class="ms-2 btn-rotate" alt="Logo Hexadice" width="70" alt="Hexadice logo">
                </a>
            </h2>
            </div>
        </div>
    </section>

    <section id="resultats-recherche" class="section my-5">
        <div class="container">

            <?php require_once __DIR__ . '/templates/searching_values.php'; ?>

            <div class="row gap-1 d-flex flex-md-row align-items-stretch justify-content-around">

                <?php if ( $isGameFound == false) { ?>
                        <p class="nothing-serious-h2">Jeu non trouvé :(</p>

                <?php    } else {
                        foreach ($pagination->getArrayPage() as $game){
                            require __DIR__ . '/templates/product_card.php';
                        }
                    }
                ?>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-6 d-flex justify-content-around mb-4">
                    <a href="index.php?page=<?php echo $pagination->prevPage() ?>" class="col-2 d-flex justify-content-center align-items-center gap-2 btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                        </svg>
                    </a>

                    <?php $i = 1; while ($i <= $pagination->getTotalPage()) { ?>
                        <?php if($i == $pagination->getPageNb()) {?>
                            <p class="fw-bold"><?php echo $i?></p>
                        <?php } else { ?>
                        <a href="index.php?page=<?php echo $i?>"><?php echo $i?></a>
                        <?php } ?>
                    <?php $i++; } ?>

                    <a href="index.php?page=<?php echo $pagination->nextPage() ?>" class="col-2 d-flex justify-content-center align-items-center gap-2 btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>













<?php require_once __DIR__ . '/layout/footer.php'; ?>
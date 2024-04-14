<?php
$title="Backoffice";
require_once __DIR__ . '/layout/header_admin.php';

if(empty($_SESSION) || $_SESSION['employee'] === false) 
{
    header('Location: index.php');
    exit;
}

$table="";

if(isset($_GET['featureTable']) && !empty($_GET['featureTable'])) {

    [
        'featureTable' => $table,
    ] = $_GET;

    $column = $table . '_name';
    $db = Database::getInstance();
    $stmt = $db->prepare("SELECT $column FROM $table");
    $stmt->execute();
    $featureList = $stmt->fetchAll(PDO::FETCH_COLUMN);
    asort($featureList);
} 


switch ($table) {
    case 'age_mini':
        $featureTitle = "Âge minimum";
    break;
    case 'player_nb':
        $featureTitle = "Nombre de joueurs";
    break;
    case 'duration':
        $featureTitle = "Durée de jeu";
    break;
    case 'category':
        $featureTitle = "Catégories";
    break;
    case 'languages':
        $featureTitle = "Langue";
    break;
    case 'editor':
        $featureTitle = "Editeurs";
    break;
    case 'author':
        $featureTitle = "Auteurs";
    break;
    case 'illustrator':
        $featureTitle = "Illustrateurs";
    break;
    default: 
        $featureTitle = "Pas de liste choisie";
}

$contentPage = new GameContent($db);
$feature = new Feature($db);

$ageList         = $feature->getAllContentFeature('age_mini');
$categoryList    = $feature->getAllContentFeature('category');
$playerList      = $feature->getAllContentFeature('player_nb');
$durationList    = $feature->getAllContentFeature('duration');
$languagesList   = $feature->getAllContentFeature('languages');
$editorList      = $feature->getAllContentFeature('editor');
$authorList      = $feature->getAllContentFeature('author');
$illustratorList = $feature->getAllContentFeature('illustrator');

$nbCategory    = 1;
$nbAuthor      = 1;
$nbIllustrator = 1;

if(isset($_GET['nbCategory']) || isset($_GET['nbAuthor']) || isset($_GET['nbIllustrator'])) {
    [
        'nbCategory'    => $nbCategory,
        'nbAuthor'      => $nbAuthor,
        'nbIllustrator' => $nbIllustrator
    ] = $_GET;
}

?>


<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="my-4 fs-2">Espace gestion</h1>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row d-flex flex-column">
                <div class="col">
                    <h2 class="mt-4 fs-4">Ajouter/modifier les listes d'informations complémentaires</h2>
                    <button class="btn btn-secondary">></button>
                </div>
                <div id="section1" class="col-8 mb-5 p-3 align-self-center border">
                    <form>
                        <select name="featureTable">
                            <option value="">-- Choisir la liste à modifier --</option>
                            <option value="age_mini">Âge minimum</option>
                            <option value="player_nb">Nombre de joueurs</option>
                            <option value="duration">Durée de jeu</option>
                            <option value="category">Catégories</option>
                            <option value="languages">Langue</option>
                            <option value="editor">Editeurs</option>
                            <option value="author">Auteurs</option>
                            <option value="illustrator">Illustrateurs</option>
                        </select>
                        <input class="btn btn-primary" type="submit" value="Sélectionner liste">
                    </form>
                    <h4><?php echo $featureTitle; ?></h4>
                    <?php if(isset($_GET['featureTable']) && !empty($_GET['featureTable'])) { ?>
                    <p>Elements de la liste: </p>
                    <ul class="list-unstyled">
                        <?php foreach ($featureList as $feature) { ?>
                            <li>
                                <form method="post" action="">
                                    <label class="d-none" for="feature"></label>
                                    <input type="text" class="text-center" id="feature" name="feature" value="<?php echo $feature; ?>">
                                    <input type="submit" value="Modifier">
                                </form>
                            </li>
                        <?php } ?>
                    </ul>
                    <p>Ajouter un élément à cette liste: </p>
                    <form method="post" action="../process/feature_create.php">
                        <label class="d-none" for="feature"></label>
                        <input type="text" class="text-center" id="feature" name="feature">
                        <label class="d-none" for="table"></label>
                        <input type="text" class="d-none" id="table" name="table" value="<?php echo $table; ?>">
                        <input type="submit" value="Ajouter">
                    </form>
                        <?php } ?>
                    <div class="d-flex justify-content-end">
                        <button id="btn-section1-remove" class="btn btn-secondary">^</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <section>
        <div class="container">
            <div class="row d-flex flex-column">
                <div class="col mb-4">
                    <h2 class="my-4 fs-4">Gérer les jeux du catalogue</h2>
                </div>
                <h3 class="my-4 fs-5 d-flex flex-column gap-3">
                        <span>1 - Configuration avant ajout/modif de jeu</span>
                        Choisir le nombre de catégories, d'auteurs et d'illustrateurs :
                    </h3>
                <div class="col-8 align-self-center border mb-5">
                    <form class="mt-4">
                        <div class="d-flex mx-5">
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="nbCategory">Nombre de catégorie(s): </label>
                                <input type="number" id="nbCategory" name="nbCategory" 
                                value="<?php echo $nbCategory ?>" placeholder="<?php echo $nbCategory ?>" class="text-center col-4">
                            </div>
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="nbAuthor">Nombre d'auteur(s): </label>
                                <input type="number" id="nbAuthor" name="nbAuthor" 
                                value="<?php echo $nbAuthor ?>" placeholder="<?php echo $nbAuthor ?>" class="text-center col-4">
                            </div>
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="nbIllustrator">Nombre d'illustrateur(s): </label>
                                <input type="number" id="nbIllustrator" name="nbIllustrator" 
                                value="<?php echo $nbIllustrator ?>" placeholder="<?php echo $nbIllustrator ?>" class="text-center col-4">
                            </div>
                        </div>
                        <div class="my-2 form-group d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary mb-4" value="Valider">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row d-flex flex-column">
                <div class="col mb-4">
                    <h2 class="my-4 fs-5">2- Ajouter un nouveau jeu</h2>
                    <button id="btn-section2" class="btn btn-secondary">></button>
                </div>
                <div id="section2" class="col-8 align-self-center border d-none">
    
                    <form class="d-flex flex-column"  method="post" action="../process/game_create.php">
                        <div class="mb-4 mx-5 form-group d-flex flex-column">
                            <label for="game_name">Nom du jeu: </label>
                            <input type="text" id="game_name" name="game_name" class="col-6">
                        </div>
                        <div class="mb-4 mx-5 form-group d-flex flex-column">
                            <label for="game_description">Description: </label>
                            <textarea id="editor" name="game_description" rows="8" cols="50"></textarea>
                        </div>
                        <div class="mb-4 mx-5 form-group d-flex flex-column">
                            <label for="game_short">Short description: </label>
                            <input name="game_short" id="game_short" rows="5">
                        </div>
                        
                        <div class="d-flex mx-5">
                            <div class="col">
                                
                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_price">Prix TTC: </label>
                                    <input type="number" id="game_price" name="game_price" max="1000" step="0.01" class="col-6">
                                </div>
                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_stock">Quantité en stock de départ: </label>
                                    <input type="number" id="game_stock" name="game_stock" class="col-6">
                                </div>
                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_age_mini">Âge minimum: </label>
                                    <select name="game_age_mini" class="col-6">
                                        <option value="">-- Choisir un âge --</option>
                                        <?php foreach($ageList as $age) { ?>
                                            <option value="<?php echo $age['age_mini_id'] ?>"><?php echo $age['age_mini_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_player">Nombre de joueurs: </label>
                                    <select name="game_player" class="col-6">
                                        <option value="">-- Choisir un nombre --</option>
                                        <?php foreach($playerList as $player) { ?>
                                            <option value="<?php echo $player['player_nb_id'] ?>"><?php echo $player['player_nb_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_duration">Durée d'une partie: </label>
                                    <select name="game_duration" class="col-6">
                                        <option value="">-- Choisir une durée --</option>
                                        <?php foreach($durationList as $duration) { ?>
                                            <option value="<?php echo $duration['duration_id'] ?>"><?php echo $duration['duration_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col">
                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_language">Langue du jeu: </label>
                                    <select name="game_language" class="col-6">
                                        <option value="">-- Choisir une langue --</option>
                                        <?php foreach($languagesList as $language) { ?>
                                            <option value="<?php echo $language['languages_id'] ?>"><?php echo $language['languages_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_editor">Editeur du jeu: </label>
                                    <select name="game_editor" class="col-7">
                                        <option value="">-- Choisir un éditeur --</option>
                                        <?php foreach($editorList as $editor) { ?>
                                            <option value="<?php echo $editor['editor_id'] ?>"><?php echo $editor['editor_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_category">Catégorie(s) du jeu: </label>
                                    <?php for($i = 0; $i < $nbCategory; $i++) {?>
                                    <div>
                                    <span><?php echo $i+1 ?>-</span>
                                        <select name="game_category[]" class="col-7">
                                            <option value="">-- Choisir une catégorie --</option>
                                            <?php foreach($categoryList as $category) { ?>
                                                <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_author">Auteur(s) du jeu: </label>
                                    <?php for($i = 0; $i < $nbAuthor; $i++) {?>
                                    <div id="author">
                                    <span><?php echo $i+1 ?>-</span>
                                        <select name="game_author[]" class="col-7">
                                            <option value="">-- Choisir un auteur --</option>
                                            <?php foreach($authorList as $author) { ?>
                                                <option value="<?php echo $author['author_id'] ?>"><?php echo $author['author_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_illustrator">Illustrateur(s) du jeu: </label>
                                    <?php for($i = 0; $i < $nbIllustrator; $i++) {?>
                                    <div id="author">
                                    <span><?php echo $i+1 ?>-</span>
                                        <select name="game_illustrator[]" class="col-7">
                                            <option value="">-- Choisir un illustrateur --</option>
                                            <?php foreach($illustratorList as $illustrator) { ?>
                                                <option value="<?php echo $illustrator['illustrator_id'] ?>"><?php echo $illustrator['illustrator_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php } ?>
                                </div>

                            </div>

                        </div>
                        <div class="my-5 form-group d-flex justify-content-center">
                            <input class="btn btn-primary" type="submit" value="Ajouter le jeu"> 
                        </div>
                    </form>
                    <div class="d-flex justify-content-end">
                        <button id="btn-section2-remove" class="btn btn-secondary">^</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row d-flex flex-column">
                <div class="col mb-4">
                    <h3 class="my-4 fs-5">3 - Ajouter/modifier les images du jeu</h3>
                    <button id="btn-section3" class="btn btn-secondary">></button>
                </div>
                <div id="section3" class="col-8 align-self-center border mb-5 d-none">
                    <form method="post" action="../process/upload_gamepictures.php" enctype="multipart/form-data">
                        <div class="d-flex flex-column justify-content-center mx-5">
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_name">Saisir le nom du jeu: </label>
                                <input type="text" id="game_name" name="game_name" class="text-center col-6">
                            </div>
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_sticker">Image sticker: </label>
                                <input type="file" name="game_sticker">
                            </div>
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_picture1">Image 1: </label>
                                <input type="file" name="game_picture1">
                            </div>
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_picture2">Image 2: </label>
                                <input type="file" name="game_picture2">
                            </div>
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_picture3">Image 3: </label>
                                <input type="file" name="game_picture3">
                            </div>
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_picture4">Image 4: </label>
                                <input type="file" name="game_picture4">
                            </div>
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_picture5">Image 5: </label>
                                <input type="file" name="game_picture5">
                            </div>
                        </div>
                        <div class="my-5 form-group d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary mb-4" value="Valider">
                        </div>
                    </form>
                    <div class="d-flex justify-content-end">
                        <button id="btn-section3-remove" class="btn btn-secondary">^</button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    
    <section>
        <div class="container">
            <div class="row d-flex flex-column">
            <div class="col mb-4">
                    <h3 class="my-4 fs-5">4 - Modifier le contenu d'un jeu</h3>
                    <button id="btn-section4" class="btn btn-secondary">></button>
                </div>                               
                <div id="section4" class="col-8 align-self-center border mb-5 d-none">
                    <form method="post" action="../process/game_modify.php" enctype="multipart/form-data">
                        <div class="d-flex flex-column justify-content-center mx-5">
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_name">Saisir le nom du jeu: </label>
                                <input type="text" id="game_name" name="game_name" class="text-center col-6">
                            </div>
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_description">Description: </label>
                                <textarea id="editor" name="game_description" rows="8" cols="50"></textarea>
                            </div>
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_short">Short description: </label>
                                <input name="game_short" id="game_short" rows="5">
                            </div>
                        </div>

                        <div class="d-flex mx-5">
                            <div class="col">
                                
                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_price">Prix TTC: </label>
                                    <input type="number" id="game_price" name="game_price" max="1000" step="0.01" class="col-6">
                                </div>
                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_age_mini">Âge minimum: </label>
                                    <select name="game_age_mini" class="col-6">
                                        <option value="">-- Choisir un âge --</option>
                                        <?php foreach($ageList as $age) { ?>
                                            <option value="<?php echo $age['age_mini_id'] ?>"><?php echo $age['age_mini_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_player">Nombre de joueurs: </label>
                                    <select name="game_player" class="col-6">
                                        <option value="">-- Choisir un nombre --</option>
                                        <?php foreach($playerList as $player) { ?>
                                            <option value="<?php echo $player['player_nb_id'] ?>"><?php echo $player['player_nb_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_duration">Durée d'une partie: </label>
                                    <select name="game_duration" class="col-6">
                                        <option value="">-- Choisir une durée --</option>
                                        <?php foreach($durationList as $duration) { ?>
                                            <option value="<?php echo $duration['duration_id'] ?>"><?php echo $duration['duration_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                
                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_language">Langue du jeu: </label>
                                    <select name="game_language" class="col-6">
                                        <option value="">-- Choisir une langue --</option>
                                        <?php foreach($languagesList as $language) { ?>
                                            <option value="<?php echo $language['languages_id'] ?>"><?php echo $language['languages_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col">

                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_editor">Editeur du jeu: </label>
                                    <select name="game_editor" class="col-7">
                                        <option value="">-- Choisir un éditeur --</option>
                                        <?php foreach($editorList as $editor) { ?>
                                            <option value="<?php echo $editor['editor_id'] ?>"><?php echo $editor['editor_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_category">Catégorie(s) du jeu: </label>
                                    <?php for($i = 0; $i < $nbCategory; $i++) {?>
                                    <div>
                                    <span><?php echo $i+1 ?>-</span>
                                        <select name="game_category[]" class="col-7">
                                            <option value="">-- Choisir une catégorie --</option>
                                            <?php foreach($categoryList as $category) { ?>
                                                <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_author">Auteur(s) du jeu: </label>
                                    <?php for($i = 0; $i < $nbAuthor; $i++) {?>
                                    <div id="author">
                                    <span><?php echo $i+1 ?>-</span>
                                        <select name="game_author[]" class="col-7">
                                            <option value="">-- Choisir un auteur --</option>
                                            <?php foreach($authorList as $author) { ?>
                                                <option value="<?php echo $author['author_id'] ?>"><?php echo $author['author_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="mb-4 form-group d-flex flex-column">
                                    <label for="game_illustrator">Illustrateur(s) du jeu: </label>
                                    <?php for($i = 0; $i < $nbIllustrator; $i++) {?>
                                    <div id="author">
                                    <span><?php echo $i+1 ?>-</span>
                                        <select name="game_illustrator[]" class="col-7">
                                            <option value="">-- Choisir un illustrateur --</option>
                                            <?php foreach($illustratorList as $illustrator) { ?>
                                                <option value="<?php echo $illustrator['illustrator_id'] ?>"><?php echo $illustrator['illustrator_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php } ?>
                                </div>

                            </div>

                        </div>

                        <div class="my-5 form-group d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary mb-4" value="Valider">
                        </div>                              

                    </form>
                    <div class="d-flex justify-content-end">
                        <button id="btn-section4-remove" class="btn btn-secondary">^</button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row d-flex flex-column">
                <div class="col mb-4">
                    <h3 class="my-4 fs-5">5 - Supprimer un jeu du catalogue</h3>
                    <button id="btn-section5" class="btn btn-secondary">></button>
                </div>                               
                <div id="section5" class="col-8 align-self-center border mb-5 d-none">
                    <form method="post" action="../process/game_check_delete.php" enctype="multipart/form-data">
                        <div class="d-flex flex-column justify-content-center mx-5">
                            <div class="mb-4 form-group d-flex flex-column">
                                <label for="game_name">Saisir le nom du jeu: </label>
                                <input type="text" id="game_name" name="game_name" class="text-center col-6">
                            </div>
                        <div class="my-5 form-group d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary mb-4" value="Valider">
                        </div>                              
                    </form>
                    <div class="d-flex justify-content-end">
                        <button id="btn-section5-remove" class="btn btn-secondary">^</button>
                    </div>
                </div>

            </div>
        </div>
    </section>




    <hr>
</main>



<?php
require_once __DIR__ . '/layout/footer_admin.php';
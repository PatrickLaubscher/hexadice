<?php
$title = "Accueil";
require_once __DIR__ . '/layout/header.php';

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$contentPage = new GameContent();
$gameList = $contentPage->getAllContent($db);
$categoryList = $contentPage->getAllContentFeature($db, 'category');
$editorList = $contentPage->getAllContentFeature($db, 'editor');


if(isset($_GET) && !empty($_GET)) {

    $gameList = [];


    if(!empty($_GET['name_search'])) {

        [
            'name_search' => $gameName,
        ] = $_GET;

        $stmt = $db->prepare("SELECT game_id,game_name FROM game");
        $stmt->execute();
        $gameListByName = $stmt->fetchAll(PDO::FETCH_ASSOC);
        asort($gameListByName);

        foreach($gameListByName as $game) {
            if (str_contains($game['game_name'], $gameName)){
                $foundId = $game['game_id'];
                $gameList[] = $contentPage->getAllContentById($db, $foundId);
            } 
        }
        
    }


    if(!empty($_GET['category'])) {

        [
            'category' => $category
        ] = $_GET;

        $category = addslashes($category);

        if(!empty($game_name)) {
            $stmt = $db->prepare("SELECT '$game_name' FROM game_category_list INNER JOIN category ON category_id = id_category 
            INNER JOIN game ON game_id = id_game WHERE category_name = '$category'");
        } else {
            $stmt = $db->prepare("SELECT game_name FROM game_category_list INNER JOIN category ON category_id = id_category 
            INNER JOIN game ON game_id = id_game WHERE category_name = '$category'");
        }

        $stmt->execute();
        $gameListByCategory = $stmt->fetchAll(PDO::FETCH_ASSOC);
        asort($gameListByCategory);


        foreach ($gameListByCategory as $game) {
            $game_name = $game['game_name'];
            $stmt = $db->prepare("SELECT * FROM game WHERE game_name = '$game_name'");
            $stmt->execute();
            $gameList[] = $stmt->fetch(PDO::FETCH_ASSOC);
        }

    }


    for ($i = 0; $i < count($gameList) - 1; $i++)
    {
        for ($j = $i+1; $j < count($gameList); $j++) {
            if($gameList[$i]['game_name'] == $gameList[$j]['game_name']){
                array_splice($gameList, $i, 1);
            }
        }

    }
    
}

$itemPerPage = 6;
$pagination = new Pagination($itemPerPage, $gameList);

?>

<main>

    <section class="section">
        <div class="container">        
            <div class="row">
                <div class="col ps-5 ms-2 mt-2">
                    <button id="btn-display-search" class="btn btn-secondary fs-5">Je cherche un jeu svg-loupe</button>
                </div>
            </div>
            <div id="search-field" class="row  d-none">
                <div class="col ps-5 ms-2 mt-2">
                    <form>
                        <div class="form-group">
                            <label for="name_search">Nom du jeu: </label>
                            <input type="text" id="name_search" name="name_search">
                        </div>
                        <div class="form-group">
                            <?php foreach($categoryList as $category) { ?> 

                            <input type="radio" id="category" name="category" value="<?php echo $category['category_name'] ?>">
                            <label for="category"><?php echo $category['category_name'] ?></label>
                            
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="editor">Editeurs </label>
                            <select id="editor" name="editor">
                            <option value="">-- Choisissez un éditeur --</option>

                            <?php foreach($editorList as $editor) { ?> 
                            <option value="<?php echo $editor['editor_name'] ?>"><?php echo $editor['editor_name'] ?></option>
                            <?php } ?>

                            </select> 
                        </div>


                        <input type="submit" value="Rechercher">
                    </form>

                    <button id="btn-remove-field" class="mb-3 mt-4 btn btn-secondary">^</button>
                </div>
            </div>
        </div>
    </section>


    <header class="section my-5">
        <div class="container">        
            <div class="row py-2 d-flex flex-md-row align-items-start">
                <h1 class="mb-1">Bienvenue chez les passionnés de jeux de sociétés !</h1>   
            </div>
        </div>
    </header>

    <section class="section my-5">
        <div class="container">        
            <div class="row">
            <h2 class="fs-4"><a href="new_customer.php">Vous souhaitez vous inscrire ?</a></h2>
            </div>
        </div>
    </section>

    <section class="section my-5">
        <div class="container">

            <?php require_once __DIR__ . '/templates/searching_values.php'; ?>

            <div class="row gap-1 d-flex flex-md-row align-items-stretch justify-content-around">

                <?php
                    if (empty($gameList)) {
                        echo "Jeu non trouvé :(";
                    } else {
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
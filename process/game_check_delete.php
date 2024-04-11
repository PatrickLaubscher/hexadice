<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();

if(empty($_POST)) {
    Controller::redirect('../admin/admin.php?error=' . FORM_EMPTY);
}

try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$game = new GameContent($db);


if (isset($_POST['game_name']) && !empty($_POST['game_name'])) {

    $gameName = $_POST['game_name'];

    $gameId = $game->getIdByName($gameName);

    if(empty($gameId)) {
        Controller::redirect('../admin/admin.php?error=' . GAME_NOT_FOUND);
    }

    $game = $game->getAllContentById($gameId);

}  

else {
    Controller::redirect('../admin/admin.php?error=' . FORM_EMPTY);
}

$title="Backoffice";
require_once __DIR__ . '/../admin/layout/header_admin.php';


?>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-column align-items-center">
                    <h3 class="mt-4 fs-2">Êtes-vous sûr de vouloir supprimer "<?php echo $game['game_name']; ?>"?</h3>
                    <p class="mb-4">Cette action est irreversible.</p>
                    <div class="d-flex justify-content-between gap-4">
                        <a href="../admin/admin.php" class="btn btn-success">Retour en arrière</a>
                        <form method="post" action="game_delete.php">
                            <label for="game_id" class="d-none"></label>
                            <input type="number" id="game_id" name="game_id" value="<?php echo $game['game_id']; ?>" class="d-none">
                            <input type="submit" value="Confirmer suppression" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
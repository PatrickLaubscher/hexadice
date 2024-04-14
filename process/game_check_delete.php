<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();

$db = Database::getInstance();

if(isset($_POST)) {

    if(empty($_POST)) {
        $_SESSION['error'] = 6;
        Controller::redirect('../admin/admin.php');
    }

    if (isset($_POST['game_name']) && !empty($_POST['game_name'])) {

        $game = new GameContent($db);
        $gameName = $_POST['game_name'];

        $gameId = $game->getIdByName($gameName);

        if(empty($gameId)) {
            $_SESSION = 11;
            Controller::redirect('../admin/admin.php');
        }

        $game = $game->getAllContentById($gameId);

    } else {
        $_SESSION['error'] = 6;
        Controller::redirect('../admin/admin.php');
    }  
    
}
else {
    Controller::redirect('../admin/admin.php');
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
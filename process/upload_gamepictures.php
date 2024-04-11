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

$countFileUpload = 0;

if (isset($_POST['game_name']) && !empty($_POST['game_name']) && !empty($_FILES)) {

    $gameName = $_POST['game_name'];

    $gameContent = new GameContent($db);
    $gameId = $gameContent->getIdByName($gameName);

    if(empty($gameId)) {
        Controller::redirect('../admin/admin.php?error=' . GAME_NOT_FOUND);
    }

    [
        'game_sticker'  => $game_sticker,
        'game_picture1' => $game_picture1,
        'game_picture2' => $game_picture2,
        'game_picture3' => $game_picture3,
        'game_picture4' => $game_picture4,
        'game_picture5' => $game_picture5

    ] = $_FILES;

    $upload = new Upload($db);


    if(!empty($game_sticker['name'])) {

        $filename = $upload->UploadGamePicture($game_sticker);
        
        if (!empty($filename)) {
            $gameContent->setStickerGame($filename, $gameId);
        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture1['name'])) {

        $filename = $upload->UploadGamePicture($game_picture1);

        if (!empty($filename)) {
            $gameContent->setPictureGame(1,$filename, $gameId);
        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture2['name'])) {

        $filename = $upload->UploadGamePicture($game_picture2);

        if (!empty($filename)) {
            $gameContent->setPictureGame(1,$filename, $gameId);
        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture3['name'])) {

        $filename = $upload->UploadGamePicture($game_picture3);

        if (!empty($filename)) {
            $gameContent->setPictureGame(1,$filename, $gameId);
        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture4['name'])) {

        $filename = $upload->UploadGamePicture($game_picture4);

        if (!empty($filename)) {
            $gameContent->setPictureGame(1,$filename, $gameId);
        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture5['name'])) {

        $filename = $upload->UploadGamePicture($game_picture5);

        if (!empty($filename)) {
            $gameContent->setPictureGame(1,$filename, $gameId);
        }

        $countFileUpload = $countFileUpload + 1;
    }


    if($countFileUpload > 0 ){
        Controller::redirect('../admin/admin.php?validation_upload=' . UPLOADED_FILES . '&files_upload=' . $countFileUpload);
    } else if ($countFileUpload === 0){
        Controller::redirect('../admin/admin.php?error_upload=' . ERROR_UPLOAD_FILES);
    }
    
    
} else {
    Controller::redirect('../admin/admin.php?error=' . INPUT_MISSING);
}

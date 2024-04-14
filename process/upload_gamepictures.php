<?php
session_start();
require_once __DIR__ . '/../classes/Autoload.php';
Autoload::register();

$db = Database::getInstance();

if(isset($_POST)) {

    if(empty($_POST)) {
        $_SESSION['error'] = 14;
        Controller::redirect('../admin/admin.php');
    }

    if(empty($_FILES)) {
        $_SESSION['error'] = 16;
        Controller::redirect('../admin/admin.php');
    }

    $countFileUpload = 0;

    $gameName = $_POST['game_name'];

    $gameContent = new GameContent($db);
    $gameId = $gameContent->getIdByName($gameName);

    if(empty($gameId)) {
        $_SESSION['error'] = 11;
        Controller::redirect('../admin/admin.php');
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
            $gameContent->setPictureGame(2,$filename, $gameId);
        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture3['name'])) {

        $filename = $upload->UploadGamePicture($game_picture3);

        if (!empty($filename)) {
            $gameContent->setPictureGame(3,$filename, $gameId);
        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture4['name'])) {

        $filename = $upload->UploadGamePicture($game_picture4);

        if (!empty($filename)) {
            $gameContent->setPictureGame(4,$filename, $gameId);
        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture5['name'])) {

        $filename = $upload->UploadGamePicture($game_picture5);

        if (!empty($filename)) {
            $gameContent->setPictureGame(5,$filename, $gameId);
        }

        $countFileUpload = $countFileUpload + 1;
    }


    if($countFileUpload > 0 ){
        $_SESSION['validation_upload'] = 6;
        $_SESSION['files_upload'] = $countFileUpload;
        Controller::redirect('../admin/admin.php');
    } else if ($countFileUpload === 0){
        $_SESSION['error_upload'] = 10;
        Controller::redirect('../admin/admin.php');
    }
    


}  
else {
    Controller::redirect('../admin/admin.php');
}
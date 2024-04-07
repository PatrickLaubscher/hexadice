<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/general.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();

if(empty($_POST)) {
    redirect('../admin/admin.php?error=' . FORM_EMPTY);
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

    [
        'game_sticker'  => $game_sticker,
        'game_picture1' => $game_picture1,
        'game_picture2' => $game_picture2,
        'game_picture3' => $game_picture3,
        'game_picture4' => $game_picture4,
        'game_picture5' => $game_picture5

    ] = $_FILES;


    if(!empty($game_sticker['name'])) {
        ['filename' => $uploadFilename, 'extension' => $uploadFileExt] = pathinfo($game_sticker['name']);

        $filename = $uploadFilename . '_' . randomString(30) . '.' . $uploadFileExt;
        $destination = __DIR__ . '/../uploads/products/' . $filename;

        if (move_uploaded_file($game_sticker['tmp_name'], $destination)) {

            $query= "UPDATE game SET game_sticker = :game_sticker WHERE game_name = '$gameName'";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':game_sticker', $filename, PDO::PARAM_STR);
            $stmt->execute();

        }

        $countFileUpload = $countFileUpload + 1;
    }



    if(!empty($game_picture1['name'])) {
        ['filename' => $uploadFilename, 'extension' => $uploadFileExt] = pathinfo($game_picture1['name']);

        $filename = $uploadFilename . '_' . randomString(30) . '.' . $uploadFileExt;
        $destination = __DIR__ . '/../uploads/products/' . $filename;

        if (move_uploaded_file($game_picture1['tmp_name'], $destination)) {

            $query= "UPDATE game SET game_picture1 = :game_picture1 WHERE game_name = '$gameName'";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':game_picture1', $filename, PDO::PARAM_STR);
            $stmt->execute();
        }

        $countFileUpload = $countFileUpload + 1;
    }



    if(!empty($game_picture2['name'])) {
        ['filename' => $uploadFilename, 'extension' => $uploadFileExt] = pathinfo($game_picture2['name']);

        $filename = $uploadFilename . '_' . randomString(30) . '.' . $uploadFileExt;
        $destination = __DIR__ . '/../uploads/products/' . $filename;

        if (move_uploaded_file($game_picture2['tmp_name'], $destination)) {

            $query= "UPDATE game SET game_picture2 = :game_picture2 WHERE game_name = '$gameName'";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':game_picture2', $filename, PDO::PARAM_STR);
            $stmt->execute();
        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture3['name'])) {
        ['filename' => $uploadFilename, 'extension' => $uploadFileExt] = pathinfo($game_picture3['name']);

        $filename = $uploadFilename . '_' . randomString(30) . '.' . $uploadFileExt;
        $destination = __DIR__ . '/../uploads/products/' . $filename;

        if (move_uploaded_file($game_picture3['tmp_name'], $destination)) {

            $query= "UPDATE game SET game_picture3 = :game_picture3 WHERE game_name = '$gameName'";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':game_picture3', $filename, PDO::PARAM_STR);
            $stmt->execute();

        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture4['name'])) {
        ['filename' => $uploadFilename, 'extension' => $uploadFileExt] = pathinfo($game_picture4['name']);

        $filename = $uploadFilename . '_' . randomString(30) . '.' . $uploadFileExt;
        $destination = __DIR__ . '/../uploads/products/' . $filename;

        if (move_uploaded_file($game_picture4['tmp_name'], $destination)) {

            $query= "UPDATE game SET game_picture4 = :game_picture4 WHERE game_name = '$gameName'";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':game_picture4', $filename, PDO::PARAM_STR);
            $stmt->execute();
        }

        $countFileUpload = $countFileUpload + 1;
    }

    if(!empty($game_picture5['name'])) {
        ['filename' => $uploadFilename, 'extension' => $uploadFileExt] = pathinfo($game_picture5['name']);

        $filename = $uploadFilename . '_' . randomString(30) . '.' . $uploadFileExt;
        $destination = __DIR__ . '/../uploads/products/' . $filename;

        if (move_uploaded_file($game_picture5['tmp_name'], $destination)) {

            $query= "UPDATE game SET game_picture5 = :game_picture5 WHERE game_name = '$gameName'";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':game_picture5', $filename, PDO::PARAM_STR);
            $stmt->execute();

        }

        $countFileUpload = $countFileUpload + 1;
    }

    if($countFileUpload > 0 ){
        redirect('../admin/admin.php?validation_upload=' . UPLOADED_FILES . '&files_upload=' . $countFileUpload);
    } else if ($countFileUpload === 0){
        redirect('../admin/admin.php?error_upload=' . ERROR_UPLOAD_FILES);
    }
    
    
    

}

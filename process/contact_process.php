<?php
require_once __DIR__ . '/../classes/Autoload.php';
require_once __DIR__ . '/../functions/error_register.php';
require_once __DIR__ . '/../functions/validation_register.php';
Autoload::register();
session_start();


try {
    $db = Database::getInstance();
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}


if(!empty($_POST)) {

    
    [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'object' => $object,
        'message' => $message
    ] = $_POST;

    $newEmail = new Email($email);



    if(empty($firstname) || empty($lastname) || empty($email) || empty($message)) {
        Controller::redirect('../contact.php?error=' . INPUT_MISSING);
    }

    if($newEmail->isEmail() === false) {
        Controller::redirect('../index.php?error=' . EMAIL_INVALIDE);
    }

    if($newEmail->isSpam()) {
        Controller::redirect('../index.php?error=' . EMAIL_SPAM);
    }

    else {


        $query = "INSERT INTO contact (
            contact_firstname, contact_lastname, contact_email, contact_object, contact_message 
            ) 
            VALUES (
                :firstname, :lastname, :email, :message_object, :message_text)";
            
        $stmt = $db->prepare($query);
        $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':message_object', $object, PDO::PARAM_INT);
        $stmt->bindValue(':message_text', $message, PDO::PARAM_STR);
        

        if($stmt->execute()) {
            Controller::redirect('../index.php?validation=' . MESSAGE_SEND);
        }

    }
    
} else {
    Controller::redirect('../index.php');
}
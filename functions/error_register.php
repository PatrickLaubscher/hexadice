<?php 

const CONNEXION_BBD = 1;
const EMAIL_SPAM = 2;
const EMAIL_DUPLICATE = 3;
const EMAIL_INVALIDE = 4;
const EMAIL_REQUIRED = 5;
const FORM_EMPTY = 6;
const INPUT_MISSING = 7;
const ERROR_PASSWORD = 8;
const ERROR_LOGIN = 9;
const ERROR_UPLOAD_FILES = 10;
const GAME_NOT_FOUND = 11;



function getErrorMsg(int $int): string
{
    switch ($int) {
        case CONNEXION_BBD:
            $msg = "La connexion à la base de données a échoué";
        break;
        case EMAIL_SPAM:
            $msg = "Votre email n'est pas valide";
        break;
        case EMAIL_DUPLICATE:
            $msg = "Vous êtes déjà enregistré dans notre liste de diffusion !";
        break;
        case EMAIL_INVALIDE:
            $msg = "Ce champ n'est pas un email";
        break;
        case EMAIL_REQUIRED:
            $msg = "La saisie d'un email est obligatoire";
        break;
        case FORM_EMPTY:
            $msg = "Les champs de saisie sont vides";
        break;
        case INPUT_MISSING:
            $msg = "Tous les champs doivent être remplis";
        break;
        case ERROR_PASSWORD:
            $msg = "Le mot de passe saisi n'est pas correct";
        break;
        case ERROR_LOGIN:
            $msg = "Le login saisi n'est pas correct";
        break;
        case GAME_NOT_FOUND:
            $msg = "Le jeu n'a pas été trouvé";
        break;
        default:
            $msg = "Une erreur est survenue";
    }

    return $msg;
}


function getErrorUploadMsg(int $int): string
{
    switch ($int) {
        case ERROR_UPLOAD_FILES:
            $msg = "Aucun fichier n'a été enregistré";
        break;
        default:
        $msg = "Une erreur est survenue";
    }   

    return $msg;
}
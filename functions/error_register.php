<?php 

const CONNEXION_BBD = 1;
const EMAIL_SPAM = 2;
const EMAIL_DUPLICATE = 3;
const EMAIL_INVALIDE = 4;
const EMAIL_REQUIRED = 5;


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
        default:
            $msg = "Une erreur est survenue";
    }

    return $msg;
}
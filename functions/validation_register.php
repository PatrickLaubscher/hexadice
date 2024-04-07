<?php

const GAME_ADDED = 1;
const FEATURE_ADDED = 2;
const NEWCUSTOMER_REGISTER = 3;
const SUBSCRIPTION_NEWSLETTER = 4;
const UPLOADED_FILES = 5;

function getValidationMsg(int $int): string
{
    switch ($int) {
        case SUBSCRIPTION_NEWSLETTER:
            $msg = "Merci de votre inscription à notre newsletter !";
        break;
        case NEWCUSTOMER_REGISTER:
            $msg = "Merci de votre inscription à notre site !";
        break;
        case GAME_ADDED:
            $msg = "Le jeu a bien été ajouté au catalogue";
        break;
        case FEATURE_ADDED:
            $msg = "L'élément a bien été rajouté à la liste";
        break;
        default:
            $msg = "Une erreur est survenue";
    }
    return $msg;
}


function getValidationUploadMsg(int $int, int $filesNb): string
{
    switch ($int) {
        case UPLOADED_FILES:
            $msg = "Nombre de fichiers chargés : $filesNb";
        break;
        default:
        $msg = "Une erreur est survenue";
    }
    return $msg;


}
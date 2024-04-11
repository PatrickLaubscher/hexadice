<?php

const GAME_ADDED = 1;
const GAME_MODIFIED = 2;
const FEATURE_ADDED = 3;
const NEWCUSTOMER_REGISTER = 4;
const SUBSCRIPTION_NEWSLETTER = 5;
const UPLOADED_FILES = 6;
const MESSAGE_SEND = 7;
const PRODUCT_ADD = 8;
const ORDER_CONFIRM = 9;
const DELETE_PRODUCT = 10;
const DELETE_GAME = 11;

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
        case GAME_MODIFIED:
            $msg = "Le jeu a bien été modifié";
        break;
        case FEATURE_ADDED:
            $msg = "L'élément a bien été rajouté à la liste";
        break;
        case MESSAGE_SEND:
            $msg = "Merci de votre message ! Notre équipe vous répondra dans les meilleurs délais";
        break;
        case PRODUCT_ADD:
            $msg = "Merci le produit a bien été rajouté à votre panier !";
        break;
        case ORDER_CONFIRM:
            $msg = "Votre commande est bien enregistrée, merci !";
        break;
        case DELETE_PRODUCT:
            $msg = "L'article a bien été supprimé du panier";
        break;
        case DELETE_GAME:
            $msg = "Le jeu a bien été supprimé du catalogue";
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
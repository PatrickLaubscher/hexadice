<?php

class ValidationRegister
{

    private const GAME_ADDED              = 1;
    private const GAME_MODIFIED           = 2;
    private const FEATURE_ADDED           = 3;
    private const NEWCUSTOMER_REGISTER    = 4;
    private const SUBSCRIPTION_NEWSLETTER = 5;
    private const UPLOADED_FILES          = 6;
    private const MESSAGE_SEND            = 7;
    private const PRODUCT_ADD             = 8;
    private const ORDER_CONFIRM           = 9;
    private const DELETE_PRODUCT          = 10;
    private const DELETE_GAME             = 11;
    private const EMPTY_CART              = 12;


    public static function getValidationMsg(int $validationNb): string
    {
        return match ($validationNb) {
            self::SUBSCRIPTION_NEWSLETTER => "Merci de votre inscription à notre newsletter !",
            self::NEWCUSTOMER_REGISTER    => "Merci de votre inscription à notre site !",
            self::GAME_ADDED              => "Le jeu a bien été ajouté au catalogue",
            self::GAME_MODIFIED           => "Le jeu a bien été modifié",
            self::FEATURE_ADDED           => "L'élément a bien été rajouté à la liste",
            self::MESSAGE_SEND            => "Merci de votre message ! Notre équipe vous répondra dans les meilleurs délais",
            self::PRODUCT_ADD             => "Merci le produit a bien été rajouté à votre panier !",
            self::ORDER_CONFIRM           => "Votre commande est bien enregistrée, merci !",
            self::DELETE_PRODUCT          => "L'article a bien été supprimé du panier",
            self::DELETE_GAME             => "Le jeu a bien été supprimé du catalogue",
            self::EMPTY_CART              => "Votre panier ne contient plus d'articles",
            default                       => "Une erreur est survenue"
        };
    }


    public static function getValidationUploadMsg(int $validationNb, int $filesNb): string
    {
        return match ($validationNb) {
            self::UPLOADED_FILES          => "Nombre de fichiers chargés : $filesNb",
            default                       => "Une erreur est survenue"
        };
    }

}
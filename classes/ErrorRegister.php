<?php


class ErrorRegister 
{
    const CONNEXION_BBD      = 1;
    const EMAIL_SPAM         = 2;
    const EMAIL_DUPLICATE    = 3;
    const EMAIL_INVALIDE     = 4;
    const EMAIL_REQUIRED     = 5;
    const FORM_EMPTY         = 6;
    const INPUT_MISSING      = 7;
    const ERROR_PASSWORD     = 8;
    const ERROR_LOGIN        = 9;
    const ERROR_UPLOAD_FILES = 10;
    const GAME_NOT_FOUND     = 11;
    const ERROR_STMT         = 12;
    const ERROR_MSG          = 13;


    public static function getErrorMsg(int $errorNb): string
    {
        return match ($errorNb) {
            self::CONNEXION_BBD      => "La connexion à la base de données a échoué",
            self::EMAIL_SPAM         => "Votre email n'est pas valide",
            self::EMAIL_DUPLICATE    => "Vous êtes déjà enregistré dans notre liste de diffusion !",
            self::EMAIL_INVALIDE     => "Ce champ n'est pas un email",
            self::EMAIL_REQUIRED     => "La saisie d'un email est obligatoire",
            self::FORM_EMPTY         => "Les champs de saisie sont vides",
            self::INPUT_MISSING      => "Tous les champs doivent être remplis",
            self::ERROR_PASSWORD     => "Le mot de passe saisi n'est pas correct",
            self::ERROR_LOGIN        => "Le login saisi n'est pas correct",
            self::GAME_NOT_FOUND     => "Le jeu n'a pas été trouvé dans le catalogue",
            self::ERROR_STMT         => "Il y a une erreur dans l'exécution de cette requête",
            self::ERROR_MSG          => "Il y a eu une erreur dans l'envoi de votre message",
            default                  => "Une erreur est survenue"
        };
    }

    public static function getErrorUploadMsg(int $errorNb): string
    {
        return match ($errorNb) {
            self::ERROR_UPLOAD_FILES => "Aucun fichier n'a été enregistré",
            default                  => "Une erreur est survenue"
        };
    }

}
<?php


class ErrorRegister 
{
    private const CONNEXION_BBD      = 1;
    private const EMAIL_SPAM         = 2;
    private const EMAIL_DUPLICATE    = 3;
    private const EMAIL_INVALIDE     = 4;
    private const EMAIL_REQUIRED     = 5;
    private const FORM_EMPTY         = 6;
    private const INPUT_MISSING      = 7;
    private const ERROR_PASSWORD     = 8;
    private const ERROR_LOGIN        = 9;
    private const ERROR_UPLOAD_FILES = 10;
    private const GAME_NOT_FOUND     = 11;
    private const ERROR_STMT         = 12;
    private const ERROR_MSG          = 13;
    private const NAME_REQUIRED      = 14;
    private const MODIFIED_NONE      = 15;
    private const MISSING_FILES      = 16;


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
            self::NAME_REQUIRED      => "Merci de renseigner le nom du jeu",
            self::MODIFIED_NONE      => "Aucune modification n'a été apportée au jeu. Vérifiez les données saisies.",
            self::MISSING_FILES      => "Il manque les fichiers dans le formualaire d'envoi.",
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
<?php

const SUBSCRIPTION_NEWSLETTER = 1;



function getValidationMsg(int $int): string
{
    switch ($int) {
        case SUBSCRIPTION_NEWSLETTER:
            $msg = "Merci de votre inscription à notre newsletter !";
        break;
        default:
            $msg = "Une erreur est survenue";
    }

    return $msg;
}
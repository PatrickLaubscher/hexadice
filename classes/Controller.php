<?php


class Controller 
{


    /**
     * Redirects to the given location
     *
     * @param string $target
     * @return void
     */
    public static function redirect(string $target): void
    {
        header('Location: ' . $target);
        exit;
    }


} 
<?php 

class Autoload

{
    public static function register() 
    {
        spl_autoload_register(function ($class_name) {
            $file = __DIR__. '/../classes/' . $class_name . '.php';
            if (file_exists($file)) {
                require $file;
            }
        });
    }
    
}
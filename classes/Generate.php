<?php

class Generate 

{


    /**
     * Return a random string of a given length
     * 
     * @param int $length
     * @return string
     */
    public static function randomString(int $length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);

        for ($i = 0, $randomString = ''; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }


}
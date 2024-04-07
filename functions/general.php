<?php 

/**
 * Redirects to the given location
 *
 * @param string $target
 * @return void
 */
function redirect(string $target): void
{
    header('Location: ' . $target);
    exit;
}


function randomString(int $length): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);

    for ($i = 0, $randomString = ''; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

    return $randomString;
}

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


<?php 


abstract class User 
{

    public function __construct (
        private object $db
    ){

    }

    abstract public function addNewUser (string $firstname, string $lastname, string $email, string $pass);

    abstract public function getAllList ();

    abstract public function getContentById (int $id);

}
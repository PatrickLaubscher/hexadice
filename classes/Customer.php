<?php

require_once __DIR__ . '/User.php';

class Customer extends User
{


    public function __construct(
        private object $db
    )
    {
    } 


    /**
     * Create new customer in customer table 
     * 
     * @param string firstname, lastname, email, pass
     * @return bool
     */
    public function addNewUser(string $firstname, string $lastname, string $email, string $pass) {

        $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);

        $query = 'INSERT INTO customer (customer_firstname, customer_lastname, customer_email, customer_pwd) 
        VALUES (:customer_firstname, :customer_lastname, :customer_email, :customer_pwd)';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':customer_firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':customer_lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindValue(':customer_email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':customer_pwd', $hashedPassword, PDO::PARAM_STR);
        return $stmt->execute();

    }


    /**
     * Find all customer in customer table
     * 
     * 
     * @return array 
     */
    public function getAllList (): array
    {
        $stmt = $this->db->prepare("SELECT 'customer_id','customer_firstname','customer_lastname','customer_email' FROM customer");
        $stmt->execute();
        $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
       

        return $customer;

    }


    /**
     * find all customer information by id in customer table
     * 
     * 
     * @param int $id
     * @return array
     */
    public function getContentById (int $id): array
    {
        $stmt = $this->db->prepare("SELECT customer_firstname, customer_lastname, customer_email FROM customer WHERE customer_id = $id ");
        $stmt->execute();
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

        return $customer;

    }
    

}

<?php

class Login
{

    public function __construct (
        private object $db
    )
    {}


    /**
     * Look for existing customer 
     * 
     * @param string $email
     * @return array
     */
    public function findCustomer (string $email): array 
    {

        $query = 'SELECT * FROM customer WHERE customer_email = :email';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


    /**
     * Look for existing employee 
     * 
     * @param string $email
     * @return array
     */
    public function findEmployee (string $email): array 
    {

        $query = 'SELECT * FROM employee WHERE employee_email=:email';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

} 
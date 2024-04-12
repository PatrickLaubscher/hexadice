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
     * @return bool|array
     */
    public function findCustomer (string $email): bool|array 
    {

        $query = 'SELECT * FROM customer WHERE customer_email = :email';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

        return $customer;

    }


    /**
     * Look for existing employee 
     * 
     * @param string $email
     * @return bool|array
     */
    public function findEmployee (string $email): bool|array 
    {

        $query = 'SELECT * FROM employee WHERE employee_email=:email';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $emloyee = $stmt->fetch(PDO::FETCH_ASSOC);

        return $emloyee;

    }

} 
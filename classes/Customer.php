<?php

class Customer 
{


    public function getCustomer (): array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM user");
        $stmt->execute();
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);
       

        return $customer;

    }
    

}
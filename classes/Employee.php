<?php


require_once __DIR__ . '/User.php';


class Employee extends User
{


    public function __construct(
        private object $db
    )
    {
    } 

    public function addNewUser(string $firstname, string $lastname, string $email, string $pass) {


    }

    
    public function getAllList (): array
    {
        $stmt = $this->db->prepare("SELECT 'employee_id','employee_firstname','employee_lastname','employee_email' FROM employee");
        $stmt->execute();
        $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);
       

        return $customer;

    }


    public function getContentById (int $id): array
    {
        $stmt = $this->db->prepare("SELECT employee_firstname, employee_lastname, employee_email FROM employee WHERE employee_id = $id ");
        $stmt->execute();
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);

        return $employee;

    }
    

}

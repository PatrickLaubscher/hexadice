<?php

class Message 
{

    public function __construct(
        private object $db
    )
    {}


    /**
     * add new message from customer in table contact
     * 
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param int $object
     * @param string $message
     * @return bool
     */
    public function customerNewMessage (string $firstname, string $lastname, string $email, int $object, string $message): bool 
    {
        $query = "INSERT INTO contact (contact_firstname, contact_lastname, contact_email, contact_object, contact_message) 
                  VALUES (:firstname, :lastname, :email, :message_object, :message_text)";
            
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':message_object', $object, PDO::PARAM_INT);
        $stmt->bindValue(':message_text', $message, PDO::PARAM_STR);

        return $stmt->exec();
    } 


}
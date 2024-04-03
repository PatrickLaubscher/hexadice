<?php

class newsletterRegister
{

    public function __construct(
        private string $email
    )
    {}


    /**
     * check is input is empty
     *
     * @return boolean
     */
    public function isEmpty (): bool
    {
        return empty($this->email) ? true : false;
    }


    /**
     * check email if format is correct
     *
     * @return boolean
     */
    function isEmail (): bool
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) ? true : false;
    }


    /**
     * Check email address if it's spam, redirect to given location
     *
     * @return bool
     */
    function isSpam (): bool
    {
        $emailParts = explode('@', $this->email);
        $emailDomain = $emailParts[1];

        $spamDomains = file(__DIR__ . '/../data/spam_domain.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        return in_array($emailDomain, $spamDomains) ? true : false;
    }


    /**
     * verify if email is already in newsletter_list table
     *
     * @return boolean
     */
    function isDuplicate (): bool
    {
        $db = Database::getInstance();
        $query = 'SELECT newsletter_list_email FROM newsletter_list';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $emailsList = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return (in_array($this->email, $emailsList) ? true : false);
    }


    /**
     * add email into newsletter_list table
     * 
     * @return boolean
     */
    public function addEmail (): bool
    {
        
        $db = Database::getInstance();
        $query = 'INSERT INTO newsletter_list (newsletter_list_email) VALUES (:email)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
    
        return $stmt->execute();

    }
    
    
    
}






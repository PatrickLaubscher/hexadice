<?php



class Email 
{

    public function __construct(
        private string $email
    )
    {}


    /**
     * check is input is empty
     *
     * @param string $email
     * @return boolean
     */
    function isEmpty (): bool
    {
        return empty($this->email) ? true : false;
    }


    /**
     * check email if format is correct
     *
     * @param string $email
     * @return boolean
     */
    function isEmail (): bool
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) ? true : false;
    }


    /**
     * Check email address if it's spam
     *
     * @param string $mail 
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
     * verify if email is already in emails list
     *
     * @param string $mail
     * @return boolean
     */
    function isDuplicateMailingList (object $db): bool
    {
        $query = 'SELECT newsletter_list_email FROM newsletter_list WHERE newsletter_list_email = :email';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        
        return ($stmt->execute() ? true : false);
    }


    /**
     * Add email in emails list 
     *
     * @param string $mail
     * @return boolean
     */
    function addEmail (object $db): bool
    {
        $query = 'INSERT INTO newsletter_list(newsletter_list_email) VALUES (:email)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        
        return ($stmt->execute() ? true : false);
    }




}
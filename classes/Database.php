<?php


class Database 
{
    
    private string $host;
    private int $port;
    private string $dbName;
    private string $charset;
    private string $dsn;
    private string $dbUser;
    private string $dbPassword; 
    private PDO $pdo;
    private static $instance;

    /**
     * 
     * @throws PDOexception if failure to connect
     */
    private function __construct()
    {
        [
            'DB_HOST'     => $this->host,
            'DB_PORT'     => $this->port,
            'DB_NAME'     => $this->dbName,
            'DB_CHARSET'  => $this->charset,
            'DB_USER'     => $this->dbUser,
            'DB_PASSWORD' => $this->dbPassword
        ] = parse_ini_file(__DIR__ . '/../config/db.ini');

        $this->dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->dbName;charset=$this->charset";
        try {
            $this->pdo = new PDO($this->dsn, $this->dbUser, $this->dbPassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la connexion avec la base de données". $e->getMessage());
        }
    }


    static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }


    public function prepare($statement)
    {
        $req = $this->pdo->prepare($statement);
        return $req;
    }

    public function getLastId()
    {
        return $this->pdo->lastInsertId();
    }


}